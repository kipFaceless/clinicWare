@extends('adminlte::page')

@section('title', 'ClinicWare - Pacientes')

@section('content_header')
    <h1 ><i class="fa fa-users fa-hotel" style="font-size: 30px; margin-right: 4px"> </i> PACIENTES</h1>
    <ol class="breadcrumb">

    	<li><a href="{{(route('physicians.index'))}}" style="color: #9933CC" >Listagem de Médicos</a></li>
    	<li><a href="{{(route('appointments.index'))}}" style="color: #9933CC" >Ver agenda</a></li>
    	<li><a href="{{route('patients.pdf')}}"style="color: #9933CC" >Relatório de Pacientes</a></li>
    	
    </ol>

@stop

@section('content')
    

    <div class="box grey  grey lighten-4">


			

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
				<h5>Listagem de Pacientes</h5>
{!!Form::open(['class'=>'form-inline', 'method'=>'GET'])!!}

              
                  <div class="input-group margin-botton-sm" style="margin-right: 30px;">
                    <span class="input-group-addon" style="background: transparent;"><i class="fa fa-pencil fa-fw" style="color: #9933CC;"></i></span>

                    <input type="search" class="form-control" placeholder="Nome" name="name" id="name" style="background: transparent;">
                  </div>

                  <div class="input-group margin-botton-sm" style="margin-right: 30px;">
                    <span class="input-group-addon"style="background: transparent;"><i class="fa fa-envelope fa-fw" style="color: #9933CC;"></i></span>

                    <input type="search" class="form-control" placeholder="Email" name="email" id="email" style="background: transparent;">
                  </div>

                  <div class="input-group margin-botton-sm" >
                    <span class="input-group-addon"style="background: transparent;"><i class="fa fa-map-marker fa-fw " style="color: #9933CC;"></i></span>

                    <input type="search" class="form-control" placeholder="Endereço" name="address" id="address" style="background: transparent;">
                  </div>
                  
            <div class="btn-group">
                
                <button type="submit" class='btn secondary-color-dark' style="font-size: 12px!important;"><i class="glyphicon glyphicon-search "></i> Buscar</button>
              
                </div>

            {!!Form::close()!!}
			</div>
      @can('isAdminRecep')
			<div>
				
			<a class="btn secondary-color-dark" href="{{route('patients.create')}}" data-toggle="tooltip" title="Adicionar novo Paciente" style="font-size: 12px!important;margin-bottom: 20px;"><i class="fa fa-user-plus fa-fw" style="font-size: 13px; margin-right: 4px"> </i> Novo Paciente</a><br>
			</div>
      @endcan

			<div class="box-body">
				<div class="table-responsive">
				<table class="table table-striped">
					
					<thead class="  unique-color-dark white-text ">
						<tr>
							<th>NOME</th>
							<th>IDADE</th>
							<th>SEXO</th>
							<th>TEL</th>
							<th>EMAIL</th>
							<th>MORADA</th>
							<th colspan="4">ACÇÕES</th>
						</tr>
					</thead>


					
						@foreach($patients as $patient)
						<tr>
							<td>{{$patient->name}}</td>
							<td>{{$year-$patient->date_of_birth }} anos</td>
							<td>{{$patient->sex}}</td>
							<td>{{$patient->tel}}</td>
							<td>{{$patient->email}}</td>
							<td>{{$patient->address}}</td>
              @can('isAdminRecep')
							<td colspan="3" style ="width:190px; ">

								<a href="{{route('patient-appointment', $patient->id)}}"
                 data-toggle="tooltip" title="Agendar Paciente" style="font-size: 12px!important; padding: 3px; padding-right: 8px; color: #0d47a1";><i class="fa fa-calendar-plus-o fa-fw" style="font-size: 13px;"></i> 
                </a>


								<a href="{{route('patients.edit',$patient)}}" data-toggle="tooltip" title="Editar dados do Paciente" style="font-size: 12px!important; padding: 3px; padding-right: 8px; color: #9933CC";><i class="fa fa-pencil fa-fw" style="font-size: 13px;"></i>
								</a>

								
								


							</td>
              <td>
                 {!!Form::open(['route' =>['patients.destroy',$patient],'method'=>'DELETE'])!!}
               <button  data-toggle="tooltip" title="Excluir Paciente" style="font-size: 12px!important;padding: 3px; border: none;background-color: transparent; padding-right: 8px"><i class="fa fa-trash fa-fw" style="font-size: 13px; color: #2E2E2E; "></i></button>
              {!!Form::close()!!}
              </td>
              @endcan

						</tr>
							
<div class="modal fade wow rotateIn" id="delPatient" {{$patient->id}} tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--Form -->

       {!!Form::open(['route'=>['patients.destroy',$patient->id], 'class'=>'form','method'=>'delete'])!!}
      <div class="modal-body">
        
     <h4>Deseja Realmente eliminar este Paciente?</h4>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button  type="submit" class="btn btn-success">Sim</button>
   

       
      </div>
      {!!Form::close()!!}
    </div>
  </div>
</div>
@endforeach
						  <tfoot>
              <tr>
                <td><a href="{{route('patients.excel')}}" class="btn secondary-color-dark white-text " style="font-size: 12px">Gerar Excel <i class="fa fa-file-excel-o" style="font-size: 12px"> </i> </a></td>
              </tr>
            </tfoot>  				
				</table>
				{{$patients->render()}}
				</div>
			</div>
			</div>
		
@stop

