<link  rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >

<img src="{{asset('img/dat logo png.png')}}" style="width: 100px;margin-left: 50px">
<h3 class="titulo">ClinicWare</h3>
<span>Rua direita do Patriota, Benfica</span><br>
<span>clinicware@gmail.com</span><br>
<span>+244 945906789/917654322</span><br>
<span>Luanda - Angola</span><br><br><br>
		
	<div class="container">
		

		<strong><label style="background: black; color: white; padding: 4px;">DIAGNÓSTICO</label></strong><br>
		{!!$data->diagnostic!!}<br><br>

		<strong><label style="background: black; color: white; padding: 4px;">ORIENTAÇÕES MÉDICAS</label></strong><br>
		{!!$data->medical_advice!!}<br><br>

		<strong><label style="background: black; color: white; padding: 4px;">RECEITA</label></strong><br>
		<span style="left:  20px;">
			{!!$data->recipe!!}
		</span><br><br>


		<span style="float: right; margin-right: 25px">o Médico</span><br><br>
		<span style="float: right; right: 200px">_____________</span>
	</div>



<style>
	body{
		font-family: sans-serif;
	}
	.titulo{
		color: indigo;
		font-family: sans-serif;
	}
</style>



