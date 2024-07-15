<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Stripe\Stripe;
use Stripe\Price;
use Stripe\Product;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {   
        $user = auth()->user();
        $product = null;
        $subscription = Subscription::where('user_id', $user->id)->where('stripe_status', 'active')->first();
        $date = null;
        if($subscription!=null){
            $productId = $subscription->stripe_price;
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $product = Price::retrieve($productId);
            if($product->stripe_price=="price_1PVscRLGT6jvhvSaChj5JfY7"){
                $date = Carbon::createFromTimestamp($product->created)->addMonth()->toDateString();
            }else{$date = Carbon::createFromTimestamp($product->created)->addYear()->toDateString();}
            
        }
        return view('dashboard', [
            'user' => $user,
            'subscription' => $subscription,
            'product' => $product,
            'date' => $date,
        ]);
    }

    public function edit(Request $request): View
    {   
        
        return view('profile.edit', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        dd($request->all());
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();

        return back()->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'delete_password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

   
}
