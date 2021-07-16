@extends('layouts.app')

@section('content')

		<h2>Consultório</h2>

		<div class="box"> 

			<div class="box-header">
				

			</div>


			<div class="box-body">
				

				<form action="" class="form">
					<fieldset style="border: solid black 1px; padding: 5px; box-sizing:border-box;"><legend>Paciente</legend>
					<div class="row">

				{!!csrf_field()!!}

					
						
						<div class="form-group col-lg-6">

							<label>Nome:</label>
							<input type="text" name="nome" placeholder="Paciente" class="form-control">
							

						</div>

						<div class="form-group col-lg-3">

							<label>Peso:</label>
							<input type="text" name="peso" placeholder="Peso" class="form-control">
							

						</div>
						<div class="form-group col-lg-3">

							<label>Idade:</label>
							<input type="text" name="idade" placeholder="Idade" class="form-control">
							

						</div>

						<label class="form-group ">Sintomas</label>
						<textarea name="motivo"  class="form-control col-lg-8"  >
							

						</textarea>				


        		</div>
					</fieldset>  

					<label>Médico</label>
					<input type="text" name="medico" class="form-control col-lg-3">


						<label class="form-group ">Diagnóstico</label>
						<textarea name="motivo"  class="form-control "  >
							

						</textarea>
						
						<label class="form-group ">Receita</label>
						<textarea name="motivo"  class="form-control "  >
							

						</textarea>
						

						<div class="form-group col-lg-6" >
	        <button type="submit" class="btn btn-primary">Finalizar Consulta</button>
	
	        		</div>      		
                </form>
			</div>
			

		</div>
@endsection 