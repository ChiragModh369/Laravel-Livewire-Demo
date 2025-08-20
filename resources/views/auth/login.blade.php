@extends('auth.login-layout')
@section('content')
    <div class="card my-auto overflow-hidden">
        <div class="row g-0">
            <div class="col-lg-6">
                <div class="p-lg-5 p-4">
                    <div class="text-center">
                        <h5 class="mb-0">Welcome Back !</h5>
                        <p class="text-muted mt-2">Sign in to continue to Invoika.</p>
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                    </div>
                    <div class="mt-4">
                        <form method="POST" action="{{ route('login') }}" class="auth-input">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" :value="old('email')"
                                    required autofocus autocomplete="username" placeholder="Enter email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="password" class="form-label">Password</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" class="form-control pe-5 password-input" id="password"
                                        name="password" required autocomplete="current-password"
                                        placeholder="Enter password">
                                    <button
                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                        type="button" id="password-addon"><i
                                            class="las la-eye align-middle fs-18"></i></button>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-check form-check-primary fs-16 py-2">
                                {{-- <input class="form-check-input" type="checkbox" id="remember_me" name="remember"> --}}
                                <div class="float-end">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}"
                                            class="text-muted text-decoration-underline fs-14">Forgot your password?</a>
                                    @endif
                                </div>
                                <label class="form-check-label fs-14" for="remember_me">
                                    {{-- Remember me --}}
                                </label>
                            </div>
                            <div class="mt-2">
                                <button class="btn btn-primary w-100" type="submit">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex h-100 bg-auth align-items-end">
                    <div class="p-lg-5 p-4">
                        <div class="bg-overlay bg-primary"></div>
                        <div class="p-0 p-sm-4 px-xl-0 py-5">
                            <div id="reviewcarouselIndicators" class="carousel slide auth-carousel" data-bs-ride="carousel">
                                <div class="carousel-indicators carousel-indicators-rounded">
                                    <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner mx-auto">
                                    <div class="carousel-item active">
                                        <div class="testi-contain text-center">
                                            <h5 class="fs-20 text-white mb-0">“I feel confident imposing on myself”</h5>
                                            <p class="fs-15 text-white-50 mt-2 mb-0">Vestibulum auctor orci in risus iaculis
                                                consequat suscipit felis rutrum aliquet iaculis augue sed tempus In
                                                elementum ullamcorper lectus vitae pretium Nullam ultricies diam eu ultrices
                                                sagittis.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="testi-contain text-center">
                                            <h5 class="fs-20 text-white mb-0">“Our task must be to free widening circle”
                                            </h5>
                                            <p class="fs-15 text-white-50 mt-2 mb-0">Curabitur eget nulla eget augue
                                                dignissim condintum Nunc imperdiet ligula porttitor commodo elementum
                                                Vivamus justo risus fringilla suscipit faucibus orci luctus ultrices posuere
                                                cubilia curae ultricies cursus.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="testi-contain text-center">
                                            <h5 class="fs-20 text-white mb-0">“I've learned that people forget what you”
                                            </h5>
                                            <p class="fs-15 text-white-50 mt-2 mb-0">Pellentesque lacinia scelerisque arcu
                                                in aliquam augue molestie rutrum Fusce dignissim dolor id auctor accumsan
                                                vehicula dolor vivamus feugiat odio erat sed quis Donec nec scelerisque
                                                magna</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
