@extends('bank/bankpanel')

@section('bankcontent')

				<div class="panel-heading">{{$bank->name.'  Edit page'}}</div>
    	    	<div class="panel-body">
    	    	 {!!Form::open(['url'=>'bank/'.$bank->code,'method'=>'patch'])!!}
		    	    	 <div class="form-group">
		    	    	 {!!Form::label('Name')!!}
		    	    	 {!!Form::text('input_name',$bank->name,['class'=>'form-control'])!!}
		    	    	 </div>
		    	    	 <div class="form-group">
		    	    	 {!!Form::label('Address')!!}
						 {!!Form::text('input_address',$bank->address,['class'=>'form-control'])!!}
						 </div>
						 <div class="form-group">
		    	    	 {!!Form::label('Tel')!!}
						 {!!Form::text('input_tel',$bank->tel,['class'=>'form-control'])!!}
						 </div>
						 <div class="form-group">
						 {!!Form::label('introduction')!!}
						 {!!Form::textarea('input_introduction',$bank->introduction,['class'=>'form-control'])!!}
						 </div>
						 {!!Form::submit('submit',['class'=>'btn btn-primary'])!!}
						 </div>
    	    	 {!!Form::close()!!}
        	    </div>

    
@endsection