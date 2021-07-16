@extends('adminlte::page')
@section('title', 'ClinicWare - Pacientes agendados hoje')


@section('content_header')
    <h1><i class="fa fa-calendar-check-o fa-fw" style=" margin-right: 4px"> </i>PACIENTES AGENDADOS PARA HOJE</h1>
    <ol class="breadcrumb">
    <li><a href="{{route('physicians.index')}}" style="color: #9933CC">Listagem de Médicos</a></li>
    <li><a href="{{route('appointments.index')}}" style="color: #9933CC">Ver agendamentos</a></li>
      <li><a href="{{route('patients.index')}}" style="color: #9933CC">Listagem de Pacientes</a></li>
    </ol>
@stop

@section('content')
  
    <div class="box grey lighten-4" >

    	<div class="box-header">
        
      </div>

    	<div class="box-body">

        <table class="table table-striped">
          <caption>Pacientes agendandos para hoje</caption>
          <thead class="  unique-color-dark white-text">
            <tr>
              <th>CONSULTA Nº</th>
              <th>PACIENTE</th>
              <th>MÉDICO</th>
              <th>SINTOMAS</th>
              <th>SITUAÇÃO</th>
              <th>PESO</th>
              <th>HORA</th>
            </tr>
          </thead>
          <tbody>
            @forelse($today_appointments as $todayaps)
            <tr>
              <td>{{$todayaps->id}}</td>
              <td>{{$todayaps->patient->name}}</td>
              <td>{{$todayaps->physician->name}}</td>
              <td>{{$todayaps->symptom}}</td>
              <td>{{$todayaps->condition}}</td>
              <td>{{$todayaps->weight}} Kg</td>
              <td>{{$todayaps->date_time}}</td>

            </tr>
            @empty 
            <h1 style="color: #ccc; text-transform: uppercase; font-family: sans-serif;">Não existem agendamentos para hoje</h1>
           
          </tbody>

         
             @endforelse
        </table>

             
            
       </div>
          
  </div>





       

 </div>
@stop