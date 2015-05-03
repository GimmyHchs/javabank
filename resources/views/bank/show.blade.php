@extends('bank/bankpanel')

@section('bankcontent')

     
    	    	<div class="panel-heading">Bank Show Information</div>
    	    	<div class="panel-body">

    	    		<div class="page">
    	    			{!!Form::open(['method'=>'GET','url'=>'/bank/'.$bank->code.'/edit'])!!}
    	    			         <div class="content">
    	    						<p>
                         	  		{{$bank->address}}		
                       				</p>
    	    						{!!Form::submit('EditTTTTTTTTT',['class'=>'btn btn-primary'])!!}
    	    					</div>
						{!!Form::close()!!}
					</div>

					
    	    	</div>
          
    	  

@endsection