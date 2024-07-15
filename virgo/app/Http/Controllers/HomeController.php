<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Stripe\Stripe;
use Stripe\Price;
use Stripe\Product;
use App\Models\Subscription;
class HomeController extends Controller
{
    public function index(){
        $data = Movie::latest()->get()->take(7);
        $free = Movie::where("type",1)->orderBy('watched','desc')->take(7)->get();
        $paid = Movie::where('type',2)->orderBy('watched','desc')->take(7)->get();
        $watch = Movie::orderBy('watched','desc')->take(7)->get();
        // dump($data);
        return view("welcome", ["data"=>$data,"paid"=> $paid,"free"=> $free,"watch"=> $watch]);
    }

    public function test(){
        $currentTime = Carbon::now();

        // Fetch active subscriptions where end date is before current time
        $subscriptions = Subscription::whereNotNull('ends_at')
            ->where('stripe_status', 'active')
            ->where('ends_at', '<', $currentTime)
            ->get();
        foreach($subscriptions as $subscription){
            // Find user by subscription's user_id and update role to 0
            $user = User::findOrFail($subscription->user_id);
            $user->update(['role' => 0]);
        }
    
    }
    


}
