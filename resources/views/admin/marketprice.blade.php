<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market Prices</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #007bff;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        main {
            padding: 2rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 1rem;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 1rem;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        nav{
            background-color: #92E341;
        }

        li{
            list-style-type: none;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-md">
            <a class="navbar-brand" href="#">FARMING MANAGEMENT APP</a>
            @if (Auth::check())
                <li>
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn ">LOGOUT ({{ Auth::user()->name }})</button>
                    </form>
                </li>
            @endif
        </div>
    </nav>
    <main>
        <table id="market-prices-table">
            <thead>
                <tr>
                    <th>Fruit</th>
                    <th>Retail Price (INR)</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be inserted here by JavaScript -->
            </tbody>
        </table>
    </main>
    <!-- <footer>
        <p>&copy; 2024 Market Prices App</p>
    </footer> -->
    <!-- <script src="script.js"></script> -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Path to the CSV file
            const csvFilePath = 'csv/Fruit-Prices-2022.csv';

            // Function to fetch CSV data and parse it
            fetch(csvFilePath)
                .then(response => response.text())
                .then(data => {
                    const rows = data.split('\n');
                    const tableBody = document.querySelector('#market-prices-table tbody');

                    // Skip the first row (headers) and process the rest
                    for (let i = 1; i < rows.length; i++) {
                        if (rows[i].trim() === '') continue; // Skip empty rows
                        const columns = rows[i].split(',');

                        // Create a new row
                        const row = document.createElement('tr');

                        // Only include the Fruit (first column) and Retail Price in INR (third column)
                        const fruitCell = document.createElement('td');
                        fruitCell.textContent = columns[0];
                        row.appendChild(fruitCell);

                        const priceInrCell = document.createElement('td');
                        priceInrCell.textContent = columns[2];
                        row.appendChild(priceInrCell);

                        // Append the row to the table body
                        tableBody.appendChild(row);
                    }
                })
                .catch(error => console.error('Error fetching the CSV file:', error));
        });
    </script>
</body>

</html>
