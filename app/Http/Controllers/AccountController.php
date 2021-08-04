<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    
    /**
     * __construct
     *
     * @param  mixed $account
     * @return void
     */
    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = $this->account->getTotalAmountOfTransactions()->get();

        $collection = collect($accounts);

        $data = $collection->map(function($item, $key) {
  
            return ['id'            => $item->id, 
                    'account_name'  => $item->account_name, 
                    'total_amount'  => doubleval($item->transactions_sum_amount)];
        });

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return mixed \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'account_name'    => 'required|max:300|unique:accounts',
        ]);

        $account = Account::create($request->all());

        return response()->json($account, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return mixed \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $account = Account::findOrFail($id)->transactions;

        $collection = collect($account);

        $data = $collection->map(function($item, $key) {
  
            return ['id'            => $item->id, 
                    'account_id'    => $item->account_id,
                    'date'          => $item->date,
                    'description'   => $item->description,
                    'amount'        => $item->amount];
        });

        return response()->json($data);
    }

}

?>
