@extends('adminlte::page')
@section('title', 'Histórico de Paciente')


@section('content_header')
    <h1><i class="fa fa-refresh fa-fw" style=" margin-right: 4px"> </i> HISTÓRICO DO PACIENTE</h1>
@stop

@section('content')
  
    <div class="box" >

    	<div class="box-header">
       

      </div>
    	<div class="box-body">
  
        @forelse($historic as $hist)
        <div class="jumbotron">
            <div style="margin-left: 30px">
                 No dia {{$hist->created_at}}, o paciente <strong>{{$hist->patient->name}}</strong> pesava {{$hist->weight}} Kg, apresentava sintomas de  {{$hist->symptom}}.<br>
                  Diagnosticado um(a) {{$hist->diagnostic}}. <br>
                  Foi receitado {{$hist->recipe}} e foi recomendado {{$hist->medical_advice}} .<br> 
                  Consultado pelo DRº <span style="font-weight: bolder; color: red">{{$hist->physician->name}}</span><br>
                 <br>  
            </div>
        
        </div>
        

        @empty

        <strong><h1 style="text-transform: uppercase; color: #ccc;">Paciente sem histórico médico</h1></strong>

        @endforelse


      </div>
 
           
           
          

         

 </div>
@stop