@extends('bank/bankpanel')
@section('bankcontent')

    	
    			<div class="panel-heading">Bank Default Page</div>
					<div class="panel-body">
    				@foreach($banks as $bank)
                       <hr>
                       <div class="page">
                          {!!Form::open(['url'=>'/bank/'.$bank->code,'method'=>'GET'])!!}
                            <h2>{{$bank->name}}</h2>
                         	  <div class="content">
                         	  	<p>
                         	  		{{$bank->address}}		
                         	  	</p>
                                {!!Form::submit('Information',['class'=>'btn btn-primary'])!!}
                         	  </div>
                          {!!Form::close()!!}
                       </div>
                       
            
                       
    				@endforeach
    				</div>


@endsection