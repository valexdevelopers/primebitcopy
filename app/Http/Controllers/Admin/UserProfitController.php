<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;

class UserProfitController extends Controller
{
    //
    public function create(?String $id = Null)
    {
        //
        if(!is_null($id)){
            $trade = Models\Trade::find($id);

        }else{
            $trade = '';
        }
        return view('admin.profit')->with('trade', $trade);
    }

    public function store(Request $request){
        $request->validate([
            'trade_id' => ['bail', 'required', 'string'],
            'amount' => ['bail', 'required', 'numeric'],
            'profit' => ['bail', 'nullable', 'string'],
            'profitandclose' => ['bail', 'nullable', 'string'],
        ]);
        
        $trade = Models\Trade::find($request->trade_id);
        $trade->profit = $request->amount;
        if($request->has('profitandclose')){
            $trade->status = 'completed';
            //dd($request->profitandclose);
        }
        $trade->save();
        return back()->with('message', 'You added profit to a trade')->with('message-color', 'alert-success');
    }

    
}
