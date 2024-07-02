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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* overflow: hidden; Hide overflow to prevent scrollbars */
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
            text-align: center; /* Center align text */
        }

        .card-img {
            width: 100%;
            height: 200px; /* Adjust as needed for uniform height */
            object-fit: contain; /* Maintain aspect ratio */
            border-radius: 15px 15px 0 0;
            cursor: pointer; /* Change cursor to pointer on hover */
        }

        .card-img:hover {
            opacity: 0.8; /* Reduce opacity on hover */
        }
        img{
          width: 100%;
          height: 200px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="section-title">Farm Information</h3>
        </div>

        <div class="row">
            <!-- Crop Information Card -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <a href="{{route('showcrop')}}"> <!-- Link to your next page -->
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
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <a href="livestock.html"> <!-- Link to your next page -->
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
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <a href="marketprice.html"> <!-- Link to your next page -->
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
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <a href="{{route('show_weather_page')}}"> <!-- Link to your next page -->
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
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <a href="finance.html"> <!-- Link to your next page -->
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
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <a href="insurance.html"> <!-- Link to your next page -->
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

        <!-- <button class="btn btn-primary w-100 mt-4" type="submit">Submit</button> -->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
