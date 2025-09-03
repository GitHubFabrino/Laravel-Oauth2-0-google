<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Vérifier si l'utilisateur existe déjà
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Créer un nouvel utilisateur s'il n'existe pas
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt(uniqid()),
                    'email_verified_at' => now(),
                ]);
            } else {
                // Mettre à jour l'ID Google si l'utilisateur existe déjà
                $user->update([
                    'google_id' => $googleUser->getId(),
                ]);
            }

            // Connecter l'utilisateur
            Auth::login($user);

            return redirect()->intended('dashboard');

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Une erreur est survenue lors de la connexion avec Google.');
        }
    }
}
