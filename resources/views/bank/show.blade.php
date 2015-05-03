@extends('bank/bankpanel')

@section('bankcontent')

     
    	    	<div class="panel-heading">{{$bank->name}}</div>
    	    	<div class="panel-body">

    	    		<div class="page">
    	    			{!!Form::open(['method'=>'GET','url'=>'/bank/'.$bank->code.'/edit'])!!}
    	    			         <div class="content">
	    	    						<div class="form-gruop">
	    	    						    <h2>Introduction</h2>
	                         	  			<p class="text-muted">{!!nl2br($bank->introduction)!!}</p>
	                       				</div>
	                       				<div class="form-group">
	    	    							<h2>Address</h2>
	                         	  			<p class="text-muted">{!!nl2br($bank->address)!!}</p>
	    	    						</div>
	    	    						<div class="form-group">
	    	    							<h2>Tel</h2>
	                         	  			<p class="text-muted">{!!nl2br($bank->tel)!!}</p>
	    	    						</div>
	                       				<div class="form-group">
	    	    							{!!Form::submit('Edit',['class'=>'btn btn-primary'])!!}
	    	    							
	    	    						</div>
    	    					</div>
						{!!Form::close()!!}
						@if(!$check)
	    	    			{!!Form::open(['method'=>'POST','url' => '/bank/'.$bank->code ])!!}
	    	    			{!!Form::submit('Open Account',['class'=>'btn btn-info'])!!}
	    	    			{!!Form::close()!!}
	    	    		@else
							{!!Form::button('Already Register Account',['class'=>'btn btn-danger'])!!}
							<a href="/account/{{$bank->code}}" class="btn btn-info">Manage Account</a>
	    	    		@endif
					</div>


    	    	</div>
          
    	  

@endsection