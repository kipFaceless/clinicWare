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
				

				@if(isset($appointment))

				{!!Form::model($appointment,['route'=>['appointments.update',$appointment], 'class'=>'form', 'method'=>'PUT'])!!}

				@else
				{!!Form::open(['class'=>'form', 'route'=>['appointments.store']])!!}

				@endif
				
				<input type="hidden" name="status" value="Agendado">
				
				<div class="form-group col-lg-6">
					{!!Form::label("patient_id", ' Paciente') !!}
					{!!Form::select('patient_id', $patient, null,['class'=>'form-control', 'placeholder'=>'Seleccione um Paciente' ,'id'=>'patient_id' ]) !!}
					
				</div>

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

				<div class="form-group col-lg-4">

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
					

				<div class="form-group col-lg-4">

				{!!Form::label("date_time", 'Hora:') !!}
				{!!Form::time('date_time', null,['class'=>'form-control', 'placeholder'=>'Hora da Consulta' ,'id'=>'date_time' ]) !!}
				</div>


				

					
			<div class="button-group col-lg-6" >
	        <button type="submit" class="btn btn-info">Salvar</button>
	        <button type="reset" class="btn btn-danger">Cancelar</button>
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
