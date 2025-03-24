@extends('layouts.front-office.app')

@section('content')
<section 
style="background: #080B18;"
class="blog pt-50 pb-50">
    <div class="container">

        <div class="property-filter-box">
            <div class="property-filter">
                <img src="assets/img/property/search.png" alt="search">
                <input placeholder="City, community or building" type="text">
            </div>

            <div class="property-filter-two">
                <div class="property-filter-select">
                    <img class="property-filter-img" src="assets/img/home/arrow.png" alt="">
                    <p class="filter-badge">NEW</p>
                    <select name="cars" id="cars">
                        <option value="Buy">Buy</option>
                    </select>
                </div>
                <div class="property-filter-select">
                    <img class="property-filter-img" src="assets/img/home/arrow.png" alt="">
                    <select name="cars" id="cars">
                        <option value="Buy">Property type</option>
                    </select>
                </div>
                <div class="property-filter-select">
                    <img class="property-filter-img" src="assets/img/home/arrow.png" alt="">
                    <select name="cars" id="cars">
                        <option value="Buy">Beds & Baths</option>
                    </select>
                </div>
                <div class="property-filter-select">
                    <img class="property-filter-img" src="assets/img/home/arrow.png" alt="">
                    <select name="cars" id="cars">
                        <option value="Buy">Price</option>
                    </select>
                </div>
                <div class="property-filter-select">
                    <img class="property-filter-img" src="assets/img/home/arrow.png" alt="">
                    <select name="cars" id="cars">
                        <option value="Buy">More Filters</option>
                    </select>
                </div>
                <button class="property-filter-button">
                    Find
                </button>

            </div>
        </div>
    </div>
</section>


<div style="background: #0B0F28;
padding: 50px 0;
">
    <div 
    class="container">

    <div class="page-path-line">
        <img src="assets/img/propertydetails/arrow-left.png" alt="home">
        <p>Home</p>
        <p>/ Property Listing</p>
        <p class="active-path-line">/ Bespoke Upgrades  |  Extended  |  Vacant</p>
    </div>
    
    
    <div
    style="display: flex;
    gap:20px;"
    >
        <div style="width: 40%;">
            <img src="assets/img/propertydetails/img-one.png" alt="home">
            <img src="assets/img/propertydetails/img-one.png" alt="home">
            <img src="assets/img/propertydetails/img-one.png" alt="home">
            <img src="assets/img/propertydetails/img-one.png" alt="home">

        </div>
        <div style="width: 60%;">

        </div>
    </div>






















    </div>
</div>

@endsection
