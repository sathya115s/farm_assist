<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FARM ASSIST</title>
    <!-- <link rel="icon" type="image/png" href="images/farm-logo.svg"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <style>
        body {
            background: url('images/crops-bg.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            font-family: 'Georgia', serif;
            font-weight: bold;
            color: #2c3e50;
        }

        .form-group label {
            font-weight: bold;
            color: #34495e;
        }

        .btn-primary {
            background-color: #2c3e50;
            border: none;
        }

        .btn-primary:hover {
            background-color: #34495e;
        }

        h2 {
            font-family: 'Georgia', serif;
            color: #2c3e50;
        }

        .list-group-item {
            border: none;
            border-bottom: 1px solid #dee2e6;
        }

        .list-group-item:last-child {
            border-bottom: none;
        }

        .animate__animated {
            visibility: visible;
        }

        .list-group-item {
            color: black;
        }

        li {
            list-style-type: none;
        }

        nav {
            background-color: #92E341;
        }

        footer {
            background-color: #92E341;
            color: black;
            text-align: center;
            padding: 0.5em;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 2em;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">FARMING MANAGEMENT APP</a>
            @if (Auth::check())
                <li>
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn">LOGOUT ({{ Auth::user()->name }})</button>
                    </form>
                </li>
            @endif
        </div>
    </nav>
    <div class="container mt-5 animate__animated animate__fadeIn">
        <h1 class="text-center">Farm Activity Schedule</h1>
        <div class="form-group">
            <label for="cropSelect">Select Crop:</label>
            <select class="form-control" id="cropSelect">
                <option value="">Select an option</option>
            </select>
        </div>
        <div class="form-group">
            <label for="startDate">Select Start Date:</label>
            <input type="date" class="form-control" id="startDate">
        </div>
        <button id="calculateButton" class="btn btn-primary btn-block">Calculate Activities</button>

        <h2 class="mt-5">Activities Schedule</h2>
        <div id="activitySchedule" class="animate__animated"></div>
    </div>
    <div>
        <footer class="footer">
            <p class="footer_copyright" style="text-align:center">
                © Copyright 2024. Sudhar.
            </p>
        </footer>
    </div>
    <script>
        $(document).ready(function () {
            // Fetch crop data via AJAX
            $.ajax({
                url: '/cropactivities', // Adjust the URL to match your Laravel route
                type: 'GET',
                success: function (data) {
                    populateCropSelect(data); // Populate crop select dropdown
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching crop activities:', error);
                    alert('Failed to fetch crop activities.');
                }
            });

            function populateCropSelect(cropActivities) {
                const cropSelect = document.getElementById('cropSelect');
                const uniqueCrops = []; // Track unique crops

                cropActivities.forEach(activity => {
                    if (!uniqueCrops.includes(activity.crop)) {
                        uniqueCrops.push(activity.crop);
                        const option = document.createElement('option');
                        option.value = activity.crop;
                        option.textContent = activity.crop;
                        cropSelect.appendChild(option);
                    }
                });
            }

            document.getElementById('calculateButton').addEventListener('click', function () {
                const selectedCrop = document.getElementById('cropSelect').value;
                const startDate = document.getElementById('startDate').value;

                if (!startDate) {
                    alert('Please select a start date.');
                    return;
                }

                $.ajax({
                    url: `/getcropactivities/` + selectedCrop, // Adjust URL to fetch activities for selected crop
                    type: 'GET',
                    dataType: 'json',
                    success: function (activities) {
                        displayActivities(activities);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching crop activities:', error);
                        alert('Failed to fetch crop activities.');
                    }
                });
            });

            function displayActivities(activities) {
                const startMoment = moment(document.getElementById('startDate').value);
                let activityHtml = '<ul class="list-group animate__animated animate__fadeInUp">';
                activities.forEach(activity => {
                    const startActivity = startMoment.clone().add(parseInt(activity.start_date), 'days');
                    const endActivity = startMoment.clone().add(parseInt(activity.end_date), 'days');
                    activityHtml += `<li class="list-group-item">
                        <strong>${activity.activity}</strong>: 
                        ${startActivity.format('MMMM Do, YYYY')} to ${endActivity.format('MMMM Do, YYYY')}
                    </li>`;
                });
                activityHtml += '</ul>';
                document.getElementById('activitySchedule').innerHTML = activityHtml;
            }
        });
    </script>
</body>

</html>