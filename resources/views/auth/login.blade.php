<div class="container">
            <div class="row flex-center min-vh-100 py-5">
                <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
                    <div class="d-flex justify-content-center">
                        <a class="d-flex flex-center text-decoration-none mb-4" href="../../../index-2.html" style="margin-left:141px;">
                            <img src="data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='174' height='26' viewBox='0 0 174 26' fill='none'%3E%3Cpath d='M20.1369 26C22.8983 26 25.1842 23.7425 24.6732 21.0288C24.3528 19.3274 23.8679 17.6594 23.2235 16.0502C21.9602 12.8958 20.1087 10.0295 17.7745 7.61522C15.4403 5.2009 12.6692 3.28575 9.61949 1.97913C8.11383 1.33406 6.55481 0.843538 4.96489 0.512196C2.26154 -0.0511821 0 2.23858 0 5V21C0 23.7614 2.23858 26 5 26H20.1369Z' fill='%23615DFF'/%3E%3Cg style='mix-blend-mode:multiply'%3E%3Cpath d='M13.7013 26C10.9399 26 8.65395 23.7425 9.16502 21.0288C9.48544 19.3274 9.97031 17.6594 10.6147 16.0502C11.878 12.8958 13.7295 10.0295 16.0637 7.61522C18.3979 5.2009 21.169 3.28575 24.2187 1.97913C25.7244 1.33406 27.2834 0.843538 28.8733 0.512196C31.5767 -0.0511821 33.8382 2.23858 33.8382 5V21C33.8382 23.7614 31.5996 26 28.8382 26H13.7013Z' fill='%233DD9EB'/%3E%3C/g%3E%3C/svg%3E"
                                alt="SVG Image">
                        </a>
                    </div>
                    <div class="text-center mb-7">
                        <h3 class="text-1000">Sign In</h3>
                        <p class="text-700">Get access to your account</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3 text-start">
                            <label class="form-label" for="email">Email address</label>
                            <div class="form-icon-container">
                                <input class="form-control form-icon-input" id="email" type="email" name="email"
                                    placeholder="name@example.com" required autofocus autocomplete="email" />
                                <span class="fas fa-user text-900 fs--1 form-icon"></span>
                            </div>
                        </div>
                        <div class="mb-3 text-start">
                            <label class="form-label" for="password">Password</label>
                            <div class="form-icon-container">
                                <input class="form-control form-icon-input" id="password" type="password"
                                    name="password" placeholder="Password" required autocomplete="current-password" />
                                <span class="fas fa-key text-900 fs--1 form-icon"></span>
                            </div>
                        </div>
                        <div class="row flex-between-center mb-7">
                            <div class="col-auto">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" id="remember_me" type="checkbox" name="remember"
                                        checked />
                                    <label class="form-check-label mb-0" for="remember_me">Remember me</label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a class="fs--1 fw-semi-bold" href="{{ route('password.request') }}">Forgot
                                    Password?</a>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100 mb-3" type="submit">Sign In</button>
                    </form>
                    <!-- <div class="text-center"><a class="fs--1 fw-bold" href="sign-up.html">Create an account</a></div> -->
                </div>
            </div>

        </div>
