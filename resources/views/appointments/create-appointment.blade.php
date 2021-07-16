@extends('adminlte::page')

@section('title', 'ClinicWare - Agendando Paciente')

@section('content_header')
    <h1><i class="fa fa-calendar-plus-o fa-fw"></i> AGENDANDO PACIENTE</h1>

<ol class="breadcrumb">
		<li><a href="{{route('patients.index')}}" style="color: #9933CC">Listagem de Pacientes</a></li>
		<li><a href="{{route('appointments.index')}}" style="color: #9933CC">Ver agendamentos</a></li>
    	<li><a href="{{route('home')}}" style="color: #9933CC">Início</a></li>
    	
    	
    	
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
			@foreach($patient as $pa)	

			<h4>Agendando o Paciente:</h4>
			<h3><b>{{$pa->name}}</b></h3>

			
			</div>


			<div class="box-body">
				

				
				{!!Form::open(['class'=>'form', 'route'=>['appointments.store']])!!}

								
				<input type="hidden" name="status" value="Agendado">
				
				<div class="form-group col-lg-6">

					<input type="hidden" name="patient_id" value="{{$pa->id}}">
					
					 {!!Form::label("patient", ' Paciente') !!}
					{!!Form::text('patient_id',$pa->name,array_merge(['class'=>'form-control', 'disabled'=>'true',  'id'=>'patient'])) !!}
					
					
				</div>

				
				<div class="form-group col-lg-6">
					<label>Estado do Paciente</label>

				<select class="form-control" name="condition" style="background:transparent;">
					<option value="Normal">Normal</option>
					<option value="Grave">Grave</option>
					
				</select>
				</div>

				
				
				<div class="form-group col-lg-6">
					{!!Form::label("id", ' Médico') !!}
					{!!Form::select('physician_id', $physicians, null,['class'=>'form-control' ,'id'=>'id', 'placeholder'=>'O Médico','style'=>'background:transparent;']) !!}
					
				</div>

				
				<div class="form-group col-lg-6">

				{!!Form::label("weight", 'Peso') !!}
				{!!Form::text('weight', null,['class'=>'form-control', 'placeholder'=>'Peso' ,'id'=>'weight', 'style'=>'background:transparent;']) !!}
				
				</div>

				<div class="form-group col-lg-12">

				{!!Form::label("symptom", 'Sintomas') !!}
				{!!Form::textarea('symptom', null,['class'=>'form-control', 'placeholder'=>'Sintomas' ,'id'=>'symptom', 'style'=>'background:transparent;' ]) !!}
				
				</div>

				<div class="form-group col-lg-6">

				{!!Form::label("accompanyng", 'Acompanhante') !!}
				{!!Form::text('accompanyng', null,['class'=>'form-control', 'placeholder'=>'Acompanhante' ,'id'=>'accompanyng', 'style'=>'background:transparent;' ]) !!}
				
				</div>

				<div class="form-group col-lg-6">

					
					<button type="button" class="btn secondary-color-dark"  style="float: right;" data-toggle="modal" data-target="#newRelation">+</button>
					{!!Form::label("id", ' Grau de afinidade') !!}
					{!!Form::select('relationship_id', $relationships, null,['class'=>'form-control' ,'id'=>'id', 'style'=>'background:transparent;' ]) !!}

					
					
					
				
				</div>


				

				<div class="form-group col-lg-6">

				{!!Form::label("dated_to", 'Agendar para o dia') !!}
				{!!Form::date('dated_to', null,['class'=>'form-control', 'placeholder'=>'Data da Consulta' ,'id'=>'dated_to', 'min'=>'2019-02-20', 'style'=>'background:transparent;' ]) !!}
				
				</div>
					

				<div class="form-group col-lg-6">

				{!!Form::label("date_time", 'Hora:') !!}
				{!!Form::time('date_time', null,['class'=>'form-control', 'placeholder'=>'Hora da Consulta' ,'id'=>'date_time','style'=>'background:transparent;' ]) !!}
				</div>


				

					
			<div class="button-group col-lg-6" >
	        <button type="submit" class="btn secondary-color-dark" style="font-size: 12px!important;"><i class="fa fa-plus" style="font-size: 13px;"> </i> Salvar</button>
			

	        <a href="{{route('appointments.index')}}" class="btn elegant-color" style="font-size: 12px!important;"><i class="fa fa-times" style="font-size: 13px;"> </i> Cancelar</a>
	        </div>

	        		
	        		
                {!!Form::close()!!}
			</div>



			@endforeach
			<div class="modal fade wow rotateIn" id="newRelation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--Form -->

       {!!Form::open(['route'=>['relationships.store'], 'class'=>'form'])!!}
      <div class="modal-body">
        
   
				<div class="form-group col-lg-6" >

				{!!Form::label("name", 'Grau de parentesco:') !!}
				{!!Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Relação com o paciente' ,'id'=>'name' ]) !!}

				</div>

				<div class="form-group col-lg-6" >

				{!!Form::label("description", 'Descrição:') !!}
				{!!Form::textarea('description', null,['class'=>'form-control', 'placeholder'=>'Descrição' ,'id'=>'description' ]) !!}

				</div>

      </div>
      <div class="modal-footer">

      	<button type="submit" class="btn secondary-color-dark" style="font-size: 12px!important;"><i class="fa fa-plus" style="font-size: 13px;"> </i> Adicionar</button>

        <button type="button" class="btn elegant-color" data-dismiss="modal">Cancelar</button>
        
   

       
      </div>
      {!!Form::close()!!}
    </div>
  </div>
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
