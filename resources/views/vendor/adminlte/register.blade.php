@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
    @yield('css')
@stop

@section('body_class', 'register-page')

@section('body')
    <div class="register-box wow bounceInUp">
        <div class="register-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>

        <div class="register-box-body" style="background: rgba(0,0,0,.6); border-radius: 3px; box-shadow: 2px 4px 4px rgba(0,0,0,.4);">
            <p class="login-box-msg white-text" >{{ trans('adminlte::adminlte.register_message') }}</p>
            <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post">
                {!! csrf_field() !!}

                <div class="md-form has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control white-text" value="{{ old('name') }}"
                           >
                    <span class="glyphicon glyphicon-user form-control-feedback white-text"></span>
                    <label for="name">Nome:</label> 
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="md-form has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control white-text" value="{{ old('email') }}"
                           >
                    <span class="glyphicon glyphicon-envelope form-control-feedback white-text"></span>
                    <label for="email">Email:</label> 
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="md-form has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control white-text"
                          >
                    <span class="glyphicon glyphicon-lock form-control-feedback white-text"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <label for="password">Senha:</label> 
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="md-form has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control white-text"
                         >
                    <span class="glyphicon glyphicon-log-in form-control-feedback white-text"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <label for="password_confirmation">Repetir a senha:</label> 
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit"
                        class="btn btn-primary btn-block btn-flat"
                >{{ trans('adminlte::adminlte.register') }}</button>
            </form>
            <div class="auth-links">
                <a href="{{ url(config('adminlte.login_url', 'login')) }}"
                   class="text-center white-text">{{ trans('adminlte::adminlte.i_already_have_a_membership') }}</a>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop

@section('adminlte_js')
    @yield('js')
@stop
