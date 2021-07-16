@extends('adminlte::page')
@section('title', 'CinicWare - Configurações')


@section('content_header')
    <h1>Configurações da Clínica!</h1> 
    <ol class="breadcrumb">
    <li><a href="{{route('appointments.index')}}">Agenda</a></li>
    <li><a href="{{route('patients.index')}}">Listagem de Pacientes</a></li>
    <li><a href="{{route('home')}}">Início</a></li>
  </ol>
@stop

@section('content')
  
    <div class="box" >

    	<div class="box-header">
        
        @if(isset($errors)&& count($errors)>0)
          <div class="alert alert-danger">
           @foreach($errors->all() as $error)
           <span>{{$error}}</span><br>
            @endforeach

             @if(session('success'))
          <div class="alert alert-success">

            {{ session('success') }}
            
          </div>

          @endif

          @if(session('error'))
          <div class="alert alert-danger">

            {{ session('error') }}
            
          </div>

          @endif
        </div>

        @endif

        </div>



    	<div class="box-body">


        @if(isset($cli))

        {!!Form::model($cli,['route'=>['clinic.update',$cli, 'class'=>'form', 'method'=>'PUT']])!!}

        @else
        {!!Form::open(['class'=>'form', 'route'=>['clinic.store']])!!}

        @endif
        

        <div class="form-group col-lg-6" >

        {!!Form::label("name", 'Nome da Clínica:') !!}
        {!!Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Nome da Clínica' ,'id'=>'name' ]) !!}

        </div>

        <div class="form-group col-lg-12">

        {!!Form::label("logo", 'Logotipo:') !!}
        {!!Form::file('logo', null,['class'=>'form-control', 'placeholder'=>'Logotipo' ,'id'=>'logo' ]) !!}

        </div>

        <div class="form-group col-lg-6">
        {!!Form::label("tel", 'Contacto telefónico:') !!}
        {!!Form::tel('tel', null,['class'=>'form-control', 'placeholder'=>'Telefone' ,'id'=>'tel' ]) !!}
        

        

        </div>
        <div class="form-group col-lg-6">

        {!!Form::label("email", 'E-mail:') !!}
        {!!Form::email('email', null,['class'=>'form-control', 'placeholder'=>'E-mail geral' ,'id'=>'email' ]) !!}
        
        </div>

        <div class="form-group col-lg-6">

        {!!Form::label("address", 'Endereço:') !!}
        {!!Form::text('address', null,['class'=>'form-control', 'placeholder'=>'Localização da Clínica' ,'id'=>'address' ]) !!}
        
        </div>
        
         <div class="form-group col-lg-6">
          <label>Cidade</label>

        <select class="form-control" name="city">
          <option value="Luanda">Luanda</option>
          <option value="Cabinda">Cabinda</option>
          <option value="Zaire">Zaire</option>
          <option value="Bengo">Bengo</option>
          <option value="Malange">Malange</option>
        </select>
        </div>

            

        <div class="form-group col-lg-12">

        {!!Form::label("contribution_number", 'Nº de Contribuinte') !!}
        {!!Form::text('contribution_number', null,['class'=>'form-control', 'placeholder'=>'Nº de Contribuinte' ,'id'=>'contribution_number' ]) !!}
        
        </div>
          

                 
      <div class="button-group col-lg-6" >
          <button type="submit" class="btn btn-info" style="font-size: 12px!important;">Salvar</button>
          <a href="{{route('home')}}" class="btn btn-danger" style="font-size: 12px!important;">Cancelar</a>
          </div>

              
              
      {!!Form::close()!!}
      </div>



          
</div>

         
@stop