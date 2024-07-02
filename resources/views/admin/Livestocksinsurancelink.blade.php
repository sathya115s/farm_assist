<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Livestock Insurance</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: Arial, sans-serif;
      padding-top: 20px;
    }
    .header {
      background-color: #7bc043;
      color: white;
      padding: 10px 20px;
      font-size: 18px;
      font-weight: bold;
      text-align: center;
    }
    .container {
      max-width: 600px;
      margin: auto;
      padding-top: 20px;
    }
    .card {
      margin-top: 20px;
      border: none;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .card img {
      width: 100%;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }
    .card-body {
      padding: 20px;
    }
    .btn-link {
      background-color: #7bc043;
      color: white;
      border: none;
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
    }
    .btn-link:hover {
      background-color: #69a834;
    }
  </style>
</head>
<body>

  <div class="header">
    LIVESTOCK INSURANCE
  </div>

  <div class="container">
    <div class="card">
      <img src="https://via.placeholder.com/500x250" alt="Cow Image">
      <div class="card-body">
        <h5 class="card-title">Livestock insurance</h5>
        <p class="card-text text-success">Protect your livestock investment</p>
        <ul>
          <li>Offers financial protection against animal death to farmers and cattle rearers</li>
          <li>Provides coverage for crossbred and high yielding cattle and buffaloes</li>
          <li>Subsidizes the premium for insurance coverage</li>
          <li>Offers a maximum coverage of the current market price of the insured animals</li>
          <li>Provides a subsidy benefit of up to 2 animals per beneficiary for a policy of maximum three years</li>
          <li>Is being implemented in 100 newly selected districts across the country</li>
        </ul>
        <button class="btn btn-link" onclick="generateLink()">Get Link</button>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    function generateLink() {
      const link = 'https://example.com/insurance';
      alert('Here is your link: ' + link);
    }
  </script>

</body>
</html>

