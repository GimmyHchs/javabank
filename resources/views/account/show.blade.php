@extends('bank/bankpanel')
@section('bankcontent')
	    	 <div class="panel-heading">Account Manage {{$bank->name}}</div>
    	    	<div class="panel-body">
    	    	<div class="page">
					<h1>Balance</h1>
					<h3><p class="text-muted">NT$  {!!$accountbank->balance!!}</p></h3>
					{!!Form::open(['method'=>'PATCH','url'=>'/account/'.$accountbank->bankcode])!!}
					<div class="form-group">
				         {!!Form::label('Price')!!}
		    	    	 {!!Form::text('input_price','0',['class'=>'form-control'])!!}
					</div>
					<div class="form-group">
					{!!Form::radio('radio_trasfer','option_in',true,null)!!}  TrasferIn 
					</div>
					<div class="form-group">
					{!!Form::radio('radio_trasfer','option_out',false,null)!!}  TrasferOut 
					</div>
					<div class="form-group">
					{!!Form::submit('Submit',['class'=>'btn btn-primary'])!!}
					</div>
					{!!Form::close()!!}
				</div>
				</div>

@endsection