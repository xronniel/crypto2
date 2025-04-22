@extends('layouts.front-office.app')

@section('content')
    <!-- breadcrumb start -->
    <section class="breadcrumb bg_img pos-rel" data-background="{{ asset('assets/img/bg/breadcrumb.jpg') }}">
        <div class="container">
            <div class="breadcrumb__content">
                <h2 class="breadcrumb__title">Terms & Conditions</h2>
                <ul class="bread-crumb clearfix ul_li_center">
                    <ul style="    flex-direction: column;" class="bread-crumb clearfix ul_li_center">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item">Terms & Conditions</li>
                    </ul>
                </ul>
            </div>
        </div>

        <div class="breadcrumb__icon">
            <div class="icon icon--1">
                <img class="leftToRight" src="{{ asset('assets/img/icon/bi_01.png') }}" alt="">
            </div>
            <div class="icon icon--2">
                <img class="topToBottom" src="{{ asset('assets/img/icon/bi_02.png') }}" alt="">
            </div>
            <div class="icon icon--3">
                <img class="topToBottom" src="{{ asset('assets/img/icon/bi_03.png') }}" alt="">
            </div>
            <div class="icon icon--4">
                <img class="leftToRight" src="{{ asset('assets/img/icon/bi_04.png') }}" alt="">
            </div>
        </div>
    </section>

    <section class="contact-info pt-50 pb-50">
        <div class="container">
            <div onclick="window.location.href='/'" class="page-path-line">
                <img src="{{ asset('assets/img/propertydetails/arrow-left.png') }}" alt="home">
                <p>Home</p>
                <p class="active-path-line">/ Terms & Condition</p>
            </div>


            <div class="container-Terms-Conditions">
                <h1>Terms & Conditions</h1>
                <p><strong>Effective Date:</strong> April 17, 2025</p>

                <p>Welcome to CryptoHomes. By accessing or using our website (www.cryptohomes.ae), you agree to comply with
                    and be bound by the following Terms and Conditions. Please read them carefully.</p>

                <h2>1. Acceptance of Terms</h2>
                <p>By using our website, you confirm that you accept these Terms and Conditions and agree to comply with
                    them. If you do not agree, please refrain from using our services.</p>

                <h2>2. Eligibility</h2>
                <p>Users must be at least 18 years old to access or use our platform. By using CryptoHomes, you represent
                    and warrant that you meet this age requirement.</p>

                <h2>3. Account Registration</h2>
                <ul>
                    <li>Provide accurate, current, and complete information.</li>
                    <li>Maintain the confidentiality of your account credentials.</li>
                    <li>Notify us immediately of any unauthorized use of your account.</li>
                </ul>

                <h2>4. Services Offered</h2>
                <ul>
                    <li>Buy, rent, and invest in residential and commercial properties in Dubai.</li>
                    <li>Explore new real estate projects.</li>
                    <li>Access mortgage solutions through third-party providers.</li>
                    <li>Connect with verified real estate agents.</li>
                    <li>Read blogs, news, and articles related to real estate and cryptocurrency.</li>
                </ul>

                <h2>5. Property Listings</h2>
                <p>All property listings are provided by third-party users or agencies. We do not guarantee the accuracy or
                    completeness of any listings and are not responsible for any errors or omissions.</p>

                <h2>6. User Conduct</h2>
                <ul>
                    <li>Use the site for any unlawful purpose.</li>
                    <li>Post false or misleading information.</li>
                    <li>Harass, abuse, or harm other users.</li>
                    <li>Transmit any viruses or harmful code.</li>
                </ul>

                <h2>7. Intellectual Property</h2>
                <p>All content on this website, including text, graphics, logos, and images, is the property of CryptoHomes
                    or its licensors. Unauthorized use is prohibited.</p>

                <h2>8. Third-Party Services</h2>
                <p>Our platform may contain links to third-party websites or services. We are not responsible for the
                    content, policies, or practices of any third-party services.</p>

                <h2>9. Limitation of Liability</h2>
                <p>CryptoHomes is not liable for any damages arising from your use of the website or services, including but
                    not limited to direct, indirect, incidental, or consequential damages.</p>

                <h2>10. Changes to Terms</h2>
                <p>We reserve the right to modify these Terms and Conditions at any time. Changes will be posted on this
                    page, and your continued use of the website constitutes acceptance of the new terms.</p>

                <h2>11. Governing Law</h2>
                <p>These Terms and Conditions are governed by the laws of the United Arab Emirates. Any disputes will be
                    resolved in the courts of Dubai.</p>

                <h2>12. Contact Information</h2>
                <div class="contact-info">
                    <p>Email: <a href="mailto:info@cryptohomes.ae">info@cryptohomes.ae</a></p>
                    <p>Phone: <a href="tel:+97141234567">+971 4 123 4567</a></p>
                    <p>Address: Office 2203, 22nd Floor, Al Manara Tower, Business Bay, Dubai, UAE</p>
                </div>
            </div>
        </div>
    </section>

    <style>
        .container-Terms-Conditions h1 {

            margin-bottom: 1rem;


            font-family: "Manrope", sans-serif;
            font-weight: 700;
            font-size: 30px;
            line-height: 100%;
            letter-spacing: 0%;
            vertical-align: middle;

        }

        .container-Terms-Conditions h2 {

            margin-top: 2rem;
            margin-bottom: 1.5rem;


            font-family: "Manrope", sans-serif;
            font-weight: 400;
            font-size: 24px;
            line-height: 100%;
            letter-spacing: 0%;
            vertical-align: middle;

        }

        .container-Terms-Conditions ul {
            margin-left: 0.5rem;
            padding-left: 1rem;
            font-family: "Manrope", sans-serif;
            font-weight: 400;
            font-size: 24px;
            line-height: 100%;
            letter-spacing: 0%;
            vertical-align: middle;
        }

        .container-Terms-Conditions li {
            margin-bottom: 0.5rem;
            font-family: "Manrope", sans-serif;
            font-weight: 400;
            font-size: 24px;
            line-height: 100%;
            letter-spacing: 0%;
            vertical-align: middle;
        }

        .container-Terms-Conditions .contact-info a {
            color: white !important;

        }

        .container-Terms-Conditions .contact-info a:hover {
            text-decoration: underline;
        }

        .container-Terms-Conditions {
            display: flex;
            gap: 10px;
            flex-direction: column;
            max-width: 70%;
            margin: auto;
            padding: 100px 0 0 0;
        }

        @media (max-width: 900px) {
            .container-Terms-Conditions {

                max-width: 95%;
            }




            .container-Terms-Conditions h1 {
                font-weight: 700;
                font-size: 18px;
                line-height: 100%;
                letter-spacing: 0%;
                vertical-align: middle;

            }



            .container-Terms-Conditions li,
            .container-Terms-Conditions ul,
            .container-Terms-Conditions h2 {
                font-weight: 700;
                font-size: 18px;
                line-height: 100%;
                letter-spacing: 0%;
                vertical-align: middle;
            }




        }
    </style>
@endsection
