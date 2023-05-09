<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use App\Notifications\DepositRequestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('admin.list_transaction', compact('transactions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionRequest $request)
    {
        $user = $request->user();
        $transaction = $request->all();
        $transaction['id_user'] = $user->id;
        $transaction['status'] = 1;
        if($request->validated()) {
            $transaction = Transaction::create($transaction);
            Notification::send($transaction, new DepositRequestNotification($transaction));
            // $transaction->notify(new DepositRequestNotification($transaction));
            return response()->json($transaction, 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function get_transaction_by_status()
    {
        $transaction = Transaction::where('status', 1)->orderByDesc('created_at')->get();
        return response()->json($transaction, 200);
    }

    public function get_transaction_by_id(Request $request)
    {
        $user = $request->user();
        $id_user = $user->id;
        $result = Transaction::where('id_user', $id_user)->get();
        return response()->json($result, 200);
    }
}
