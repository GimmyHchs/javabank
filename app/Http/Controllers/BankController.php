<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Bank;
use App\AccountBank;
use App\User;


class BankController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct(Bank $bank,AccountBank $accountbank){

       //$this->middleware('auth');
       $this->accountbank=$accountbank;
       $this->bank=$bank;
	}

	public function index()
	{
		//$targetbank = $this->bank->get()->where('name','台灣銀行')->first();
		//$user=$this->user->get()->first();
		$email = Auth::user()->email;
		//$userid=$user->get('name');
		//dd($email);
		
        $banks = $this->bank->get();
		return view('bank.index',compact('banks','targetaccountbank'));
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
    public function openaccount($code,AccountBank $accountbank){
        $accountbank = new AccountBank;
        $email = Auth::user()->email;
        $accountbank->userid = $email;
        $accountbank->bankcode =$code;
        $accountbank->balance = 5000 ;
        //$accountbank->store(['userid' => $email,'bankcode' => $code]);
        $accountbank->save();
    	//Session::flash('message', 'alert-danger');
    	return redirect('/bank/'.$code)->with('alert-success', 'You are now logged in.');
    }
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($code,Bank $bank,AccountBank $accountbank)
	{
		$email = Auth::user()->email;
		//$match =['userid'=>'$email','bankcode'=>'$code'];

		$accountbank=$this->accountbank->get()->where('userid',$email)->where('bankcode',$code)->first();
		if($accountbank==null)
			$check = false;
		else
			$check = true;
		
		$bank = $this->bank->get()->where('code',$code)->first();
		return view('bank.show',compact('bank','check'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($code,Bank $bank)
	{
		$bank=$this->bank->get()->where('code',$code)->first();
		//dd($bank);
		return view('bank.edit',compact('bank'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($code,Bank $bank,Request $request)
	{
		
		$bank=$this->bank->get()->where('code',$code)->first();
		$bank->name = $request->get('input_name');
		$bank->address = $request->get('input_address');
		$bank->tel = $request->get('input_tel');
		$bank->introduction = $request->get('input_introduction');
		$bank->save();
		return redirect('/bank/'.$code);
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
