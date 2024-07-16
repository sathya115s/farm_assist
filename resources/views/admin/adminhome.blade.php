<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            /* display: flex; */
            /* justify-content: center; */
            align-items: center;
            /* height: 100vh; */
            overflow: hidden;
            background-color: #f0f0f0;
            margin: 0;
        }

        .container {
            max-width: 1200px;
        }

        .card {
            margin-bottom: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
            text-align: center;
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 15px 15px 0 0;
            cursor: pointer;
        }

        .card-img-top:hover {
            opacity: 0.8;
        }
        nav{
            width: 100%;
        }
        .min-h-screen{
            min-height: 0vh !important;
        }
    </style>
</head>

<body>
    
    <div class="container mt-3">
        <div class="text-center mb-5">
            <h3 class="section-title">Farm Information</h3>
        </div>

        <div class="row">
            <!-- Crop Information Card -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <a href="{{route('showcrop')}}">
                        <img src="images/crop-image.avif" class="card-img-top" alt="Crop Image">
                    </a>
                    <div class="card-header">
                        Crop
                    </div>
                    <div class="card-body">
                        <p class="card-text">Details about your crop</p>
                    </div>
                </div>
            </div>

            <!-- Livestock Information Card -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <a href="livestock.html">
                        <img src="images/livestock.avif" class="card-img-top" alt="Livestock Image">
                    </a>
                    <div class="card-header">
                        Livestock
                    </div>
                    <div class="card-body">
                        <p class="card-text">Details about your livestock</p>
                    </div>
                </div>
            </div>

            <!-- Market Price Information Card -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <a href="marketprice.html">
                        <img src="images/marketprice.jpeg" class="card-img-top" alt="Market Price Image">
                    </a>
                    <div class="card-header">
                        Market Price
                    </div>
                    <div class="card-body">
                        <p class="card-text">Details about market prices</p>
                    </div>
                </div>
            </div>

            <!-- Weather Information Card -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <a href="{{route('show_weather_page')}}">
                        <img src="images/weather.avif" class="card-img-top" alt="Weather Image">
                    </a>
                    <div class="card-header">
                        Weather
                    </div>
                    <div class="card-body">
                        <p class="card-text">Details about weather conditions</p>
                    </div>
                </div>
            </div>

            <!-- Finance Information Card -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <a href="finance.html">
                        <img src="images/finance.avif" class="card-img-top" alt="Finance Image">
                    </a>
                    <div class="card-header">
                        Finance
                    </div>
                    <div class="card-body">
                        <p class="card-text">Details about financial aspects</p>
                    </div>
                </div>
            </div>

            <!-- Insurance Information Card -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <a href="{{route('show_insurance')}}">
                        <img src="images/insurance.avif" class="card-img-top" alt="Insurance Image">
                    </a>
                    <div class="card-header">
                        Insurance
                    </div>
                    <div class="card-body">
                        <p class="card-text">Details about insurance coverage</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
