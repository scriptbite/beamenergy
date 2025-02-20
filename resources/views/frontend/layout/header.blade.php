<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="{{ route('home')}}" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img class="mobile-logo" src="{{ asset('themes/ilanding') }}/assets/img/logo.png" alt="">
            {{-- <h1 class="sitename">BeamEnergy</h1> --}}
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('home')}}" class="active">Home</a></li>

                {{--<li><a href="#">Products</a></li>
                <li><a href="#">Services</a></li>--}}
                {{-- <li><a href="#">PM Surya Ghar</a></li> --}}
                {{--<li><a href="#">About Us</a></li>
                <li><a href="#">Careers</a></li>--}}
                {{--<li><a href="{{ route('book.book_now') }}">Book Now</a></li>--}}
                <li><a href="{{ route('survey.request') }}">Contact Us</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted text-center" href="" onclick="alert('🔜 Launching Soon! Be the first to go solar—get your quote today!\n\n💡 Use our solar calculator to estimate your savings\n📞 Contact our sales team for personalized assistance');">Book Now</a>

    </div>
</header>
