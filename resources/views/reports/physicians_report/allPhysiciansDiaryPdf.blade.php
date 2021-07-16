


<link  rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
  


<div>
  

<table class="table table-striped">

  <caption>Relatório Médico Diário </caption>
    <thead>
    <tr>
      <th>MÉDICO</th>
      <th>PACIENTE</th>
      <th>DIAGNÓSTICO</th>
      
    </tr>
  </thead>
@forelse($allDiaryPdf as $pdf)

  <tbody>
    <tr>
      <td>{{$pdf->physician->name}}</td>
      <td>{{$pdf->patient->name}}</td>
      <td>{{$pdf->diagnostic}}</td>
      
     
      
    </tr>
  </tbody>
  @empty
  <strong><h1 style="font-family: sans-serif; color: #ccc;  text-transform: uppercase;">Sem Relatório</h1></strong>

  @endforelse
</table>
<h6 style="font-family: sans-serif; text-transform: uppercase;">Total de Pacientes atendidos hoje: <strong>{{$totalDiary->total}}</strong></h6> <br>

</div>