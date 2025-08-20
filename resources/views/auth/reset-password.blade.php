{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('auth.login-layout')
@section('content')
    <div class="card my-auto overflow-hidden">
        <div class="row g-0">
            <div class="col-lg-6">
                <div class="p-lg-5 p-4">
                    <div class="text-center">
                        <h5 class="mb-0">Reset Password</h5>
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                    </div>
                    <div class="mt-4">
                        <form method="POST" action="{{ route('password.store') }}" class="auth-input">
                            @csrf
                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" class="form-control" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"
                                    placeholder="Enter email" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-2">
                                <label for="password" class="form-label">Password</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input id="password" class="form-control pe-5 password-input" type="password"
                                        name="password" required autocomplete="current-password"
                                        placeholder="Enter password" />
                                    <button
                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                        type="button" id="password-addon">
                                        <i class="las la-eye align-middle fs-18"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-2">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input id="password_confirmation" class="form-control pe-5 password-input"
                                        type="password" name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Confirm password" />
                                    <button
                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                        type="button" id="password-confirm-addon">
                                        <i class="las la-eye align-middle fs-18"></i>
                                    </button>
                                </div>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <button class="btn btn-primary w-100" type="submit">Reset Password</button>
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
