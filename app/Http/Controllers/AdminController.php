<?php

namespace App\Http\Controllers;

use App\Models\Notification as ModelsNotification;
use App\Models\Transaction;
use App\Models\User;
use App\Notifications\DepositRequestNotification;
use App\Notifications\UserFollowNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    // public function notify()
    // {
    //     if(auth()->user()) {
    //         $user = User::first();
    //         auth()->user()->notify(new UserFollowNotification($user));
    //     }
    // }

    public function deposit()
    {
        $transactions = Transaction::where('status', 1)->get();
        foreach ($transactions as $transaction) {
            $transaction->notify(new DepositRequestNotification($transaction));
        }
        return view('notifi', compact('transaction'));
    }

    public function notifi()
    {
        $count_notifi = Transaction::where('status', 1)->count();
        $notifications = ModelsNotification::all();
        return view('admin.home', compact('count_notifi', 'notifications'));
    }

    public function show_info_deposit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('admin.transaction', compact('transaction'));
    }

    public function change_status_deposit_success($id)
    {
        try{
            $transaction = Transaction::findOrFail($id);
            $notifi = ModelsNotification::where('notifiable_id', $id)->first();
            $data = json_decode($notifi->data);
            $data->status = 2;
            $data_new = json_encode($data);
            $notifi->data = $data_new;
            $transaction->status = 2;
            $transaction->update();
            $notifi->save();
        } catch (Exception $e) {
            return $e;
        }

    }
}
