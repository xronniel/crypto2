<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('assets/css/portal/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/portal/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/portal/portal.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/portal/fileupload.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/portal/table.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/portal/MultiSelect.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/portal/salesreportdashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/portal/pagevisit.css') }}">
</head>

</script>
<style>
    #notificationDropdown {
        max-height: 500px;
        overflow-y: auto;
        background: #eee;
        border-radius: 10px;
    }

    #notificationDropdown a {
        width: 500px;
        display: flex;
        justify-content: space-between;
        padding: 30px;
    }

    .notification-count {
        position: absolute;
        top: -8px;
        right: 40px;
        background: #eeee;
        border-radius: 50%;
        padding: 1px 6px;
        font-size: 18px;
        color: #053b34;
        font-weight: 900;
    }
</style>

<body>
    <header>
        <div class="logosec">
            <div class="logo">
                CRYPTOHOME.
            </div>
            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/menu.png') }}" alt="Menu" class="icn burger-menu menuicn"
                id="menuicn">
        </div>
        <div class="message">

            <div class="notifications-menu">
                <img  loading="lazy"  class="user-icon" onclick="toggleNotification()"
                    src="{{ asset('assets/img/back-office-img/bell.png') }}" alt="account">
                <div class="notification-count" id="notificationCount"></div>
                <div id="notificationDropdown" class="dropdown-content">
                </div>
            </div>

            <div class="user-menu">
                <img  loading="lazy"  class="user-icon" onclick="toggleDropdown()" src="{{ asset('assets/img/back-office-img/user.png') }}"
                    alt="account">
                <div id="userDropdown" class="dropdown-content">
                    @auth
                        {{-- <a>Profile</a> --}}
                        <a href="#">Profile</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    @endauth

                    @guest
                        <a href="#">Login</a>
                    @endguest
                </div>
            </div>
        </div>
    </header>
    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav" style="z-index: 1;">
                <div class="nav-upper-options">
                    <div class="nav-option-home option1">
                        <a href="{{ route('admin.homepage.index') }}">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/dashboard.png') }}" class="nav-img"
                                alt="dashboard">
                            <h3 style="margin: 0; font-size: 18px;"> Homepage CMS</h3>
                        </a>
                    </div>
                    <div class="option2 nav-option">
                        <a href="{{ route('admin.agents.index') }}">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/user.png') }}" class="nav-img" alt="articles">
                            Agents
                        </a>
                    </div>
                    <div class="option2 nav-option">
                        <a href="{{ route('admin.partners.index') }}">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/user.png') }}" class="nav-img" alt="articles">
                            Partners
                        </a>
                    </div>
                    <div class="option2 nav-option">
                        <a href="{{ route('admin.reviews.index') }}">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/user.png') }}" class="nav-img" alt="articles">
                            Reviews
                        </a>
                    </div>
                    <div class="option2 nav-option">
                        <a href="{{ route('admin.developers.index') }}">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/info.png') }}" class="nav-img" alt="articles">
                            Developers
                        </a>
                    </div>
                    <div class="option2 nav-option">
                        <a href="{{ route('admin.categories.index') }}">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/terms-and-conditions.png') }}" class="nav-img" alt="articles">
                            Categories
                        </a>
                    </div>
                    <div class="option2 nav-option">
                        <a href="{{ route('admin.countries.index') }}">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/values.png') }}" class="nav-img" alt="articles">
                            Countries
                        </a>
                    </div>
                    <div class="option2 nav-option">
                        <a href="{{ route('admin.emirates.index') }}">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/phone.png') }}" class="nav-img" alt="articles">
                            Emirates
                        </a>
                    </div>
                    <div class="option2 nav-option">
                        <a href="{{ route('admin.districts.index') }}">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/blog.png') }}" class="nav-img" alt="articles">
                            Districts
                        </a>
                    </div>
                    <div class="option2 nav-option">
                        <a href="{{ route('admin.news.index') }}">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/refund.png') }}" class="nav-img" alt="articles">
                           News
                        </a>
                    </div>
                    <div class="option2 nav-option">
                        <a href="{{ route('admin.listings.index') }}">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/cashback.png') }}" class="nav-img" alt="articles">
                            Properties (Listings)
                        </a>
                    </div>
                    <div class="option2 nav-option">
                        <a href="{{ route('admin.holiday-properties.index') }}">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/cashback.png') }}" class="nav-img" alt="articles">
                            Holiday Properties
                        </a>
                    </div>
                    <div class="option2 nav-option">
                        <a href="{{ route('admin.communities.index') }}">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/blog.png') }}" class="nav-img" alt="articles">
                            Communities
                        </a>
                    </div>
                    <div class="option2 nav-option">
                        <a href="{{ route('admin.articles.index') }}">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/terms-and-conditions.png') }}" class="nav-img" alt="articles">
                            Articles
                        </a>
                    </div>
                    <div class="option2 nav-option">
                        <a href="{{ route('admin.comments.index') }}">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/terms-and-conditions.png') }}" class="nav-img" alt="comments">
                            Comments
                        </a>
                    </div>
                    <div class="option2 nav-option">
                        <a href="{{ route('admin.facilities.index') }}">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/blogs.png') }}" class="nav-img" alt="articles">
                            Facilities
                        </a>
                    </div>
                 <div class="option2 nav-option">
                        <a href="{{ route('admin.faqs.index') }}">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/box.png') }}" class="nav-img" alt="articles">
                            FAQ
                        </a>
                    </div>
                       {{-- <div class="option2 nav-option">
                        <a href="">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/faq-book.png') }}" class="nav-img"
                                alt="articles">
                            FAQS Categories
                        </a>
                    </div>
                    <div class="option2 nav-option">
                        <a href="">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/faq.png') }}" class="nav-img" alt="articles">
                            FAQS
                        </a>
                    </div>
                    <div class="option2 nav-option">
                        <a href="">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/order.png') }}" class="nav-img" alt="articles">
                            Order Management
                        </a>
                    </div>
                    <div class="option2 nav-option">
                        <a href="">
                            <img  loading="lazy"  src="{{ asset('assets/img/back-office-img/tracking.png') }}" class="nav-img" alt="articles">
                            Track Users
                        </a>
                    </div> --}}
                </div>
            </nav>
        </div>
        <div class="main">
            @yield('content')
        </div>
    </div>
    <script>
        let menuicn = document.querySelector(".menuicn");
        let nav = document.querySelector(".navcontainer");

        function updateMenuIcon() {
            if (window.innerWidth <= 768) {
                menuicn.src = "{{ asset('assets/img/back-office-img/menu.png') }}";
            } else {
                if (nav.classList.contains("navclose")) {
                    menuicn.src = "{{ asset('assets/img/back-office-img/menu.png') }}";
                } else {
                    menuicn.src = "{{ asset('assets/img/back-office-img/close.png') }}";
                }
            }
        }

        menuicn.addEventListener("click", () => {
            nav.classList.toggle("navclose");
            updateMenuIcon();
        });

        updateMenuIcon();
        window.addEventListener("resize", updateMenuIcon);

        function toggleDropdown() {
            var dropdown = document.getElementById("userDropdown");
            dropdown.classList.toggle("show");
        }

        function toggleNotification() {
            var dropdown = document.getElementById("notificationDropdown");
            dropdown.classList.toggle("show");
        }

        window.onclick = function (event) {
            if (!event.target.matches('.user-icon')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

        // Add active class to selected nav-option
        const navOptions = document.querySelectorAll('.nav-option a');
        navOptions.forEach(option => {
            option.addEventListener('click', function () {
                navOptions.forEach(nav => nav.parentElement.classList.remove('active'));
                this.parentElement.classList.add('active');
            });
        });

        // Set active class based on the current URL
        document.querySelectorAll('.nav-option a').forEach(link => {
            if (window.location.href.includes(link.href)) {
                link.parentElement.classList.add('active');
            }
        });
    </script>
</body>

</html>