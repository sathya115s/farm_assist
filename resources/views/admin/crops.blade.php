<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FARM ASSIST</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <style>
        /* Your existing CSS styles */
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
            <label for="soilType">Select Soil Type:</label>
            <select class="form-control" id="soilType">
                <option value="">Select an option</option>
                <option value="Light">Light</option>
                <option value="Medium">Medium</option>
                <option value="Heavy">Heavy</option>
            </select>
        </div>
        <div class="form-group">
            <label for="plantingType">Select Planting Type:</label>
            <select class="form-control" id="plantingType">
                <option value="">Select an option</option>
                <option value="Direct Seeding">Direct Seeding</option>
                <option value="Transplanting">Transplanting</option>
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
    <div class="div-footer">
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
                const soilType = document.getElementById('soilType').value;
                const plantingType = document.getElementById('plantingType').value;
                const startDate = document.getElementById('startDate').value;

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
