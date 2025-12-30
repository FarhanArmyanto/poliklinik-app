<x-layouts.guest title="Login">
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="login-box">
            <div class="card card-outline card-primary shadow" style="min-width: 360px">
                <div class="card-header text-center">
                    <h3 class="mb-0">
                        <b>Poli</b>klinik
                    </h3>
                </div>

                <div class="card-body">
                    <p class="login-box-msg">Login ke akun anda</p>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        {{-- Email --}}
                        <div class="input-group mb-3">
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Email"
                                required
                                autofocus
                            >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="input-group mb-3">
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Password"
                                required
                            >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        {{-- Error --}}
                        @if ($errors->any())
                            <div class="alert alert-danger text-sm">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        {{-- Button --}}
                        <button type="submit" class="btn btn-primary btn-block">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.guest>
