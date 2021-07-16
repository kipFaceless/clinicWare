@extends('adminlte::page')

@section('title', 'Relatórios Médicos')

@section('content_header')
    <h1><i class="fa fa-print fa-fw"></i> RELATÓRIOS MÉDICOS</h1>
    <ol class="breadcrumb">

    	<li><a href="{{route('appointments.index')}}">Ver agenda</a></li>
    	<li><a href="{{route('physicians.create')}}">Novo Médico</a></li>
    	<li><a href=""></a>Relatório</li>
    	
    </ol>

@stop

@section('content')
    

    <div class="box grey lighten-4">
			

			<div class="box-header">
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
				<h5>Procurar Médico</h5>

				 {!!Form::open(['class'=>'form-inline', 'method'=>'GET'])!!}

                  <div class="input-group margin-botton-sm" style="margin-right: 30px;">
                    <span class="input-group-addon" style="background: transparent;"><i class="fa fa-pencil fa-fw" style="color: #9933CC;"></i></span>

                    <input type="search" class="form-control" placeholder="Nome" name="name" id="name" style="background: transparent;">
                  </div>

                  <div class="input-group margin-botton-sm" style="margin-right: 30px;">
                    <span class="input-group-addon"style="background: transparent;"><i class="fa fa-envelope fa-fw" style="color: #9933CC;"></i></span>

                    <input type="search" class="form-control" placeholder="Email" name="email" id="email" style="background: transparent;">
                  </div>

                  
            <div class="btn-group">
                
                <button type="submit" class='btn secondary-color-dark' style="font-size: 12px!important;"><i class="glyphicon glyphicon-search "></i> Buscar</button>
              
                </div>

            {!!Form::close()!!}
           
			</div>
			<div class="box-body">

        <div class="btn-group" style="margin: 20px;">

           {{-- Relatório diário de todos os Médicos --}}
         <a class='btn secondary-color-dark btn-lg' href="{{route('physicians.diary.pdf')}}" style="font-size: 15px!important;" data-toggle="tooltip" title="Relatório Diário">Relatório Diário <i class="fa fa-file-pdf-o fa-fw" style="font-size: 20px;"></i> 
</a> 
      
       {{-- Relatório geral de todos os Médicos --}}
         <a class='btn secondary-color-dark btn-lg' href="{{route('physicians.general.pdf')}}" style="font-size: 15px!important; margin-left: 10px;" data-toggle="tooltip" title="Relatório de todas consultas">Relatório Geral <i class="fa fa-bar-chart-o fa-fw" style="font-size: 20px;"></i> 
</a> 
       </div>


       <div class="col-md-7">
         

       

        <div class="table-responsive">
        <table class="table table-striped">

         

         
					
					<thead class="unique-color-dark white-text ">
						<tr>
							<th>NOME</th>
							
							
							<th>EMAIL</th>
							
							<th colspan="3">ACÇÕES</th>
						</tr>
					</thead>


					
						@foreach($physicians as $physician)
						<tr>
							<td>{{$physician->name}}</td>
							{{--
								<td>{{$physician->speciality_id}}</td>
								--}}

					
							<td>{{$physician->email}}</td>
						

							<td colspan="3" style ="width:190px; ">

								<a href="{{route('physician.today.pdf', [$physician,$today])}}" class="text-secondary" 


                 data-toggle="tooltip" title="Relatório Médico Diário" style="font-size: 12px!important; padding: 3px; padding-right: 8px; " ><i class="fa fa-file-pdf-o fa-fw " style="font-size: 20px;"></i> 

			
								</a>

								<a href="{{route('physician.all.pdf',$physician)}}" 

                   data-toggle="tooltip" title=" Relatório Geral do Médico" style="font-size: 12px!important; padding: 3px; padding-right: 8px;" class="text-primary"><i class="fa fa-print fa-fw" style="font-size: 22px;"></i> 
               
								</a>
							
								

							</td>

						</tr>

             


<div class="modal fade wow rotateIn" id="delPhysician" {{$physician->id}} tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--Form -->

       {!!Form::open(['route'=>['physicians.destroy',$physician->id], 'class'=>'form','method'=>'delete'])!!}
      <div class="modal-body">
        
     <h4>Deseja Realmente eliminar este Médico?</h4>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button  type="submit" class="btn btn-success">Sim</button>
   

       
      </div>
      {!!Form::close()!!}
    </div>
  </div>
</div>
							
						 @endforeach
											
				</table>

        </div>
{{$physicians->render()}}
        </div>

        <div class="col-md-5">
          
          <img src="{{asset('img/undraw_business_plan_5i9d.svg')}}" style="width: 460px">
        </div>


        


				


				</div>
			</div>
			</div>
		
@stop