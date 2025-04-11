
<div class="container">
    <form action="{{ route('holiday-properties.index') }}" method="GET">
        @csrf
        <input type="hidden" name="no_of_rooms" id="selectedRooms" value=""> 
        <input type="hidden" name="no_of_bathroom" id="selectedBathrooms" value="">
        <div class="property-filter-box">
            
            <div class="property-filter property-filter-header">
                <button type="submit" class="search-button-property">
                    <img src="{{ asset('assets/img/property/search.png') }}" alt="search">
                </button>
                <input type="text" placeholder="City, community or building" value="" name="search">
            </div>

            <div class="property-filter-two">
                <div class="back-filter-box" onclick="window.location.href='/'">
                    <img class="back-filter-img" src="{{ asset('assets/img/home/return-icon.svg') }}"
                        alt="arrow">

                </div>
                <div class="property-filter-select">
                    <img class="property-filter-img" src="{{ asset('assets/img/home/arrow.png') }}" alt="arrow">
                    <p class="filter-badge">NEW</p>
                    <select name="filter_type" class="form-select" id="filter_type">
                        <option value="">Select Type</option>
                        <option value="rent">Rent</option>
                        <option value="buy">Buy</option>
                        <option value="new_projects">New Projects</option>
                        <option value="commercial">Commercial</option>
                    </select>
                </div>



                <!-- Price Filter -->
                <div class="property-filter-select">
                    <img class="property-filter-img" src="{{ asset('assets/img/home/arrow.png') }}" alt="arrow">
                    <button class="Price-button" type="button" id="priceToggle">Price</button>
                </div>

                
                <!-- Price Filter -->
                <div id="bedsBathsToggle" class="property-filter-select">
                    <img class="property-filter-img" src="{{ asset('assets/img/home/arrow.png') }}" alt="arrow">
                    <button class="Price-button" type="button" id="priceToggle">Beds & Baths</button>
                </div>
    


    

                <button class="property-filter-button" type="submit">Find</button>


                {{-- !-- Price Dropdown --> --}}
                <div class="dropdown-dialog" id="priceDropdown">

                    <div class="dropdown-dialog-content">
                        <div class="dropdown-dialog-content-one">
                            <p>Minimum Price</p>
                            <div class="black-dropdown">
                                <img class="property-filter-img" src="{{ asset('assets/img/home/arrow.png') }}"
                                    alt="arrow">
                                <select name="min_price" class="price-dropdown form-select">
                                    <option value="" selected>Min. price</option>
                                    @foreach ($priceRange['steps'] as $price)
                                        <option value="{{ $price }}">{{ $price }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="dropdown-dialog-content-one">
                            <p>Maximum Price</p>
                            <div class="black-dropdown">
                                <img class="property-filter-img" src="{{ asset('assets/img/home/arrow.png') }}"
                                    alt="arrow">
                                <select name="max_price" class="price-dropdown form-select">
                                    <option value="" selected>Max. price</option>
                                    @foreach ($priceRange['steps'] as $price)
                                        <option value="{{ $price }}">{{ $price }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="done-btn"
                        onclick="closeDropdowntwo('priceDropdown')">Done</button>
                </div>

                <!-- Beds & Baths Dropdown -->
                <div class="beds-baths-dropdown" id="bedsBathsDropdown">
                    <p>Bedroom</p>
                    <div class="beds-baths-options">
                        @foreach ($noOfRooms as $room)
                            <button type="button" class="room-option"
                                data-value="{{ $room }}">{{ $room }}</button>
                        @endforeach
                    </div>

                    <p>Bathroom</p>
                    <div class="beds-baths-options">
                        @foreach ($noOfBathrooms as $bathroom)
                            <button type="button" class="bath-option"
                                data-value="{{ $bathroom }}">{{ $bathroom }}</button>
                        @endforeach
                    </div>

                    <button type="button" class="done-btn" onclick="closeDropdown()">Done</button>
                </div>



            </div>
        </div>
    </form>
</div>


<style>
    ul {
    list-style-type: none;  
    padding: 0;            
    margin: 0;              
}

ul li {
    margin: 0;              
    padding: 0;            
}

.property-filter .search-button-property {
    position: absolute;
    left: 4px;
    top: 0.7px;
    bottom: 0;
    margin: auto;
    width: fit-content;
    height: fit-content;
    background: none;
    display: flex
;
    border-radius: 50% 0 0 50%;
    justify-content: center;
    align-items: center;
    height: 43px;
    padding: 10px 8px;
    align-content: center;
}


.widget__title {
text-align: start;
}


.beds-baths-dropdown {
    position: absolute;
    width: 388px;
    height: fit-content;
    top: 57px;
    left: 40%;
    background: #000;
    border-radius: 5px;
    border: 1px solid #c1c7de;
    padding: 20px;
    display: none;
    z-index: 100;
}


@media (max-width: 700px) {
    .property-filter {
        width: 60%;
    }

    .filter-button {
        right: 2%;
    }
}
@media (max-width: 700px) {
    .property-filter {
        width: 60%;
    }

    .filter-button {
        right: 2%;
    }


    .property-filter img {
        filter: brightness(0) invert(1); 
    }
    

    .property-filter .search-button-property {
        position: absolute;
        left: 2px;
        top: 0.7px;
        bottom: 0;
        margin: auto;
        width: fit-content;
        height: fit-content;
        background: #2dd98f;
        display: flex
    ;
        border-radius: 50% 0 0 50%;
        justify-content: center;
        align-items: center;
        height: 43px;
        padding: 10px 8px;
        align-content: center;
    }
    
    


}

</style>

<script>
        document.addEventListener("DOMContentLoaded", function() {

document.getElementById("bedsBathsToggle").addEventListener("click", function() {
    document.getElementById("bedsBathsDropdown").classList.toggle("active");
});


document.querySelectorAll(".room-option").forEach(button => {
    button.addEventListener("click", function() {
        document.querySelectorAll(".room-option").forEach(btn => btn.classList.remove(
            "active"));
        this.classList.add("active");
        document.getElementById("selectedRooms").value = this.getAttribute(
            "data-value");
    });
});

document.querySelectorAll(".bath-option").forEach(button => {
    button.addEventListener("click", function() {
        document.querySelectorAll(".bath-option").forEach(btn => btn.classList.remove(
            "active"));
        this.classList.add("active");
        document.getElementById("selectedBathrooms").value = this.getAttribute(
            "data-value");
    });
});
});


function closeDropdown() {
            document.getElementById("bedsBathsDropdown").classList.remove("active");
        }

</script>