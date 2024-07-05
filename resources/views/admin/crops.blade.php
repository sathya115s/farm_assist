<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Activity Schedule</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h1>Farm Activity Schedule</h1>
        <div class="form-group">
            <label for="cropSelect">Select Crop:</label>
            <select class="form-control" id="cropSelect">
                <!-- Options will be populated dynamically -->
                 <option value="">Select an option</option>
            </select>
        </div>
        <div class="form-group">
            <label for="startDate">Select Start Date:</label>
            <input type="date" class="form-control" id="startDate">
        </div>
        <button id="calculateButton" class="btn btn-primary">Calculate Activities</button>

        <h2 class="mt-5">Activities Schedule</h2>
        <div id="activitySchedule"></div>
    </div>

    <script>
        // Fetch crop data via AJAX
        $(document).ready(function() {
            $.ajax({
                url: '/cropactivities', // Adjust the URL to match your Laravel route
                type: 'GET',
                success: function(data) {
                    populateCropSelect(data); // Populate crop select dropdown
                },
                error: function(xhr, status, error) {
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

            document.getElementById('calculateButton').addEventListener('click', function() {
                const selectedCrop = document.getElementById('cropSelect').value;
                const startDate = document.getElementById('startDate').value;

                if (!startDate) {
                    alert('Please select a start date.');
                    return;
                }

                $.ajax({
                    url: `/cropactivities/${crop}`, // Adjust URL to fetch activities for selected crop
                    type: 'GET',
                    success: function(activities) {
                        displayActivities(activities);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching crop activities:', error);
                        alert('Failed to fetch crop activities.');
                    }
                });
            });

            function displayActivities(activities) {
                const startMoment = moment(document.getElementById('startDate').value);
                let activityHtml = '<ul class="list-group">';
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
