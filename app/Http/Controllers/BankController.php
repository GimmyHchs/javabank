<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Bank;

class BankController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct(Bank $bank){
		
       $this->middleware('auth');
       $this->bank=$bank;
	}

	public function index(Bank $bank)
	{
		//$targetbank = $this->bank->get()->where('name','台灣銀行')->first();
        $banks = $this->bank->get();
		return view('bank.index',compact('banks'));
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
	public function show($code,Bank $bank)
	{
		
		//dd($code);
		$bank = $this->bank->get()->where('code',$code)->first();
		return view('bank.show',compact('bank'));
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
