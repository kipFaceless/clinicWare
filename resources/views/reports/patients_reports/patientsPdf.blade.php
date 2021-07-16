<link  rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >


<table class="table table-striped">
	<caption>Relatório de Pacientes</caption>
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>DOCUMENTO</th>
			<th>Nº DO DOCUMENTO</th>
			<th>DATA NASC</th>
			<th>GÉNERO</th>
			<th>ENDEREÇO</th>
			<th>CONTACTO</th>
			<th>E-mail</th>
			<th>REGISTADO NO DIA</th>
		</tr>
	</thead>
	@foreach($patients as $patient)
	<tbody>
		
		<tr>
			<td>{{$patient->id}}</td>
			<td>{{$patient->name}}</td>
			<td>{{$patient->identification}}</td>
			<td>{{$patient->identification_number}}</td>
			<td>{{$patient->date_of_birth}}</td>
			<td>{{$patient->sex}}</td>
			<td>{{$patient->address}}</td>
			<td>{{$patient->tel}}</td>
			<td>{{$patient->email}}</td>
			<td>{{$patient->created_at}}</td>
		</tr>

		
	</tbody>
	@endforeach
	<tfoot>
		<tr>Total de Pacientes registados {{$totalPatients->total}}</tr>
	</tfoot>
</table>

<h6 style="text-transform: uppercase; font-family: sans-serif;">Total de Pacientes REGISTRADOS : {{$totalPatients->total}}</h6>


		






<style>
	
	.titulo{
		color: indigo;
	}
</style>




<style>
.page-break {
    page-break-after: always;
}