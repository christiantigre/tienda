@extends('store.template')
@section('content')
	<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">CANTACTANOS</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<!--<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">-->
				    	{!! Form::open(['route'=>'contact.store','method'=>'POST']) !!}
				            <div class="form-group col-md-6">
				                <!--<input type="text" name="name" class="form-control" required="required" placeholder="Nombre">-->
				                {!! Form::text('name',null,['placeholder'=>'Nombre','class'=>'form-control','required'=>'required']) !!}
				            </div>
				            <div class="form-group col-md-6">
				                <!--<input type="email" name="email" class="form-control" required="required" placeholder="Email">-->
				                {!! Form::text('email',null,['placeholder'=>'Email','class'=>'form-control','required'=>'required']) !!}
				            </div>
				            <div class="form-group col-md-12">
				                <!--<textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Escriba su mensaje aquí..."></textarea>-->
				                {!! Form::textarea('mensaje',null,['placeholder'=>'Escriba su mensaje aquí...','class'=>'form-control','required'=>'required','rows'=>'8']) !!}
				            </div>                        
				            <div class="form-group col-md-12">
				                <!--<input type="submit" name="submit" class="btn btn-primary pull-right" value="ENVIAR">-->
				                {!! Form::submit('ENVIAR',['class'=>'btn btn-primary pull-right']) !!}
				            </div>
				        <!--</form>-->
				        {!! Form::close() !!}
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">INFORMACIÓN DE CONTACTO</h2>
	    				<address>
	    					@foreach($empress as $empres)
	    					<p>{{ $empres->nom }}.</p>
							<p>{{ $empres->dir }}, {{ $empres->ciu }}</p>
							<p>{{ $empres->count }} {{ $empres->prov }}</p>
							<p>Celular: +{{ $empres->cel }}</p>
							<p>Fax: {{ $empres->fax }}</p>
							<p>Email: {{ $empres->email }}</p>
							@endforeach
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div> 
@stop