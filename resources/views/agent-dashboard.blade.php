@extends('layouts.front-office.app')
@section('content')
    {{-- {{ $property }} --}}
    <section style="background: #080B18;" class="blog pt-50 pb-50">
        <x-property-filter 
            :propertyTypes="$propertyTypes" 
            :plotAreaRange="$plotAreaRange" 
            :priceRange="$priceRange" 
            :amenities="$amenities" 
        />
    </section>
    {{-- {{ $property }} --}}



    <section class="breadcrumb bg_img pos-rel section-bg-agent">
        <div class="container-agent">
            <h1>Find Trusted Agents Specializing in
                Crypto Real Estate Transactions</h1>
            <p>Explore Trusted Agents</p>
            <span>​Explore agents with a proven track record of high response rates and </span>
            <span>​ authentic listings in cryptocurrency real estate transactions.</span>
        </div>
    </section>
    <section class="section-bg-blue-shadow"></section>

    <div class="container">
        <div onclick="window.location.href='/'" class="page-path-line">
            <img src="{{ asset('assets/img/propertydetails/arrow-left.png') }}" alt="home">
            <p>Home</p>
            <p class="active-path-line">/ Find agents</p>
        </div>








        <div class="row ">


            <div class="col-lg-9 mt-30 ">
                <div class="agent-right-box">
                



                    
                    <div class="agent-right-box-filter">
                        <a class="agent-right-box-filter-link agent-right-box-filter-active" href="#">Dubai</a>
                        <a class="agent-right-box-filter-link" href="#">Abu Dhabi</a>
                    </div>
                    <div class="agent-card-wrapper">
                        @foreach ($agents as $agent)
                            <div 
                            onclick="window.location.href='/agents/{{ $agent['id'] }}'"
                            class="agent-right-box-card">
                                <div class="agent-right-box-card-right">
                                    <img src="{{ Str::startsWith($agent['photo'], 'http') ? $agent['photo'] : asset('storage/' . $agent['photo']) }}" alt="agent-photo">
                                </div>
                                <div class="agent-right-box-card-left">
                                    <div class="agent-right-box-card-left-one">
                                        <div class="agent-right-box-card-left-one-p">
                                            <p>{{ $agent['sales'] ?? '0' }} Sale</p>
                                            <p>{{ $agent['rent'] ?? '0' }} Rent</p>
                                        </div>
                                        <img src="{{ asset('assets/img/agent/agent-logo.jpeg') }}" alt="logo">
                                    </div>
                                    <h3 class="agent-right-box-card-left-h3">{{ $agent['name'] }}</h3>
                    
                                    <div>
                                        <p class="agent-right-box-card-left-p">
                                            
                                            Nationality: <span>{{ $agent['nationality'] ?? 'N/A' }}</span>
                                        </p>
                                        <p class="agent-right-box-card-left-p">
                                            Language: <span>{{ $agent['language'] ?? 'N/A' }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <a id="toggleAgentBtn" class="agent-right-box-button them-btn" href="javascript:void(0)"> 
                        <span class="btn_label" data-text="View All Agents">View All Agents</span>
                    </a>
                    
                </div>
            </div>



            <div class="col-lg-3 mt-30">

                <div class="agent-left-big-box">
                    <div class="agent-left-box">
                        <img src="{{ asset('assets/img/agent/fea-1.gif') }}" alt="propertydetails">
                        <h2>Crypto Gurus</h2>
                        <p>Our agents speak fluent Bitcoin, Ethereum, and more. They know the ins and outs of digital currencies
                            and can guide you through seamless transactions.</p>
                    </div>
                    <div class="agent-left-box">
                        <img src="{{ asset('assets/img/agent/fea-2.gif') }}" alt="propertydetails">
                        <h2>Crypto Gurus</h2>
                        <p>Our agents speak fluent Bitcoin, Ethereum, and more. They know the ins and outs of digital currencies
                            and can guide you through seamless transactions.</p>
                    </div>
                    <div class="agent-left-box">
                        <img src="{{ asset('assets/img/agent/fea-3.gif') }}" alt="propertydetails">
                        <h2>Crypto Gurus</h2>
                        <p>Our agents speak fluent Bitcoin, Ethereum, and more. They know the ins and outs of digital currencies
                            and can guide you through seamless transactions.</p>
                    </div>
                </div>



            </div>


        </div>













    </div>










    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.agent-right-box-card');
            const toggleBtn = document.getElementById('toggleAgentBtn');
            const maxVisible = 6;
            let expanded = false;
    
            function updateCards() {
                cards.forEach((card, index) => {
                    if (expanded || index < maxVisible) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
    
                const label = toggleBtn.querySelector('.btn_label');
                const text = expanded ? 'Show Less' : 'View All Agents';
                label.textContent = text;
                label.setAttribute('data-text', text);
            }
    
            updateCards();
    
            toggleBtn.addEventListener('click', function () {
                expanded = !expanded;
                updateCards();
            });
        });
    </script>
    
    




    <style>

.agent-right-box-card {
    transition: all 0.3s ease-in-out;
    cursor: pointer;
}

        .section-bg-agent {
            background-image: url('{{ asset('assets/img/bg/agent-dashboard-img.jpeg') }}');
            background-position: center 40%;
            background-size: cover;
        }

        .section-bg-blue-shadow {
            background-image: url('{{ asset('assets/img/bg/blue-shadow.png') }}');
            background-position: center 40%;
            background-size: cover;
            width: 100%;
            height: 100px;
            margin: 0 0 60px 0;
        }


        .container-agent {
            display: flex;
            flex-direction: column;
            align-content: center;
            align-items: center;
            width: 100%;

        }

        .container-agent h1 {
            font-family: "Manrope", sans-serif;
            font-weight: 700;
            font-size: 60px;
            line-height: 72px;
            letter-spacing: 0%;
            text-align: center;
            vertical-align: middle;
            max-width: 70rem;
            margin: 0 0 40px 0;
        }



        .container-agent p {
            font-family: "Outfit", sans-serif;
            font-weight: 500;
            font-size: 16px;
            line-height: 28px;
            letter-spacing: 0%;
            vertical-align: middle;
            margin: 0 0 10px 0;
        }

        .container-agent span {
            font-family: "Manrope", sans-serif;
            font-weight: 700;
            font-size: 16px;
            line-height: 100%;
            letter-spacing: 0%;
            text-align: center;
            vertical-align: middle;
            color: #FFFFFF;

        }



        .agent-right-box {


            border-radius: 20px;
            background: #0B0F28;
            display: flex;
            flex-direction: column;
            gap: 40px;
            padding: 40px;
            align-items: center;
        }

        .agent-right-box-filter {
            border-radius: 5px;
            border-width: 1px;
            display: flex;
            padding: 5px;
            background: #000000;
            border: 1px solid #FFFFFF1A;
            gap: 8px;
            padding: 6px;
            width: fit-content;
        }

        .agent-right-box-filter-link {
            border: 1px solid #FFFFFF1A;
            border-width: 1px;
            font-family: "Outfit", sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 17px;
            letter-spacing: 0%;
            text-align: center;
            vertical-align: middle;
            color: #767676;
            padding: 8px 40px;
            border-radius: 6px;


        }


        .agent-right-box-card-left {
            display: flex;
            flex-direction: column;
            padding: 20;
            justify-content: space-around;
            padding: 10px;
            width: 60% ;
        }



        .agent-right-box-filter-active {
            background: #2DD98F;
            color: #FFFFFF;


        }

        .agent-right-box-card {
            background: #00000033;
            border: 1px solid #FFFFFF33;
            border-radius: 20px;
            display: flex;
            overflow: hidden;

        }


        .agent-right-box-card-right {
            width: 40%;
            height: 194px;
        }

        .agent-right-box-card-right img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center 20%;
        }



        .agent-right-box-card-left-one {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }


        .agent-right-box-card-left-one-p {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .agent-right-box-card-left-one-p p {

            border-radius: 4px;
            background: #2DD98F;
            padding: 4px;
            font-family: "Manrope", sans-serif;
            font-weight: 700;
            font-size: 12px;
            line-height: 18px;
            letter-spacing: 0%;
            text-align: center;
            vertical-align: middle;
            text-transform: uppercase;
            color: white;
        }


        .agent-right-box-card-left-one img {
            width: 50px;
        }


        .agent-right-box-card-left-h3 {
            font-family: "Manrope", sans-serif;
            font-weight: 700;
            font-size: 30px;
            line-height: 27px;
            letter-spacing: 0%;
            vertical-align: middle;
            color: #FFFFFF;
            margin: 0;
            text-align: start;
        }

        .agent-right-box-card-left-p {
            font-family: "Manrope", sans-serif;
            color: #767676;

            font-weight: 400;
            font-size: 14px;
            line-height: 21px;
            letter-spacing: 0%;
            vertical-align: middle;


        }

        .agent-right-box-card-left-p span {
            font-family: "Manrope", sans-serif;
            font-weight: 600;
            font-size: 14px;
            line-height: 21px;
            letter-spacing: 0%;
            vertical-align: middle;
            color: #FFFFFF;
            margin: 7px 0 0 0;


        }



        .agent-card-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .agent-right-box-card {
            flex: 1 1 calc(50% - 20px);
            box-sizing: border-box;
        }



        .agent-right-box-button {
            background: #2DD98F;

            border-radius: 8px;
            font-family: "Manrope", sans-serif;
            font-weight: 700;
            font-size: 16px;
            line-height: 24px;
            letter-spacing: 0%;
            vertical-align: middle;
            color: #000000;
      
        }

        .them-btn {
            padding: 0px 40px;
        }

        .them-btn span{
            padding: 10px 0px 10px !important;
        }
        .them-btn .btn_label:before {
            top: 106% !important;
        }



        .agent-left-box {
            background: #0c1241;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            gap: 17px;
            padding: 25px;
            align-items: center;

        }

        .agent-left-box img {
            width: 100px;
        }







        .agent-left-box h2 {
            font-family: "Manrope", sans-serif;
            font-weight: 700;
            font-size: 24px;
            line-height: 100%;
            letter-spacing: -0.02px;
            text-align: center;
            vertical-align: middle;
            text-transform: capitalize;
            color: #FFFFFF;

        }

        .agent-left-box p {
            font-family: "Outfit", sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 100%;
            letter-spacing: 0%;
            text-align: center;
            vertical-align: middle;
            color: #C1C7DE;

        }



.agent-left-big-box{
    display: flex;
    flex-direction: column;                         
    gap: 20px;
}







        
    </style>
@endsection
