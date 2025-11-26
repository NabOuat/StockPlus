<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Baliseo - Connexion</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <!-- Logo Section -->
            <div class="logo-section">
                <img src="{{ asset('logoIcon.svg') }}" alt="Baliseo Logo" style="width: 70px; height: 70px; margin-bottom: 16px;">
                <div class="logo-text">Baliseo</div>
            </div>

            <!-- Title -->
            <h1 class="auth-title">Connexion</h1>
            <p class="auth-subtitle">Accédez à votre tableau de bord</p>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email" class="form-label">Adresse Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-input"
                        placeholder="votre@email.com"
                        value="{{ old('email') }}"
                        required
                        autofocus
                    >
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-input"
                        placeholder="••••••••"
                        required
                    >
                </div>

                <!-- Remember Me -->
                <div class="form-checkbox">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        name="remember" 
                        class="checkbox-input"
                        {{ old('remember') ? 'checked' : '' }}
                    >
                    <label for="remember" class="checkbox-label">
                        Se souvenir de moi
                    </label>
                </div>

                <!-- Login Button -->
                <button type="submit" class="btn-auth">
                    Se connecter
                </button>

                <!-- Divider -->
                <div class="divider">
                    <div class="divider-line"></div>
                    <span class="divider-text">ou</span>
                    <div class="divider-line"></div>
                </div>

                <!-- Signup Link -->
                <div class="auth-link">
                    Pas encore de compte ? 
                    <a href="{{ route('register') }}">S'inscrire</a>
                </div>

                <!-- Forgot Password Link -->
                <div style="text-align: center; margin-top: 16px; animation: slideUp 0.6s ease-out 1.1s both;">
                    <a href="{{ route('password.request') }}" style="color: #FF8C42; text-decoration: none; font-size: 13px; font-weight: 500; transition: opacity 0.3s ease;">
                        Mot de passe oublié ?
                    </a>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="footer-text">
            <p>© 2024 Baliseo - Plateforme SaaS de gestion de chaîne de valeur</p>
        </div>
    </div>

    <script src="{{ asset('js/auth.js') }}"></script>
</body>
</html>
