@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>

    		<div class="box"> 

			<div class="box-header">
				

			</div>


			<div class="box-body">
				

				@if(isset($speciality))

				{!!Form::model($speciality,['route'=>['specialities.update',$speciality], 'class'=>'form', 'method'=>'PUT'])!!}

				@else
				{!!Form::open(['class'=>'form', 'route'=>['specialities.store']])!!}

				@endif
				

				<div class="form-group col-lg-6" >

				{!!Form::label("name", 'Especialidade:') !!}
				{!!Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Nova Especialidade' ,'id'=>'name' ]) !!}

				</div>

				
						
			<div class="button-group col-lg-6" >
	        <button type="submit" class="btn btn-info">Salvar</button>
	        <button type="reset" class="btn btn-danger">Cancelar</button>
	        </div>

	        		
	        		
                {!!Form::close()!!}
			</div>
			

		</div>
		


@stop
		
