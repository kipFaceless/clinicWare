@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')


<div class="box" style="box-sizing:content-box;"> 

			<div class="box-header">
				

			</div>


	<div class="box-body" >
<link rel="stylesheet" type="text/css" media="screen" href="{{asset ('css/select2.min.css')}}" />
		{{Form::model($paciente,['class'=>'form', 'method'=>'post', 'route'=>['salvaragendamento', $paciente->id]])}}
				
			{!!csrf_field()!!}	
				
			<div class="row">


					<div class="col-lg-5 col-lg-offset-1 " style="">
						
						<fieldset><legend>Dados do Paciente</legend>

							<div class="form-group " >
								{!!Form::label('nome','Nome:')!!}
								{!!Form::text('nome', null,['class'=>'form-control'])!!}
							</div>

							<div class="form-group col-lg-6" >
								<label for="peso">Peso</label>
								<input type="number" name="peso" class="form-control" placeholder="Peso" id="peso" value="">
							</div>

							<div class="form-group col-lg-6">
								<label>Estado</label>
								<select class="form-control">
									<option>Normal</option>
									<option>Grave</option>
								</select>
							</div>

			      			<div>
								<label>Sintomas</label>
			    				<textarea name="sintomas" class="col-lg-8 form-control">
								</textarea>
							</div>	

							<div>
								<label>Histórico</label>
			    				<textarea name="Historico" class="col-lg-8 form-control">
								</textarea>
							</div>	

							<div class="form-group col-lg-6" >
								<label for="acompanhante">Acompanhante</label>
								<input type="acompanhante" name="acompanhante" class="form-control" placeholder="Grau de afinidade" id="acompanhante" value="">
							</div>

							<div class="form-group col-lg-6">
								<label>Grau de Parentesco</label>
								<select class="form-control">
									<option>Irmão</option>
									<option>Pai</option>
								</select>
							</div>		

						</fieldset>

					</div>







				<div class="col-lg-5" style="">

					<fieldset><legend>Agendar Para</legend>	
						
						<div class="form-group col-lg-6">
							<label for="data">Dia</label>
							<input type="date" name="data" min ="2017-12-31" class="form-control"  id="data" value="">
						</div>

						<div class="form-group col-lg-6">
							<label>Turno</label>
							<select class="form-control">
								<option>Manhã</option>
								<option>Tarde</option>
							</select>
						</div>

						<div class="form-group col-lg-6">
							<label for="hora">Hora</label>
							<input type="time" name="hora" class="form-control"  id="hora" value="">
						</div>

						<div class="form-group col-lg-6">
								<label>Encaminhar Para</label>
								<select class="form-control">
									<option>Emergencia</option>
									<option>Consultório 4</option>
									<option>Consultório 2</option>
								</select>
							</div>

						

						<div class="form-group col-lg-11 ">
							{!!Form::label('id', 'Dentista')!!}
							{!!Form::select('id', $dentista, null,['class'=>'form-control', 'id'=>'doctores'])!!}
							
						</div>

						</div>
						
						

					</fieldset>


				</div>

		
				<div class="form-group col-lg-offset-3">
						<div class="button-group " style="margin-left: 50px; ">
	        				<button type="submit" class="btn btn-info">Finalizar Agendamento</button>
							<button type="submit" class="btn btn-danger">Cancelar Agendamento</button>
	   				    </div>
	   				    </div>
	 </form>

   </div>
					

</div>

<script  src="{{ asset('js/jquery-3.2.0.min.js') }}"></script>
 <script  src="{{ asset('js/bootsrap.min.js') }}"></script>
  <script  src="{{ asset('js/select2.min.js') }}"></script>
  <script >
  	$(document).ready(function(){
  		$('#doctores').select2();
  	});
  </script>
		
@endsection 

{{--




					
					
					

								
								
				

								


									

											

										

										
				

				


				

				

				
					
					
		

			

					

	        		
					
	
	
               







--}}