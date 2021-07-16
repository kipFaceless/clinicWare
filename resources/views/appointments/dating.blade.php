@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>

    <div class="box">
			

			<div class="box-header">
				<h5>Listagem de Pacientes</h5>

				 {!!Form::open(['class'=>'form-inline', 'method'=>'GET'])!!}

                <div class="form-group">
                {!!form::label('name','Nome')!!}
                {!!form::text('name', null,['class'=>'form-control',  'id'=>'name', ])!!}
                </div>



                <div class="form-group">
                {!!form::label('email','Email')!!}
                {!!form::text('email', null,['class'=>'form-control',   'id'=>'email',])!!}
                </div>

                <div class="form-group">
                {!!form::label('search','Endereço:')!!}
                {!!form::text('address', null,['class'=>'form-control',  'id'=>'search', ])!!}
              </div>
            <div class="btn-group">
                
                <button type="submit" class='btn btn-success'><i class="glyphicon glyphicon-search"></i> Buscar</button>
              
                </div>

            {!!Form::close()!!}
			</div>
			<div class="box-body">
				<div class="table-responsive">
				<table class="table table-striped">
					
					<thead>
						<tr>
							<th>Nome</th>
							<th>Idade</th>
							<th>Sexo</th>
							<th>Tel</th>
							<th>Email</th>
							<th>Morada</th>
							<th>Accões</th>
						</tr>
					</thead>


					
						@foreach($patients as $patient)
						<tr>
							
							<td>{{$patient->name}}</td>
							<td>{{$patient->date_of_birth}}</td>
							<td>{{$patient->sex}}</td>
							<td>{{$patient->tel}}</td>
							<td>{{$patient->email}}</td>
							<td>{{$patient->address}}</td>
							<td colspan="3" style ="width:190px; ">

								<a href="{{route('appointment.patient', $patient->id)}}"
									class="btn btn-info btn-xs">Agendar
								</a>

								

							</td>

						</tr>
							
						 @endforeach
											
				</table>
				{{$patients->render()}}
				</div>
			</div>
			</div>
		
@stop

