<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Baliseo - Inscription</title>
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
            <h1 class="auth-title">Créer un compte</h1>
            <p class="auth-subtitle">Rejoignez Baliseo dès maintenant</p>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name Field -->
                <div class="form-group">
                    <label for="name" class="form-label">Nom complet</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="form-input"
                        placeholder="Jean Dupont"
                        value="{{ old('name') }}"
                        required
                        autofocus
                    >
                </div>

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

                <!-- Terms & Conditions -->
                <div class="form-checkbox">
                    <input 
                        type="checkbox" 
                        id="terms" 
                        name="terms" 
                        class="checkbox-input"
                        required
                    >
                    <label for="terms" class="checkbox-label">
                        J'accepte les <a href="#">conditions d'utilisation</a> et la <a href="#">politique de confidentialité</a>
                    </label>
                </div>

                <!-- Register Button -->
                <button type="submit" class="btn-auth">
                    Créer mon compte
                </button>

                <!-- Divider -->
                <div class="divider">
                    <div class="divider-line"></div>
                    <span class="divider-text">ou</span>
                    <div class="divider-line"></div>
                </div>

                <!-- Login Link -->
                <div class="auth-link">
                    Vous avez déjà un compte ? 
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
