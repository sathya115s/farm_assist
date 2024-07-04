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
                <option value="cotton">Cotton</option>
                <option value="wheat">Wheat</option>
                <option value="corn">Corn</option>
                <!-- Add more crop options here if needed -->
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
        const cropData = {
            "cotton": {
                "activities": [
                    { "activity": "Soil Tillage", "start_date": "0 days", "end_date": "20 days" },
                    { "activity": "Planting", "start_date": "20 days", "end_date": "30 days" },
                    { "activity": "Fertilization", "start_date": "30 days", "end_date": "60 days" },
                    { "activity": "Pest Management", "start_date": "60 days", "end_date": "120 days" },
                    { "activity": "Harvesting", "start_date": "150 days", "end_date": "180 days" }
                ]
            },
            "wheat": {
                "activities": [
                    { "activity": "Soil Preparation", "start_date": "0 days", "end_date": "10 days" },
                    { "activity": "Sowing", "start_date": "10 days", "end_date": "20 days" },
                    { "activity": "Irrigation", "start_date": "20 days", "end_date": "30 days" },
                    { "activity": "Weeding", "start_date": "30 days", "end_date": "50 days" },
                    { "activity": "Harvesting", "start_date": "100 days", "end_date": "120 days" }
                ]
            },
            "corn": {
                "activities": [
                    { "activity": "Soil Tillage", "start_date": "0 days", "end_date": "15 days" },
                    { "activity": "Planting", "start_date": "15 days", "end_date": "25 days" },
                    { "activity": "Fertilization", "start_date": "25 days", "end_date": "45 days" },
                    { "activity": "Pest Management", "start_date": "45 days", "end_date": "90 days" },
                    { "activity": "Harvesting", "start_date": "120 days", "end_date": "150 days" }
                ]
            }
        };

        document.getElementById('calculateButton').addEventListener('click', function() {
            const selectedCrop = document.getElementById('cropSelect').value;
            const startDate = document.getElementById('startDate').value;

            if (!startDate) {
                alert('Please select a start date.');
                return;
            }

            const activities = cropData[selectedCrop].activities;
            const startMoment = moment(startDate);

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
        });
    </script>
</body>

</html>
