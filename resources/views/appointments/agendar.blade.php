@extends('layouts.app')

@section('content')

		<h2>Agendar Paciente</h2>

		<div class="box"> 

			<div class="box-header">
				

			</div>


			<div class="box-body">
				

				<form action="" class="form form-inline">
					<div class="row">

				{!!csrf_field()!!}

				<div class="form-group  col-lg-6" >

				
				<input type="text" name="name" class="form-control" placeholder="Nome do Paciente" id="name" value="">

				</div>

					
					<div class="form-group col-lg-6" >
	        <button type="submit" class="btn btn-info">Buscar Paciente </button>
	
	        		</div>

	        	
	
	        		</div>
	        		
                </form>


                <table class="table table-striped">

                	<tr>
                		
                		<thead>
                			<th>Nome</th>
                			<th>Situaçao</th>
                			<th>Idade</th>
                			<th>Sexo</th>
                			<th>Peso</th>
                			<th>Acções</th>
                		</thead>
                	</tr>
                	
                	<tbody>

                		<tr>
                			<th>José</th>
                			<th>Grave</th>
                			<th>29</th>
                			<th>M</th>
                			<th>78</th>
                			<th>
                					<button type="submit" class="btn btn-primary">Agendar </button>

                			</th>


                		</tr>
                		

                	</tbody>

                </table>
			</div>
			
				
	        
	
	        		
		</div>
@endsection 