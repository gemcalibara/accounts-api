<?php 

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'account_id'    => 'required|numeric|min:1|not_in:0',
            'date'          => 'required|date_format:Y-m-d',
            'description'   => 'required|max:500',
            'amount'        => 'required|numeric|between:0,999999999999.99'
        ]);

        $account = Account::find($request->account_id);
        
        if ($account)
        {
            $transaction = Transaction::create($request->all());
        
            return response()->json($transaction, 200);
        }else{
            return response()->json([   'message'  => 'Account was not found. Please input the correct account_id',
                                        'error'    => 400  ]);
        }
    }
  
}

?>
