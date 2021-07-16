@extends('adminlte::page')

@section('title', 'Detalhes do Paciente')

@section('content_header')
    <h1>Detalhes do paciente</h1>

    <ol class="breadcrumb">

    	<li><a href="{{route('physicians.index')}}">Listagem de Médicos</a></li>
    	<li><a href="{{route('appointments.index')}}">Agenda</a></li>
    	<li><a href="{{route('patients.index')}}">Lista Pacientes</a></li>
    	
    </ol>
@stop

@section('content')
    

 <div class="box">

 	<div class="box-header">
 		<p>Perfil</p>
 	</div>
 	<div class="box-body">

 		<div class="jumbotron" style="padding-left: 20px">
 			@foreach($show as $patient)
			<p><b>Nome : </b> {{ $patient->name}} </p>

			<p><b>Sexo : </b>{{ $patient->sex}}</p>
            <p><b>Data de Nascimento : </b>{{ $patient->date_of_birth}}</p>
			<p><b>Telefone : </b> {{ $patient->tel}}</p>
			<p><b>Email : </b> {{ $patient->email}}</p>
			<p><b>Telefone : </b> {{ $patient->address}}</p>

            @endforeach
			
 		</div>
 		
 	</div>
 	

 </div>
@stop