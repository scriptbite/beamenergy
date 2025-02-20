<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Page PDF</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }
        /* Ensure no automatic page breaks */
        @page {
            margin: 0;
            size: A4 portrait;
        }

        .page {
            width: 210mm;
            height: 297mm;
            position: relative;
            page-break-after: always;
        }

        .last-page {
            page-break-after: avoid !important;
        }

        .banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .content {
            padding: 55px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="page banner">
        <img src="{{ asset('images/quotation/banner.png') }}" alt="Banner">
    </div><div class="page content last-page">
        <div style="display: flex; margin-bottom: 30px;">
            <img src="{{ asset('images/quotation/logo.png') }}" alt="Company Logo" style="width: 100mm;">
            <p style="font-size: 14px;float: right;padding-right: 105px;"><strong>Date:</strong> {{ date('d/m/Y') }}</p>
        </div>
        <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 10px;">
            <div style="font-size: 16px;float: left;">
                <p style="line-height: 1;">
                    <strong>Name : </strong> <span>{{ ucfirst($details['full_name']) }}</span>
                    <br>
                    <strong>Project Location : </strong> <span>{{ ucfirst($details['pincode']) }}</span>
                    <br>
                    <br>
                    <strong>Quotation ID : </strong> <span>{{ $details['quotation_id'] }}</span>
                </p>
            </div>
            <!-- Right Side -->
            <div style="font-size: 16px;float: right;padding-right: 105px;">
                <p style="line-height: 1;">
                    <strong>Project Type : </strong> <span>{{ $details['project_type'] }}</span>
                    <br>
                    <strong>Project Capacity : </strong> <span>{{ $details['project_capacity'] }}</span>
                </p>
            </div>
        </div>
        <table class="table" style="width: 100%; border-collapse: collapse; margin-top: 130px;padding-right: 105px;">
            <thead>
            <tr>
                <th style="border: 1px solid black; padding: 0px 8px 2px 8px;width: 50px;text-align: center;">Sr. No</th>
                <th style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: left;">Particular</th>
                <th style="border: 1px solid black; padding: 0px 8px 2px 8px;width: 110px;">Quantity</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;">1</td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;">{{ $details['panel_name'] }}</td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;">{{ $details['panel_quantity'] }} nos</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;">2</td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;">{{ $details['inverter_name'] }}</td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;">1 no.</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;">3</td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;">Galvanized Iron Solar Module Structure</td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;">1 Set</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;">4</td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;">AC & DC DB Box and Cables</td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;">1 Lot</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;">5</td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;">Electric Meters (Generation Meter & Net Meter)</td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;">1 Set</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;">6</td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;">Complete Earthing Setup with Lighting Arrester</td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;">1 Lot</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;">7</td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;">1 Year AMC Service</td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;">Included</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;">8</td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;">Load Extension Demand</td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;"> - </td>
            </tr>
            <tr>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;">9</td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;">Other Accessories required to install</td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;">Included</td>
            </tr>
            <tr style="font-weight: bold;">
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;"></td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: right;">PROJECT COST (&#8377;)</td>
                <td style="border: 1px solid black; padding: 0px 8px 2px 8px;text-align: center;">{{ number_format($details['project_cost'], 2, '.', ',') }}</td>
            </tr>
            </tbody>
        </table>
        <div>
            <p style="line-height: 1;">
                <span><strong>TAXES & DUTIES : </strong>GST 13.8 % excluded of total project cost</span><br>
                <span><strong>GST (&#8377;): </strong>{{ number_format($details['gst'], 2, '.', ',') }}</span><br>
                <span><strong>Total Project Amount (&#8377;) : </strong>{{ number_format($details['project_total_cost'], 2, '.', ',') }}</span><br>
                <span><strong>Government Subsidy (&#8377;) : </strong>{{ number_format($details['government_subsidy'], 2, '.', ',') }}</span><br>
            </p>
        </div>
        <div>
            <p style="line-height: 1;">
                <strong>Account Holder:</strong> BEAM ENERGY
                <br><strong>Bank Name:</strong> HDFC BANK
                <br><strong>Branch:</strong> GONDIA
                <br><strong>Account Number:</strong> 9999 66 5555 9999
                <br><strong>Account Type:</strong> CURRENT
                <br><strong>IFSC:</strong> HDFC0000963
            </p>
        </div>
        <div style="position: absolute; bottom: 0; left: 0; width: 210mm;padding-bottom: 110px;padding-right: 105px;">
            <img src="{{ asset('images/quotation/footer.png') }}" alt="Footer" style="width: 100%;object-fit: cover;display: block;">
        </div>
    <div>
</body>
</html>
