@extends('adminlte::page')

@section('title', 'ClinicWare - Agendamentos')

@section('content_header')
    <h1><i class="fa fa-calendar fa-fw" style=" margin-right: 4px"> </i>AGENDAMENTOS</h1>
    <ol class="breadcrumb">

    	<li><a href="{{route('physicians.index')}}" style="color: #9933CC">Listagem de Médicos</a></li>
    	<li><a href="{{route('patients.index')}}" style="color: #9933CC">Listagem de Pacientes</a></li>
    	<li><a href="{{route('physicians.general.pdf')}}" style="color: #9933CC">Relatório Médico Geral</a></li>
    	
    </ol>

@stop

@section('content')
    

    <div class="box grey lighten-4">
			

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
				<h5>Pacientes Agendados</h5>

				{{-- {!!Form::open(['class'=>'form-inline', 'method'=>'GET'])!!}

                <div class="form-group">
                {!!form::label('name','Nome')!!}
                {!!form::text('name', null,['class'=>'form-control',  'id'=>'name', ])!!}
                </div>



                <div class="form-group">
                {!!form::label('email','Email')!!}
                {!!form::text('email', null,['class'=>'form-control',   'id'=>'email',])!!}
                </div>

                <div class="form-group">
                {!!form::label('search','Endereço:')!!}
                {!!form::text('address', null,['class'=>'form-control',  'id'=>'search', ])!!}
              </div>
            <div class="btn-group">
                
                <button type="submit" class='btn btn-success'><i class="glyphicon glyphicon-search"></i> Buscar</button>
              
                </div>

            {!!Form::close()!!}
			--}}

			</div>
			<div class="box-body">
				<div class="table-responsive">
				<table class="table table-striped">
					<a  data-toggle="tooltip" title="Ver lista de pacientes agendados para o dia de hoje"class="pull-right btn secondary-color-dark btn-xs" href="{{route('appointments.today',$today)}}" style="font-size: 12px!important; margin-bottom: 20px;"> <i class="fa fa-calendar-check-o fa-fw" style="font-size: 13px; margin-right: 4px"> </i>Agendados para Hoje</a> 
					<thead class="unique-color-dark white-text">
						<tr>
							<th>CONSULTA Nº</th>
							<th>PACIENTE</th>
							<th>SINTOMAS</th>
							<th>ESTADO</th>
							<th>DATA DA CONSULTA</th>
							<th>HORA DA CONSULTA</th>
							<th>MÉDICO</th>
							<th>STATUS</th>
							<th colspan="3">ACÇÕES</th>
							
						</tr>
					</thead>


					
						@forelse($appointments as $appointment)
						<tr>
							<td>{{$appointment->id}}</td>
							<td>{{$appointment->patient->name}}</td>
							<td>{{$appointment->symptom}}</td>
							<td>{{$appointment->condition}}</td>
							<td>{{$appointment->dated_to}}</td>
							<td>{{$appointment->date_time}}</td>
							<td>{{$appointment->physician->name}}</td>
							<td>{{$appointment->status}}</td>
							<td>
								<a data-toggle="tooltip" title="Editar agendamento" href="{{route('appointments.edit',$appointment->id)}}" style="font-size: 12px!important;color: #9933CC" class=""><i class="fa fa-pencil fa-fw" style="font-size: 13px;"></i></a>

								
							</td>
              <td>
                 @can('isAdmin')
              <td>
                  {!!Form::open(['route' =>['appointments.destroy',$appointment],'method'=>'DELETE'])!!}
                        <button data-toggle="tooltip" title="Excluir agendamento" style="font-size: 12px!important;padding: 3px; border: none;background-color: transparent; padding-right: 8px"><i class="fa fa-trash fa-fw" style="font-size: 13px; color: #2E2E2E; "></i></button>
                        {!!Form::close()!!}
              </td>
              @endcan
              </td>

             							
						</tr>
							

<div class="modal fade wow rotateIn" id="delAppointment" {{$appointment->id}} tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--Form -->

       {!!Form::open(['route'=>['appointments.destroy',$appointment->id], 'class'=>'form','method'=>'delete'])!!}
      <div class="modal-body">
        
     <h4>Deseja Realmente eliminar este agendamento?</h4>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button  type="submit" class="btn btn-success" >Sim</button>
   

       
      </div>
      {!!Form::close()!!}
    </div>
  </div>      
</div>        @empty
              <h1 style="text-transform: uppercase; color: #ccc; font-family: sans-serif;">Não existem pacientes agendados</h1>
						
							 <tfoot>
             
            
             @endforelse 
              <tr>
                <td><a href="{{route('appointments.excel')}}" class="btn secondary-color-dark white-text " style="font-size: 12px">Gerar Excel <i class="fa fa-file-excel-o" style="font-size: 12px"> </i> </a></td>
              </tr>
            </tfoot> 				
				</table>
				{{$appointments->render()}}
				</div>
			</div>
			</div>
		
@stop