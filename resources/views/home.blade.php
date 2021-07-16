@extends('adminlte::page')
@section('title', 'CinicWare - Bem Vindo')


@section('content_header')
    <h1>Seja Bem Vindo!  {{$user->name}}</h1> 
@stop

@section('content')
  
    <div class="box" >

    	<div class="box-header" style="background-color: #222d32">
       

      </div>
    	<div class="box-body" style="background-color: rgba(34,45,50,.2);">


  


<div style="background:rgba(153,51,204,.9); height:200px;padding-top: 25px; margin-top: 20px; ">

    
   
<div class="col-lg-2 col-xs-6" >
          <div class="small-box " style="background-color: #fff">
            <div class="inner">
              <h4>PACIENTES</h4>

              <p><a href="{!!URL::to('patients/create')!!}" class="btn btn-secondary btn-xs" data-toggle="tooltip" title="Clique para adicionar Paciente">Aicionar Novo</a></p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="{!!URL::to('patients')!!}" class="small-box-footer" data-toggle="tooltip" title="Clique para ver a lista de Pacientes / Agendar">Listar <i class="fa fa-arrow-circle-right"></i></a>
          </div>


       
 </div>
 <div class="col-lg-2 col-xs-6" >
          <div class="small-box " style="background-color: #fff">
            <div class="inner">
              <h4>MÉDICOS</h4>

              <p><a href="{!!URL::to('physicians/create')!!}" class="btn btn-secondary btn-xs" data-toggle="tooltip" title="Clique para adicionar um Novo Médico">Adicionar Novo</a></p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-medkit"></i>
            </div>
            <a href="{!!URL::to('physicians')!!}" class="small-box-footer" data-toggle="tooltip" title="Listagem de Médicos / Atender Pacientes">Listagem <i class="fa fa-arrow-circle-right"></i></a>
          </div>
       
 </div>

 <div class="col-lg-2 col-xs-6" >
          <div class="small-box " style="background-color: #fff">
            <div class="inner">
              <h4>AGENDA</h4>

              <p><a class="btn btn-secondary btn-xs" data-toggle="tooltip" title=" Clique para ver a lista de pacientes agendados / não atendidos" href="{!!URL::to('appointments')!!}">Ver Agenda</a></p>
            </div>
            <div class="icon">
              <i class="ion ion-calendar"></i>
            </div>
            <a href="#" class="small-box-footer" data-toggle="tooltip" title="Clique para ver a lista de pacientes agendados para o dia de hoje">Agenda/Hoje <i class="fa fa-arrow-circle-right"></i></a>
          </div>
       
 </div>

 <div class="col-lg-2 col-xs-6">
   
    <img src="{{asset('img/undraw_tabs_jf82.svg')}}" style=" width: 500px">
 </div>
            





          </div>

</div>
</div>
@stop