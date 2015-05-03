<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\AccountBank;
use App\Bank;


class AccountController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct(Bank $bank,AccountBank $accountbank){

       $this->middleware('auth');
       $this->accountbank=$accountbank;
       $this->bank=$bank;
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
	
	public function update($bankcode,AccountBank $accountbank,Request $request)
	{
		$email = Auth::user()->email;
		$accountbank=$this->accountbank->get()->where('userid',$email)->where('bankcode',$bankcode)->first();
		
		$radiooption=$request->get('radio_trasfer');
		
		//$accountbank->save();
		if($radiooption=='option_in'){
			$finalbalance=($accountbank->balance)+($request->get('input_price'));
			$accountbank->balance=$finalbalance;
		}
		else{
			$finalbalance=($accountbank->balance)-($request->get('input_price'));
			if($finalbalance<0)
				dd('You are so poor man....');
			else
				$accountbank->balance=$finalbalance;
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
