@extends('adminlte::page')
@section('title', 'ClinicWare - Consultas Atendidas')


@section('content_header')
    <h1><i class="fa fa-id-card fa-fw"></i> CONSULTAS ATENDIDAS</h1>
    <ol class="breadcrumb">

      <li><a href="{{route('appointments.index')}}" style="color: #9933CC">Agenda</a></li>
      <li><a href="{{route('physicians.index')}}" style="color: #9933CC">Listagem de Médicos</a></li>
      <li><a href="{{route('home')}}" style="color: #9933CC">Início</a></li>
      
    </ol>
@stop

@section('content')
  
    <div class="box grey  grey lighten-4" >

    	<div class="box-header">
        @if(session('success'))
          <div class="alert alert-success">

            {{ session('success') }}
            
          </div>

          @endif

          @if(session('error'))
          <div class="alert elegant-color-dark white-text">

            {{ session('error') }}
            
          </div>

          @endif
      </div>
    	<div class="box-body">

        <table class="table table-hover">
          
          <thead class="unique-color-dark white-text ">
            <tr>
              <th>Nº</th>
              <th>PACIENTE</th>
              <th>MÉDICO</th>
              <th>DATA</th>
              <th colspan="2">ACÇÕES</th>
            </tr>
          </thead>
           @forelse($advices as $advice)
          <tbody>
            <tr>
              <td>{{$advice->id}}</td>
              <td>{{$advice->patient->name}}</td>
              <td>{{$advice->physician->name}}</td>
              <td>{{$advice->created_at}}</td>

               {{-- <td>
                <a href="{{route('advice.details',$advice->id)}}"data-toggle="tooltip" title="Ver detalhes das consultas" style="font-size: 12px!important; padding: 3px; padding-right: 8px; color: #9933CC";><i class="fa fa-vcard-o fa-fw" style="font-size: 13px;"></i> 
              </td>--}}
            


              @can('isAdmin')
              <td>
               {{-- <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delAdvice" {{$advice}}>Eliminar</button>
              </td>
              --}}
              {!!Form::open(['route' =>['advices.destroy',$advice],'method'=>'DELETE'])!!}
               <button  data-toggle="tooltip" title="Excluir Consulta" style="font-size: 12px!important;padding: 3px; border: none;background-color: transparent; padding-right: 8px"><i class="fa fa-trash fa-fw" style="font-size: 13px; color: #2E2E2E; "></i></button>
              {!!Form::close()!!}
            </td>
            @endcan

            </tr>
          </tbody>


  <div class="modal fade wow rotateIn" id="delAdvice" {{$advice}} tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--Form -->

       {!!Form::open(['route'=>['advices.destroy',$advice], 'class'=>'form','method'=>'delete'])!!}
      <div class="modal-body">
        
     <h4>Deseja Realmente eliminar esta Consulta?</h4>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button  type="submit" class="btn btn-success">Sim</button>
   

       
      </div>
      {!!Form::close()!!}
    </div>
  </div>
</div>
         
          @empty


          <h1 style="font-family: sans-serif; color: #ccc; text-transform: uppercase;">Não existem Consultas atendidas</h1>


        @endforelse
          <tfoot>
              <tr>
                <td><a href="{{route('advices.excel')}}" class="btn secondary-color-dark white-text " style="font-size: 12px">Gerar Excel <i class="fa fa-file-excel-o" style="font-size: 12px"> </i> </a></td>
              </tr>
            </tfoot>  
        </table>
         {{$advices->render()}}              
            </div>

            
          </div>

           
           
@stop