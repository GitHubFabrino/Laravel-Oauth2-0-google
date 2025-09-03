<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Bouton de connexion Google -->
    <div class="mb-6">
        <a href="{{ route('auth.google') }}" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
            <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <g transform="matrix(1, 0, 0, 1, 27.009001, -39.238998)">
                    <path fill="#4285F4" d="M -3.264 51.509 C -3.264 50.719 -3.334 49.969 -3.454 49.239 L -14.754 49.239 L -14.754 53.749 L -8.28426 53.749 C -8.52426 55.229 -9.42426 56.479 -10.7843 57.329 L -10.7843 60.609 L -6.82426 60.609 C -4.56426 58.499 -3.264 55.239 -3.264 51.509 Z"/>
                    <path fill="#34A853" d="M -14.754 63.239 C -11.514 63.239 -8.80426 62.159 -6.82426 60.609 L -10.7843 57.329 C -11.7643 58.049 -13.074 58.489 -14.754 58.489 C -17.574 58.489 -19.9943 56.589 -20.9243 53.999 L -25.0043 53.999 C -22.9943 59.489 -19.2343 63.239 -14.754 63.239 Z"/>
                    <path fill="#FBBC05" d="M -20.9243 53.999 C -21.4043 52.669 -21.6843 51.239 -21.6843 49.759 C -21.6843 48.279 -21.4043 46.849 -20.9243 45.519 L -20.9243 42.24 L -24.8443 42.24 C -26.4643 45.47 -27.2543 49.049 -27.2543 52.759 C -27.2543 56.469 -26.4643 60.049 -24.8443 63.279 L -20.9243 59.999 C -21.4043 58.669 -21.6843 57.239 -21.6843 55.759 C -21.6843 54.279 -21.4043 52.849 -20.9243 51.519 L -20.9243 53.999 Z"/>
                    <path fill="#EA4335" d="M -14.754 43.989 C -12.984 43.989 -11.4043 44.599 -10.0843 45.789 L -6.61426 42.319 C -8.89426 40.189 -11.9943 38.979 -14.754 38.979 C -19.2343 38.979 -22.9943 42.729 -25.0043 48.219 L -20.9243 51.499 C -19.9943 48.909 -17.574 47.009 -14.754 47.009 C -13.074 47.009 -11.7643 47.449 -10.7843 48.179 L -6.82426 44.899 C -8.80426 43.349 -11.514 42.269 -14.754 42.269 L -14.754 43.989 Z"/>
                </g>
            </svg>
            Se connecter avec Google
        </a>
    </div>

    <div class="relative my-6">
        <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-300"></div>
        </div>
        <div class="relative flex justify-center text-sm">
            <span class="px-2 bg-white text-gray-500">Ou continuez avec</span>
        </div>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
