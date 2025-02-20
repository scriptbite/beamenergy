@extends('frontend.layout.app')

@section('style')
    <style>
        .select2-results__options {
            max-height: 400px;
            overflow-y: auto;
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
    </style>
@endsection

@section('content')

<!-- Contact Section -->
<section id="contact" class="contact page-title  light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Get Free Survey Visit</h2>
      <p>Every Sun Beam Can Bright Up Your Life</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        @include('frontend.layout.alerts')
      <div class="row g-4 g-lg-5">
        <div class="col-lg-5">
          <div class="info-box" data-aos="fade-up" data-aos-delay="200">
            <h3>Contact Info</h3>
            <p>Beam Energy <sup>TM</sup></p>

            <div class="info-item text-start">
              <div class="icon-box">
                <i class="bi bi-geo-alt"></i>
              </div>
              <div class="content">
                <h4>Our Location</h4>
                <p>Nehru Chowk,</p>
                <p>Gondia, MH 441601</p>
              </div>
            </div>

            <div class="info-item text-start">
              <div class="icon-box">
                <i class="bi bi-telephone"></i>
              </div>
              <div class="content">
                <h4>Phone Number</h4>
                <p><a href="tel:+918823882366">+91 8823 8823 66</a></p>
              </div>
            </div>

            <div class="info-item text-start">
              <div class="icon-box">
                <i class="bi bi-envelope"></i>
              </div>
              <div class="content">
                <h4>Email Address</h4>
                <p><a href="mailto:beamenergy@hotmail.com">beamenergy@hotmail.com</a></p>
                <p><a href="mailto:info@beamenergy.co.in">info@beamenergy.co.in</a></p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
            <h3>Book a Free Survey Visit Today!</h3>
            <p>Our experts are here to help you with personalized advice—schedule at your convenience, no commitments.</p>

            <form id="form-survey-request" action="{{ route('survey.request.save') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                @csrf
                <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="full_name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6">
                    <input type="text" name="mobile" class="form-control" placeholder="Your Mobile Number" required="">
                </div>

                <div class="col-md-12 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email (Optional)">
                </div>

                <div class="col-md-6">
                    <input type="text" name="pincode" class="form-control" placeholder="Your Pincode" required="">
                </div>

                <div class="col-md-6">
                    {{--<input type="text" name="city" class="form-control" placeholder="Your City" required="">--}}
                    <select class="form-control select2" name="city" id="city" data-placeholder="Select City" required="">
                        <option></option>
                        <optgroup label="Maharashtra">
                            @forelse($resultActivesCities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @empty
                            @endforelse
                        </optgroup>
                    </select>
                </div>

                <div class="col-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit" class="btn">Submit Request</button>
                </div>

              </div>
            </form>

          </div>
        </div>

      </div>

    </div>

  </section><!-- /Contact Section -->

@endsection

@section('scripts')
    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#city').select2({
                theme: 'bootstrap-5',  // Optionally, apply Bootstrap 5 styling to select2
            });
            // Initialize jQuery Validation on the form
            $("#form-survey-request").validate({
                rules: {
                    full_name: {
                        required: true,  // Name field is required
                        minlength: 3     // Name should have at least 3 characters
                    },
                    email: {
                        email: true      // Email should be in a valid format
                    },
                    mobile: {
                        required: true,    // Phone field is required
                        digits: true,      // Phone should contain only digits
                        minlength: 10,     // Phone should be at least 10 digits
                        maxlength: 10      // Phone should not exceed 15 digits
                    },
                    pincode: {
                        required: true,
                        digits: true,
                        minlength: 6,
                        maxlength: 6
                    },
                    city: {
                        required: true,
                    }
                },
                messages: {
                    full_name: {
                        required: "Please enter your full name",
                        minlength: "Full name must be at least 3 characters long"
                    },
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    },
                    mobile: {
                        required: "Please enter your mobile number",
                        digits: "Please enter a valid mobile number",
                        minlength: "Mobile number must be exactly 10 digits",
                        maxlength: "Mobile number must be exactly 10 digits"
                    },
                    pincode: {
                        required: "Please enter your pincode",
                        digits: "Pincode must be numeric",
                        minlength: "Pincode must be exactly 6 digits",
                        maxlength: "Pincode must be exactly 6 digits"
                    },
                    city: {
                        required: "Please select your city",
                    }
                },
                // Apply custom styles after validation
                highlight: function (element) {
                    $(element).addClass('is-invalid');  // Add invalid class to select2 container
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');  // Remove invalid class when valid
                },
                errorPlacement: function (error, element) {
                    if (element.hasClass('select2')) {
                        error.insertAfter(element.next('.select2-container')); // Place error after select2 container
                    } else {
                        error.insertAfter(element); // Default placement
                    }
                },
                submitHandler: function (form) {
                    // alert("Form is valid and ready to be submitted!");
                    form.submit();
                }
            });
        });

    </script>
@endsection
