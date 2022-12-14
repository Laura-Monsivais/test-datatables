@extends('auth.layout')

@section('title', 'Inicio de Sesión')

@section('content')
    <div class="container" style="padding: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Inicio de sesión</div>

                    <div class="card-body">
                        <form id="formLogin">

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">Correo
                                    eléctronico</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                        value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-3" id="respuesta">
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-primary" type='submit'>
                                        Login
                                    </button>
                                    <a href="/register" type="submit" class="btn btn-secondary">
                                        Registrate
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var formLogin = document.getElementById('formLogin');


        formLogin.addEventListener('submit', function(e) {
            e.preventDefault();
            $.ajax({
                method: 'POST',
                url: 'api/login',
                data: {
                    email: $("#email").val(),
                    password: $("#password").val()
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(data) {
                    console.log(data);
                    window.location.href = "/dashboard"; 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    alert('Error: ' + jqXHR.responseJSON.message)
                }
            });

        })
    </script>
@endsection
