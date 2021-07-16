
  @extends('adminlte::page')
@section('title', 'ClinicWare- Consultório Médico')


@section('content_header')
     <h1><i class="fa fa-medkit fa-fw" style=" margin-right: 4px"> </i>CONSULTÓRIO MÉDICO</h1>
    <ol class="breadcrumb">
    <li><a href="{{route('appointments.index')}}" style="color: #9933CC" >Agenda</a></li>
    <li><a href="{{route('patients.index')}}" style="color: #9933CC">Listagem de Pacientes</a></li>
    <li><a href="{{route('home')}}" style="color: #9933CC">Início</a></li>
  </ol>
@stop

@section('content')
  
    <div class="box grey  grey lighten-4" >
        <!--Form -->
         {!!Form::open(['class'=>'form', 'route'=>['advices.store']])!!}

      @foreach($patient as $pa)

    	
        <div class="box-header">
           Data de Hoje: {{$today}} 
        @if(isset($errors)&& count($errors)>0)
          <div class="alert elegant-color-dark white-text">
           @foreach($errors->all() as $error)
           <span>{{$error}}</span><br>
            @endforeach
        </div>

        @endif

      </div>
        
     


    	<div class="container">
        <div class="jumbotron col-md-11">
          <a class="btn secondary-color-dark" href="{{route('review',$pa->id)}}" style="font-size: 13px;" data-toggle="tooltip" title="Ver os resultados das consultas anteriores"> <i class="fa fa-rotate-left" style="font-size: 13px;margin-right: 3px;"> </i>  Ver Histórico do Paciente</a>
    	
    	<fieldset>
    		 <legend><h2> <i class="fa fa-address-card-o"></i> DADOS DO PACIENTE </h2></legend>
    		{{--<label>Nome:</label><br>
    		<input type="text"style="color: red;" name="patient_id" value="{{$pa->name}}" class="form-control col-md-6" disabled="true"></span><br></h3>
--}}
        
          
          <input type="hidden" name="patient_id" value="{{$pa->id}}">
          
          
          <span style="font-weight: bolder;">Nome Completo: </span><span style="color: #9933CC"> {{$pa->name}}</span> <br>
          Sintomas: {{$weight->symptom}}<br>
          Idade: {{$year-$pa->date_of_birth}} Anos de Idade<br>
          Peso:  {{$weight->weight}} Kg<br>
          Sexo: {{$sex}} <br>
          Endereço: {{$address}}<br> 
          Tel: {{$tel}} <br>
          
          <div class="col-md-6">
           
          {!!Form::hidden('patient_id',$pa->name,array_merge(['class'=>'form-control', 'disabled'=>'true',  'id'=>'patient'])) !!}
          </div>

          

      </fieldset>
    </div>
    	</div>
    	 
    	 

    	
    	<div class="box-body">
       
        <input type="hidden" name="today" value="{{$today}} ">

    	<div class="container">
        
     	
      <div class="jumbotron col-md-11">
        

     
        <fieldset>
         <legend><h2> <i class="fa fa-user-md"></i> MÉDICO </h2></legend>
        <h3><span style="color: #9933CC">{{$physician->name}}</span></h3>
           
     
       <div class=" form-group col-md-6">
          <br><br>
          <label>Diagnóstico</label>
            <textarea name="diagnostic" class="form-control" placeholder="Diagnóstico médico"></textarea>  
            
        </div>

        <div class=" form-group col-md-6">
          <br><br>
          <label>Recomendaçoes Médicas</label>
            <textarea name="medical_advice" class="form-control" placeholder="Recomendações Médicas"></textarea>  
            
        </div>  
      
       

        <div class="form-group col-md-12">
        	<label>Receita</label>
            <textarea name="recipe" class="form-control" placeholder="Receita Médica"></textarea>  
           
        </div>

         <div class="form-group col-lg-12">
          
          {!!Form::hidden('physician_id',$physician->name,array_merge(['class'=>'form-control', 'disabled'=>' true' ,'id'=>'id' ])) !!}
          
        </div>

       <input type="hidden" name="status" value="Atendido ">
 <input type="hidden" name="symptom" value="{{$weight->symptom}}" >
 <input type="hidden" name="weight" value=" {{$weight->weight}}">
 <input type="hidden" name="date" value=" {{$today}} ">
 <input type="hidden" name="physician_id" value=" {{$physician->id}} ">
      
      <div class="button-group "  >
        <button  class="btn secondary-color-dark" style="font-size: 12px!important;"><i class="fa fa-paste" style="font-size: 13px; margin-right: 5px;"> </i> Finalizar Consulta</button>

        <a href="{{route('physicians.index')}}"class="btn elegant-color" style="font-size: 12px!important;"><i class="fa fa-times" style="font-size: 13px;"> </i> Cancelar</a>

       
      </div>

 </fieldset>

       {!!Form::close()!!}
           

          </div>
           </div>
</div>
           </div>
          @endforeach


</div>



 
@stop

    		
   

			
			


		
				


		


