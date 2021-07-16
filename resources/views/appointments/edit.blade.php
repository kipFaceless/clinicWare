@extends('adminlte::page')

@section('title', 'Editando Agendamento')

@section('content_header')
    <h1>Agendamento</h1>

<ol class="breadcrumb">
		<li><a href="{{route('patients.index')}}">Listagem de Pacientes</a></li>
		<li><a href="{{route('appointments.index')}}">Ver agendamentos</a></li>
    	<li><a href="{{route('home')}}">Início</a></li>
    	
    	
    	
    </ol>
@stop

@section('content')
    

    		<div class="box"> 

			<div class="box-header">
				

			</div>


			<div class="box-body">
				

				

				{!!Form::model($appointment,['route'=>['appointments.update',$appointment], 'class'=>'form', 'method'=>'PUT'])!!}

				
				
				<input type="hidden" name="status" value="Agendado">
				
			{{--
				@foreach($appointment as $app)
				<div class="form-group col-lg-6">
					{!!Form::label("patient_id", ' Paciente') !!}
					{!!Form::select('patient_id', $app, null,['class'=>'form-control', 'placeholder'=>'Seleccione um Paciente' ,'id'=>'patient_id' ]) !!}
					
					
				</div>
				@endforeach
					--}}
				<div>
				{!!Form::label("symptom", 'Sintomas:') !!}
				{!!Form::textarea('symptom', null,['class'=>'form-control', 'placeholder'=>'Nome' ,'id'=>'symptom' ]) !!}

				</div>

				<div class="form-group col-lg-6">
					<label>Estado do Paciente</label>

				<select class="form-control" name="condition">
					<option value="Normal">Normal</option>
					<option value="Grave">Grave</option>
					
				</select>
				</div>

				<div class="form-group col-lg-6">

				{!!Form::label("accompanyng", 'Acompanhate:') !!}
				{!!Form::text('accompanyng', null,['class'=>'form-control', 'placeholder'=>'Acompanhate' ,'id'=>'accompanyng' ]) !!}

				</div>

				<div class="form-group col-lg-6">
					{!!Form::label("id", ' Grau de afinidade') !!}
					{!!Form::select('id', $relationships, null,['class'=>'form-control', 'placeholder'=>'Seleccione o Grau de parentesco' ,'id'=>'id' ]) !!}
					
				</div>
				<div class="form-group col-lg-6">
					{!!Form::label("id", ' Médico') !!}
					{!!Form::select('physician_id', $physicians, null,['class'=>'form-control', 'placeholder'=>'Seleccione um Médico' ,'id'=>'id' ]) !!}
					
				</div>

				

				<div class="form-group col-lg-6">

				{!!Form::label("dated_to", 'Agendar para o dia') !!}
				{!!Form::date('dated_to', null,['class'=>'form-control', 'placeholder'=>'Data da Consulta' ,'id'=>'dated_to' ]) !!}
				
				</div>
					

				<div class="form-group col-lg-6">

				{!!Form::label("date_time", 'Hora:') !!}
				{!!Form::time('date_time', null,['class'=>'form-control', 'placeholder'=>'Hora da Consulta' ,'id'=>'date_time' ]) !!}
				</div>


				

					
			<div class="button-group col-lg-6" >
	        <button type="submit" class="btn btn-info" style="font-size: 12px!important;">Salvar</button>
	        <a href="{{route('appointments.index')}}" class="btn btn-danger" style="font-size: 12px!important;">Cancelar</a>
	        </div>

	        		
	        		
                {!!Form::close()!!}
			</div>
			

		</div>
		

@push('js')
<script src="{{asset('js/jquery-3.2.0.min.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script>
	$(document).ready(function(){
		$('#patient_id').select2();
	});
</script>
@endpush
@stop
