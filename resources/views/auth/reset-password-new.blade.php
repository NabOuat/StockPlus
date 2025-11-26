<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Baliseo - Réinitialiser le mot de passe</title>
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
            <h1 class="auth-title">Réinitialiser le mot de passe</h1>
            <p class="auth-subtitle">Créez un nouveau mot de passe sécurisé</p>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <!-- Reset Password Form -->
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email" class="form-label">Adresse Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-input"
                        placeholder="votre@email.com"
                        value="{{ old('email', $request->email) }}"
                        required
                        autofocus
                    >
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password" class="form-label">Nouveau mot de passe</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-input"
                        placeholder="••••••••"
                        required
                    >
                </div>

                <!-- Confirm Password Field -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        class="form-input"
                        placeholder="••••••••"
                        required
                    >
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-auth">
                    Réinitialiser le mot de passe
                </button>

                <!-- Divider -->
                <div class="divider">
                    <div class="divider-line"></div>
                    <span class="divider-text">ou</span>
                    <div class="divider-line"></div>
                </div>

                <!-- Back to Login Link -->
                <div class="auth-link">
                    Retour à la 
                    <a href="{{ route('login') }}">connexion</a>
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
