<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $transactions = Transaction::all();
        // return response()->json($transactions, 200);
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
        dd($user);
        // $transaction =
    }
}
