<x-guest-layout>
    <x-auth-card>

        <style>
            .btn-submit-login {
                width: 170px;
            }

            @media screen and (max-width: 780px) {
                .poster {
                    justify-content: center;
                }

                .btn-submit-login {
                    width: auto;
                }
            }

        </style>

        <section class="bg-vanta" style="height: 100%; background-color: #03111f;">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.waves.min.js"></script>
            <script>
                VANTA.WAVES({
                    el: ".bg-vanta",
                    mouseControls: true,
                    touchControls: true,
                    gyroControls: false,
                    minHeight: 200.00,
                    minWidth: 200.00,
                    scale: 1.00,
                    scaleMobile: 1.00,
                    color: 0x03111f,
                    shininess: 20.00,
                    waveHeight: 22.00,
                    waveSpeed: 0.75,
                    zoom: 0.81
                })
            </script>

            <div class="container py-5 animate__backInDown animate__animated ">
                <div class="card" style="border-radius: 1rem;">
                    <div class="col">
                        <div class="row g-1 justify-content-around">
                            <!-- <div class="col-md-5 d-flex poster" style="height: 90vh;">
                                <img src="{{ 'poster_money-heist.jpg' }}" alt="login form" class="img-fluid" style="border-radius: 1rem 1rem; height:100%; object-fit: cover" />
                            </div> -->

                            <div class="col-md-5 d-flex poster">
                                <div id="carouselExampleFade" class="carousel slide carousel-fade"
                                    data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="0" class="active" aria-current="true"
                                            aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner" style="height: 100%;">
                                        <div class="carousel-item active" style="object-fit: cover;">
                                            <img src="{{ 'poster_money-heist.jpg' }}" class="d-block w-100 img-fluid"
                                                alt="poster1"
                                                style="border-radius: 1rem;height:100%; object-fit: cover;overflow: hidden">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ 'poster_doctor-strange-2.png' }}"
                                                class="d-block w-100 img-fluid" alt="poster2"
                                                style="border-radius: 1rem;height:100%; object-fit: cover;overflow: hidden">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ 'poster_the-batman.png' }}" class="d-block w-100 img-fluid"
                                                alt="poster3"
                                                style="border-radius: 1rem;height:100%; object-fit: cover; overflow: hidden">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>

                            <div class="col d-flex align-items-center justify-content-center">
                                <div
                                    class="  card-body p-4 p-lg-5 text-black d-flex flex-column justify-content-center align-items-center">

                                    <div class="form-container" style="width: calc(10rem + 15vw)">

                                        <div class="head-form">
                                            <h1
                                                style="font-size:4rem;font-weight: 900; font-family: 'Bebas Neue', cursive;">
                                                <span style="color: red">FILM</span><span
                                                    style="color:white; background-color: red; padding:0.025em; margin-left: 0.075em;box-sizing: border-box">OPO</span>
                                            </h1>
                                            <h5>Login</h5>
                                        </div>

                                        <!-- Session Status -->
                                        <x-auth-session-status class="mb-4" :status="session('status')" />

                                        <!-- Validation Errors -->
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <!-- Email Address -->
                                            <div class="mt-3">
                                                <div class="input-group">
                                                    <x-input id="email" class="block mt-1 w-full form-control"
                                                        type="email" name="email" :value="old('email')" required
                                                        autofocus />
                                                </div>
                                            </div>
                                            <x-label for="email" :value="__('Email address')" />

                                            <!-- Password -->
                                            <div class="mt-4">
                                                <div class="input-group">
                                                    <x-input id="password" class="form-control block mt-1 w-full"
                                                        type="password" name="password" required
                                                        autocomplete="current-password" />
                                                </div>
                                            </div>
                                            <x-label for="password" :value="__('Password')" />

                                            <div class="d-flex flex-column items-center justify-end mt-4">
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                    href="{{ route('register') }}">
                                                    {{ __('Create an account?') }}
                                                </a>

                                                <input class="btn btn-primary btn-submit-login" type="submit"
                                                    value="Submit">
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
