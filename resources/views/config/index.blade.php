@extends('adminlte::page')

@section('title', 'ClinicWare - Configurações')

@section('content_header')
    <h1>Configurações</h1>
    <ol class="breadcrumb">

      <li><a href="{{route('appointments.index')}}">Agenda</a></li>
      <li><a href="{{route('physicians.index')}}">Listagem de Médicos</a></li>
      <li><a href="{{route('home')}}">Início</a></li>
      
    </ol>
@stop

@section('content')
    

    <div class="box">
			

			<div class="box-header">
				 @if(session('success'))
          <div class="alert alert-success">

            {{ session('success') }}
            
          </div>

          @endif

          @if(session('error'))
          <div class="alert alert-danger">

            {{ session('error') }}
            
          </div>

          @endif
				 </div>
			<div class="box-body">
				
				<div class="btn-group">
					
				<a href="{{route('relationships.index')}}" class="btn btn-primary" style="font-size: 12px!important;">Grau de parentesco</a>
				
					<a href="{{route('config.clinic')}}" class="btn btn-success" style="font-size: 12px!important;">Dados da Clinica</a>
					<a href="{{route('edit.clinic',$cli)}}" class="btn btn-primary" style="font-size: 12px!important;">Editar as Conf. da Clínica</a>
					<a href="{{route('clinic.show',$cli)}}" class="btn btn-primary" style="font-size: 12px!important;">Ver informações da Clínica</a>
				</div>	
						
												
						
				</div>
			</div>
			
		
@stop
