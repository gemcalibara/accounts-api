<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $accounts = Account::select('id', 'account_name')
                                ->withSum('transactions', 'amount')
                                ->get()
                                ->toArray();

        return response()->json($accounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'account_name'    => 'required|max:300|unique:accounts',
        ]);

        $account = Account::create($request->all());

        return response()->json($account, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $account = Account::findOrFail($id)->transactions;

        return response()->json($account);
    }

}

?>
