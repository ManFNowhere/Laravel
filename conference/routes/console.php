<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Models\Events;
use App\Models\EventUser;
use App\Models\PastEvent;
use App\Models\User;
use App\Notifications\NotifEvent;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

Schedule::call(function(){
    $events = Events::all();
    $now = Carbon::now();

    foreach ($events as $event) {
        $start_at = Carbon::createFromFormat("Y-m-d H:i:s", $event->date->date . " " . $event->time->time_events);
        
        if($start_at < $now){
            $tableName = str_replace('-', '_', $event->slug);
            
            $attendanceCount = EventUser::where('events_id', $event->id)->count();
            
            PastEvent::create([
                'tablename'=> $tableName,
                'author'=> $event->user->name,
                'start_at'=> $start_at,
                'attendance'=> $attendanceCount,
                'data' => $event->data,
                'deleted_at'=> $now
            ]);

            // Buat laporan Excel
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->mergeCells('A1:C1');
            $sheet->setCellValue('A1', $event->title);
            
            $sheet->mergeCells('A2:C2');
            $sheet->setCellValue('A2', 'Author : ' . $event->user->name);
    
            $sheet->mergeCells('A3:C3');
            $sheet->setCellValue('A3', 'Date&Time : ' . $start_at);
    
            $sheet->mergeCells('A4:C4');
            $sheet->setCellValue('A4', 'Room : ' . $event->room->room_number);
    
            $sheet->mergeCells('A5:C5');
            $sheet->setCellValue('A5', 'Total attendance : ' . $attendanceCount);
    
            $sheet->setCellValue('A7', 'No');
            $sheet->setCellValue('B7', 'Name');
            $sheet->setCellValue('C7', 'Email');
            
            $dataEvent = EventUser::where('events_id', $event->id)->get();
            $row = 8;
            $no = 0;
            foreach($dataEvent as $t){
                $sheet->setCellValue('A'.$row, $no);
                $sheet->setCellValue('B'.$row, User::find($t->user_id)->name);
                $sheet->setCellValue('C'.$row, User::find($t->user_id)->email);
                $row++;
                $no++;
            }
                
            foreach (range('A', 'C') as $columnID) {
                $sheet->getColumnDimension($columnID)->setAutoSize(true);
            }
    


            $filename = $tableName . '.xlsx';
            $tempFile = tempnam(sys_get_temp_dir(), $filename);
            $writer = new Xlsx($spreadsheet);
            $writer->save($tempFile);
            
            // Simpan laporan ke dalam penyimpanan
            Storage::disk('past_event')->put($filename, file_get_contents($tempFile));
            unlink($tempFile);
            
            // Hapus event dan tabelnya
            $event->delete();
        } else if ($start_at->diffInMinutes($now) <= 5) {
            $dataEvent = EventUser::where('events_id', $event->id)->get();
            $url = 'event/' . $event->slug;

            foreach ($dataEvent as $data) {
                $user = User::find($data->user_id);
                $user->notify(new NotifEvent($user->name, $event->title, $url,$start_at->diffForHumans()));
            }  
        }
    }
})->everyMinute();



Schedule::call(function () {


    $eventData = [];
    $eventCover= [];
    $pastData=[];

    $events = Events::all();
    foreach ($events as $event){
        $eventData[] = $event['data'];
        $eventCover[] = $event['cover'];
    }
    $past_event = PastEvent::all();
    foreach($past_event as $event){
        $pastData[] = $event['data'];
    }
    $dirData = 'data-event/';
    $storageData = Storage::allFiles($dirData);
    foreach($storageData as $file){
        if(!in_array($file, $pastData) and !in_array($file, $eventData )){
            Storage::delete($file);
        }
    }

    $dirCover = 'cover-event';
    $storageCover = Storage::allFiles($dirCover);
    foreach($storageCover as $file){
        if(!in_array($file, $eventCover) or $file != 'cover-event/test.jpg'){
            Storage::delete($file);
        }
    }

         

})->everyMinute();