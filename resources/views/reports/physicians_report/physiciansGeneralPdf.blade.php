
<link  rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >

<div>
  

<table class="table table-striped">

  <caption>Relatório Geral de Médicos </caption>
    <thead>
    <tr>
      <th>MÉDICO</th>
      <th>PACIENTE</th>
      <th>DIAGNÓSTICO</th>
      <th>DATA DA CONSULTA</th>
    </tr>
  </thead>
@forelse($advices as $pdf)

  <tbody>
    <tr>
      <td>{{$pdf->physician->name}}</td>
      <td>{{$pdf->patient->name}}</td>
      <td>{{$pdf->diagnostic}}</td>
      <td>{{$pdf->created_at}}</td>
      
    </tr>
  </tbody>
  @empty
  <strong><h1 style="font-family: sans-serif; color: #ccc;  text-transform: uppercase;">Sem Relatório</h1></strong>

  @endforelse
</table>
<h6 style="font-family: sans-serif; text-transform: uppercase;">Total de Pacientes atendidos até hoje: <strong>{{$totaladvices->total}}</strong></h6> <br>

</div>