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

    {{$holidayProperty->photos}}
    <div style="background: #0B0F28;
            padding: 1px 0;
            ">
        <div class="container">
            <div onclick="window.location.href='/properties'" class="page-path-line">
                <img src="{{ asset('assets/img/propertydetails/arrow-left.png') }}" alt="home">
                <p>Home</p>
                <p>/ Property Listing</p>
                <p class="active-path-line">/ Bespoke Upgrades | Extended | Vacant</p>
            </div>
            <div class="grid-img-container">


                
                
                

              
            </div>



        </div>
    </div>





    <!-- Leaflet.js CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var latitude = {{ $property->latitude }};
            var longitude = {{ $property->longitude }};

            var map = L.map('map').setView([latitude, longitude], 15); // Zoom level 15

            // Load OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Add a marker at the location
            L.marker([latitude, longitude]).addTo(map)
                .bindPopup("Property Location")
                .openPopup();
        });

        document.addEventListener("DOMContentLoaded", function() {
            const video = document.getElementById("propertyVideo");
            const playButton = document.getElementById("playButton");

            playButton.addEventListener("click", function() {
                video.play();
                playButton.style.display = "none";
            });
        });





        document.addEventListener("DOMContentLoaded", function() {
            var swiper;

            window.openSwiperPopup = function() {
                document.getElementById("imagePopup").style.display = "flex";

                if (!swiper) {
                    swiper = new Swiper(".mySwiper", {
                        loop: true,
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                        autoplay: {
                            delay: 3000,
                        },
                        on: {
                            slideChange: function() {
                                document.getElementById("current-slide").textContent = this
                                    .realIndex + 1;
                                updateActiveThumbnail(this.realIndex);
                            },
                        },
                    });
                }
                updateActiveThumbnail(swiper.realIndex); // Ensure correct initial border
            };

            window.closeSwiperPopup = function() {
                document.getElementById("imagePopup").style.display = "none";
            };

            function updateActiveThumbnail(activeIndex) {
                const thumbnails = document.querySelectorAll(".popup-small-img img");

                thumbnails.forEach((thumb, index) => {
                    if (index === activeIndex) {
                        thumb.classList.add("active-thumbnail");
                    } else {
                        thumb.classList.remove("active-thumbnail");
                    }
                });
            }
        });


        document.addEventListener("DOMContentLoaded", function() {
            const scrollContainer = document.querySelector(".popup-small-img");

            let isHolding = false;
            let speed = 5; // Adjust scrolling speed

            // Function to scroll while holding
            function scrollLeft() {
                if (isHolding) {
                    scrollContainer.scrollLeft -= speed;
                    requestAnimationFrame(scrollLeft);
                }
            }

            function scrollRight() {
                if (isHolding) {
                    scrollContainer.scrollLeft += speed;
                    requestAnimationFrame(scrollRight);
                }
            }

            scrollContainer.addEventListener("mousedown", (e) => {
                isHolding = true;
                if (e.clientX < window.innerWidth / 2) {
                    scrollLeft();
                } else {
                    scrollRight();
                }
            });

            scrollContainer.addEventListener("mouseup", () => {
                isHolding = false;
            });

            scrollContainer.addEventListener("mouseleave", () => {
                isHolding = false; // Stop scrolling when leaving the container
            });
        });




        document.addEventListener("DOMContentLoaded", function() {
                            
                                let container = document.querySelector(".Description-second-box-one");
                        
                                if (container) {
                               
                                    container.querySelectorAll("p").forEach(p => p.remove());
                                }
                            });

</script> --}}

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
.beds-baths-options button {
    flex: 1 1 calc(25% - 10px); 
    min-width: 120px; 
    padding: 10px;
    text-align: center;
    white-space: nowrap;
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



@media (max-width: 986px) {

    .page-path-line{
    display: none;
}
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
@endsection
