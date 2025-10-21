@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6 animate-fade-in">
                <div class="card auth-card">
                    <div class="auth-card-header">
                        <i class="fas fa-user-plus"></i>
                        Crear Cuenta
                    </div>

                    <div class="auth-card-body">
                        <p class="text-center text-muted mb-4">
                            Completa el formulario para crear tu cuenta
                        </p>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">
                                    <i class="fas fa-user"></i> Nombre Completo
                                </label>
                                <input id="name" 
                                       type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       name="name" 
                                       value="{{ old('name') }}" 
                                       required 
                                       autocomplete="name" 
                                       autofocus
                                       placeholder="Ingresa tu nombre completo">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

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
                                       placeholder="correo@ejemplo.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">
                                        <i class="fas fa-lock"></i> Contraseña
                                    </label>
                                    <input id="password" 
                                           type="password" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           name="password" 
                                           required 
                                           autocomplete="new-password"
                                           placeholder="********">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <small class="text-muted">Mínimo 8 caracteres</small>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="password-confirm" class="form-label">
                                        <i class="fas fa-lock"></i> Confirmar Contraseña
                                    </label>
                                    <input id="password-confirm" 
                                           type="password" 
                                           class="form-control" 
                                           name="password_confirmation" 
                                           required 
                                           autocomplete="new-password"
                                           placeholder="********">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           id="terms" 
                                           required>
                                    <label class="form-check-label" for="terms">
                                        Acepto los <a href="#" class="auth-link">términos y condiciones</a> y la <a href="#" class="auth-link">política de privacidad</a>
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary-custom">
                                    <i class="fas fa-user-plus"></i> Crear Cuenta
                                </button>
                            </div>
                        </form>

                        <div class="divider">o</div>

                        <div class="text-center">
                            <p class="mb-0">¿Ya tienes cuenta?</p>
                            <a href="{{ route('login') }}" class="auth-link">
                                <i class="fas fa-sign-in-alt"></i> Inicia sesión aquí
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
