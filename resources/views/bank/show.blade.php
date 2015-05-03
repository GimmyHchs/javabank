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
	    	    							@if(!$check)
	    	    									<a  method="PATCH" href="http://www.google.com" class="btn btn-info">Open Account</a>
	    	    							@endif
	    	    						</div>
    	    					</div>
						{!!Form::close()!!}
					</div>


    	    	</div>
          
    	  

@endsection