<header id="xb-header-area" class="header-area">
    <div class="xb-header stricky">
        <div class="container">
            <div class="header__wrap ul_li_between">
                <div class="header-logo">
                    <a href="/"><img src="assets/img/logo/Logo.png" alt=""></a>
                </div>
                <div class="main-menu__wrap ul_li navbar navbar-expand-lg">
                    <nav class="main-menu collapse navbar-collapse">
                        <ul>
                            <li>
                                <a class="scrollspy-btn" href="#"><span>Buy</span></a>
                            </li>
                            <li>
                                <a class="scrollspy-btn" href="#"><span>Rent</span></a>
                            </li>
                            <li>
                                <a class="scrollspy-btn" href="#"><span>Commercial</span></a>
                            </li>
                            <li>
                                <a class="scrollspy-btn" href="#"><span>New Projects</span></a>
                            </li>
                            <li>
                                <a class="scrollspy-btn" href="#"><span>Find Agent</span></a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="/"><span>Explore</span></a>
                                <ul class="submenu">
                                    <li><a href="index.html"><span>ICO Explore</span></a></li>
                                    <li><a href="home-2.html"><span>Crypto Explore</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="scrollspy-btn" href="#"><span>Mortgages</span></a>
                            </li>
                        </ul>
                    </nav>
                    <div class="xb-header-wrap">
                        <div class="xb-header-menu">
                            <div class="xb-header-menu-scroll">
                                <div class="xb-menu-close xb-hide-xl xb-close"></div>
                                <div class="xb-logo-mobile xb-hide-xl">
                                    <a href="/" rel="home"><img src="assets/img/logo/Logo.png" alt=""></a></div>
                                <div class="xb-header-mobile-search xb-hide-xl">
                                    <form role="search" action="#">
                                        <input type="text" placeholder="Search..." name="s" class="search-field">
                                    </form>
                                </div>
                                <nav class="xb-header-nav">
                                    <ul class="xb-menu-primary clearfix">
                                        <li class="menu-item">
                                            <a class="scrollspy-btn" href="#"><span>Buy</span></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="scrollspy-btn" href="#"><span>Rent</span></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="scrollspy-btn" href="#"><span>Commercial</span></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="scrollspy-btn" href="#"><span>New Projects</span></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="scrollspy-btn" href="#"><span>Find Agent</span></a>
                                        </li>
                                        <li class="menu-item menu-item-has-children">
                                            <a href="/"><span>Explore</span></a>
                                            <ul class="sub-menu">
                                                <li class="menu-item"><a href="index.html"><span>ICO Explore</span></a></li>
                                                <li class="menu-item"><a href="home-2.html"><span>Crypto Explore</span></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="xb-header-menu-backdrop"></div>
                    </div>
                </div>

<div
class="header-last-btn"
>
    <div class="header-btn-one ul_li">
        <a class="btc-btn" href="#">
            
            <img src="assets/img/icon/hero-icon01.svg" alt="">
            (BTC)
            <img class="header-arrow-img" src="assets/img/home/arrow.png" alt="">
        </a>
        <ul class="">
            <li><img src="assets/img/icon/hero-icon01.svg" alt="">(BTC)</li>
            <li><img src="assets/img/icon/hero-icon02.svg" alt="">(ETH)</li>
            <li><img src="assets/img/icon/hero-icon03.svg" alt="">(XRP)</li>
            <li><img src="assets/img/icon/hero-icon04.svg" alt="">(USDT)</li>
        </ul>
    
    </div>
    
    <div class="header-btn ul_li">
        <a class="login-btn" href="#!"><i class="fas fa-user"></i> Login</a>
        <div class="header-bar-mobile side-menu d-lg-none ml-20">
            <a class="xb-nav-mobile" href="javascript:void(0);"><i class="far fa-bars"></i></a>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
</header>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const BTCBtn = document.querySelector(".btc-btn");
    const listItems = document.querySelectorAll(".header-btn-one ul li");

    listItems.forEach(item => {
        item.addEventListener("click", function (event) {
            event.stopPropagation(); 

            let selectedIcon = item.querySelector("img").src;
            let selectedText = item.textContent.trim();


            BTCBtn.innerHTML = `<img src="${selectedIcon}" alt=""> ${selectedText} <img class="header-arrow-img" src="assets/img/home/arrow.png" alt="">`;


            document.querySelector(".header-btn-one ul").style.display = "none";
        });
    });

    // Show the list when clicking the button
    BTCBtn.addEventListener("click", function (event) {
        event.stopPropagation();
        const dropdown = document.querySelector(".header-btn-one ul");
        dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
    });

    // Close dropdown when clicking outside
    document.addEventListener("click", function () {
        document.querySelector(".header-btn-one ul").style.display = "none";
    });
});

</script>