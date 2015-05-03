@extends('bank/bankpanel')

@section('bankcontent')

     
    	    	<div class="panel-heading">{{$bank->name}}</div>
    	    	<div class="panel-body">

    	    		<div class="page">
    	    			{!!Form::open(['method'=>'GET','url'=>'/bank/'.$bank->code.'/edit'])!!}
    	    			         <div class="content">
	    	    						<div class="form-gruop">
	                         	  			<p class="text-muted">{!!nl2br($bank->introduction)!!}</p>
	                       				</div>
	                       				<div class="form-group">
	    	    							{!!Form::submit('Edit',['class'=>'btn btn-primary'])!!}
	    	    						</div>
    	    					</div>
						{!!Form::close()!!}
					</div>


    	    	</div>
          
    	  

@endsection