@extends('layouts.front-office.app')
@section('content')
    <!-- breadcrumb start -->
    <section class="breadcrumb bg_img pos-rel" data-background="{{ asset('/assets/img/bg/breadcrumb.jpg') }}">
        <div class="container">
            <div class="breadcrumb__content desk-user">
                <h2 class="breadcrumb__title my-account">Account</h2>
                <h2 class="breadcrumb__title saved-properties"> Saved Properties</h2>
                <h2 class="breadcrumb__title contacted-properties"> Contacted Properties</h2>
            </div>
            <div style="        justify-content: center;" class="breadcrumb__content mobile-user-two">
                <h2 class="breadcrumb__title">Account.</h2>
            </div>
        </div>
        <div class="breadcrumb__icon">
            <div class="icon icon--1">
                <img class="leftToRight" src="{{ asset('/assets/img/icon/bi_01.png') }}" alt="">
            </div>
            <div class="icon icon--2">
                <img class="topToBottom" src="{{ asset('/assets/img/icon/bi_02.png') }}" alt="">
            </div>
            <div class="icon icon--3">
                <img class="topToBottom" src="{{ asset('/assets/img/icon/bi_03.png') }}" alt="">
            </div>
            <div class="icon icon--4">
                <img class="leftToRight" src="{{ asset('/assets/img/icon/bi_04.png') }}" alt="">
            </div>
        </div>

    </section>
    <!-- breadcrumb end -->

    <div class="container container-user">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>My Account</h2>
            <button class="nav-button button-my-account desk-user">
                <img style="width: 35px;" src="{{ asset('/assets/img/user/use-one.png') }}" alt="">
                Account
            </button>
            <button class="nav-button button-my-account mobile-user">
                <img style="width: 40px;" src="{{ asset('/assets/img/user/user-man-green.png') }}" alt="">
                {{ $user->email }}
                <img style="width: 20px;" src="{{ asset('/assets/img/user/chevron.png') }}" alt="">

            </button>
            <button class="nav-button button-saved-properties">
                <img src="{{ asset('/assets/img/user/user-two.png') }}" alt="">
                Saved Properties
            </button>

            <button class="nav-button button-contacted-properties">
                <img src="{{ asset('/assets/img/user/user-three.png') }}" alt="">
                Contacted Properties
            </button>
        </div>






        <!-- Main Content -->
        <div class="main my-account">
            <div class="form-wrapper">
                <div class="go-backto-sidebar mobile-user-two">
                    <img src="{{ asset('/assets/img/user/arrow-left.png') }}" alt="">
                    <span>Personal Information</span>
                    <div></div>
                </div>
                <h3 class="desk-user">Personal Information</h3>
                <form method="POST" action="{{ route('user.account.update') }}">
                    @csrf

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-input" name="email" value="{{ $user->email }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-input" name="first_name" value="{{ $user->first_name }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-input" name="last_name" value="{{ $user->last_name }}" required>
                    </div>
                    <div class="phone-div">
                        <div style="width: 91px" class="form-group phone-group">
                            <select name="country_code" class="flag-select">
                                @foreach ($phonecodes as $phonecode)
                                    <option value="{{ $phonecode->phonecode }}"
                                        {{ $user->country_code == $phonecode->phonecode ? 'selected' : '' }}>
                                        {{ $phonecode->phonecode }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Mobile Number</label>
                            <input type="text" class="form-input" name="mobile_number"
                                value="{{ $user->mobile_number }}" required>
                        </div>
                    </div>

                    <button type="submit" class="button">Update</button>

                </form>
                <form class="log-out-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="button">Log Out</button>
                </form>
            </div>

        </div>

        <div class="main saved-properties">
            <div class="go-backto-sidebar mobile-user-two">
                <img src="{{ asset('/assets/img/user/arrow-left.png') }}" alt="">
                <span>Saved Properties</span>
                <div></div>
            </div>
            <img src="{{ asset('/assets/img/user/no-saved-property.png') }}" alt="">
            <p class="saved-properties-one">No Saved Properties</p>
            <p class="saved-properties-two">​To save a property to your favorites, click the <span>heart icon</span> on any
                listing. All your saved properties will be conveniently accessible here for easy viewing and management.</p>
        </div>
        <div class="main contacted-properties">

            <div class="go-backto-sidebar mobile-user-two">
                <img src="{{ asset('/assets/img/user/arrow-left.png') }}" alt="">
                <span>Contacted Properties</span>
                <div></div>
            </div>
            <img src="{{ asset('/assets/img/user/contact-animated.png') }}" alt="">
            <p class="saved-properties-one">No Contacted Properties</p>
            <p class="saved-properties-two">You haven't reached out to any properties yet. To inquire about a property,
                click the <span>"Send Message"</span> button or any of the contact links like Whatsapp, Email, or Telephone
                on any listing. All your contacted properties will be conveniently accessible here for easy reference and
                follow-up.</p>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const navButtons1 = document.querySelectorAll(".button-contacted-properties");
            const navButtons2 = document.querySelectorAll(".button-saved-properties");
            const navButtons3 = document.querySelectorAll(".button-my-account");

            const breadcrumb1 = document.querySelectorAll(".saved-properties");
            const breadcrumb2 = document.querySelectorAll(".my-account");
            const breadcrumb3 = document.querySelectorAll(".contacted-properties");

            const sidebar = document.querySelectorAll(".sidebar");
            const goBacktoSidebar = document.querySelectorAll(".go-backto-sidebar");

            
            function handleButtonClick(button, breadcrumbToShow, breadcrumbToHide1, breadcrumbToHide2) {
                button.forEach(btn => {
                    btn.addEventListener("click", function() {
                       
                        breadcrumbToShow.forEach(breadcrumb => {
                            breadcrumb.style.display = "flex"; 
                        });

                      
                        breadcrumbToHide1.forEach(breadcrumb => {
                            breadcrumb.style.display = "none"; 
                        });
                        breadcrumbToHide2.forEach(breadcrumb => {
                            breadcrumb.style.display = "none"; 
                        });

                        
                        if (window.innerWidth <= 900) {
                            sidebar.forEach(side => {
                                side.style.display = "none"; 
                            });
                        }
                    });
                });
            }

        
            if (window.innerWidth <= 900) {

                breadcrumb1.forEach(breadcrumb => {
                    breadcrumb.style.display = "none";
                });
                breadcrumb2.forEach(breadcrumb => {
                    breadcrumb.style.display = "none";
                });
                breadcrumb3.forEach(breadcrumb => {
                    breadcrumb.style.display = "none";
                });

                sidebar.forEach(side => {
                    side.style.display = "flex"; 
                });


                goBacktoSidebar.forEach(goBackBtn => {
                    goBackBtn.addEventListener("click", function() {
                        sidebar.forEach(side => {
                            side.style.display = "flex"; 
                        });

                        breadcrumb1.forEach(breadcrumb => {
                            breadcrumb.style.display = "none"; 
                        });
                        breadcrumb2.forEach(breadcrumb => {
                            breadcrumb.style.display = "none";
                        });
                        breadcrumb3.forEach(breadcrumb => {
                            breadcrumb.style.display = "none";
                        });
                    });
                });
            }

           
            handleButtonClick(navButtons3, breadcrumb2, breadcrumb1, breadcrumb3); 
            handleButtonClick(navButtons2, breadcrumb1, breadcrumb2,
                breadcrumb3); 
            handleButtonClick(navButtons1, breadcrumb3, breadcrumb1,
                breadcrumb2); 

           
            if (window.innerWidth > 900) {
                breadcrumb2.forEach(breadcrumb => {
                    breadcrumb.style.display = "flex"; 
                });
                breadcrumb1.forEach(breadcrumb => {
                    breadcrumb.style.display = "none"; 
                });
                breadcrumb3.forEach(breadcrumb => {
                    breadcrumb.style.display =
                        "none";
                });
            }
        });
    </script>




    <style>
        .nav-button.active {
            background: #0D1226;
        }

        .breadcrumb__title {
            text-align: center;
            justify-content: center;
        }

        .phone-div {
            display: flex;
            gap: 5px;
        }

        .container-user {
            display: flex;
            flex-direction: row;
        }

        .sidebar {
            width: 30%;
            border-right: 1px solid #333;
            padding: 40px 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar h2 {

            font-family: "Manrope", sans-serif;
            font-weight: 400;
            font-size: 18px;
            line-height: 28px;
            letter-spacing: 0%;
            vertical-align: middle;
            color: #FFFFFF;
            text-align: center;
            margin-bottom: 50px;
        }

        .nav-button {
            background-color: #0f172a;
            padding: 20px;
            border-radius: 6px;
            border: 1px solid transparent;
            width: 100%;
            margin-bottom: 20px;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            max-width: 300px;
            align-self: center;


            color: #FFFFFF;


            font-family: "Manrope", sans-serif;
            font-weight: 400;
            font-size: 20px;
            line-height: 28px;
            letter-spacing: 0%;
            vertical-align: middle;

        }

        .nav-button img {
            width: 40px;
        }


        .main {
            width: 70%;
            padding: 40px;
            box-sizing: border-box;

            display: flex;
            flex-direction: column;
            align-items: center;

            /*
                gap: 36px; */
            align-content: center;
            align-items: center;

        }


        .contacted-properties,
        .saved-properties {
            gap: 36px;
        }

        .main h3 {



            font-family: "Manrope", sans-serif;
            font-weight: 400;
            font-size: 18px;
            line-height: 28px;
            letter-spacing: 0%;
            vertical-align: middle;
            color: #FFFFFF;

        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
            width: 100%;
        }

        .form-label {
            display: block;
            font-size: 12px;
            margin-bottom: 5px;
            color: #aaa;
            position: absolute;
            left: 20px;
            top: 10px;

            font-family: "Manrope", sans-serif;
            font-weight: 400;
            font-size: 14px;
            line-height: 100%;
            letter-spacing: 0%;
            vertical-align: middle;

        }

        .go-backto-sidebar {
            display: flex;
            align-content: center;
            align-items: center;
            justify-content: space-between;
            margin: 0 0 60px 0;
        }

        .go-backto-sidebar span {

            font-family: "Manrope", sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 28px;
            letter-spacing: 0%;
            vertical-align: middle;

        }

        .go-backto-sidebar img {
            width: 50px !important;
        }

        .form-group input[type="text"],
        .form-group input[type="password"],
        .form-group input[type="email"],
        .form-group input[type="tel"],
        .form-group select,
        .form-group textarea {
            width: 100%;
            height: 67px;
            padding: 22px 20px 5px 20px;
            border-radius: 6px;
            border: 1px solid #333;
            background-color: #0f172a;
            color: #fff;
            font-size: 18px;
            font-family: "Manrope", sans-serif;
            font-weight: 400;
            line-height: 100%;
            letter-spacing: 0%;
            vertical-align: middle;
            transition: border 0.3s ease;
        }

        .form-group input[type="text"]:hover,
        .form-group input[type="password"]:hover,
        .form-group input[type="email"]:hover,
        .form-group input[type="tel"]:hover,
        .form-group select:hover,
        .form-group textarea:hover,
        .form-group input[type="text"]:focus,
        .form-group input[type="password"]:focus,
        .form-group input[type="email"]:focus,
        .form-group input[type="tel"]:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border: 2px solid #2DD98F;
            outline: none;
        }

        .phone-group {
            display: flex;
            gap: 10px;
        }

        .flag-select {
            width: 100px;
            height: 67px;
            border-radius: 6px;
            border: 1px solid #333;
            background-color: #0f172a;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
        }

        .button {
            width: 100%;
            height: 67px;

            background: #080B18;
            border-radius: 6px;
            border: 1px solid #333;
            font-size: 16px;
            margin-bottom: 20px;
            cursor: pointer;

            color: #92939E;


            font-family: "Outfit", sans-serif;
            font-weight: 500;
            font-size: 14px;
            line-height: 28px;
            letter-spacing: 0%;
            vertical-align: middle;
            text-transform: capitalize;


        }

        .saved-properties img {
            width: 150px;
        }

        .saved-properties-one {
            font-family: "Outfit", sans-serif;
            font-weight: 600;
            font-size: 40px;
            line-height: 18px;
            letter-spacing: 0%;
            text-align: center;
            vertical-align: middle;
            color: #FFFFFF;

        }

        .saved-properties-two {
            font-family: "Outfit", sans-serif;
            font-weight: 600;
            font-size: 18px;
            line-height: 100%;
            letter-spacing: 0%;
            text-align: center;
            vertical-align: middle;
            color: #FFFFFF;
            max-width: 639px;
            text-align: center;
            margin: 0 auto;
        }


        .saved-properties-two span {
            color: #2DD98F;

        }




        .mobile-user {
            border: 1px solid #FFFFFF1A;
            background-color: black;
            justify-content: space-between;
            display: none;

        }

        .mobile-user-two {
            display: none;
        }








        @media (max-width: 900px) {
            .mobile-user {
                display: flex;
            }


            .mobile-user-two {
                display: flex;
                width: 100%;

            }

            .container-user {
                flex-direction: column;
                min-height: fit-content;
            }

            .sidebar {
                width: 100%;
                padding: 20px;
                align-items: stretch;
            }

            .main {
                width: 100%;
                padding: 20px;
            }

            .main form,
            .nav-button {
                max-width: 100%;
            }

            .nav-button {
                padding: 10px 20px;
            }

            .form-input,
            .button {
                width: 100%;
            }

            .phone-group {
                flex-direction: column;
            }

            .flag-select {
                width: 100%;
            }


            .sidebar {
                border-right: 0px;
            }

            .desk-user {
                display: none;
            }

            .nav-button {
                font-weight: 400;
                font-size: 18px;
                line-height: 28px;
                letter-spacing: 0%;
                vertical-align: middle;

            }
        }
    </style>
@endsection
