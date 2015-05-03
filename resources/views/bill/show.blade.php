@extends('bank/bankpanel')
@section('bankcontent')
	    	 <div class="panel-heading">Bill Information {{Auth::user()->name}}</div>
    	    	<div class="panel-body">
    	    	<div class="page">
			
					@foreach($bills as $bill)
                       <hr>
                       <div class="page">
                          
                            <h2>{{$bill->created_at}}</h2>
                         	  <div class="content">
                         	  	<p>
                         	  		BankCode : {{$bill->bank_code}}		
                         	  	</p>
                         	  	<p>
                         	  		Type : {{$bill->type}}		
                         	  	</p>
                         	  	<p>
                         	  		Price : {{$bill->price}}		
                         	  	</p>
                          	  </div>
                         
                       </div>
                       
            
                       
    				@endforeach
				</div>
				</div>

@endsection