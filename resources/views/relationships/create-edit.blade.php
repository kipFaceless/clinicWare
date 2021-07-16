@extends('adminlte::page')

@section('title', 'ClinicWare - Grau de parentesco')

@section('content_header')
    <h1>Grau de parentesco</h1>
    <ol class="breadcrumb">

      <li><a href="{{route('appointments.index')}}">Agenda</a></li>
      <li><a href="{{route('relationships.index')}}">Listagem de Graus de parentesco</a></li>
      <li><a href="{{route('home')}}">Início</a></li>
      
    </ol>
@stop

@section('content')
  

    		<div class="box"> 

			<div class="box-header">
				
						@if(isset($errors)&& count($errors)>0)
        	<div class="alert alert-danger">
         	 @foreach($errors->all() as $error)
         	 <span>{{$error}}</span><br>
          	@endforeach
        </div>

        @endif
			</div>


			<div class="box-body">
				

				@if(isset($relationship))

				{!!Form::model($relationship,['route'=>['relationships.update',$relationship], 'class'=>'form', 'method'=>'PUT'])!!}

				@else
				{!!Form::open(['class'=>'form', 'route'=>['relationships.store']])!!}

				@endif
				

				<div class="form-group col-lg-6" >

				{!!Form::label("name", 'Novo Grau de afinidade:') !!}
				{!!Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Inserir o nome de grau de afinidade' ,'id'=>'name' ]) !!}

				</div>

				<div class="form-group col-lg-12" >

				{!!Form::label("description", 'Descrição:') !!}
				{!!Form::textarea('description', null,['class'=>'form-control', 'placeholder'=>'Descrição' ,'id'=>'name' ]) !!}

				</div>

				
						
			<div class="button-group col-lg-6" >
	        <button type="submit" class="btn btn-info" style="font-size: 12px!important;">Salvar</button>
	        <button type="reset" class="btn btn-danger" style="font-size: 12px!important;">Cancelar</button>
	        </div>

	        		
	        		
                {!!Form::close()!!}
			</div>
			

		</div>
		


@stop
		
