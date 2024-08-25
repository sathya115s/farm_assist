<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #f0f2f5;
            color: #333;
        }

        li {
            list-style-type: none;
        }

        .form-section {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: none;
        }

        .form-section.active {
            display: block;
        }

        .form-section h3 {
            font-size: 1.75rem;
            margin-bottom: 20px;
            color: #007bff;
        }

        .btn-group .btn {
            margin-right: 5px;
        }

        .btn-group .btn:last-child {
            margin-right: 0;
        }

        .btn-success,
        .btn-primary,
        .btn-info {
            border-radius: 5px;
            padding: 10px 20px;
        }

        .form-control {
            border-radius: 5px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
            border-color: #ced4da;
        }

        .form-group label {
            font-weight: bold;
            color: #495057;
        }

        .btn {
            border-radius: 5px;
            padding: 10px 20px;
        }

        .alert {
            margin-top: 20px;
            border-radius: 5px;
        }

        nav {
            background-color: #92E341;
        }

        @media (max-width: 768px) {
            .btn-group {
                flex-direction: column;
                align-items: stretch;
            }

            .form-section h3 {
                font-size: 1.5rem;
            }

            .btn {
                padding: 8px 15px;
                font-size: 0.9rem;
            }
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
    <div class="container-fluid mt-5">
        <!-- Button Group to Toggle Sections -->
        <div class="btn-group d-flex flex-wrap" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-success flex-fill mb-2" onclick="showSection('income')">New
                Income</button>
            <button type="button" class="btn btn-primary flex-fill mb-2" onclick="showSection('expenses')">New
                Expenses</button>
            <button type="button" class="btn btn-info flex-fill mb-2" onclick="showSection('setup')">Farm Setup</button>
            <button type="button" class="btn btn-secondary flex-fill mb-2"
                onclick="showSection('analytics')">Analytics</button>
        </div>

        <!-- New Income Section -->
        <div id="income" class="form-section active">
            <h3>New Income</h3>
            <form id="incomeForm">
                <div class="form-group">
                    <label for="incomeSource">From Which source did you get Income</label>
                    <select class="form-control" id="incomeSource" name="source_of_income">
                        <option value="">Select source</option>
                        <option value="sale">Farm Item Sale</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="incomeItem">Select the farm item to which this income belongs</label>
                    <select class="form-control" id="incomeItem" name="farm_income_belong">
                        <option value="">Select farm item</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="incomeAmount">How much did you earn</label>
                    <input type="number" class="form-control" id="incomeAmount" name="income_amount"
                        placeholder="Enter amount">
                </div>
                <div class="form-group">
                    <label for="incomeDate">Date Of Income</label>
                    <input type="date" class="form-control" id="incomeDate" name="income_date">
                </div>
                <button type="button" class="btn btn-success" onclick="submitIncome()">Add Income</button>
            </form>
        </div>

        <!-- New Expenses Section -->
        <div id="expenses" class="form-section">
            <h3>New Expenses</h3>
            <form id="expensesForm">
                <div class="form-group">
                    <label for="expenseType">What type of expense is this</label>
                    <select class="form-control" id="expenseType" name="type_expenses">
                        <option value="">Select type</option>
                        <option value="purchase">Purchase</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="expenseItem">Select the farm item to which this expense belongs</label>
                    <select class="form-control" id="expenseItem" name="farm_expense_belongs">
                        <option value="">Select farm item</option>
                        <!-- Options will be dynamically populated -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="expenseAmount">How much did you spend</label>
                    <input type="number" class="form-control" id="expenseAmount" name="expense_amount_spend"
                        placeholder="Enter amount">
                </div>
                <div class="form-group">
                    <label for="expenseDate">Date Of Expense</label>
                    <input type="date" class="form-control" id="expenseDate" name="expense_date">
                </div>
                <button type="button" class="btn btn-primary" onclick="submitExpense()">Add Expense</button>
            </form>
        </div>

        <!-- Farm Setup Section -->
        <div id="setup" class="form-section">
            <h3>Farm Setup</h3>
            <form id="setupForm">
                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="product_name"
                        placeholder="Enter product name">
                </div>
                <button type="button" class="btn btn-info" onclick="submitSetup()">Add Product</button>
            </form>
        </div>

        <!-- Analytics Section -->
        <div id="analytics" class="form-section">
            <h3>Analytics</h3>
            <div id="analyticsContent">
                <div class="form-group">
                    <label for="analyticsDate">Select Date</label>
                    <input type="date" class="form-control" id="analyticsDate" name="analytics_date">
                </div>
                <p>Total Income: <span id="totalIncome">Rs.0.00</span></p>
                <p>Total Expenses: <span id="totalExpenses">Rs.0.00</span></p>
                <p>Net Amount: <span id="netAmount">Rs.0.00</span></p>
                <canvas id="pieChart" width="300" height="150"></canvas>
            </div>
            <button type="button" class="btn btn-info" onclick="updateAnalytics()">Update Analytics</button>
        </div>
    </div>

    <footer class="footer">
        <p class="footer_copyright" style="text-align:center">© Copyright 2024. Sudhar.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        let pieChart;

        function showSection(sectionId) {
            $('.form-section').removeClass('active');
            $('#' + sectionId).addClass('active');
        }

        function submitIncome() {
            const data = $('#incomeForm').serialize();
            $.ajax({
                type: 'POST',
                url: '/add_income',
                data: data,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    alert('Income added successfully!');
                    $('#incomeForm')[0].reset();
                },
                error: function (error) {
                    console.log('Error adding income:', error);
                }
            });
        }

        function submitExpense() {
            const data = $('#expensesForm').serialize();
            $.ajax({
                type: 'POST',
                url: '/add_expense',
                data: data,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    alert('Expense added successfully!');
                    $('#expensesForm')[0].reset();
                },
                error: function (error) {
                    console.log('Error adding expense:', error);
                }
            });
        }

        function submitSetup() {
            const data = $('#setupForm').serialize();
            $.ajax({
                type: 'POST',
                url: '/add_product',
                data: data,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    alert('Product added successfully!');
                    $('#setupForm')[0].reset();
                },
                error: function (error) {
                    console.log('Error adding product:', error);
                }
            });
        }

        function updateAnalytics() {
            const selectedDate = $('#analyticsDate').val();
            const dateToFetch = selectedDate || new Date().toISOString().split('T')[0];
            $.ajax({
                type: 'GET',
                url: '/get_analytics',
                data: { date: dateToFetch },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.totalIncome === undefined || response.totalExpenses === undefined) {
                        $('#totalIncome').text('Rs.0.00');
                        $('#totalExpenses').text('Rs.0.00');
                        $('#netAmount').text('Rs.0.00');
                        createPieChart(['Income', 'Expenses'], [0, 0]);
                    } else {
                        $('#totalIncome').text('Rs.' + response.totalIncome.toFixed(2));
                        $('#totalExpenses').text('Rs.' + response.totalExpenses.toFixed(2));
                        $('#netAmount').text('Rs.' + response.netAmount.toFixed(2));
                        createPieChart(
                            ['Income', 'Expenses'],
                            [response.totalIncome, response.totalExpenses]
                        );
                    }
                },
                error: function (error) {
                    console.log('Error fetching analytics data:', error);
                }
            });
        }

        function createPieChart(labels, data) {
            const ctx = document.getElementById('pieChart').getContext('2d');
            if (pieChart) {
                pieChart.destroy();
            }
            pieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: ['#36A2EB', '#FF6384'],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function (tooltipItem) {
                                    return tooltipItem.label + ': Rs.' + tooltipItem.raw.toFixed(2);
                                }
                            }
                        }
                    }
                }
            });
        }

        // Initial call to populate analytics data for today
        updateAnalytics();
    </script>
</body>

</html>
