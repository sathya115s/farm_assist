<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market Prices</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        header {
            background-color: #007bff;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        main {
            padding: 2rem 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th,
        td {
            padding: 0.75rem;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #fff;
            color: black;
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

        nav {
            background-color: #92E341;
        }

        li {
            list-style-type: none;
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
    <main class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h2>Select City</h2>
                <select id="city-select" class="form-control">
                    <option value="">Select City</option>
                    <option value="chennai">Chennai</option>
                    <option value="mumbai">Mumbai</option>
                    <option value="delhi">Delhi</option>
                </select>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <h2>Fruit Prices</h2>
                <div class="table-responsive">
                    <table id="fruit-prices-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Fruit</th>
                                <th>kg</th>
                                <th>Retail Price (INR)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Fruit data will be inserted here by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <h2>Vegetable Prices</h2>
                <div class="table-responsive">
                    <table id="vegetable-prices-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Vegetable</th>
                                <th>kg</th>
                                <th>Retail Price (INR)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Vegetable data will be inserted here by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <div>
        <footer class="footer">
            <p class="footer_copyright" style="text-align:center">
                © Copyright 2024. Sudhar.
            </p>
        </footer>
    </div>
    <!-- <footer>
        <p>&copy; 2024 Market Prices App</p>
    </footer> -->

    <!-- <script src="script.js"></script> -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fruitPrices = {
                chennai: [
                    { name: 'Apple', kg: '1kg', price: 120 },
                    { name: 'Banana', kg: '1kg', price: 40 },
                    { name: 'Mango', kg: '1kg', price: 150 },
                ],
                mumbai: [
                    { name: 'Apple', kg: '1kg', price: 125 },
                    { name: 'Banana', kg: '1kg', price: 45 },
                    { name: 'Mango', kg: '1kg', price: 155 },
                ],
                delhi: [
                    { name: 'Apple', kg: '1kg', price: 130 },
                    { name: 'Banana', kg: '1kg', price: 50 },
                    { name: 'Mango', kg: '1kg', price: 160 },
                ],
            };

            const vegetablePrices = {
                chennai: [
                    { name: 'Tomato', kg: '1kg', price: 20 },
                    { name: 'Potato', kg: '1kg', price: 30 },
                    { name: 'Onion', kg: '1kg', price: 40 },
                ],
                mumbai: [
                    { name: 'Tomato', kg: '1kg', price: 25 },
                    { name: 'Potato', kg: '1kg', price: 35 },
                    { name: 'Onion', kg: '1kg', price: 45 },
                ],
                delhi: [
                    { name: 'Tomato', kg: '1kg', price: 22 },
                    { name: 'Potato', kg: '1kg', price: 32 },
                    { name: 'Onion', kg: '1kg', price: 42 },
                ],
            };

            const populateTable = (data, tableId) => {
                const tableBody = document.querySelector(`#${tableId} tbody`);
                tableBody.innerHTML = ''; // Clear previous data

                data.forEach(item => {
                    const row = document.createElement('tr');

                    const itemCell = document.createElement('td');
                    itemCell.textContent = item.name;
                    row.appendChild(itemCell);

                    const kgCell = document.createElement('td');
                    kgCell.textContent = item.kg;
                    row.appendChild(kgCell);

                    const priceCell = document.createElement('td');
                    priceCell.textContent = item.price;
                    row.appendChild(priceCell);

                    tableBody.appendChild(row);
                });
            };

            // Load initial fruit and vegetable prices based on a default city
            const defaultCity = 'chennai';
            populateTable(fruitPrices[defaultCity], 'fruit-prices-table');
            populateTable(vegetablePrices[defaultCity], 'vegetable-prices-table');

            // Load fruit and vegetable prices based on selected city
            document.getElementById('city-select').addEventListener('change', function () {
                const selectedCity = this.value;
                if (selectedCity && fruitPrices[selectedCity] && vegetablePrices[selectedCity]) {
                    populateTable(fruitPrices[selectedCity], 'fruit-prices-table');
                    populateTable(vegetablePrices[selectedCity], 'vegetable-prices-table');
                } else {
                    document.querySelector('#fruit-prices-table tbody').innerHTML = '';
                    document.querySelector('#vegetable-prices-table tbody').innerHTML = '';
                }
            });
        });
    </script>
</body>

</html>