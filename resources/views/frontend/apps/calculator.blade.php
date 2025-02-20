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
        .form-check-input:checked {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }
    </style>
@endsection

@section('content')

    <!-- Contact Section -->
    <section id="contact" class="contact page-title  light-background">

        <!-- Section Title -->
        <div class="container section-title">
            <h2>Design Your Personalized Solar System</h2>
        </div><!-- End Section Title -->

        <div class="container">
            @include('frontend.layout.alerts')
            <div class="row g-4 g-lg-5 justify-content-center">
                <div class="col-lg-5">
                    <div class="contact-form">
                        <h4>Enter your details</h4>
                        <hr>
                        <form id="form-get-quote" class="text-start">
                            <fieldset id="fieldset-personal-details">
                                <!-- Select Category -->
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="full_name" class="form-label">Full Name <span class="text-red">*</span></label>
                                        <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Enter your full name" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-8">
                                        <label for="mobile" class="form-label">Whatsapp Number <span class="text-red">*</span></label>
                                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter your mobile number" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-8">
                                        <label for="pincode" class="form-label">Pincode <span class="text-red">*</span></label>
                                        <input type="text" name="pincode" id="pincode" class="form-control" placeholder="Enter 6 digit pincode" required>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="row mb-3 d-flex align-items-end">
                                    <div class="col-md-12 text-end">
                                        <button type="button" class="btn btn-primary-2 px-4" id="btn-save-and-next">Next</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact-form">
                        <h4>Select and Customize Your Solar System</h4>
                        <hr>
                        <form id="form-get-quote-2" action="{{ route('get_quote.submit') }}" method="post">
                            <fieldset id="fieldset-calculator" disabled style="opacity: 0.5;">
                                @csrf
                                <input id="hidden-full-name" type="hidden" name="full_name">
                                <input id="hidden-mobile" type="hidden" name="mobile">
                                <input id="hidden-pincode" type="hidden" name="pincode">
                                <!-- Select Category -->
                                <div class="row mb-3 d-flex align-items-center">
                                    <div class="col-md-5 text-start">
                                        <label for="category_id" class="form-label">Select Setup Category</label>
                                    </div>
                                    <div class="col-md-7 justify-content-end">
                                        <select id="category_id" name="category_id" class="form-select py-2">
                                            <option value="1">Residential</option>
                                            <option value="2">Housing Society</option>
                                            <option value="3">Commercial</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Select Power -->
                                <div class="row mb-3 d-flex align-items-center">
                                    <div class="col-md-5 text-start">
                                        <label for="capacity_id" class="form-label">Select Solar Capacity</label>
                                    </div>
                                    <div class="col-md-4 justify-content-start">
                                        <select id="capacity_id" name="capacity_id" class="form-select py-2">
                                            <option value="" selected>Select</option>
                                            @forelse($resultActiveCapacities as $capacity)
                                                <option value="{{ $capacity->id }}" class="type-{{ $capacity->type }}" data-power="{{ $capacity->power }}" data-base-price="{{ $capacity->base_price }}" data-subsidy="{{ $capacity->subsidy }}" data-phase="{{ $capacity->phase }}">{{ $capacity->name }} - {{ ucfirst($capacity->phase). ' Phase' }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-md-3 justify-content-start">
                                        <a href="" class="btn btn-outline-primary-2 btn-sm mt-3 mt-lg-0 mt-md-0 float-start" data-bs-toggle="modal" data-bs-target="#modal-calculate-kwa">Calculate Capacity</a>
                                    </div>
                                </div>

                                <!-- Claim Subsidy Checkbox -->
                                <div class="row mb-3 d-flex align-items-center block-subsidy-select">
                                    <div class="col-md-5 text-start">
                                        <label for="subsidy_option" class="form-label">Subsidy Option</label>
                                    </div>
                                    <div class="col-md-7 justify-content-start text-start">
                                        <div class="form-check">
                                            <input type="checkbox" id="subsidy_option" name="subsidy_option" class="form-check-input" checked>
                                            <label for="subsidy_option" class="form-check-label">Claim Subsidy <small>(PM Surya Ghar Yojana 2024)</small></label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Panel Type Radio Buttons -->
                                <div class="row mb-3 d-flex align-items-center hidden">
                                    <div class="col-md-5 text-start">
                                        <label class="form-label">Select Panel Technology</label>
                                    </div>
                                    <div class="col-md-7 justify-content-start text-start">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="technology" id="technology_bifacial" value="bifacial" checked>
                                            <label class="form-check-label" for="technology_bifacial">Bifacial</label>
                                        </div>
                                        <div class="form-check form-check-inline" style="display: none;">
                                            <input class="form-check-input" type="radio" name="technology" id="technology_top_con" value="topcon">
                                            <label class="form-check-label" for="technology_top_con">TOPCon</label>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <br>
                                <div class="row mb-3 d-flex align-items-center">
                                    <table class="table table-bordered text-center align-middle">
                                        <thead class="table-light">
                                        <tr>
                                            <th class="text-start ps-3">Particular</th>
                                            <th>Quantity</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-start ps-3">
                                                <select id="panel_id" name="panel_id" class="form-select form-select-sm w-100 fs-6 py-2">

                                                </select>
                                            </td>
                                            <td><span id="quantity-panels">0</span> nos</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start ps-3">
                                                <select id="inverter_id" name="inverter_id" class="form-select form-select-sm w-100 fs-6 py-2">

                                                </select>
                                            </td>
                                            <td>1 no.</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start ps-3">Galvanized Iron Solar Module Structure</td>
                                            <td>1 Set</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start ps-3">AC & DC Distribution Box and Cables</td>
                                            <td>1 Lot</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start ps-3">Complete Earthing Setup with Lighting Arrester</td>
                                            <td>1 Lot</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start ps-3">Other Accessories required to install</td>
                                            <td>Included</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>

                                <!-- Submit Button -->
                                <div class="row mb-3 d-flex align-items-center">
                                    <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-primary-2" id="btn-get-quote">Get Quote</button>
                                    </div>
                                </div>
                                <hr>
                                <div id="quote-section" style="display: none;">
                                    <div class="row mb-3 d-flex align-items-center">
                                        <div class="col-6 col-md-6 text-end">Project Cost</div>
                                        <div class="col-6 col-md-6 text-start"><span id="quote-total-project-price-without-gst"></span></div>
                                    </div>
                                    <div class="row mb-3 d-flex align-items-center">
                                        <div class="col-6 col-md-6 text-end">GST</div>
                                        <div class="col-6 col-md-6 text-start"><span id="quote-gst-amount"></span></div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3 d-flex align-items-center text-color-accent">
                                        <div class="col-6 col-md-6 text-end fw-bold fs-5">Total Project Price</div>
                                        <div class="col-6 col-md-6 text-start fw-bold fs-5"><span id="quote-total-project-price"></span></div>
                                    </div>
                                    <div class="row mb-3 d-flex align-items-center block-subsidy">
                                        <div class="col-6 col-md-6 text-end">Government Subsidy</div>
                                        <div class="col-6 col-md-6 text-start"><span id="quote-subsidy-amount"></span></div>
                                    </div>
                                    <hr class="block-subsidy">
                                    <div class="row mb-3 d-flex align-items-center block-subsidy">
                                        <div class="col-6 col-md-6 text-end">After Subsidy Total Investment</div>
                                        <div class="col-6 col-md-6 text-start"><span id="quote-after-subsidy-cost"></span></div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="row mb-3 d-flex align-items-end">
                                        <div class="col-md-12 text-end">
                                            <button type="submit" class="btn btn-primary-2">Request Quotation</button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
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

    <script>
        $(document).ready(function () {
            // Initialize jQuery Validation on the form
            $("#form-get-quote").validate({
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

            $('#btn-save-and-next').click(function () {
                if($('#form-get-quote').valid()) {
                    $('#fieldset-personal-details').attr('disabled', 'disabled');
                    $('#fieldset-personal-details').css('opacity', '0.5');

                    $('#fieldset-calculator').removeAttr('disabled');
                    $('#fieldset-calculator').css('opacity', '1');

                    //Set values for hidden attrs
                    $('#hidden-full-name').val($('#full_name').val());
                    $('#hidden-mobile').val($('#mobile').val());
                    $('#hidden-pincode').val($('#pincode').val());
                } else {
                    $('#fieldset-personal-details').removeAttr('disabled');
                    $('#fieldset-personal-details').css('opacity', '1');

                    $('#fieldset-calculator').attr('disabled', 'disabled');
                    $('#fieldset-calculator').css('opacity', '0.5');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            //Init
            $('#btn-get-quote').click(function () {
                if(validate_form()) {
                    calculate_final_quote();
                    //$('#quote-section').css('display', 'block').hide().slideDown(500);
                    $('#quote-section').css('display', 'block').hide().slideDown(500);
                } else {
                    $('#quote-section').css('display', 'none');
                }

            });

            $('#panel_id, #capacity_id').change(function () {
                var capacity = parseInt($("#capacity_id").find('option:selected').data('power')) || 0;
                var panel_power = parseInt($("#panel_id").find('option:selected').data('power')) || 0;
                if(panel_power > 0 && capacity > 0) {
                    var quantity_panels = Math.round(capacity / panel_power) || 0;
                    $('#quantity-panels').text(parseInt(quantity_panels));
                } else {
                    $('#quantity-panels').text(0);
                    $('#quote-section').css('display', 'none');
                }
            });
            $('#inverter_id').change(function () {
                var inverter_id = parseInt($("#interter_id").val()) || 0;
                if(inverter_id > 0) {
                } else {
                    $('#quote-section').css('display', 'none');
                }
            });

            $('input[name="technology"]').on('change', function() {
                if($('input[name="technology"]:checked').val() === 'bifacial') {
                    $('.type-bifacial').each(function() {
                        $(this).removeClass('hidden');
                        $(this).prop('disabled', false);
                    });
                    $('.type-topcon').each(function() {
                        $(this).addClass('hidden');
                        $(this).prop('disabled', true);
                    });
                } else {
                    $('.type-topcon').each(function() {
                        $(this).removeClass('hidden');
                        $(this).prop('disabled', false);
                    });
                    $('.type-bifacial').each(function() {
                        $(this).addClass('hidden');
                        $(this).prop('disabled', true);
                    });
                }
            });

        });
    </script>
    <script>
        $(document).ready(function () {
            $('.by-unit').each(function() {
                this.style.setProperty('display', 'none', 'important');
            });
            $('input[name="calculate_kwa_type"]').on('change', function() {

                if($('input[name="calculate_kwa_type"]:checked').val() === 'by_bill') {
                    console.log('billll');
                    $('.by-bill').each(function() {
                        this.style.setProperty('display', 'block');
                    });
                    $('.by-unit').each(function() {
                        this.style.setProperty('display', 'none', 'important');
                    });
                } else {
                    console.log('unittt');
                    $('.by-bill').each(function() {
                        this.style.setProperty('display', 'none', 'important');
                    });
                    $('.by-unit').each(function() {
                        this.style.setProperty('display', 'block',);
                    });
                }
            });

            $('#monthly_bill_summer, #monthly_bill_winter').on('input', function() {
                var monthly_bill_summer = parseFloat($('#monthly_bill_summer').val()) || 0;
                var monthly_bill_winter = parseFloat($('#monthly_bill_winter').val()) || 0;
                var monthly_bill_average = (monthly_bill_summer + monthly_bill_winter) / 2;
                $('#monthly_bill_average').val(monthly_bill_average.toFixed(2));
                var monthly_units = monthly_bill_average / 12.5;
                $('#monthly_units').val(monthly_units.toFixed(1));
                calculate_kwa();
            });

            $('#monthly_unit_summer, #monthly_unit_winter').on('input', function() {
                var monthly_unit_summer = parseFloat($('#monthly_unit_summer').val()) || 0;
                var monthly_unit_winter = parseFloat($('#monthly_unit_winter').val()) || 0;
                var averaage_monthly_units = (monthly_unit_summer + monthly_unit_winter) / 2;
                $('#average_monthly_units').val(averaage_monthly_units.toFixed(1));
                calculate_kwa();
            });

            $('#btn-clear-calculater-kwa').on('click', function() {
                $('#monthly_bill_summer').val('');
                $('#monthly_bill_winter').val('');
                $('#monthly_bill_average').val('');
                $('#monthly_units').val('');

                $('#monthly_unit_summer').val('');
                $('#monthly_unit_winter').val('');
                $('#average_monthly_units').val('');

                $('#calculated-kwa').val('');
            });
        });

        function calculate_final_quote() {

            var total_project_price = 0;
            var panel_quantity = parseFloat($('#quantity-panels').text()) || 0;
            var panel_power = parseFloat($('#panel_id').find('option:selected').data('power')) || 0;
            var panel_price_per_watt = parseFloat($('#panel_id').find('option:selected').data('price')) || 0;
            var inverter_price = parseFloat($('#inverter_id').find('option:selected').data('price')) || 0;
            var base_price = parseFloat($('#capacity_id').find('option:selected').data('base-price')) || 0;
            var subsidy_amount = parseFloat($('#capacity_id').find('option:selected').data('subsidy')) || 0;

            var panel_total_price = (panel_quantity * panel_power) * panel_price_per_watt
            var total_price = panel_total_price + inverter_price + base_price;
            var total_profit = total_price * 0.2;
            total_project_price = total_price + total_profit;

            console.log(panel_total_price, inverter_price, base_price, total_profit);

            var gst_amount = total_project_price * 0.12126;
            var total_project_price_without_gst = total_project_price - gst_amount;
            var after_subsidy_cost = total_project_price - subsidy_amount;

            $("#quote-total-project-price-without-gst").text(formatIndianNumber(total_project_price_without_gst));
            $("#quote-gst-amount").text('+ ' + formatIndianNumber(gst_amount));

            $("#quote-total-project-price").text(formatIndianNumber(total_project_price));
            $("#quote-subsidy-amount").text('- ' + formatIndianNumber(subsidy_amount));

            $("#quote-after-subsidy-cost").text(formatIndianNumber(after_subsidy_cost));
        }

        function formatIndianNumber(num) {
            return num.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }
    </script>

    <script>
        $(document).ready(function () {
            $('#subsidy_option').on('change', function () {
                triggerSubsidyOption();
            });

            $('#capacity_id').change(function () {
                var _capacity_power = parseInt($(this).find('option:selected').data('power'));
                var _capacity_phase = $(this).find('option:selected').data('phase');
                populateInverterDropdown(_capacity_power, _capacity_phase);
            });

            $('#category_id').change(function () {
                var category_id = parseInt($('#category_id').val());
                if(category_id === 3) { //Commercial
                    $('.block-subsidy-select').each(function() {
                        $(this).addClass('hidden');
                    });
                    $('#subsidy_option').prop('checked', false);
                } else {
                    $('.block-subsidy-select').each(function() {
                        $(this).removeClass('hidden');
                    });
                }
                triggerSubsidyOption();
            });
        });

        function validate_form() {
            var message = 'Please select all the required fields: '+ "\n";
            var is_valid = true;
            if($('#capacity_id').val() === '') {
                message += "- " + 'Solar Capacity'+ "\n";
                is_valid = false;
            }
            if($('#panel_id').val() === '') {
                message += "- " + 'Panel'+ "\n";
                is_valid = false;
            }
            if($('#inverter_id').val() === '') {
                message += "- " + 'Inverter'+ "\n";
                is_valid = false;
            }
            if(is_valid === false) {
                alert(message);
            }
            return is_valid;
        }

        function selectCalculatedKWA() {
            calculate_kwa();
            assignCapacity();
        }

        function calculate_kwa() {
            let final_calculated_kwa = 0;
            let monthly_units = 0;
            if($('input[name="calculate_kwa_type"]:checked').val() === 'by_bill') {
                //by bill
                monthly_units = $('#monthly_units').val();
            } else {
                //by unit
                monthly_units = $('#average_monthly_units').val();
            }
            final_calculated_kwa = parseFloat(monthly_units) / 120;
            $('#calculated-kwa').val(final_calculated_kwa.toFixed(1));

        }

        function assignCapacity() {
            // Replace this with the actual calculation logic for kW
            let calculatedKwa = parseFloat($('#calculated-kwa').val()) * 1000;
            // Parse the capacities from the select options
            let capacities = [];
            $('#capacity_id option').each(function () {
                let power = parseInt($(this).data('power'));
                let id = parseInt($(this).val());
                if (power) {
                    capacities.push({ id: id, power: power });
                }
            });
            // Find the closest capacity
            let closestCapacity = capacities.reduce((prev, curr) => {
                if(!prev) { return curr };
                return Math.abs(curr.power - calculatedKwa) < Math.abs(prev.power - calculatedKwa) ? curr : prev;
            }, capacities[0]);

            // Set the closest capacity as selected
            $('#modal-calculate-kwa').modal('hide');
            $('#capacity_id').val(closestCapacity.id).trigger('change');
        }

        function triggerSubsidyOption() {
            if($('#subsidy_option').is(':checked')) {
                //checked
                $('.block-subsidy').each(function() {
                    $(this).removeClass('hidden');
                });
                populatePanelsDropdown(null, 'dcr');
            } else {
                //not checked
                $('.block-subsidy').each(function() {
                    $(this).addClass('hidden');
                });
                populatePanelsDropdown(null, 'non_dcr');
            }
        }

        function populatePanelsDropdown(_filter_technology = null, _filter_type = null, _filter_power = null) {
            let allPanels = @json($resultActivePanels);

            let $panelSelect = $('#panel_id');
            $panelSelect.empty();
            $panelSelect.append('<option value="" selected>Select Panel</option>');
            allPanels.forEach(function(panel) {
                let matchesPower = _filter_power === null || _filter_power === panel.power;
                let matchesTechnology = _filter_technology === null || _filter_technology === panel.technology;
                let matchesType = _filter_type === null || _filter_type === panel.type;

                if(matchesPower && matchesTechnology && matchesType) {
                    let option = '<option value="'+ panel.id +'" data-type="'+ panel.type +'" data-technology="'+ panel.technology +'" data-power="'+ panel.power +'" data-price="'+ panel.price +'">'+ panel.name +'</option>';
                    $panelSelect.append(option);
                }
            });
        }

        function populateInverterDropdown(_filter_power = null, _filter_phase = null) {
            let allInverters = @json($resultActiveInverters);
            // Sort inverters by power for easier searching
            allInverters.sort((a, b) => a.power - b.power);

            let $inverterSelect = $('#inverter_id');
            $inverterSelect.empty();
            $inverterSelect.append('<option value="" selected>Select Inverter</option>');

            if(_filter_power === null  && _filter_phase === null) {
                allInverters.forEach(function(inverter) {
                    var option = '<option value="'+ inverter.id +'" data-price="'+ inverter.price +'" data-phase="'+ inverter.phase +'">'+ inverter.name +'</option>';
                    $inverterSelect.append(option);
                });
            } else {
                let lowerRange = null;
                let upperRange = null;

                // Define the range around _filter_power (e.g., ±500)
                if (_filter_power !== null) {
                    let rangeOffset = 500;  // You can change this value to suit your needs
                    lowerRange = _filter_power - rangeOffset;
                    upperRange = _filter_power + rangeOffset;
                }

                // Filter inverters based on power and phase
                let selectedInverters = allInverters.filter(inverter => {
                    let matchesPower = (_filter_power === null || (inverter.power >= lowerRange && inverter.power <= upperRange));
                    let matchesPhase = _filter_phase === null || inverter.phase === _filter_phase; // Only filter by phase if _filter_phase is not null

                    return matchesPower && matchesPhase;
                });

                // Append selected inverters
                selectedInverters.forEach(function (inverter) {
                    var option = '<option value="'+ inverter.id +'" data-price="'+ inverter.price +'" data-phase="'+ inverter.phase +'">'+ inverter.name +'</option>';
                    $inverterSelect.append(option);
                });
            }
        }

        $(document).ready(function () {
            populatePanelsDropdown('bifacial', 'dcr');
            populateInverterDropdown('', '');
        });
    </script>
@endsection
