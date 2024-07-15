<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Weather;
use Illuminate\Support\Facades\Schema;

class WeatherController extends Controller
{
    public function index()
    {
        return view('weather', ['title' => 'Weather']);
    }

    // public function show($slug){
    //     $url = "https://api.open-meteo.com/v1/forecast?latitude=52.52&longitude=13.41&hourly=".$slug;

    //     $url_data = file_get_contents($url);
    //     $response_data = json_decode($url_data, true);
    //     $times = $response_data['hourly']['time'];
    //     $dataParams = $response_data['hourly'][$slug];
    //     $combinedData = array_combine($times, $dataParams);
       

    //     if (isset($response_data['hourly']['time']) && isset($response_data['hourly'][$slug])) {
    //         DB::statement('DROP TABLE IF EXISTS '.$slug);
    //         DB::statement('CREATE TABLE '.$slug.' (id INT AUTO_INCREMENT PRIMARY KEY, time TIMESTAMP, data VARCHAR(255))');

    //         Weather::truncate();
    //         foreach ($combinedData as $time => $data) {
    //             DB::table($slug)->insert([
    //                 'time' => $time,
    //                 'data' => $data
    //             ]);
    //             Weather::insert([
    //                 'time' => $times[2],
    //                 'data' => $data
    //             ]);

               
    //         }
    //     } 
    //     return view('partials.show', ['title'=>$slug,'data' => $combinedData, 'parameter' => $slug]);
    // }


    public function show(Request $request)
    {
        $selectedOptions = $request->input('parameter', []);
        
        $parameters = implode(',', $selectedOptions);
        $url = "https://api.open-meteo.com/v1/forecast?latitude=52.52&longitude=13.41&hourly=" . $parameters;

        $url_data = file_get_contents($url);
        $response_data = json_decode($url_data, true);

        if (!isset($response_data['hourly']) || empty($response_data['hourly'])) {
            return view('partials.show', [
                'title' => 'Weather Details',
                'data' => [],
                'parameters' => $selectedOptions
            ])->withErrors(['message' => 'No data available for the selected parameters.']);
        }

        $times = $response_data['hourly']['time'];

        foreach ($selectedOptions as $parameter) {
            if (isset($response_data['hourly'][$parameter])) {
                $data[$parameter] = array_combine($times, $response_data['hourly'][$parameter]);
            } else {
                $data[$parameter] = [];
            }
        }
        // save data to session
        $request->session()->put('weather_data', $data);

        return view('partials.show', [
            'title' => 'Weather Details',
            'data' => $data,
            'parameters' => $selectedOptions
        ]);
    }

    public function saveToDatabase(Request $request)
    {
        // Get data from session
        $data = $request->session()->get('weather_data', []);

        $newData = [];
        foreach ($data as $param => $rowData) {
            foreach ($rowData as $time => $value) {
                $newData[$time][$param] = $value;
            }
        }
     
        $userId = auth()->id();
    
        DB::statement('DROP TABLE IF EXISTS ' . $request->databaseName);
        $createTableQuery = 'CREATE TABLE ' . $request->databaseName . " (id INT AUTO_INCREMENT PRIMARY KEY, time TIMESTAMP";
        foreach ($data as $columnName => $columnData) {
            $createTableQuery .= ", $columnName VARCHAR(255)";
        }
        $createTableQuery .= ", user_id INT NOT NULL)";
        DB::statement($createTableQuery);
    
        foreach ($newData as $time => $rowData) {
            $insertQuery = "INSERT INTO {$request->databaseName} (time, ";
            $columns = implode(", ", array_keys($rowData));
            $values = "'" . $time . "', '" . implode("', '", $rowData) . "', " . $userId;
            $insertQuery .= $columns . ", user_id) VALUES (" . $values . ")";
            DB::statement($insertQuery);
        }
    
        // delete data from session
        $request->session()->forget('weather_data');

        Weather::insert([
            'table_name'=> $request->databaseName,
            'user_id'=> $userId,
        ]);
    
        return redirect('/weather')->with('savedToDatabase','Successfully save data into Database!');
    }
    
    public function showTable($table_name){
        $title = 'Title '. $table_name;
        $tablename = Weather::where('table_name', $table_name)->first();
        $columname = Schema::getColumnListing($tablename->table_name);
        $data = DB::table($tablename->table_name)->get();
        // dd($columname);
        return view("partials.table",['title'=>$title,'table_name'=>$tablename, 'columnname'=>$columname,'data'=>$data]);
    }

    public function deleteTable($table_name){
        // dd($table_name);
        DB::statement('DROP TABLE '. $table_name);
        Weather::where('table_name', $table_name)->delete();
        return redirect('/dashboard')->with('tableOpened','Tabel '.$table_name.' deleted!');
    }
}
