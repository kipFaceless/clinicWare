<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>VUEjs Laravel| Rimorsoft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset ('css/bootstrap.min.css')}}" />
 <link rel="stylesheet" type="text/css" media="screen" href="{{asset ('css/select2.min.css')}}" />

   
</head>
<body>
{!! Form::open()!!}
	
	{!!Form::select('medico_id', $doctores, null,['id'=>'doctores','class'=>'form-control'])!!}	
		
{!! Form::close()!!}

<script  src="{{ asset('js/jquery-3.2.0.min.js') }}"></script>

 <script  src="{{ asset('js/bootsrap.min.js') }}"></script>

  <script  src="{{ asset('js/select2.min.js') }}"></script>
  <script >
  	$(document).ready(function(){
  		$('#doctores').select2();
  	});
  </script>
  
</body>
</html>


{{--
<select>
<option>Escolha a Doctor</option>
		@foreach( as $doctor)
		<option value="{{$doctor}}">{{$doctor->nome}}</option>
		@endforeach
		</select>
		--}}

