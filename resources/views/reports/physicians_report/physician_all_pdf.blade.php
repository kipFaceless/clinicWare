
<link  rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
  
</style>
  

<div>
  

<span style="font-family: sans-serif;">Médico</span><br>

<strong>{{$physician->name}}</strong><br><br>


<table class="table table-striped">

  <caption>RELATÓRIO MÉDICO</caption>
    <thead>
    <tr>
      <th>PACIENTE</th>
      <th>DIAGNÓSTICO</th>
      <th>RECEITA</th>
      <th>DIA DA CONSULTA</th>
    </tr>
  </thead>
@forelse($todaypdf as $pdf)

  <tbody>
    <tr>
      <td>{{$pdf->patient->name}}</td>
      <td>{{$pdf->diagnostic}}</td>
      <td>{{$pdf->recipe}}</td>
      <td>{{$pdf->created_at}}</td>
      
    </tr>
  </tbody>
  @empty
  <h1 style="font-family: sans-serif; color: #ccc;  text-transform: uppercase;">Sem Relatório</h1>

  @endforelse

  <h6 style="font-family: sans-serif; text-transform: uppercase;">Total de pacientes atendidos: <strong>{{$totalPhysician->total}}</strong></h6>
</table>
</div>
