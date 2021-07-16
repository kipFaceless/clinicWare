@extends('adminlte::page')

@section('title', 'ClincWare - Usuários')

@section('content_header')
    <h1 ><i class="fa fa-users fa-fw" style="font-size: 30px; margin-right: 4px"> </i> USUÁRIOS</h1>

    <ol class="breadcrumb " >

    	<li><a href="{{route('appointments.index')}}" style="color: #9933CC">Agenda</a></li>
    	<li><a href="{{route('physicians.index')}}" style="color: #9933CC">Listagem de Médicos</a></li>
    	<li><a href="{{route('home')}}" style="color: #9933CC">Início</a></li>
    	
    </ol>

@stop

@section('content')
    


    <div class="box grey  grey lighten-4">
    	
    		<div class="box-header">

    				@if(session('success'))
    			<div class="alert alert-success">

    				{{ session('success') }}
    				
    			</div>

    			@endif

    			@if(session('error'))
    			<div class="alert elegant-color-dark white-text">

    				{{ session('error') }}
    				
    			</div>

    			@endif

    			<h5>Pesquisar Usuário por:</h5>
    			<div>
    				
    			</div>

				 {!!Form::open(['class'=>'form-inline', 'method'=>'GET'])!!}

              
                  <div class="input-group margin-botton-sm" style="margin-right: 30px;">
                    <span class="input-group-addon" style="background: transparent;"><i class="fa fa-pencil fa-fw" style="color: #9933CC;"></i></span>

                    <input type="search" class="form-control" placeholder="Nome" name="name" id="name" style="background: transparent;">
                  </div>

                  <div class="input-group margin-botton-sm" style="margin-right: 30px;">
                    <span class="input-group-addon"style="background: transparent;"><i class="fa fa-envelope fa-fw" style="color: #9933CC;"></i></span>

                    <input type="search" class="form-control" placeholder="Email" name="email" id="email" style="background: transparent;">
                  </div>

                  <div class="input-group margin-botton-sm" >
                    <span class="input-group-addon"style="background: transparent;"><i class="fa fa-map-marker fa-fw " style="color: #9933CC;"></i></span>

                    <input type="search" class="form-control" placeholder="Endereço" name="address" id="address" style="background: transparent;">
                  </div>
                   {{-- <div class="form-group col-md-3">
                 <i class="fa fa-envelope-o fa-fw"></i> 
                {!!form::label('name','Nome')!!}
                {!!form::text('name', null,['class'=>'form-control',  'id'=>'name', ])!!}
                </div>
                --}}

                {{--<div class="form-group col-md-3">
                {!!form::label('email','Email')!!}
                {!!form::text('email', null,['class'=>'form-control',   'id'=>'email',])!!}
                </div>--}}

                {{--
                <div class="form-group ">
                {!!form::label('search','Endereço:')!!}
                {!!form::text('address', null,['class'=>'form-control',  'id'=>'search', ])!!}
              </div>
              --}}
            <div class="btn-group">
                
                <button type="submit" class='btn secondary-color-dark' style="font-size: 12px!important;"><i class="glyphicon glyphicon-search "></i> Buscar</button>
              
                </div>

            {!!Form::close()!!}
    			
    		</div>

    		<div class="box-body">
    			@can('isAdmin')
    		<a href="{{route('users.create')}}" data-toggle="tooltip" title="Adicionar novo Usuário" class="btn secondary-color-dark" style="font-size: 12px!important;margin-bottom: 20px;" ><i class="fa fa-user-plus fa-fw" style="font-size: 13px; margin-right: 4px"> </i>Novo Usuário</a>
    			@endcan
    			<table class="table table-striped">
					
					<thead class="  unique-color-dark white-text ">
						<tr>
							<th>Nome</th>
							<th>Email</th>
							<th>Tel</th>
							<th>Endereço</th>
							<th>Status</th>
							<th colspan="3">Accões</th>
						</tr>
					</thead>


					
						@foreach($users as $user)
						<tr>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->tel}}</td>
							
							<td>{{$user->address}}</td>

							<td>
								@if($user->isOnline())
									<li style="color: #9933CC">

										Online
										
									</li>
								@else
									<li class="text-muted">

										Offline
										
									</li>
								@endif
							</td>
							<td>
								{{--<a href="{{route('users.show', $user)}}" class="btn btn-info btn-xs">Visualizar</a>--}}
								<a href="{{route('users.edit',$user)}}" data-toggle="tooltip" title="Editar Usuário" style="font-size: 12px!important; padding: 3px; padding-right: 8px; color: #9933CC";><i class="fa fa-pencil fa-fw" style="font-size: 13px;"></i> </a>

								
								
								 @can('isAdmin')
                          <td>
                             {!!Form::open(['route' =>['users.destroy',$user],'method'=>'DELETE'])!!}
                              <button data-toggle="tooltip" title="Excluir Usuário" style="font-size: 12px!important;padding: 3px; border: none;background-color: transparent; padding-right: 8px"><i class="fa fa-trash fa-fw" style="font-size: 13px; color: #2E2E2E; "></i> </button>
                             {!!Form::close()!!}
                         </td>
                             @endcan
								
								{{-- 
									
									

									<a href="{{route('users.excel', $user)}}" class="btn btn-success btn-xs">Exportar Excel</a> 

									--}}

							</td>

						</tr>
					
<div class="modal fade wow rotateIn" id="delUser" {{$user->id}} tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--Form -->

       {!!Form::open(['route'=>['users.destroy',$user->id], 'class'=>'form','method'=>'delete'])!!}
      <div class="modal-body">
        
     <h4>Deseja Realmente eliminar este Usuário?</h4>

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

{!! $users->render()!!}
    		</div>


    </div>
@stop

@push('scripts')
new WOW().init();
@endpush