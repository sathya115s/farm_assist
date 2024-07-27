<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>FARM ASSIST</title>
  <link rel="icon" type="image/png" href="images/farm-logo.svg">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <style>
    /* Import Google font - Open Sans */
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Open Sans', sans-serif;
    }

    body {
      background-image: url('images/weather-image.webp');
      background-repeat: no-repeat;
      background-size: cover;
      width: 100%;
      height: 100%;
      overflow-y: scroll;
    }

    h1 {
      background: linear-gradient(90deg, #3a6c40, #5a8d50);
      font-size: 1.75rem;
      text-align: center;
      padding: 18px 0;
      color: #fff;
      border-radius: 5px;
      margin-bottom: 20px;
      animation: slideIn 1s ease-in-out;
    }

    .container {
      display: flex;
      gap: 35px;
      padding: 30px;
      justify-content: center;
      flex-wrap: wrap;
      animation: fadeIn 1.5s ease-in-out;
    }

    .weather-input {
      width: 550px;
      background: rgba(255, 255, 255, 0.85);
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
      animation: zoomIn 1s ease-in-out;
    }

    .weather-input h3 {
      font-size: 1.5rem;
      margin-bottom: 15px;
    }

    .weather-input input {
      height: 46px;
      width: 100%;
      outline: none;
      font-size: 1.07rem;
      padding: 0 17px;
      margin: 10px 0 20px 0;
      border-radius: 4px;
      border: 1px solid #ccc;
      transition: border 0.3s ease, box-shadow 0.3s ease;
    }

    .weather-input input:focus {
      padding: 0 16px;
      border: 2px solid #FF5722;
      box-shadow: 0 4px 8px rgba(255, 87, 34, 0.2);
    }

    .weather-input .separator {
      height: 1px;
      width: 100%;
      margin: 25px 0;
      background: #BBBBBB;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .weather-input .separator::before {
      content: "or";
      color: #6C757D;
      font-size: 1.18rem;
      padding: 0 15px;
      margin-top: -4px;
      background: #FFEB3B;
      border-radius: 50%;
      padding: 0 10px;
    }

    .weather-input button {
      width: 100%;
      padding: 10px 0;
      cursor: pointer;
      outline: none;
      border: none;
      border-radius: 4px;
      font-size: 1rem;
      color: #fff;
      background: #3a6c40;
      transition: 0.2s ease, transform 0.2s ease;
    }

    .weather-input button:hover {
      background: #e53935;
      transform: translateY(-2px);
    }

    .weather-input .location-btn {
      background: #3a6c40;
    }

    .weather-input .location-btn:hover {
      background: #616161;
    }

    .weather-data {
      width: 100%;
    }

    .weather-data .current-weather {
      color: #fff;
      background: rgba(49, 104, 49, 0.9);
      border-radius: 5px;
      padding: 20px 70px 20px 20px;
      display: flex;
      justify-content: space-between;
      position: relative;
      overflow: hidden;
      animation: fadeIn 1s ease-in-out;
    }

    .current-weather h2 {
      font-weight: 700;
      font-size: 1.7rem;
    }

    .weather-data h6 {
      margin-top: 12px;
      font-size: 1rem;
      font-weight: 500;
    }

    .current-weather .icon {
      text-align: center;
    }

    .current-weather .icon img {
      max-width: 120px;
      margin-top: -15px;
    }

    .current-weather .icon h6 {
      margin-top: -10px;
      text-transform: capitalize;
    }

    .days-forecast h2 {
      margin: 20px 0;
      font-size: 1.5rem;
      text-align: center;
      animation: slideIn 1.2s ease-in-out;
    }

    .days-forecast .weather-cards {
      display: flex;
      gap: 20px;
      justify-content: center;
      flex-wrap: wrap;
      animation: fadeIn 1.5s ease-in-out;
    }

    .weather-cards .card {
      color: #fff;
      padding: 18px 16px;
      list-style: none;
      width: calc(100% / 5 - 20px);
      background: rgba(49, 104, 49, 0.9);
      border-radius: 5px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
      animation: fadeIn 1s ease-in-out;
      transition: transform 0.2s ease;
    }

    .weather-cards .card:hover {
      transform: translateY(-10px);
    }

    @keyframes fall {
      to {
        transform: translateY(100vh);
      }
    }

    @keyframes pulse {
      0% {
        transform: scale(0.95);
      }
      70% {
        transform: scale(1);
        box-shadow: 0 0 50px rgba(255, 223, 0, 0.7);
      }
      100% {
        transform: scale(0.95);
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    @keyframes slideIn {
      from {
        transform: translateY(-100px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    @keyframes zoomIn {
      from {
        transform: scale(0.8);
        opacity: 0;
      }
      to {
        transform: scale(1);
        opacity: 1;
      }
    }

    @media (max-width: 1400px) {
      .weather-data .current-weather {
        padding: 20px;
      }

      .weather-cards {
        flex-wrap: wrap;
      }

      .weather-cards .card {
        width: calc(100% / 4 - 15px);
      }
    }

    @media (max-width: 1200px) {
      .weather-cards .card {
        width: calc(100% / 3 - 15px);
      }
    }

    @media (max-width: 950px) {
      .weather-input {
        width: 450px;
      }

      .weather-cards .card {
        width: calc(100% / 2 - 15px);
      }
    }

    @media (max-width: 768px) {
      .weather-input {
        width: 100%;
        padding: 20px;
      }

      .weather-cards .card {
        width: 100%;
      }
    }

    @media (max-width: 480px) {
      .weather-input h3 {
        font-size: 1.2rem;
      }

      .weather-input input {
        height: 40px;
        padding: 0 12px;
        font-size: 1rem;
      }

      .weather-input button {
        padding: 8px 0;
        font-size: 0.9rem;
      }
    }
    li{
            list-style-type: none;
        }
  </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-md">
            <a class="navbar-brand" href="#">FARMING MANAGEMENT APP</a>
            @if (Auth::check())
                <li>
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-primary">LOGOUT ({{ Auth::user()->name }})</button>
                    </form>
                </li>
            @endif
        </div>
    </nav>
  <div class="container">
    <div class="weather-input">
      <h3>Check the Weather Forecast</h3>
      <input type="text" id="city" placeholder="Enter city">
      <button onclick="getWeather()">Search</button>
      <div class="separator"></div>
      <button class="location-btn" onclick="getLocation()">Get Weather by Location</button>
    </div>
    <div class="weather-data" id="weather-data">
      <!-- Weather data will be injected here -->
    </div>
  </div>

  <script>
    const apiKey = 'eb598c768375941e4132d7fec878c58c'; // Replace with your OpenWeatherMap API key

    function getWeather() {
      const city = document.getElementById('city').value;
      if (city) {
        fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`)
          .then(response => response.json())
          .then(data => displayWeather(data));
      }
    }

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
          const lat = position.coords.latitude;
          const lon = position.coords.longitude;
          fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric`)
            .then(response => response.json())
            .then(data => displayWeather(data));
        });
      }
    }

    function displayWeather(data) {
      const weatherData = document.getElementById('weather-data');
      const icon = `https://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`;
      const weatherHTML = `
        <div class="current-weather">
          <div>
            <h2>${data.name}, ${data.sys.country}</h2>
            <h6>${new Date().toLocaleDateString()}</h6>
            <h6>Temperature: ${data.main.temp}°C</h6>
            <h6>Humidity: ${data.main.humidity}%</h6>
            <h6>Wind: ${data.wind.speed} m/s</h6>
          </div>
          <div class="icon">
            <img src="${icon}" alt="Weather Icon">
            <h6>${data.weather[0].description}</h6>
          </div>
        </div>
      `;
      weatherData.innerHTML = weatherHTML;
      getForecast(data.coord.lat, data.coord.lon);
    }

    function getForecast(lat, lon) {
      fetch(`https://api.openweathermap.org/data/2.5/forecast?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric`)
        .then(response => response.json())
        .then(data => displayForecast(data));
    }

    function displayForecast(data) {
      const forecastData = document.getElementById('weather-data');
      const forecastHTML = `
        <div class="days-forecast">
          <h2>5-Day Forecast</h2>
          <div class="weather-cards">
            ${data.list.filter(item => item.dt_txt.endsWith('00:00:00')).map(day => `
              <div class="card">
                <h3>${new Date(day.dt * 1000).toLocaleDateString('en-US', { weekday: 'long' })}</h3>
                <h3>${day.main.temp}°C</h3>
                <h6>${day.weather[0].description}</h6>
              </div>
            `).join('')}
          </div>
        </div>
      `;
      forecastData.innerHTML += forecastHTML;
    }
  </script>
</body>

</html>
