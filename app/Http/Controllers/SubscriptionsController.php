<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth; 
use App\Models\User;

class SubscriptionsController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
        $user->planChoice = $request->planChoice;
        $user->save();
        
        $planChoice = $request->planChoice;
        
        // 今後機能を増やすならswich文
        //￥2980
        if($planChoice === '1'){
            $_planuuid = 'price_1N5UtVBqtwf4uKqUiucKj7ZD';
        }
        //￥3980
        if($planChoice === '2'){
            $_planuuid = 'price_1N5UtVBqtwf4uKqUHe329ThP';
        }
        //￥4980
        if($planChoice === '3'){
            $_planuuid = 'price_1N5UtVBqtwf4uKqU3upnzwV7';
        }
        
        $request->user()->newSubscription(
            'default', $_planuuid
        )->create($request->paymentMethodId);
        
        return redirect('/dashboard');
    }
}
