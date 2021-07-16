@extends('adminlte::page')

@section('title', 'ClinicWare - Pacientes')

@section('content_header')
     <h1 ><i class="fa fa-users fa-hotel" style="font-size: 30px; margin-right: 4px"> </i> PACIENTES</h1>

<ol class="breadcrumb">

    	<li><a href="{{route('patients.index')}}" style="color: #9933CC">Listagem de Pacientes</a></li>
    	<li><a href="{{route('appointments.index')}} " style="color: #9933CC">Ver agendamentos</a></li>
    	
    	
    </ol>
@stop

@section('content')
  

    		<div class="box grey  grey lighten-4"> 

			<div class="box-header">
				@if(isset($errors)&& count($errors)>0)
        		<div class="alert elegant-color-dark white-text">
          		@foreach($errors->all() as $error)
          		<span>{{$error}}</span><br>
          		@endforeach
        </div>

        @endif

			</div>


			<div class="box-body">
				

				@if(isset($patient))

				{!!Form::model($patient,['route'=>['patients.update',$patient], 'class'=>'form', 'method'=>'PUT'])!!}

				@else
				{!!Form::open(['class'=>'form', 'route'=>['patients.store']])!!}

				@endif
				

				<div class="form-group col-lg-6" >

				{!!Form::label("name", 'Nome:') !!}
				{!!Form::text('name', null,['class'=>'form-control', 'id'=>'name', "style"=>"background:transparent;" ]) !!}

				</div>

				

				<div class="form-group col-md-6">

				{!!Form::label("date_of_birth", 'Ano de Nascimento:') !!}
				{!!Form::number('date_of_birth', null,['class'=>'form-control','id'=>'date_of_birth','min'=>'1920', 'size'=>'4', "style"=>"background:transparent;" ]) !!}

				</div>



				
				<div class="form-group col-md-6">
					<span >Sexo:</span>
					
							<input type="radio" name="sex" value="M">M
							
					
							<input type="radio" name="sex" value="F">F
					
								
				</div>


				<div class="form-group col-md-6">

				{!!Form::label("address", 'Morada:') !!}
				{!!Form::text('address', null,['class'=>'form-control','id'=>'address', "style"=>"background:transparent;" ]) !!}
				</div>

				<div class="form-group col-lg-6">
					

				<select class="form-control" name="identification" style="background: transparent;">
					<option value="">Seleccione o Tipo de Documento</option>
					<option value="Bilhete">Bilhete</option>
					<option value="Passaporte">Passaporte</option>
					<option value="Cédula">Cédula</option>
					<option value="Acento">Acento</option>
					<option value="Outro">Outro</option>
				</select>
				</div>

				<div class="form-group col-lg-6">

				{!!Form::label("identification_number", 'Doc Número:') !!}
				{!!Form::text('identification_number', null,['class'=>'form-control', 'id'=>'identification_number', "style"=>"background:transparent;" ]) !!}
				
				</div>
					

				


				<div class="form-group col-md-6">
				{!!Form::label("tel", 'Tel:') !!}
				{!!Form::tel('tel', null,['class'=>'form-control','id'=>'tel', "style"=>"background:transparent;" ]) !!}
				

				</div>
				<div class="form-group col-md-6">

				
				{!!Form::label("email", 'E-mail:') !!}

				{!!Form::email('email', null,['class'=>'form-control','id'=>'email', "style"=>"background:transparent;" ]) !!}
				
				</div>

			<br>
			<br>		
			<div class="button-group col-lg-6" >
	        <button type="submit" class="btn secondary-color-dark" style="font-size: 12px!important;"><i class="fa fa-plus" style="font-size: 13px;"> </i> Salvar</button>

	        <a href="{{route('patients.index')}}" class="btn elegant-color" style="font-size: 12px!important;"><i class="fa fa-times" style="font-size: 13px;"> </i> Cancelar</a>
	        </div>

	        		
	        		
                {!!Form::close()!!}
			</div>
			

		</div>
		


@stop
		
