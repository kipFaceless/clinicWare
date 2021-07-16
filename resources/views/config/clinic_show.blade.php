@extends('adminlte::page')

@section('title', 'ClinicWare - Informações da Clínica')

@section('content_header')
    <h1>Informações da Clínica</h1>

    <ol class="breadcrumb">

    	<li><a href="{{route('physicians.index')}}">Listagem de Médicos</a></li>
    	<li><a href="{{route('appointments.index')}}">Agenda</a></li>
    	<li><a href="{{route('patients.index')}}">Lista Pacientes</a></li>
    	
    </ol>
@stop

@section('content')
    

 <div class="box">

 	<div class="box-header">
 		
 	</div>
 	<div class="box-body">

 		<div style="background-color: rgba(000,000,255,0.5); width: 300px; border-radius: 5px; color: white; padding: 20px;">
 			@foreach($clinic as $cl)
            
			<p><b>Nome : </b> {{ $cl->name}} </p>

                       <p><b>E-mail : </b> {{ $cl->email}} </p>

           
			<p><b>Cidade : </b>{{ $cl->city}}</p>
            <p><b>Telefone : </b>{{ $cl->tel}}</p>
			<p><b>Endereço : </b> {{ $cl->address}}</p>
			<p><b>Número de contribuínte : </b> {{ $cl->contribution_number}}</p>
			<p><b>Logotipo : </b> {{ $cl->logo}}</p>
			

            @endforeach
			
 		</div>
 		
 	</div>
 	

 </div>
@stop