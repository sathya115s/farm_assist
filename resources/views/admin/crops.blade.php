<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onion Planting and Harvesting Data</title>
</head>
<body>
    <h1>Onion Planting and Harvesting Data</h1>
    <div id="onion-data"></div>

    <script>
        fetch('/onion-data')
            .then(response => response.json())
            .then(data => {
                const onionData = data.onion;
                const plantingPeriod = `Planting Period: ${onionData.planting_period.start_month} to ${onionData.planting_period.end_month} (${onionData.planting_period.duration_months} months)`;
                const harvestingPeriod = `Harvesting Period: ${onionData.harvesting_period.start_month} to ${onionData.harvesting_period.end_month} (${onionData.harvesting_period.duration_months} months)`;

                document.getElementById('onion-data').innerHTML = `<p>${plantingPeriod}</p><p>${harvestingPeriod}</p>`;
            })
            .catch(error => console.error('Error fetching data:', error));
    </script>
</body>
</html>
