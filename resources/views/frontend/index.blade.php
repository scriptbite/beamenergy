@extends('frontend.layout.app')

@section('content')
<!-- Hero Section -->
<section id="hero" class="hero section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                    <div class="company-badge mb-4" style="display: none;">
                        <i class="bi bi-brightness-high-fill me-2"></i>
                        Every Sun Beam Can Bright Up Your Life
                    </div>

                    <h1 class="mb-4">
                        Every Sun Beam  <br>
                        <span class="accent-text">Can Bright Up Your Life</span>
                    </h1>

                    <p class="mb-4 mb-md-5">
                        Beam Energy is a solar company that provides solar solutions at affordable price with 24/7 technical support and maintenance.
                    </p>

                    <div class="hero-buttons">
                        <a href="{{ route('get_quote') }}" class="btn btn-primary me-0 me-sm-2 mx-1">Get Quote</a>
                        {{-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="btn btn-link mt-2 mt-sm-0 glightbox">
                        <i class="bi bi-play-circle me-1"></i>
                        Play Video
                        </a> --}}
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                    <img src="{{ asset('themes/ilanding') }}/assets/img/banner-20250128.webp" alt="Beam Energy" class="img-fluid">

                    <div class="customers-badge" style="display: none;">
                        <div class="customer-avatars">
                        <img src="{{ asset('themes/ilanding') }}/assets/img/avatar-1.webp" alt="Customer 1" class="avatar">
                        <img src="{{ asset('themes/ilanding') }}/assets/img/avatar-2.webp" alt="Customer 2" class="avatar">
                        <img src="{{ asset('themes/ilanding') }}/assets/img/avatar-3.webp" alt="Customer 3" class="avatar">
                        <img src="{{ asset('themes/ilanding') }}/assets/img/avatar-4.webp" alt="Customer 4" class="avatar">
                        <img src="{{ asset('themes/ilanding') }}/assets/img/avatar-5.webp" alt="Customer 5" class="avatar">
                        <span class="avatar more">12+</span>
                        </div>
                        <p class="mb-0 mt-2">12,000+ lorem ipsum dolor sit amet consectetur adipiscing elit</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section><!-- /Hero Section -->
@endsection
