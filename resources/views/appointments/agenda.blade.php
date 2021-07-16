@extends('adminlte::page')

@section('title', 'Agendamento')

@section('content_header')
    <h1>Agendamentos</h1>
@stop

@section('content')
   
<h2>Todos Agendamentos</h2>

                <div class="box"> 

                        <div class="box-header">
                                <h4>Pacientes em lista de espera</h4>
                                

                        </div>


                        <div class="box-body">
                                

                                <form action="" class="form">
                                       

                                {!!csrf_field()!!}


                <table class="table table-striped">

                        <tr>
                                
                                <thead>
                                        <th>Paciente</th>
                                        <th>Queixa</th>
                                        <th>Situação</th>
                                        <th>Idade</th>
                                        <th>Sexo</th>
                                        <th>Peso</th>
                                        <th>Médico</th>
                                        <th>Acções</th>
                                </thead>
                        </tr>
                        
                      
                                @foreach($resultados as $resultado)
                                   <tr>   <td>{{$resultado->paciente_id}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Drª Candida</td>
                                        <td>
                                                 <button type="submit" class="btn btn-primary">Atender Paciente</button>
        
                                                 </td> </tr>
                                

                        

                                @endforeach

                          

                </table>

                                

                                        
                                        
               
                                
                                                                
                </form>
             </div>
         </div>

@stop