# Authentification Google OAuth 2.0 avec Laravel

Ce projet démontre comment implémenter une authentification Google OAuth 2.0 dans une application Laravel en utilisant Laravel Breeze et Laravel Socialite.

## 📋 Prérequis

- PHP 8.1 ou supérieur
- Composer
- Node.js et NPM
- Un compte Google Cloud Platform
- Une base de données (MySQL, PostgreSQL, SQLite, etc.)

## 🚀 Installation

1. **Cloner le dépôt**
   ```bash
   git clone [URL_DU_DEPOT]
   cd laravel-oauth-google
   ```

2. **Installer les dépendances PHP**
   ```bash
   composer install
   ```

3. **Installer les dépendances NPM**
   ```bash
   npm install
   npm run build
   ```

4. **Copier le fichier d'environnement**
   ```bash
   cp .env.example .env
   ```

5. **Générer une clé d'application**
   ```bash
   php artisan key:generate
   ```

6. **Configurer la base de données**
   Mettez à jour le fichier `.env` avec vos informations de base de données :
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel_oauth_google
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. **Exécuter les migrations**
   ```bash
   php artisan migrate
   ```

## 🔑 Configuration Google OAuth

1. **Créer un projet sur Google Cloud Console**
   - Allez sur [Google Cloud Console](https://console.cloud.google.com/)
   - Créez un nouveau projet
   - Activez l'API Google+ (nécessaire pour l'authentification)

2. **Configurer l'écran de consentement OAuth**
   - Dans la console Google Cloud, allez dans "API et Services" > "Écran de consentement OAuth"
   - Sélectionnez "Externe" et cliquez sur "Créer"
   - Remplissez les informations requises et enregistrez

3. **Créer des identifiants OAuth**
   - Allez dans "API et Services" > "Identifiants"
   - Cliquez sur "Créer des identifiants" > "ID client OAuth"
   - Sélectionnez "Application Web"
   - Ajoutez les URI de redirection autorisés :
     - `http://localhost:8000/auth/google/callback` (pour le développement)
     - `http://votre-domaine.com/auth/google/callback` (pour la production)
   - Cliquez sur "Créer"

4. **Configurer les variables d'environnement**
   Mettez à jour votre fichier `.env` avec les informations de votre application Google :
   ```
   GOOGLE_CLIENT_ID=votre-client-id
   GOOGLE_CLIENT_SECRET=votre-client-secret
   GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback
   ```

## 🛠️ Structure du projet

- `app/Http/Controllers/Auth/GoogleController.php` - Contrôleur pour gérer l'authentification Google
- `config/services.php` - Configuration des services OAuth
- `database/migrations/` - Migrations de la base de données
- `resources/views/auth/login.blade.php` - Vue de connexion avec le bouton Google
- `routes/web.php` - Routes de l'application

## 📦 Packages utilisés

- [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze) - Kit de démarrage d'authentification
- [Laravel Socialite](https://laravel.com/docs/socialite) - Gestion de l'authentification OAuth
- [Tailwind CSS](https://tailwindcss.com/) - Framework CSS utilitaire
- [Vite](https://vitejs.dev/) - Outil de build frontend

## 🔄 Flux d'authentification

1. L'utilisateur clique sur "Se connecter avec Google"
2. Il est redirigé vers la page de connexion Google
3. Après authentification, Google redirige vers votre application
4. L'application vérifie si l'utilisateur existe
5. Si non, un nouvel utilisateur est créé
6. L'utilisateur est connecté et redirigé vers le tableau de bord

## 🚦 Démarrage du serveur

```bash
php artisan serve
```

Ouvrez votre navigateur à l'adresse : [http://localhost:8000](http://localhost:8000)

## 🔧 Dépannage

- **Erreur de redirection** : Vérifiez que l'URI de redirection dans Google Cloud correspond exactement à celle de votre application
- **Erreur d'autorisation** : Assurez-vous d'avoir activé l'API Google+ dans la console Google Cloud
- **Erreur de base de données** : Vérifiez vos informations de connexion à la base de données dans le fichier `.env`

## 📝 Licence

Ce projet est open-source sous la [licence MIT](LICENSE).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
