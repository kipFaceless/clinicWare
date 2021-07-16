@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>

    <div class="box">
			

			<div class="box-header">
				<h5>Listagem de Especialidades</h5>

				 </div>
			<div class="box-body">
				<div class="table-responsive">
				<table class="table table-striped">
					
					<thead>
						<tr>
							<th>Especialidade</th>
						</tr>
					</thead>


					
						@foreach($specialities as $speciality)
						<tr>
							<td>{{$speciality->name}}</td>
							
							<td colspan="3" style ="width:190px; ">

								<a href="{{route('specialities.edit',$speciality)}}" class="btn btn-warning btn-xs">Editar
								</a>

								<a href="{{route('specialities.destroy',$speciality)}}"  class="btn btn-danger btn-xs">Eliminar</a>
								


							</td>

						</tr>
							
						 @endforeach
											
				</table>
				{{$specialities->render()}}
				</div>
			</div>
			</div>
		
@stop

