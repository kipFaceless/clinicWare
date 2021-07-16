@extends('adminlte::page')

@section('title', 'ClinicWare - Grau de parentesco')

@section('content_header')
    <h1>Grau de Parentesco</h1>
    <ol class="breadcrumb">

      <li><a href="{{route('appointments.index')}}">Agenda</a></li>
      <li><a href="{{route('physicians.index')}}">Listagem de Médicos</a></li>
      <li><a href="{{route('home')}}">Início</a></li>
      
    </ol>
@stop

@section('content')
    
    <div class="box">
			

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
				<div class="table-responsive">
				<table class="table table-striped">
					<caption>Listagem de graus de parentesco</caption> <a href="{{route('relationships.create')}}" class="btn btn-primary" style="font-size: 12px!important;">Novo</a>
					<thead>
						<tr>
							<th>Nome</th>
							<th>Descrição</th>
							<th>Opções</th>
						</tr>
					</thead>
					@forelse($relationships as $relationship)
					<tbody>
						<tr>
							<td>{{$relationship->name}}</td>
							<td>{{$relationship->description}}</td>
							<td  style ="width:10px; ">

								<a href="{{route('relationships.edit',$relationship)}}" style="font-size: 12px!important;" class="btn btn-warning btn-xs">Editar
							</a>
				
														
							</td>
							<td>
									{!!Form::open(['route' =>['relationships.destroy',$relationship],'method'=>'DELETE'])!!}
               					<button class="btn btn-danger" style="font-size: 12px!important;">Eliminar</button>
              					{!!Form::close()!!}
							</td>
						</tr>
					</tbody>
					@empty
						<ul class="bg-warning" style="padding: 15px;">
							<li class="text-danger" style=" list-style: none; font-size: 20px;">Nenhum tipo de Grau de afinidade cadastrado!</li>	
						
						
						 <a href="{{route('relationships.create')}}" class="btn btn-warning">Criar Novo</a>

						</ul>
							
						 @endforelse
				</table>
				
									
				{{$relationships->render()}}
			</div>
				</div>
			</div>
			</div>
		
@stop

