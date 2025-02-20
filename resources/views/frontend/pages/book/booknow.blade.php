@extends('frontend.layout.app')

@section('styles')
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('themes/urbanui') }}/assets/css/bd-wizard.css">

    <style>
        .bd-wizard-step-icon {
            float:left;
        }
        .media-body {
            float:left;
        }
        .wizard .steps > ul li .media-body .bd-wizard-step-title {
            color: #ffffff;
        }
        .wizard .steps > ul li.current .bd-wizard-step-title {
            color: #000000;
        }

        .wizard .steps > ul li a {
            padding: 20px 30px 15px;
        }
        .wizard .content {
             padding: 0;
        }
        .wizard .content .content-wrapper {
             max-width: unset;
             margin-left: unset;
             margin-right: unset;
        }
        .wizard .content .form-control {
            padding: 15px 25px;
            border-radius: 8px;
            max-width: 100%;
        }
        .wizard .content {
            min-height: unset;
        }
        .wizard .actions {
            padding: 0;
        }
        .wizard .actions > ul {
            justify-content: center;
            padding: 20px 10px;
        }
        .contact .contact-form {
            padding: 15px 15px 0px 15px;
        }
        .wizard .actions li a {
            background-color: #ff7a00;
        }
        .select2-container--bootstrap-5 {
            background-color: #ffffff;
        }
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
            <h2>Book Your Solar Now</h2>
            <p>Every Sun Beam Can Bright Up Your Life</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-4 g-lg-5">
                <div class="col-lg-12">
                    <div class="contact-form" data-aos="fade-up" data-aos-delay="300" style="background: var(--accent-color);">
                        <form id="form-survey-request" action="{{ route('book.book_now.store') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200" enctype="multipart/form-data">
                            @csrf
                            <div id="wizard">
                                <h3>
                                    <div class="media">
                                        <div class="bd-wizard-step-icon"><i class="mdi mdi-account-outline"></i></div>
                                        <div class="media-body">
                                            <div class="bd-wizard-step-title">Personal Details</div>
                                            <div class="bd-wizard-step-subtitle">Step 1</div>
                                        </div>
                                    </div>
                                </h3>
                                <section>
                                    <div class="content-wrapper ms-5 me-5">
                                        <h4 class="section-heading">Enter your Personal details </h4>
                                        <div class="row">
                                            <div class="form-group col-md-6 text-start mb-4">
                                                <label for="full_name" class="sr-only">Full Name <span class="text-red">*</span></label>
                                                <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Full Name" required>
                                            </div>
                                            <div class="form-group col-md-6 text-start mb-4">
                                                <label for="phoneNumber" class="sr-only">Phone Number <span class="text-red">*</span> <small>(Enter 10 digit mobile number)</small></label>
                                                <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="Phone Number" maxlength="10" minlength="10" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 text-start mb-4">
                                                <label for="company_name" class="sr-only">Company Name</label>
                                                <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name">
                                            </div>
                                            <div class="form-group col-md-6 text-start mb-4">
                                                <label for="emailAddress" class="sr-only">Email Address</label>
                                                <input type="email" name="emailAddress" id="emailAddress" class="form-control" placeholder="Email Address" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 text-start mb-4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="pincode" class="sr-only">Pincode <span class="text-red">*</span></label>
                                                        <input type="text" name="pincode" id="pincode" class="form-control" placeholder="Pincode" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="state_id" class="sr-only">State <span class="text-red">*</span></label>
                                                        <input type="text" name="state_id" id="state_id" class="form-control" value="Maharashtra" placeholder="Pincode" disabled readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6 text-start mb-4">
                                                <label for="city_id" class="sr-only">City <span class="text-red">*</span></label>
                                                <select class="form-control select2" name="city_id" id="city_id" data-placeholder="Select City" required="">
                                                    <option></option>
                                                    @forelse($resultActivesCities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h3>
                                    <div class="media">
                                        <div class="bd-wizard-step-icon"><i class="mdi mdi-bank"></i></div>
                                        <div class="media-body">
                                            <div class="bd-wizard-step-title">Solar Configurations</div>
                                            <div class="bd-wizard-step-subtitle">Step 2</div>
                                        </div>
                                    </div>
                                </h3>
                                <section>
                                    <div class="content-wrapper">
                                        <h4 class="section-heading">Enter your Employment details </h4>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="designation" class="sr-only">Designation</label>
                                                <input type="text" name="designation" id="designation" class="form-control" placeholder="Designation">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="department" class="sr-only">Department</label>
                                                <input type="text" name="department" id="department" class="form-control" placeholder="Department">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="employeeNumber" class="sr-only">Employee Number</label>
                                                <input type="text" name="employeeNumber" id="employeeNumber" class="form-control" placeholder="Employee Number">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="workEmailAddress" class="sr-only">Work Email Address</label>
                                                <input type="email" name="workEmailAddress" id="workEmailAddress" class="form-control" placeholder="Work Email Address">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h3>
                                    <div class="media">
                                        <div class="bd-wizard-step-icon"><i class="mdi mdi-account-check-outline"></i></div>
                                        <div class="media-body">
                                            <div class="bd-wizard-step-title">Upload Documents </div>
                                            <div class="bd-wizard-step-subtitle">Step 3</div>
                                        </div>
                                    </div>
                                </h3>
                                <section>
                                    <div class="content-wrapper">
                                        <h4 class="section-heading mb-5">Review your Details</h4>
                                        <h6 class="font-weight-bold">Personal Details</h6>
                                        <p class="mb-4"><span id="enteredFirstName">Cha</span> <span id="enteredLastName">Ji-Hun C</span> <br>
                                            Phone: <span id="enteredPhoneNumber">+230-582-6609</span> <br>
                                            Email: <span id="enteredEmailAddress">willms_abby@gmail.com</span></p>
                                        <h6 class="font-weight-bold">Employment Details</h6>
                                        <p class="mb-0"><span id="enteredDesignation">Junior Developer</span> - <span id="enteredDepartment">UI Development</span> <br>
                                            Phone: <span id="enteredEmployeeNumber">JDUI36849</span> <br>
                                            Email: <span id="enteredWorkEmailAddress">willms_abby@company.com</span></p>
                                    </div>
                                </section>
                                <h3>
                                    <div class="media">
                                        <div class="bd-wizard-step-icon"><i class="mdi mdi-emoticon-outline"></i></div>
                                        <div class="media-body">
                                            <div class="bd-wizard-step-title">Payment & Order</div>
                                            <div class="bd-wizard-step-subtitle">Step 4</div>
                                        </div>
                                    </div>
                                </h3>
                                <section>
                                    <div class="content-wrapper">
                                        <h4 class="section-heading mb-5">Accept agreement and Submit</h4>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                                                I hereby declare that I had read all the <a href="#!">terms and conditions</a>  and all the details provided my me in this form are true.
                                            </label>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Contact Section -->

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>--}}
    <script src="{{ asset('themes/urbanui') }}/assets/js/jquery.steps.min.js"></script>
    <script src="{{ asset('themes/urbanui') }}/assets/js/bd-wizard.js"></script>
    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#city_id').select2({
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
