@extends('frontend.layout.app')

@section('styles')
    <style>
        .hidden {
            display: none !important;
        }
        @media (max-width: 767px) { /* Example breakpoint - adjust as needed */
            .hidden {
                display: none !important; /* !important may or may not help */
            }
        }
    </style>
@endsection

@section('content')



    <!-- Contact Section -->
    <section id="contact" class="contact page-title light-background">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Get Quotation For Your Personalized Solar System</h2>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            @include('frontend.layout.alerts')
            <div class="row g-4 g-lg-5 justify-content-center">
                <div class="col-lg-5" data-aos="fade-up">
                    <h2 class="faq-title">Have a question? Check out the FAQ</h2>
                    <p class="faq-description">Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero sit amet adipiscing sem neque sed ipsum.</p>
                    <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
                        <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z" fill="currentColor"></path>
                        </svg>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                        <h4>Enter your Personal details!</h4>
                        <hr>
                        <form id="form-get-quote" action="{{ route('quote.step1.submit') }}" method="post" class="text-start" data-aos="fade-up" data-aos-delay="200">
                            @csrf
                            <!-- Select Category -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="full_name" class="form-label">Full Name <span class="text-red">*</span></label>
                                    <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Enter your full name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="mobile" class="form-label">Mobile Number <span class="text-red">*</span></label>
                                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter your mobile number" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="pincode" class="form-label">Pincode <span class="text-red">*</span></label>
                                    <input type="text" name="pincode" id="pincode" class="form-control" placeholder="Enter 6 digit pincode" required>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Save & Next</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Contact Section -->


    <!-- Modal -->
    <div class="modal fade" id="modal-calculate-kwa" tabindex="-1" aria-labelledby="modal-calculate-kwa-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-calculate-kwa-label">Calculate Capacity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3 d-flex justify-content-center text-center">
                        <div class="col-md-auto ">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="calculate_kwa_type" id="calculate_by_bill" value="by_bill" checked>
                                <label class="form-check-label" for="calculate_by_bill">By Monthly Bill</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="calculate_kwa_type" id="calculate_by_unit" value="by_unit">
                                <label class="form-check-label" for="calculate_by_unit">By Monthly Units</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3 d-flex align-items-center by-bill">
                        <div class="col-6 text-center">
                            <label for="monthly_bill_summer" class="form-label">Summer Bill</label>
                            <input type="tel" class="form-control text-center form-control-lg" id="monthly_bill_summer" placeholder="₹1000" onfocus="this.placeholder = ''" onblur="this.placeholder = '₹1000'">
                        </div>
                        <div class="col-6 text-center">
                            <label for="monthly_bill_winter" class="form-label">Winter Bill</label>
                            <input type="tel" class="form-control text-center form-control-lg" id="monthly_bill_winter" placeholder="₹1000" onfocus="this.placeholder = ''" onblur="this.placeholder = '₹1000'">
                        </div>
                    </div>
                    <hr class="by-bill">
                    <div class="row mb-3 d-flex justify-content-center by-bill">
                        <div class="col-6 text-center">
                            <label for="monthly_bill_average" class="form-label">Average Bill</label>
                            <input type="text" class="form-control text-center form-control-lg" id="monthly_bill_average" placeholder="₹0" readonly disabled>
                        </div>
                        <div class="col-6 text-center">
                            <label for="monthly_units" class="form-label">Units Per Month</label>
                            <input type="text" class="form-control text-center form-control-lg" id="monthly_units" placeholder="0" readonly disabled>
                        </div>
                    </div>

                    <div class="row mb-3 d-flex align-items-center by-unit">
                        <div class="col-6 text-center">
                            <label for="monthly_unit_summer" class="form-label">Summer Units</label>
                            <input type="tel" class="form-control text-center form-control-lg" id="monthly_unit_summer" placeholder="100" onfocus="this.placeholder = ''" onblur="this.placeholder = '100'">
                        </div>
                        <div class="col-6 text-center">
                            <label for="monthly_unit_winter" class="form-label">Winter Units</label>
                            <input type="tel" class="form-control text-center form-control-lg" id="monthly_unit_winter" placeholder="100" onfocus="this.placeholder = ''" onblur="this.placeholder = '100'">
                        </div>
                    </div>
                    <hr class="by-unit">
                    <div class="row mb-3 d-flex justify-content-center by-unit">
                        <div class="col-md-6 text-center">
                            <label for="average_monthly_units" class="form-label">Average Units</label>
                            <input type="text" class="form-control text-center form-control-lg" id="average_monthly_units" placeholder="0" readonly disabled>
                        </div>
                    </div>

                    <hr>
                    <div class="row mb-3 d-flex justify-content-center">
                        <div class="col-md-6 text-center">
                            <label for="calculated-kwa" class="form-label">Required kW</label>
                            <input type="text" class="form-control text-center form-control-lg" id="calculated-kwa" placeholder="0" readonly disabled>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" id="btn-clear-calculater-kwa">Clear</button>
                    <button type="button" class="btn btn-primary" onclick="javascript:selectCalculatedKWA();">Select</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
@endsection
