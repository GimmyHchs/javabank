<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\AccountBank;
use App\Bank;
use App\Bill;


class AccountController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct(Bank $bank,AccountBank $accountbank,Bill $bill){

       $this->middleware('auth');
       $this->accountbank=$accountbank;
       $this->bank=$bank;
       $this->bill=$bill;
	}


	public function index()
	{
		
		return view('account.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($code,Bank $bank,AccountBank $accountbank)
	{
		//
		$email = Auth::user()->email;
		$accountbank=$this->accountbank->get()->where('userid',$email)->where('bankcode',$code)->first();
		$bank = $this->bank->get()->where('code',$code)->first();
		return view('account.show',compact('accountbank','bank'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
	public function update($bankcode,Bank $bank,AccountBank $accountbank,Bill $bill,Request $request)
	{
		$email = Auth::user()->email;
		$accountbank=$this->accountbank->get()->where('userid',$email)->where('bankcode',$bankcode)->first();
		$bank = $this->bank->get()->where('code',$bankcode)->first();
		//dd($request->get('input_targetaccount'));
		
		$radiooption=$request->get('radio_trasfer');
		
		//$accountbank->save();
		if($radiooption=='option_in'){
			if($request->get('input_price')!=0){
			$finalbalance=($accountbank->balance)+($request->get('input_price'));
			$bill = new Bill;
			$bill->user_id=$email;
			$bill->type='Trasfer In';
			$bill->price=$request->get('input_price');
			$bill->bank_code=$bank->name;
			$bill->save();
			$accountbank->balance=$finalbalance;
		   }
		}
		else{
			$finalbalance=($accountbank->balance)-($request->get('input_price'));
			if($finalbalance<0)
				dd('You are so poor man....');
			else
			{
				if($request->get('input_price')!=0){
				$accountbank->balance=$finalbalance;
				$bill = new Bill;
				$bill->user_id=$email;
				$bill->type='Trasfer Out';
				$bill->price=$request->get('input_price');
				$bill->bank_code=$bank->name;
				$bill->save();
				//above target account bill
				$bill = new Bill;
				$bill->user_id=$request->get('input_targetaccount');
				$bill->type='Trasfer In  From'.$email;
				$bill->price=$request->get('input_price');
				$bill->bank_code=$bank->name;
				$bill->save();
				//above targetaccount's bankaccount
				$targetaccountbank=$this->accountbank->get()->where('userid',$request->get('input_targetaccount'))->where('bankcode',$bankcode)->first();
				//dd($targetaccountbank->balance);
				$targetaccountbank->balance=$targetaccountbank->balance+$request->get('input_price');
				$targetaccountbank->save();
				}
			}
		}
		$accountbank->save();
		return redirect('/account/'.$bankcode);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
