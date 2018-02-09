@extends('layouts.app')

@section('content')
    <div class="login-box">
        <div class="login-logo">
           <a href="#"><b>SistemaBodega</b></a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Ingrese sus datos de Acceso</p>
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                    <i class="fa fa-envelope-o form-control-feedback"></i>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} form-group has-feedback">
                    <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                    <i class="fa fa-lock form-control-feedback"></i></span>
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat"> Ingresar</button>
                    </div>
                </div>
            </form>

            <a href="{{ route('password.request') }}">Olvide mi contraseña?</a>
        </div>
    </div>
    @push('script')
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          /*radioClass: 'iradio_square-blue',*/
          // increaseArea: '20%' // optional
        });
      });
    </script>
    @endpush
@endsection
