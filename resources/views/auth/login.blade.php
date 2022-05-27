<x-guest-layout>
    <x-auth-card>

        <section class="vh-100" style="background-color: #9A616D;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="{{('poster_money-heist.jpg')}}" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <h1 style="font-weight: bold;">FILMOPO</h1>
                                        <h5>Login</h5>

                                        <x-slot name="logo">
                                            <a href="/">
                                                <a class="navbar-brand ms-3" href="{{ route('home') }}" style="font-weight: 900; color: #000; font-size: 1.75rem; letter-spacing: 0.6vw; font-family: 'Bebas Neue', cursive;">
                                                    <spin>FILM</spin>
                                                    <spin style="color: red;">OPO</spin>
                                                </a>
                                            </a>
                                        </x-slot>

                                        <!-- Session Status -->
                                        <x-auth-session-status class="mb-4" :status="session('status')" />

                                        <!-- Validation Errors -->
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <!-- Email Address -->
                                            <div>
                                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                            </div>
                                            <x-label for="email" :value="__('Email address')" />

                                            <!-- Password -->
                                            <div class="mt-4">
                                                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                            </div>
                                            <x-label for="password" :value="__('Password')" />

                                            <!-- Remember Me -->
                                            <div class="block mt-4">
                                                <label for="remember_me" class="inline-flex items-center">
                                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                </label>
                                            </div>

                                            <div class="flex items-center justify-end mt-4">
                                                @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                                @endif

                                                <x-button class="ml-3">
                                                    {{ __('Log in') }}
                                                </x-button>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </x-auth-card>
</x-guest-layout>