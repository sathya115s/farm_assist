<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-section {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: none; /* Initially hidden */
        }

        .form-section.active {
            display: block;
        }

        .btn-group {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <!-- Button Group to Toggle Sections -->
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary" onclick="showSection('expenses')">New Expenses</button>
            <button type="button" class="btn btn-success" onclick="showSection('income')">New Income</button>
            <button type="button" class="btn btn-info" onclick="showSection('setup')">Farm Setup</button>
        </div>

        <!-- New Expenses Section -->
        <div id="expenses" class="form-section">
            <h3>New Expenses</h3>
            <form>
                <div class="form-group">
                    <label for="expenseName">Expense Name</label>
                    <input type="text" class="form-control" id="expenseName" placeholder="Enter expense name">
                </div>
                <div class="form-group">
                    <label for="expenseAmount">Amount</label>
                    <input type="number" class="form-control" id="expenseAmount" placeholder="Enter amount">
                </div>
                <div class="form-group">
                    <label for="expenseDate">Date</label>
                    <input type="date" class="form-control" id="expenseDate">
                </div>
                <button type="submit" class="btn btn-primary">Add Expense</button>
            </form>
        </div>

        <!-- New Income Section -->
        <div id="income" class="form-section">
            <h3>New Income</h3>
            <form>
                <div class="form-group">
                    <label for="incomeSource">Income Source</label>
                    <input type="text" class="form-control" id="incomeSource" placeholder="Enter income source">
                </div>
                <div class="form-group">
                    <label for="incomeAmount">Amount</label>
                    <input type="number" class="form-control" id="incomeAmount" placeholder="Enter amount">
                </div>
                <div class="form-group">
                    <label for="incomeDate">Date</label>
                    <input type="date" class="form-control" id="incomeDate">
                </div>
                <button type="submit" class="btn btn-success">Add Income</button>
            </form>
        </div>

        <!-- Farm Setup Section -->
        <div id="setup" class="form-section">
            <h3>Farm Setup</h3>
            <form>
                <div class="form-group">
                    <label for="setupItem">Setup Item</label>
                    <input type="text" class="form-control" id="setupItem" placeholder="Enter setup item">
                </div>
                <div class="form-group">
                    <label for="setupCost">Cost</label>
                    <input type="number" class="form-control" id="setupCost" placeholder="Enter cost">
                </div>
                <div class="form-group">
                    <label for="setupDate">Date</label>
                    <input type="date" class="form-control" id="setupDate">
                </div>
                <button type="submit" class="btn btn-info">Add Setup</button>
            </form>
        </div>
    </div>

    <script>
        // Function to toggle sections
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.form-section');
            sections.forEach(section => {
                section.classList.remove('active');
            });

            document.getElementById(sectionId).classList.add('active');
        }
    </script>
</body>

</html>
