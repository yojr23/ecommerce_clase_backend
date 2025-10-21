@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 animate-fade-in">
                <div class="card auth-card">
                    <div class="auth-card-header">
                        <i class="fas fa-sign-in-alt"></i>
                        Iniciar Sesión
                    </div>

                    <div class="auth-card-body">
                        <p class="text-center text-muted mb-4">
                            Ingresa tus credenciales para acceder a tu cuenta
                        </p>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope"></i> Correo Electrónico
                                </label>
                                <input id="email" 
                                       type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       required 
                                       autocomplete="email" 
                                       autofocus
                                       placeholder="correo@ejemplo.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock"></i> Contraseña
                                </label>
                                <input id="password" 
                                       type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       name="password" 
                                       required 
                                       autocomplete="current-password"
                                       placeholder="********">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           name="remember" 
                                           id="remember" 
                                           {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Mantener sesión iniciada
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary-custom">
                                    <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                                </button>
                            </div>

                            <div class="text-center">
                                @if (Route::has('password.request'))
                                    <a class="auth-link" href="{{ route('password.request') }}">
                                        <i class="fas fa-question-circle"></i> ¿Olvidaste tu contraseña?
                                    </a>
                                @endif
                            </div>
                        </form>

                        <div class="divider">o</div>

                        <div class="text-center">
                            <p class="mb-0">¿No tienes cuenta?</p>
                            <a href="{{ route('register') }}" class="auth-link">
                                <i class="fas fa-user-plus"></i> Regístrate aquí
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
