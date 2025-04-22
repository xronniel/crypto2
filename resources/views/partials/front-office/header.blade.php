<div class="space-header"></div>
<header id="xb-header-area" class="header-area">
    <div class="xb-header stricky">
        <div class="container">
            <div class="header__wrap ul_li_between">

                <div class="header-bar-mobile side-menu d-lg-none ">
                    <a class="xb-nav-mobile" href="javascript:void(0);"><i class="far fa-bars"></i></a>
                </div>




                <div class="header-logo hide-item-header">
                    <a href="/">
                        <img src="{{ asset('assets/img/logo/Logo-3.png') }}" alt="Logo">
                    </a>
                </div>
                <div class="main-menu__wrap ul_li navbar navbar-expand-lg">
                    <nav class="main-menu collapse navbar-collapse">
                        <ul>
                            <li>
                                <a class="scrollspy-btn"
                                    href="{{ route('properties.index', ['filter_type' => 'buy']) }}">
                                    <span>Buy</span>
                                </a>
                            </li>
                            <li>
                                <a class="scrollspy-btn"
                                    href="{{ route('properties.index', ['filter_type' => 'rent']) }}">
                                    <span>Rent</span>
                                </a>
                            </li>
                            <li>
                                <a class="scrollspy-btn"
                                    href="{{ route('properties.index', ['type' => 'commercial']) }}">
                                    <span>Commercial</span>
                                </a>
                            </li>
                            <li>
                                <a class="scrollspy-btn" href="{{ route('holiday-properties.index') }}">
                                    <span>Vacations</span>
                                </a>
                            </li>
                            <li>
                                <a class="scrollspy-btn" href="/properties?completion_status=off_plan"><span>New
                                        Projects</span></a>
                            </li>
                            <li>
                                <a class="scrollspy-btn" href="{{ route('agents.index') }}"><span>Find Agent</span></a>
                            </li>
                            {{-- <li class="menu-item-has-children">
                                <a href="/"><span>Explore</span></a>
                                <ul class="submenu">
                                    <li><a href="index.html"><span>ICO Explore</span></a></li>
                                    <li><a href="home-2.html"><span>Crypto Explore</span></a></li>
                                </ul>
                            </li> --}}
                            <li>
                                <a class="scrollspy-btn"
                                    href="{{ route('mortgage-calculator') }}"><span>Mortgages</span></a>
                            </li>
                        </ul>
                    </nav>
                    <div class="xb-header-wrap">
                        <div class="xb-header-menu">
                            <div class="xb-header-menu-scroll">
                                <div class="xb-menu-close xb-hide-xl xb-close"></div>
                                <div class="xb-logo-mobile xb-hide-xl">
                                    <a href="/" rel="home">
                                        <img src="{{ asset('assets/img/logo/Logo-3.png') }}" alt="Logo">

                                    </a>
                                </div>
                                <div class="xb-header-mobile-search xb-hide-xl">
                                    <form role="search" action="#">
                                        <input type="text" placeholder="Search..." name="s"
                                            class="search-field">
                                    </form>
                                </div>
                                <nav class="xb-header-nav">
                                    <ul class="xb-menu-primary clearfix">
                                        <li class="menu-item">
                                            <a class="scrollspy-btn"
                                                href="{{ route('properties.index', ['filter_type' => 'buy']) }}">
                                                <span>Buy</span>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="scrollspy-btn"
                                                href="{{ route('properties.index', ['filter_type' => 'rent']) }}">
                                                <span>Rent</span>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="scrollspy-btn"
                                                href="{{ route('properties.index', ['type' => 'commercial']) }}">
                                                <span>Commercial</span>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="scrollspy-btn" href="{{ route('holiday-properties.index') }}">
                                                <span>Vacations</span>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="scrollspy-btn"
                                                href="/properties?completion_status=off_plan"><span>New
                                                    Projects</span></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="scrollspy-btn" href="{{ route('agents.index') }}"><span>Find
                                                    Agent</span></a>
                                        </li>
                                        {{-- <li class="menu-item menu-item-has-children">
                                            <a href="/"><span>Explore</span></a>
                                            <ul class="sub-menu">
                                                <li class="menu-item"><a href="index.html"><span>ICO Explore</span></a>
                                                </li>
                                                <li class="menu-item"><a href="home-2.html"><span>Crypto
                                                            Explore</span></a></li>
                                            </ul>
                                        </li> --}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="xb-header-menu-backdrop"></div>
                    </div>
                </div>

                <div class="header-last-btn">
                    <div class="header-btn-one ul_li hide-item-header">
                        <a class="btc-btn" href="#">
                            @php
                                $currentCurrency = Cookie::get('currency_code') ?? (Auth::check() ? Auth::user()->currency_code ?? 'BTC' : 'BTC');
                                $currencyIcons = [
                                    'BTC' => 'hero-icon01.svg',
                                    'ETH' => 'hero-icon02.svg',
                                    'XRP' => 'hero-icon03.svg',
                                    'USDT' => 'hero-icon04.svg',
                                ];
                                $icon = $currencyIcons[$currentCurrency] ?? 'hero-icon01.svg';
                            @endphp
                            <img src="{{ asset('assets/img/icon/' . $icon) }}" alt="{{ $currentCurrency }} Icon">
                            <span>
                                ({{ $currentCurrency }})
                            </span>
                            <img class="header-arrow-img" src="{{ asset('assets/img/home/arrow.png') }}"
                                alt="Arrow">
                        </a>
                        <ul class="">
                            <li onclick="document.getElementById('btc-form').submit();" style="cursor: pointer;">
                                <form id="btc-form" action="{{ route('currency.select') }}" method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="currency_code" value="BTC">
                                </form>
                                <img src="{{ asset('assets/img/icon/hero-icon01.svg') }}" alt="BTC Icon">(BTC)
                            </li>
                            <li onclick="document.getElementById('eth-form').submit();" style="cursor: pointer;">
                                <form id="eth-form" action="{{ route('currency.select') }}" method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="currency_code" value="ETH">
                                </form>
                                <img src="{{ asset('assets/img/icon/hero-icon02.svg') }}" alt="ETH Icon">(ETH)
                            </li>
                            <li onclick="document.getElementById('xrp-form').submit();" style="cursor: pointer;">
                                <form id="xrp-form" action="{{ route('currency.select') }}" method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="currency_code" value="XRP">
                                </form>
                                <img src="{{ asset('assets/img/icon/hero-icon03.svg') }}" alt="XRP Icon">(XRP)
                            </li>
                            <li onclick="document.getElementById('usdt-form').submit();" style="cursor: pointer;">
                                <form id="usdt-form" action="{{ route('currency.select') }}" method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="currency_code" value="USDT">
                                </form>
                                <img src="{{ asset('assets/img/icon/hero-icon04.svg') }}" alt="USDT Icon">(USDT)
                            </li>
                        </ul>
                    </div>


                    <div class="header-btn ul_li">

                        <div class="login-btn-div">
                            <a class="login-btn" href="#!"
                                data-logged-in="{{ auth()->check() ? 'true' : 'false' }}">
                                <i class="fas fa-user"></i>
                                <span>
                                    {{ auth()->check() ? auth()->user()->first_name : 'Login' }}
                                </span>
                            </a>
                            {{-- logout model   --}}
                            <div class="logout-modal">
                                <ul>
                                    <li onclick="window.location.href='{{ route('user.account') }}'">Profile</li>
                                    <li onclick="document.getElementById('logout-form').submit();">Logout</li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </div>

                        </div>


                    </div>
                    {{-- icon  --}}
                    <div class="header-bar-mobile side-menu d-lg-none hide-item-header-two">
                        <a class="login-mobile-button login-btn" href="javascript:void(0);"
                            data-logged-in="{{ auth()->check() ? 'true' : 'false' }}">
                            <i class="fas fa-user"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <!-- Login Modal -->
    <div class="login-modal">
        <form style="background-image: url('{{ asset('assets/img/footer/login-bg-mode.png') }}');"
            class="login-modal-form" method="POST" action="{{ route('login') }}" id="loginForm">
            @csrf
            <div class="login-modal-close">
                <img src="{{ asset('assets/img/footer/close-icon.png') }}" alt="close-icon">
            </div>
            <h1 class="login-modal-form-title">Get Started with Crypto Property Investments</h1>

            <a class="login-modal-form-links" href="#">
                <img src="{{ asset('assets/img/footer/google.png') }}" alt="Google Icon">
                Continue with Google
            </a>

            <a class="login-modal-form-links" href="#">
                <img src="{{ asset('assets/img/footer/Facebook.png') }}" alt="Facebook Icon">
                Continue with Facebook
            </a>


            <img class="OR-icon" src="{{ asset('assets/img/footer/or.png') }}" alt="OR">

            <div class="col-md-6 input-div">
                <span>Email</span>
                <input id="email" placeholder="Email" type="email"
                    class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="col-md-6 input-div">
                <span>Password</span>
                <input id="password" placeholder="Password" type="password"
                    class="form-control @error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="col-md-6 input-div">
                <button class="them-btn-login" type="submit">Continue</button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link password-request"
                        href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                @endif

                <p class="accept-p" id="showRegister">Create Your Account</p>
                <p class="accept-p">By registering, you accept our Terms & Conditions and our Privacy Policy.</p>
            </div>
        </form>

        <!-- Register Form -->
        <form id="registerForm"
            style="background-image: url('{{ asset('assets/img/footer/login-bg-mode.png') }}'); display: none;"
            class="login-modal-form" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="login-modal-close-two">
                <img src="{{ asset('assets/img/footer/close-icon.png') }}" alt="close-icon">
            </div>
            <h1 class="login-modal-form-title">Create Your Account</h1>

            <div class="col-md-6 input-div">
                <span>Name</span>
                <input id="name" placeholder="Name" type="text" class="form-control" name="name"
                    required>
            </div>
            <div class="col-md-6 input-div">
                <span>Email</span>
                <input id="registerEmail" placeholder="Email" type="email" class="form-control" name="email"
                    required>
            </div>
            <div class="col-md-6 input-div">
                <span>Password</span>
                <input id="registerPassword" placeholder="Password" type="password" class="form-control"
                    name="password" required>
            </div>
            <div class="col-md-6 input-div">
                <span>Confirm Password</span>
                <input id="passwordConfirm" placeholder="Confirm Password" type="password" class="form-control"
                    name="password_confirmation" required>
            </div>
            <div class="col-md-6 input-div">
                <button class="them-btn-login" type="submit">Register</button>
                <a href="#" class="password-request" id="showLogin">Already have an account? Login</a>
            </div>
        </form>
    </div>


    <style>
        .header-area {
            width: 100%;
            position: fixed;
            top: 0;
        }

        .space-header {
            width: 100%;
            height: 75px;
            background: black;
        }
    </style>


</header>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const BTCBtn = document.querySelector(".btc-btn");
        const listItems = document.querySelectorAll(".header-btn-one ul li");

        listItems.forEach(item => {
            item.addEventListener("click", function(event) {
                event.stopPropagation();

                let selectedIcon = item.querySelector("img").src;
                let selectedText = item.textContent.trim();


                BTCBtn.innerHTML =
                    `<img src="${selectedIcon}" alt=""> ${selectedText} <img class="header-arrow-img" src="assets/img/home/arrow.png" alt="">`;


                document.querySelector(".header-btn-one ul").style.display = "none";
            });
        });


        BTCBtn.addEventListener("click", function(event) {
            event.stopPropagation();
            const dropdown = document.querySelector(".header-btn-one ul");
            dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
        });


        document.addEventListener("click", function() {
            document.querySelector(".header-btn-one ul").style.display = "none";
        });
    });


    document.addEventListener("DOMContentLoaded", function() {
        const loginBtns = document.querySelectorAll(".login-btn");
        const logoutModal = document.querySelector(".logout-modal");
        const loginModal = document.querySelector(".login-modal");
        const closeModal = document.querySelector(".login-modal-close");
        const closeModalTwo = document.querySelector(".login-modal-close-two");
        const modalOverlay = document.createElement("div");

        modalOverlay.classList.add("modal-overlay");
        document.body.appendChild(modalOverlay);

        loginBtns.forEach(btn => {
            btn.addEventListener("click", function(event) {
                event.preventDefault();

                const isLoggedIn = btn.getAttribute("data-logged-in") === "true";

                if (isLoggedIn) {
                    // Check if mobile (width < 992)
                    if (window.innerWidth < 992) {
                        // On mobile: go directly to profile page
                        window.location.href = "/user/account"; // use correct route if needed
                    } else {
                        // On desktop: toggle logout dropdown
                        logoutModal.style.display = logoutModal.style.display === "block" ?
                            "none" : "block";
                    }
                } else {
                    // Show login modal
                    loginModal.classList.add("active");
                    modalOverlay.style.display = "block";
                }
            });
        });

        function closeLoginModal() {
            loginModal.classList.remove("active");
            setTimeout(() => {
                modalOverlay.style.display = "none";
            }, 500);
        }

        // Close modal when overlay or close button is clicked
        modalOverlay.addEventListener("click", closeLoginModal);
        if (closeModal) closeModal.addEventListener("click", closeLoginModal);
        if (closeModalTwo) closeModalTwo.addEventListener("click", closeLoginModal);

        // Hide logout dropdown when clicking outside
        document.addEventListener("click", function(event) {
            const isClickInsideBtn = event.target.closest('.login-btn');
            const isClickInsideModal = event.target.closest('.logout-modal');
            if (!isClickInsideBtn && !isClickInsideModal) {
                logoutModal.style.display = "none";
            }
        });
    });





    document.addEventListener("DOMContentLoaded", function() {
        const loginForm = document.getElementById("loginForm");
        const registerForm = document.getElementById("registerForm");
        const showRegister = document.getElementById("showRegister");
        const showLogin = document.getElementById("showLogin");


        showRegister.addEventListener("click", function() {
            loginForm.style.display = "none";
            registerForm.style.display = "flex";
        });


        showLogin.addEventListener("click", function() {
            registerForm.style.display = "none";
            loginForm.style.display = "flex";
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const hideItems = document.querySelectorAll(".hide-item-header");
        const hideItemsTwo = document.querySelectorAll(".hide-item-header-two");
        const currentPath = window.location.pathname;

        if (currentPath.startsWith("/properties/")) {
            hideItems.forEach(item => {
                item.style.display = "none";
            });
        } else if (currentPath === "/agents") {
            hideItems.forEach(item => {
                item.style.display = "none";
            });
        } else if (currentPath.startsWith("/holiday-properties/")) {
            hideItems.forEach(item => {
                item.style.display = "none";
            });
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        function adjustStyles() {
            const currentPath = window.location.pathname;
            const headerLastBtns = document.querySelectorAll(".header-last-btn");
            const spaceHeaders = document.querySelectorAll(".space-header");
            const hideItems = document.querySelectorAll(".hide-item-header");
            const hideItemsTwo = document.querySelectorAll(".hide-item-header-two");

            if ((currentPath.startsWith("/properties") || currentPath.startsWith("/holiday-properties") ||
                    currentPath === "/agents") && window.innerWidth <= 1000) {
                hideItems.forEach(item => {
                    item.style.display = "none";
                });

                headerLastBtns.forEach(el => el.style.width = "100%");
                spaceHeaders.forEach(el => el.style.height = "73px");
            } else {
                hideItems.forEach(item => {
                    item.style.display = "";
                });

                headerLastBtns.forEach(el => el.style.width = "");
                spaceHeaders.forEach(el => el.style.height = "");
            }

            if ((currentPath.startsWith("/properties")) && window.innerWidth <= 1000) {
                hideItemsTwo.forEach(item => {
                    item.style.display = "none";
                });

                headerLastBtns.forEach(el => el.style.width = "100%");
                spaceHeaders.forEach(el => el.style.height = "73px");
            } else {
                hideItemsTwo.forEach(item => {
                    item.style.display = "";
                });

                headerLastBtns.forEach(el => el.style.width = "");
                spaceHeaders.forEach(el => el.style.height = "");
            }
        }


        adjustStyles();


        window.addEventListener("resize", adjustStyles);
    });
</script>
