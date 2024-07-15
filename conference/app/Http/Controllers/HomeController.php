<?php

namespace App\Http\Controllers;



use App\Models\EventUser;
use App\Notifications\SubscribeNotif;
use App\Models\Subscribe;
use App\Models\Events;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Notification;


use Illuminate\Support\Facades\Storage;
use App\Models\PastEvent;


class HomeController extends Controller
{
    public function index(){
        $events = Events::all();
        $users = User::all();
        $speaker = User::where('role',2);
        $data = [];

        $test = EventUser::all();
        $popularEvents = EventUser::select('events_id', DB::raw('count(*) as total'))
                             ->groupBy('events_id')
                             ->orderByDesc('total')
                             ->limit(3)
                             ->get();
        $popularEventIds = $popularEvents->pluck('events_id');
        $popularEventData = Events::whereIn('id', $popularEventIds)->get();
                             

        // dd(count($data));
        return view("home",["title"=> "Home",'data'=>$popularEventData,"events"=> $events,"users"=> $users,"speaker"=> $speaker]);
    }

    public function subscribe(Request $request){
        $data['email'] = $request->input('subscribe');
        $data['hash'] = bcrypt($request->input('subscribe'));
        try{
            Subscribe::create($data);
        }catch(\Exception $e){
        
        }
        $link = Subscribe::where('email', $data['email'])->first();
        Notification::route('mail', $data['email'])->notify(new SubscribeNotif('Subscribe','http://localhost/unsubscribe?user='.$link->hash));
        return back()->with("subscribed","Thank you. We will inform you of any new events to youre email at ". $request->subscribe ."!");
    }

    public function unsubscribe(Request $request){
        Subscribe::where('hash', $request->user)->delete();
        return redirect('/');
    }



    public function test(){



        
    }
}
