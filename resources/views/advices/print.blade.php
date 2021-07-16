<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ClinicWare - Recibo</title>
	<link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}">
	 <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
	 {{--<link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">--}}

	 <style >
	 	body{
	 		background:url('img/background.jpg'); 
			background-repeat: no-repeat; background-attachment: fixed;

	 	}
	 	.main{
	 		width: 50%;
	 		height: 100vh;
	 		text-align: center;
	 		display: flex;
	 		flex-direction: column;
	 		justify-content: center;

	 	}

	 	.flash{
	 		animation-name: flash;
	 		animation-duration: 1s;
	 		animation-iteration-count: infinite;
	 	}

	 	@keyframes flash{
	 		0% {
	 			background: #a869ec;
	 		}
	 		50% {
	 			background:#337ab7; 
	 		}
	 		100% {
	 			background: #a869ec;
	 		}
	 	}
	 </style>
</head>
<body>
<a href="{{route('home')}}" style="margin: 15px; float: right; color: white; font-weight: bolder;" > <i class="fa fa-home" style="color: white; "></i> Voltar</a>

    <div class="container alin-center col-md-6" style="text-align: center; display: flex;" >

    	<div class="main col-md-2">
    		  <div class="alert alert-info" style="margin-top: 30px;">
   			 		<p >Consulta concluída com sucesso! <i class="fa fa-check"></i></p>
        		</div> <br>
        		<a href="{{route('advice.pdf')}}" class="btn btn-primary flash" style="font-family: sans-serif; font-weight: bolder;"><i class="fa fa-print" style="font-size: 30px; margin-right: 10px; "></i> IMPRIMIR O RESULTADO</a>
        		<img src="{{asset('img/dat logo png.png')}}" style="width: 200px;">
    	</div>
    
    </div>
    <div class="col-md-6">
          
          <img src="{{asset('img/undraw_printing_invoices_5r4r.svg')}}" style="width: 820px">
     </div>
	


	
</body>
</html>

