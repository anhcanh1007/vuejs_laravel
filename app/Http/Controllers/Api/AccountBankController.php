<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Acount_Bank;
use Illuminate\Http\Request;

class AccountBankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Acount_Bank::with('bank')->get();
        return response()->json($accounts, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $account_bank = Acount_Bank::with('bank')->where('bank_id', $id)->get();
        return response()->json($account_bank, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Acount_Bank $acount_Bank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acount_Bank $acount_Bank)
    {
        //
    }

    public function getAccountByBankId($id)
    {
        $account = Acount_Bank::where('bank_id', $id)->first();
        return response()->json($account, 200);
    }
}
