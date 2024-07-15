<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Price;
use Stripe\Subscription;
use Carbon\Carbon;
class SubscriptionController extends Controller
{
    public function index(){
        return view('subscription.subscription');
    }

    public function subscription(Request $request)
    {
        $monthlyPlan = env('STRIPE_MONTHLY');
        $yearlyPlan = env('STRIPE_YEARLY');
        $plan = ($request->type == 2) ? $yearlyPlan : $monthlyPlan;
        if ($request->type == 0) {
            return redirect()->route('dashboard');
        }
        $sub = \App\Models\Subscription::where('user_id', Auth::id())->where('stripe_status', 'canceled')->first();
        $user = Auth::user();

        if ($sub) {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            if ($sub->ends_at != null) {
                if ($user->role == $request->type) {
                    Subscription::update($sub->stripe_id, ['cancel_at_period_end'=>false]);
                } else {
                    // Start new subscription after the current plan ends need fix
                    // $user->subscription()->swap($plan);
                    return $request->user()
                ->newSubscription(env('STRIPE_PRODUCT'), $plan)
                ->checkout([
                    'success_url' => route('success.subscription', ['type' => $request->type]),
                    'cancel_url' => route('dashboard'),
                ]);
                }
            }
        } else {
            // Create a new subscription
            return $request->user()
                ->newSubscription(env('STRIPE_PRODUCT'), $plan)
                ->checkout([
                    'success_url' => route('success.subscription', ['type' => $request->type]),
                    'cancel_url' => route('dashboard'),
                ]);
        }
    
        return redirect()->route('dashboard');
    }

    public function success($type){
        $id = auth()->user()->id;
        User::find($id)->update(['role'=>$type]);
        return view('subscription.success');
    }

    public function cancel(){
        $user = auth()->user();
        $subscription = \App\Models\Subscription::where('user_id', $user->id)->where('stripe_status', 'active')->first();
        $subscriptionId = $subscription->stripe_id;
        $productId = $subscription->stripe_price;
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $product = Price::retrieve($productId);
        if($product->stripe_price==env('STRIPE_MONTHLY')){
            $date = Carbon::createFromTimestamp($product->created)->addMonth()->toDateString();
        }else{$date = Carbon::createFromTimestamp($product->created)->addYear()->toDateString();}       

        return view('subscription.cancel',['id'=>$subscriptionId,'product'=>$product, 'date'=>$date]);
    }
    public function cancelSubscription($subscriptionId){
        Stripe::setApiKey(env('STRIPE_SECRET'));
        // // cancle at end of subscription
        // Subscription::update($subscriptionId, ['cancel_at_period_end'=>true]);

        // // cancel on current time
        // $sub = Subscription::retrieve($subscriptionId)->cancel();
        // $id = auth()->user()->id;
        // User::find($id)->update(['role'=>0]);


        // cancel on specific time
        $time = Carbon::now()->addMinutes(1)->timestamp;
        // dd($time);
        Subscription::update($subscriptionId, ['cancel_at'=>$time]);
        return redirect('/dashboard');
    }
}
