@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>

    <div class="box">
    	
    	<div class="box-header">
    		
    	</div>
    	<div class="box-body">

    		<div style="background-color: rgba(000,000,255,0.5); width: 300px; border-radius: 5px; color: white; padding-left: 20px;">
 			@foreach($show as $user)
			<p><b>Nome : </b> {{ $user->name}} </p>

			
			<p><b>Telefone : </b> {{ $user->tel}}</p>
			<p><b>Email : </b> {{ $user->email}}</p>
			<p><b>Endereço : </b> {{ $user->address}}</p>
		@endforeach	
 		</div>
    		
    	</div>
    </div>
@stop