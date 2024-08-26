<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crop Activities</title>
    <!-- Include Bootstrap CSS for styling -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Include jQuery and Moment.js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <style>
        body {
            background-image: url('images/crops-bg.jpg');
            background-size: cover;
        }

        nav {
            background-color: #92E341;
            margin-bottom: 2em;
        }

        li {
            list-style-type: none;
        }

        footer {
            background-color: #92E341;
            color: white;
            text-align: center;
            padding: 0.5em;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 2em;
        }

        .container {
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">FARMING MANAGEMENT APP</a>
            <!-- Authentication and Logout Button -->
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
        <h1 class="text-center">FARM ACTIVITY SCHEDULE</h1>
        <form>
            <div class="form-group">
                <label for="cropSelect">Select Crop:</label>
                <select class="form-control" id="cropSelect">
                    <option value="">Select an option</option>
                    <!-- Options will be dynamically populated -->
                </select>
            </div>
            <div class="form-group">
                <label for="soilType">Select Soil Type:</label>
                <select class="form-control" id="soilType">
                    <option value="">Select an option</option>
                    <!-- Options will be dynamically populated -->
                </select>
            </div>
            <div class="form-group">
                <label for="plantingType">Select Planting Type:</label>
                <select class="form-control" id="plantingType">
                    <option value="">Select an option</option>
                    <!-- Options will be dynamically populated -->
                </select>
            </div>
            <div class="form-group">
                <label for="startDate">Select Start Date:</label>
                <input type="date" class="form-control" id="startDate">
            </div>
            <button type="button" id="calculateButton" class="btn btn-primary btn-block">Calculate Activities</button>
        </form>

        <h2 class="mt-5">ACTIVITIES SCHEDULE</h2>
        <div id="activitySchedule" class="animate__animated"></div>
    </div>

    <footer class="footer">
        <p class="footer_copyright">© Copyright 2024. Sudhar.</p>
    </footer>

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
                const cropSelect = $('#cropSelect');
                const uniqueCrops = new Set(); // Track unique crops

                cropActivities.forEach(activity => {
                    if (!uniqueCrops.has(activity.crop)) {
                        uniqueCrops.add(activity.crop);
                        const option = $('<option></option>').val(activity.crop).text(activity.crop);
                        cropSelect.append(option);
                    }
                });
            }

            // Fetch planting types and soil types based on selected crop
            $('#cropSelect').change(function () {
                const selectedCrop = $(this).val();

                if (selectedCrop) {
                    // Fetch and populate planting types
                    $.ajax({
                        url: `/plantingtypes/${selectedCrop}`, // Adjust URL based on selected crop
                        type: 'GET',
                        success: function (data) {
                            populateSelectOptions('#plantingType', data); // Populate planting type dropdown
                        },
                        error: function (xhr, status, error) {
                            console.error('Error fetching planting types:', error);
                            alert('Failed to fetch planting types.');
                        }
                    });

                    // Fetch and populate soil types
                    $.ajax({
                        url: `/soiltypes/${selectedCrop}`, // Adjust URL based on selected crop
                        type: 'GET',
                        success: function (data) {
                            populateSelectOptions('#soilType', data); // Populate soil type dropdown
                        },
                        error: function (xhr, status, error) {
                            console.error('Error fetching soil types:', error);
                            alert('Failed to fetch soil types.');
                        }
                    });
                } else {
                    // Clear the dropdowns if no crop is selected
                    $('#plantingType').empty().append('<option value="">Select an option</option>');
                    $('#soilType').empty().append('<option value="">Select an option</option>');
                }
            });

            function populateSelectOptions(selectId, optionsData) {
                const selectElement = $(selectId);
                selectElement.empty().append('<option value="">Select an option</option>'); // Reset options
                optionsData.forEach(option => {
                    const optionElement = $('<option></option>').val(option).text(option);
                    selectElement.append(optionElement);
                });
            }

            $('#calculateButton').click(function () {
                const selectedCrop = $('#cropSelect').val();
                const soilType = $('#soilType').val();
                const plantingType = $('#plantingType').val();
                const startDate = $('#startDate').val();

                if (!startDate || !selectedCrop || !soilType || !plantingType) {
                    alert('Please select all the required options.');
                    return;
                }

                $.ajax({
                    url: `/getcropactivities/${selectedCrop}`, // Adjust URL to fetch activities for selected crop
                    type: 'GET',
                    data: {
                        soil_type: soilType,
                        type_of_planting: plantingType,
                        start_date: startDate
                    },
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
                const startMoment = moment($('#startDate').val());
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
                $('#activitySchedule').html(activityHtml);
            }
        });
    </script>
</body>

</html>
