<?php

namespace App\Http\Controllers;

use App\Models\EventUser;
use App\Notifications\CreatedEvent;
use App\Notifications\EditedEvent;
use App\Notifications\JoinEvent;
use App\Notifications\SubscribeNotif;
use App\Notifications\UpdateEvent;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Time;
use App\Models\Date;
use App\Models\Events;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Exception;
use Carbon\Carbon;
use Notification;

class EventController extends Controller
{
    public function index(){
        $data = Events::latest();
        if(request('search')){
            $user_ids = User::where("name", 'LIKE', '%'.request('search').'%')->pluck('id')->toArray();
            
            $data = $data->where(function($query) use ($user_ids) {
            $query->where('title', 'LIKE', '%' . request('search') . '%')
                    ->orWhereIn('user_id', $user_ids);
            });
        }
        
        return view("events.index", ["title" => 'Events', 'data' => $data->get()]);
    }

    public function authorIndex($slug){
        $user_id = User::where("name", 'LIKE', '%'.$slug.'%')->pluck('id')->toArray();
        $data = Events::where('user_id', $user_id)->get();
        // dd($data);
        return view('events.author', ['title'=> $slug,'data'=> $data]);
    }
    

    public function addEvent(){
        $date = Date::all();
        return view("partials.addEvent",['title'=>'Add event','dates'=>$date]);
    }
    public function getRoom(Request $request){
        $room = Room::all();
        return response()->json([
            'rooms' => $room,
        ]);
    }

    public function getTime(Request $request) {
        $room = $request->room;
        $bookedTime = Events::where('room_id', $room)->pluck('time_id');
        $availableTimes = Time::whereNotIn('id', $bookedTime)->get();
        // dd($bookedTime);
        return response()->json([
            'times'=> $availableTimes,
            ]);
    }

    public function storeEvent(Request $request){
        $data = $request->validate([
            'title'=> ['required','string','max:255','unique:events,title'],
            'description'=> ['required','string','min:50'],
            'date_id'=> ['required'],
            'room_id'=> ['required'],
            'time_id'=> ['required', Rule::notIn(['Select time'])],
            'cover'=> ['required', 'mimes:png,jpg', 'dimensions:min_width=800,min_height=400'],
            'data'=> ['required', 'mimes:pdf,pptx,ppt']
        ], [
            'cover.required' => 'The cover image is required.',
        ]);

        if($request->file('data') != null){
            $file = $request->file('data')->store('data-event');
            
        }
        if($request->file('cover') != null){
            $cover = $request->file('cover')->store('cover-event');
            
        }
        $slug = str_replace(' ', '-', strtolower($data['title']));
        $data['slug'] = $slug;
        $data['user_id'] = auth()->user()->id;
        $data['data'] = $file;
        $data['cover'] = $cover;
        $url = 'event/'.$slug;
        $tablename = str_replace('-', '_', $slug);
        
        $event = Events::create($data);
        $event->participants()->attach(auth()->user()->id);

        // send notification to the user (speaker) and subscriber
        $user = auth()->user();
        $user->notify(new CreatedEvent($user->name, $tablename, $url, 'Create'));
        $subscriber = Subscribe::all();
        foreach ($subscriber as $s) {
            Notification::route('mail', $s->email)->notify(new SubscribeNotif('New Event', '/event/'.$slug));
        }
        return redirect('dashboard')->with('successUploaded','Your event successfully uploaded!');
       
    }

    public function eventIndex($slug){
        $data = Events::where('slug', $slug)->first();
        // $tablename = str_replace("-", "_", $slug);
        $join = false;
        $time = Carbon::createFromFormat("Y-m-d H:i:s", $data->date->date . " " . $data->time->time_events);
        
        $userId = auth()->id();

        // Periksa apakah pengguna sudah bergabung dengan event tersebut
        $join = EventUser::where('events_id', $data->id)
                        ->where('user_id', $userId)
                        ->exists();
        // dd($data->id."*".$userId);
        // dd($time);
        // try{ 
        //     if(DB::table($tablename)->where('user_id', auth()->user()->id)->first()){
        //         $join = true;
        //     }
        // }catch(Exception $e){
        //     $join = false;
        // }
       
        return view("events.event", ["title"=>$data->title,"data"=> $data,"join"=> $join, 'time'=>$time]);
    }

    public function editEvent($slug){
        // dd($slug);
        $data = Events::where('slug', $slug)->first();
        $date = Date::all();
        $room = Room::all();
        $roomSelected = $data->room;
        $bookedTime = Events::where('room_id', $roomSelected)->pluck('time_id');
        $availableTimes = Time::whereNotIn('id', $bookedTime)->get();
        return view('partials.addEvent',['title'=>'Edit Event','dates'=>$date,'room'=>$room,'time'=>$availableTimes ,'data'=>$data]);    
    }
    
    public function updateEvent(Request $request, $slug){
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description'=> ['required','string','min:20'],
            'date_id'=> ['required','nullable'],
            'room_id'=> ['required','nullable'],
            'time_id'=> ['required', Rule::notIn(['Select time'])],
            ]
        );

        $newSlug = str_replace(' ', '-', strtolower($data['title']));
        // $tablename = str_replace('-', '_', $slug);
        $user = auth()->user();
        $url = 'event/'.$newSlug;
        // $dataTable = DB::table($tablename)->get() ;
       
        if($slug === $newSlug){
            Events::where('slug', $newSlug)->update(
                ['title'=> $data['title'],
                'description'=> $data['description'],
                'date_id'=> $data['date_id'],
                'room_id'=> $data['room_id'],
                'time_id'=> $data['time_id'],
            ]);
        }else{
            // drop old table
            // Schema::drop($tablename);

            // $tablename = str_replace('-', '_', $newSlug);
            $oldData= Events::where('slug', $slug)->first();
            $data['slug'] = $newSlug;
            $data['data'] = $oldData->data;
            $data['user_id'] = $oldData->user_id;
            $data['cover'] = $oldData->cover;
            Events::create($data);
            Events::where('slug', $slug)->delete();
            // Schema::create($tablename, function (Blueprint $table){
            //     $table->id();
            //     $table->timestamps();
            //     $table->integer('user_id');
            //     $table->string('email');
            // });
            
            // //  move data from all table to new table
            // foreach($dataTable as $dt){
            //     DB::table($tablename)->insert(['user_id' => $dt->user_id, 'email'=>$dt->email]);
            // }

            // dd($data);
        }
        $user->notify(new EditedEvent($user->name, $slug, $url));
        
        // foreach ($dataTable as $dt){
        //     $userToNotify = User::where('email', $dt->email)->first();
        //     if ($userToNotify) {
        //         $userToNotify->notify(new UpdateEvent($user->name, $tablename, $url));
        //     }
        // }
       
        return redirect('/event/'.$newSlug)->with('successEdit','Successfully update event!');
    }

    public function deleteEvent($slug){
        // delete table and event on events table
        Events::where('slug', $slug)->delete();
        // notif owner
        $user = auth()->user();
        $url = 'add-event';
        $user->notify(new CreatedEvent($user->name, $slug, $url, 'Delete'));
        return redirect('/dashboard')->with('eventDeleted','Your event '.$slug.' Successfully deleted!');
    }
    public function joinEvent($slug)
    {
        $event = Events::where('slug', $slug)->firstOrFail();
        $user = auth()->user();
        $event->participants()->attach($user->id);
        $status = 'Join';
        $url = 'event/' . $slug;
        $user->notify(new JoinEvent($user->name, $slug, $url, $status));
    
        return redirect($url)->with('joinedEvent', 'Successfully joined ' . $slug . '!');
    }
    
    public function cancelEvent($slug){
        // $tablename = str_replace("-", "_", $slug);
        // dd($tablename);
        // DB::table($tablename)->where(['user_id' => auth()->user()->id])->delete();
        $event = Events::where('slug', $slug)->firstOrFail();
        $user = auth()->user();
        $event->participants()->detach($user->id);
        $user = auth()->user();
        $status = 'Cancel';
        $url = 'events';
        $user->notify(new JoinEvent($user->name, $slug, $url, $status));
        return redirect('event/'.$slug)->with('canceldEvent','Successfully cancel '.$slug.'!');
    }

    public function downloadFile($slug){
        $data = Events::where('slug', $slug)->first();
        $file = $data->data;
        return Storage::download($file);
    }
   
}
