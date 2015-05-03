@extends('app')
@section('content')
   <div class="container">
    	<div class="row">
    		<div class="col-md-10 col-md-offset-1">
    			<div class="panel panel-default">
    				<div class="panel-heading">Bank Default Page</div>
					<div class="panel-body">
    				@foreach($banks as $bank)
                       <hr>
                       <div class="page">
                          <h2>{{$bank->name}}</h2>
                       	  <div class="content">
                       	  	<p>
                       	  		{{$bank->address}}		
                       	  	</p>
                       	  </div>
                       </div>
    				@endforeach
    				</div>
    			</div>
    		</div>
    	</div>>
   </div>
@endsection