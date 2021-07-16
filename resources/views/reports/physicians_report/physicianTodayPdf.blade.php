
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
 

  

<div>
  

<span style="font-family: sans-serif;">Médico </span><br>
<strong>{{$physician->name}}</strong> <br>
<br>

<table class="table table-striped">

  <caption>RELATÓRIO MÉDICO DIÁRIO </caption>
    <thead>
    <tr>
      <th>PACIENTE</th>
      <th>DIAGNÓSTICO</th>
      <th>RECEITA</th>
    
    </tr>
  </thead>
@forelse($todaypdf as $pdf)

  <tbody>
    <tr>
      <td>{{$pdf->patient->name}}</td>
      <td>{{$pdf->diagnostic}}</td>
      <td>{{$pdf->recipe}}</td>
     
      
    </tr>
  </tbody>
  @empty
  <h1 style="font-family: sans-serif; color: #ccc; text-transform: uppercase;">Sem Relatório</h1>

  @endforelse
</table>
<h6 style="font-family: sans-serif; text-transform: uppercase;">Total de Pacientes atendidos hoje: <strong>{{$totalToday->total}}</strong></h6> <br>
{{$today}}
</div>