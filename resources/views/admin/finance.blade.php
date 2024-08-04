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
                <p>Total Income: <span id="totalIncome">Rs.0.00</span></p>
                <p>Total Expenses: <span id="totalExpenses">Rs.0.00</span></p>
                <p>Net Amount: <span id="netAmount">Rs.0.00</span></p>
                <canvas id="pieChart" width="300" height="150"></canvas>

            </div>
            <button type="button" class="btn btn-info" onclick="updateAnalytics()">Update Analytics</button>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        let pieChart;

        function showSection(sectionId) {
            $('.form-section').removeClass('active');
            $('#' + sectionId).addClass('active');
        }

        function fetchExpenseItems() {
            $.ajax({
                type: "GET",
                url: "/get_finance",  // Replace with your Laravel route to fetch farm items
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    var farmItemSelect = $('#expenseItem');
                    farmItemSelect.empty();
                    farmItemSelect.append('<option value="">Select farm item</option>'); // Default option
                    if (response.farmItems) {
                        response.farmItems.forEach(function (item) {
                            farmItemSelect.append(`<option value="${item.id}">${item.name_of_product}</option>`);
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Ajax error:", xhr.responseText);
                }
            });
        }

        // Trigger fetchExpenseItems when the expense type is selected
        $(document).ready(function () {
            $('#expenseType').on('change', function () {
                if ($(this).val()) {
                    fetchExpenseItems();
                } else {
                    $('#expenseItem').empty();
                    $('#expenseItem').append('<option value="">Select farm item</option>');
                }
            });
        });

        // Function to submit the expense form data via AJAX
        function submitExpense() {
            var formData = {
                type_expenses: $('#expenseType').val(),
                farm_expense_belongs: $('#expenseItem').val(),
                expense_amount_spend: $('#expenseAmount').val(),
                expense_date: $('#expenseDate').val(),
                // Any additional fields, if necessary
            };

            $.ajax({
                type: "POST",
                url: "/add_expense",
                data: formData,
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    alert("Expense added successfully!");
                    location.reload();
                    $('#expensesForm')[0].reset();
                },
                error: function (xhr, status, error) {
                    console.error("Error adding expense:", xhr.responseText);
                }
            });
        }


        function fetchIncomeItems() {
        $.ajax({
            type: "GET",
            url: "/get_income_items",  // Replace with your Laravel route to fetch farm items for income
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                var farmIncomeSelect = $('#incomeItem');
                farmIncomeSelect.empty();
                farmIncomeSelect.append('<option value="">Select farm item</option>'); // Default option
                if (response.farmItems) {
                    response.farmItems.forEach(function (item) {
                        farmIncomeSelect.append(`<option value="${item.id}">${item.name_of_product}</option>`);
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("Ajax error:", xhr.responseText);
            }
        });
    }

    // Trigger fetchIncomeItems when the income source is selected
    $(document).ready(function () {
        $('#incomeSource').on('change', function () {
            if ($(this).val() === 'sale') {
                fetchIncomeItems();
            } else {
                $('#incomeItem').empty();
                $('#incomeItem').append('<option value="">Select farm item</option>');
            }
        });
    });

    // Function to submit the income form data via AJAX
    function submitIncome() {
        var formData = $('#incomeForm').serialize();
        $.ajax({
            type: "POST",
            url: "/add_income",  // Replace with your Laravel route to submit income
            data: formData,
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                alert('Income added successfully!');
                location.reload();
                updateAnalytics();
            },
            error: function (error) {
                console.log('Error submitting income:', error);
            }
        });
    }

        function submitSetup() {
            var formData = $('#setupForm').serialize();
            $.ajax({
                type: "POST",
                url: "/add_setup",  // Replace with your Laravel route to submit setup data
                data: formData,
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    alert('Product added successfully!');
                },
                error: function (error) {
                    console.log('Error submitting setup:', error);
                }
            });
        }

        function createPieChart(labels, data) {
            const ctx = document.getElementById('pieChart').getContext('2d');
            if (pieChart) {
                pieChart.destroy(); // Destroy the previous chart instance if it exists
            }
            pieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Income vs Expenses',
                        data: data,
                        backgroundColor: ['#4CAF50', '#F44336'],
                        borderColor: ['#4CAF50', '#F44336'],
                        borderWidth: 1
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

        function updateAnalytics() {
            $.ajax({
                type: "GET",
                url: "/get_analytics",  // Replace with your Laravel route to get analytics data
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $('#totalIncome').text('Rs.' + response.totalIncome.toFixed(2));
                    $('#totalExpenses').text('Rs.' + response.totalExpenses.toFixed(2));
                    $('#netAmount').text('Rs.' + response.netAmount.toFixed(2));

                    // Update the pie chart
                    createPieChart(
                        ['Income', 'Expenses'],
                        [response.totalIncome, response.totalExpenses]
                    );
                },
                error: function (error) {
                    console.log('Error fetching analytics data:', error);
                }
            });
        }

        // Initialize
        // fetchFarmItems();
        fetchExpenseItems();
        updateAnalytics();
    </script>
</body>

</html>