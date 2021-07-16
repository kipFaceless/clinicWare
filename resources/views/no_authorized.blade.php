@extends('adminlte::page')
@section('title', 'CinicWare - Área Restrita')


@section('content_header')
    {{--<h1>Área Restrita!  {{$user->name}}</h1> --}}
@stop

@section('content')
  
    <div class="box" >

    	<div class="box-header">
        
       
      </div>
    	<div class="box-body" >

        <div class="col-md-4">
         <h3 class=" text-primary" style="text-transform: uppercase;">Não tem permissão para aceder a esta funcionalidade!</h3>
       <h4>Contacte o administrador do sistema.</h4> 
        </div>

        <div class="col-md-8 " style="float: right!important;">
           <img src="{{asset('img/security.svg')}}" class="img-responsive" >
        </div>

         
              
              
            </div>

            




          </div>
@stop