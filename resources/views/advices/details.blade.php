@extends('adminlte::page')

@section('title', 'ClinicWare - Detalhes da Consulta')

@section('content_header')
    <h1><i class="fa fa-vcard-o fa-fw"></i>  DETALHES DAS CONSULTAS</h1>

    <ol class="breadcrumb">

    	<li><a href="{{route('physicians.index')}}" style="color: #9933CC">Listagem de Médicos</a></li>
    	<li><a href="{{route('appointments.index')}}" style="color: #9933CC">Agenda</a></li>
    	<li><a href="{{route('patients.index')}}" style="color: #9933CC">Lista de Pacientes</a></li>
    	
    </ol>
@stop

@section('content')
    

 <div class="box grey  grey lighten-4">

 	<div class="box-header">
 		
 	</div>
 	<div class="box-body">

 		<div class="jumbotron " style="padding-left: 20px; ">
 			
        @foreach($show as $advice)
            <h2>Paciente</h2>
			<p><b>Nome : </b> {{ $advice}} </p>
           
            {{--<h2>Médico</h2>
            <p><b>Nome : </b> {{ $advice->physician->name}} </p>

            <h2>Dados da Consulta</h2>
			<p><b>Diagnóstico : </b>{{ $advice->diagnostic}}</p>
            <p><b>Recomendações Médicas : </b>{{ $advice->medical_advice}}</p>
			<p><b>Receita : </b> {{ $advice->recipe}}</p>
			<p><b>Data da Consulta : </b> {{ $advice->today}}</p>
			<p><b>Consulta Nº : </b> {{ $advice->id}}</p>
            --}}

            @endforeach
			


           
 		</div>
 		
 	</div>
 	

 </div>
@stop