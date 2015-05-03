<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Bill;
use App\Bank;
class BillController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
     public function __construct(Bill $bill,Bank $bank){

       $this->middleware('auth');
       $this->bill=$bill;
       $this->bank=$bank;
	}
	public function index()
	{
		//
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
	public function show($userid,Bill $bills,Bank $bank)
	{
		//
		$bills=$this->bill->orderBy('created_at', 'desc')->get()->where('user_id',$userid);

		return view('bill.show',compact('bills'));
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
	public function update($id)
	{
		//
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
