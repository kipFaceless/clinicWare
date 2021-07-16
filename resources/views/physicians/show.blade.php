@extends('adminlte::page')

@section('title', 'ClinicWare - Agenda de Médicos')

@section('content_header')
    <h1><i class="fa fa-calendar fa-fw" style=" margin-right: 4px"> </i>AGENDA MÉDICA</h1>

    <ol class="breadcrumb">

    	<li><a href="{{route('physicians.index')}}" style="color: #9933CC">Listagem de Médicos</a></li>
    	<li><a href="{{route('appointments.index')}}" style="color: #9933CC">Agenda</a></li>
    	<li><a href="{{route('physicians.create')}}" style="color: #9933CC">Novo Médico</a></li>
    	
    </ol>
@stop

@section('content')
    

 <div class="box box grey lighten-4">

 	<div class="box-header">
 		<p>Pacientes Agendados para o Médico</p>

      
   <h3><b>{{$physician_name}}</b>   </h3>
     
 	</div>
 	<div class="box-body">
        
        <table class="table table-striped">
            <tr>
                <thead class="  unique-color-dark white-text ">
                    <th>Agendamento Nº</th>
                    <th>Paciente</th>
                    <th>Sintomas</th>
                    <th>Acções</th>
                </thead>
            </tr>
            <tbody>

 		@forelse($agenda as $diary)
            <tr>
                <td>{{$diary->id}}</td>
               
                  <td>{{$diary->patient}}</td>
                   <td>{{$diary->symptom}}</td>
                 

                   <td>
                    <a  data-toggle="tooltip" title="Atender paciente" href="{{route('get.advice', 
                    [$diary->patient_id,$phy_id])}}"><i class="fa fa-calendar-minus-o fa-fw" style=" margin-right: 4px; color: #9933CC"> </i></a>
                   </td>
            </tr>
            

        @empty
        <p>
            Não existem pacientes agendados!
        </p>

        @endforelse 
        </tbody>
 	</table>	
 	</div>
 	
       <!-- Modal -->

  </div>


 
@stop