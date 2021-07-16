@extends('adminlte::page')

@section('title', 'ClinicWare - Criando Usuário')

@section('content_header')
    <h1><i class="fa fa-user-plus fa-fw"></i> ADICIONANDO USUÁRIO</h1>
    <ol class="breadcrumb">

    	<li><a href="{{route('appointments.index')}}" style="color: #9933CC">Agenda</a></li>
    	<li><a href="{{route('patients.index')}}" style="color: #9933CC">Listagem de Pacientes</a></li>
    	<li><a href="{{route('home')}}" style="color: #9933CC">Início</a></li>
    </ol>
@stop

@section('content')
    

    	<div class="box grey lighten-4">
    		
    		<div class="box-header">
    		
    	@if(isset($errors)&& count($errors)>0)
        <div class="alert elegant-color-dark white-text">
          @foreach($errors->all() as $error)
          <span>{{$error}}</span><br>
          @endforeach
        </div>

        @endif
    		</div>

   <div class="box-body ">

   
    {!!Form::open(['class'=>'form', 'enctype'=>'multipart/form-data', 'route'=>['users.store']]) !!}
	
	
			
	<div class="form-group col-lg-6" >
		{!!Form::label('name', 'Nome:') !!}
		{!!Form::text('name', null, ["placeholder"=>"Nome Completo", "class"=>"form-control", "id"=>"name", "style"=>"background:transparent;"]) !!}
		
			
	</div>

	<div class="row">

    <div class="form-group col-lg-6" >

	{!!Form::label('email', 'E-mail:') !!}
	{!!Form::email('email',null, ["class"=>"form-control", "placeholder"=>"Seu E-mail", "id"=>"email", "style"=>"background:transparent; "]) !!}
		
	</div>

	<div class="form-group col-lg-6" >

		{!!Form::label('password','Password:') !!}
		{!!Form::password('password',null,["id"=>"password", "style"=>"background:#f5f5f5;","class"=>"form-control" ]) !!}
		
			
	</div>

	@can('isAdmin')
									
	<div class="form-group col-lg-6">
					<label>Tipo de Usuário</label>

				<select class="form-control" name="type"style="background:transparent;">
					<option value="user">Usuário</option>
					<option value="receptionist">Recepcionista</option>
					<option value="physician">Médico</option>
					<option value="patient">Paciente</option>
					<option value="guest">Visitante</option>
					<option value="admin">Administrador</option>
				</select>
	</div>

	@endcan



	</div>
		<div class="row">
	<div class="form-group col-lg-6" >

		{!!Form::label('tel','Tel:') !!}
		{!!Form::tel('tel',null,["class"=>"form-control", "id"=>"tel","style"=>"background:transparent; "] ) !!}
					
	</div>

	<div class="form-group col-lg-6" >

		{!!Form::label('address','Endereço:') !!}
		{!!Form::text('address',null,["class"=>"form-control", "id"=>"address","placeholder"=>"Sua Morada", "style"=>"background:transparent;"] ) !!}
					
	</div>
	</div>


	
{{--
	<div class="form-group col-lg-6">

	
		
		<label>Imagem</label><br>
		<img src="" alt="Imagem do Perfil" width="200px">

		<input type="file" name="avatar" class="form-control">

	</div>  --}}
	
		<div class="row"></div>
		<div class="btn-group" 
		>
			
			<button type="submit"class="btn secondary-color-dark" style="font-size: 12px!important;"><i class="fa fa-plus" style="font-size: 13px;"> </i> Salvar</button>
			
			<a href="{{route('users.index')}}" class="btn elegant-color" style="font-size: 12px!important;"><i class="fa fa-times" style="font-size: 13px;"> </i> Cancelar</a>
		</div>	
		

{!!Form::close() !!}
    			
    		</div>

    	
@stop


