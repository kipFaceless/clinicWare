@extends('adminlte::page')

@section('title', 'ClinicWare - Médicos')

@section('content_header')
    <h1><i class="fa fa-user-md fa-fw" style=" margin-right: 4px"> </i>MÉDICOS</h1>
    <ol class="breadcrumb">

    	<li><a href="{{route('appointments.index')}}" style="color: #9933CC">Ver agenda</a></li>
    	<li><a href="{{route('physicians.create')}}" style="color: #9933CC">Novo Médico</a></li>
    	<li><a href="{{route('physicians.general.pdf')}}" style="color: #9933CC">Relatório Médico Geral</a></li>
    	
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
				<h5>Procurar Médico</h5>

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
			<div class="box-body">
        <div>
          <a class="btn secondary-color-dark" href="{{route('physicians.create')}}"  data-toggle="tooltip" title="Adicionar novo Médico" style="font-size: 12px!important;margin-bottom: 20px;"><i class="fa fa-user-plus fa-fw" style="font-size: 13px; margin-right: 4px"> </i>Novo Médico</a>
        </div>
				<div class="table-responsive">
				<table class="table table-striped">
					
					<thead class="  unique-color-dark white-text ">
						<tr>
							<th>NOME</th>
							
							<th>TEL</th>
							<th>EMAIL</th>
							<th>ENDEREÇO</th>
							<th colspan="5">ACÇÕES</th>
						</tr>
					</thead>


					
						@foreach($physicians as $physician)
						<tr>
							<td>{{$physician->name}}</td>
							{{--
								<td>{{$physician->speciality_id}}</td>
								--}}

							<td>{{$physician->tel}}</td>
							<td>{{$physician->email}}</td>
							<td>{{$physician->address}}</td>
							<td colspan="3" style ="width:190px; ">

								<a href="{{route('physicians.show', $physician)}}" data-toggle="tooltip" title="Ver agenda  do Médico" style="font-size: 12px!important; padding: 3px; padding-right: 8px; color: #0d47a1";><i class="fa fa-calendar-check-o fa-fw" style="font-size: 13px;"></i> 
								</a>

								<a href="{{route('physicians.edit',$physician)}}"  data-toggle="tooltip" title="Editar perfil do Médico" style="font-size: 12px!important; padding: 3px; padding-right: 8px; color: #9933CC";><i class="fa fa-pencil fa-fw" style="font-size: 13px;"></i> 			</a>
								
												

							</td>

              @can('isAdmin')
              <td>
                  {!!Form::open(['route' =>['physicians.destroy',$physician],'method'=>'DELETE'])!!}
                        <button  data-toggle="tooltip" title="Excluir Médico" style="font-size: 12px!important;padding: 3px; border: none;background-color: transparent; padding-right: 8px"><i class="fa fa-trash fa-fw" style="font-size: 13px; color: #2E2E2E; "></i></button>
                        {!!Form::close()!!}
              </td>
              @endcan

						</tr>


<div class="modal fade wow rotateIn" id="delPhysician" {{$physician->id}} tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--Form -->

       {!!Form::open(['route'=>['physicians.destroy',$physician->id], 'class'=>'form','method'=>'delete'])!!}
      <div class="modal-body">
        
     <h4>Deseja Realmente eliminar este Médico?</h4>

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
										
				</table>
				{{$physicians->render()}}
				</div>
			</div>
			</div>
		
@stop