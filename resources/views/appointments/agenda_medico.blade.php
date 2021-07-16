@extends('adminlte::page')

@section('title', 'Agenda de Médico')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>

    <h2>Agenda Médico</h2>

		<div class="box"> 

			<div class="box-header">
				
				<h2>Agendamentos Para Hoje</h2>
			</div>


			<div class="box-body">
				
				
				<form action="" class="form form-inline">

				<div class="row">

				{!!csrf_field()!!}

				
				
				<div class="form-group col-lg-3" >
				<label for="data_ini">Data Início</label>
				<input type="date" id="data_ini" class="form-control" >
				</div>

				<div class="form-group col-lg-3">
				<label for="data_fim">Data Fim</label>
				<input type="date" id="data_fim" class="form-control" >
				</div>


					<div class="form-group col-lg-2" >
	        		<button type="submit" class="btn btn-info">Buscar</button>
	
	        		</div>
	        		</div>
	        	 </form>
	        	



                <table class="table table-striped">

                	<tr>
                		
                		<thead>
                			<th>Nome</th>
                			<th>Queixa</th>
                			<th>Situação</th>
                			<th>Idade</th>
                			<th>Sexo</th>
                			<th>Peso</th>
                			<th>Acções</th>
                		</thead>
                	</tr>
                	
                	<tbody>
                			<tr>
                			@foreach($pacientes as $paciente)
                			<td>{{$paciente->nome}}</td>
                			<td>Dor de dente</td>
                			<td>Grave</td>
                			<td>29</td>
                			<td>M</td>
                			<td>78</td>
                			<td>
                				 <button type="submit" class="btn btn-primary">Atender Paciente</button>
	
                				 </td>
                				 </tr>
                		@endforeach
                		

                	</tbody>

                </table>

				

					
					
	       
	        		
					        		
               
			</div>
			

		</div>

@stop

		
