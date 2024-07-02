<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cattle Management Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: #ecf0f1;
            min-height: 100vh;
            padding: 20px;
        }
        .sidebar .logo {
            display: flex;
            align-items: center;
        }
        .sidebar .logo img {
            width: 50px;
            margin-right: 10px;
        }
        .sidebar .logo h1 {
            font-size: 20px;
            margin: 0;
        }
        .sidebar .menu {
            margin-top: 20px;
        }
        .sidebar .menu ul {
            list-style: none;
            padding: 0;
        }
        .sidebar .menu ul li {
            margin: 10px 0;
        }
        .sidebar .menu ul li a {
            color: #ecf0f1;
            text-decoration: none;
            font-size: 16px;
        }
        .main-content {
            flex-grow: 1;
            background-color: #ecf0f1;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: flex-end;
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
        }
        .header .user-info {
            display: flex;
            align-items: center;
        }
        .header .user-info img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-left: 10px;
        }
        .dashboard {
            margin-top: 20px;
        }
        .cards {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1;
            margin: 0 10px;
            text-align: center;
        }
        .card h3 {
            margin: 0;
            font-size: 16px;
            color: #7f8c8d;
        }
        .card p {
            font-size: 24px;
            color: #2c3e50;
        }
        .charts {
            display: flex;
            justify-content: space-between;
        }
        .chart {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1;
            margin: 0 10px;
        }
        .chart h3 {
            margin: 0;
            font-size: 16px;
            color: #7f8c8d;
            margin-bottom: 20px;
        }
        .latest-cattle {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .latest-cattle h3 {
            margin: 0 0 20px;
            font-size: 16px;
            color: #7f8c8d;
        }
        .new-cattle-button {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            float: right;
        }
        .cattle-list {
            display: flex;
            flex-wrap: wrap;
        }
        .cattle-item {
            flex: 1 1 20%;
            text-align: center;
            margin: 10px;
        }
        .cattle-item img {
            width: 80px;
            height: 80px;
        }
        .cattle-item p {
            margin: 5px 0;
            font-size: 14px;
            color: #7f8c8d;
        }
        .view-all-cattle {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }
        .stats {
            display: flex;
            justify-content: space-between;
        }
        .stat-item {
            flex: 1;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 10px;
            text-align: center;
        }
        .stat-item.red {
            background-color: #e74c3c;
            color: #fff;
        }
        .stat-item.blue {
            background-color: #3498db;
            color: #fff;
        }
        .stat-item.green {
            background-color: #2ecc71;
            color: #fff;
        }
        .stat-item.orange {
            background-color: #e67e22;
            color: #fff;
        }
        .stat-item h3 {
            margin: 0 0 10px;
            font-size: 16px;
        }
        .stat-item p {
            margin: 0;
            font-size: 24px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <img src="logo.png" alt="AdminCM">
                <h1>AdminCM</h1>
            </div>
            <nav class="menu">
                <ul>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Cattle</a></li>
                    <li><a href="#">Cattle Types</a></li>
                    <li><a href="#">Medicines</a></li>
                    <li><a href="#">Breeds</a></li>
                    <li><a href="#">Milks</a></li>
                    <li><a href="#">Ledgers</a></li>
                    <li><a href="#">Tags</a></li>
                    <li><a href="#">Employees</a></li>
                    <li><a href="#">Inventory Management</a></li>
                    <li><a href="#">Admin Privilege</a></li>
                    <li><a href="#">Countries</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </nav>
        </aside>
        <main class="main-content">
            <header class="header">
                <div class="user-info">
                    <span>admin@admin.com</span>
                    <img src="user-avatar.png" alt="User Avatar">
                </div>
            </header>
            <section class="dashboard">
                <div class="cards">
                    <div class="card">
                        <h3>Total Cattle</h3>
                        <p>190</p>
                    </div>
                    <div class="card">
                        <h3>Total Income</h3>
                        <p>32,18,024</p>
                    </div>
                    <div class="card">
                        <h3>Total Expense</h3>
                        <p>1,05,99,900</p>
                    </div>
                    <div class="card">
                        <h3>Total Inventories</h3>
                        <p>16</p>
                    </div>
                </div>
                <div class="charts">
                    <div class="chart" id="income-expense-chart">
                        <h3>Monthly Income/Expense Report</h3>
                        <img src="income-expense-chart.png" alt="Income Expense Chart">
                    </div>
                    <div class="chart" id="cattle-types-chart">
                        <h3>Cattle by Types</h3>
                        <img src="cattle-types-chart.png" alt="Cattle Types Chart">
                    </div>
                </div>
                <div class="latest-cattle">
                    <h3>Latest Cattle</h3>
                    <button class="new-cattle-button">2 New Cattle</button>
                    <div class="cattle-list">
                        <div class="cattle-item">
                            <img src="cattle-placeholder.png" alt="Cattle">
                            <p>b12</p>
                            <p>May 28, 2024</p>
                        </div>
                        <div class="cattle-item">
                            <img src="cattle-placeholder.png" alt="Cattle">
                            <p>1235678</p>
                            <p>May 21, 2024</p>
                        </div>
                        <div class="cattle-item">
                            <img src="cattle-placeholder.png" alt="Cattle">
                            <p>5</p>
                            <p>Mar 27, 2024</p>
                        </div>
                        <div class="cattle-item">
                            <img src="cattle-placeholder.png" alt="Cattle">
                            <p>234234</p>
                            <p>Jan 18, 2024</p>
                        </div>
                        <div class="cattle-item">
                            <img src="cattle-placeholder.png" alt="Cattle">
                            <p>501</p>
                            <p>Dec 01, 2023</p>
                        </div>
                        <div class="cattle-item">
                            <img src="cattle-placeholder.png" alt="Cattle">
                            <p>789</p>
                            <p>Jun 27, 2023</p>
                        </div>
                        <div class="cattle-item">
                            <img src="cattle-placeholder.png" alt="Cattle">
                            <p>1934</p>
                            <p>Jun 15, 2023</p>
                        </div>
                        <div class="cattle-item">
                            <img src="cattle-placeholder.png" alt="Cattle">
                            <p>7800899</p>
                            <p>Jun 01, 2023</p>
                        </div>
                    </div>
                    <a href="#" class="view-all-cattle">View All Cattle</a>
                </div>
                <div class="stats">
                    <div class="stat-item red">
                        <h3>Total Sick Cattle</h3>
                        <p>2</p>
                        <p>Similar in 30 Days</p>
                    </div>
                    <div class="stat-item blue">
                        <h3>Total Milk Giving Cattle</h3>
                        <p>0</p>
                        <p>Similar in 30 Days</p>
                    </div>
                    <div class="stat-item green">
                        <h3>Total Expected Birth Cattle</h3>
                        <p>2</p>
                        <p>Similar in 30 Days</p>
                    </div>
                    <div class="stat-item orange">
                        <h3>Total Amount of Milks</h3>
                        <p>0</p>
                        <p>Similar in 30 Days</p>
                    </div>
                </div>
            </section>
            <footer class="footer">
                <p>Copyright © Cattle. All rights reserved</p>
                <p>Version 1.0</p>
            </footer>
        </main>
    </div>
</body>
</html>
