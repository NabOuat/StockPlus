<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Baliseo - Mot de passe oublié</title>
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
            <h1 class="auth-title">Mot de passe oublié</h1>
            <p class="auth-subtitle">Réinitialisez votre mot de passe en quelques étapes</p>

            <!-- Success Message -->
            @if (session('status'))
                <div class="success-message">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <!-- Forgot Password Form -->
            <form method="POST" action="{{ route('password.email') }}">
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

                <!-- Submit Button -->
                <button type="submit" class="btn-auth">
                    Envoyer le lien de réinitialisation
                </button>

                <!-- Divider -->
                <div class="divider">
                    <div class="divider-line"></div>
                    <span class="divider-text">ou</span>
                    <div class="divider-line"></div>
                </div>

                <!-- Back to Login Link -->
                <div class="auth-link">
                    Vous vous souvenez de votre mot de passe ? 
                    <a href="{{ route('login') }}">Se connecter</a>
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
