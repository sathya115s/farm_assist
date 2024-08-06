<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agricultural Practices</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #366639;
            color: white;
            padding: 1em;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 1em;
        }

        main {
            padding: 2em 1em;
            max-width: 1200px;
            margin: auto;
        }

        .practice-card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 1.5em;
            text-align: center;
            box-sizing: border-box;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            position: relative;
            margin-bottom: 2em;
        }

        .practice-card:hover {
            background-color: #f0f8ff;
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .practice-card img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 1em;
            transition: transform 0.3s ease;
        }

        .practice-card:hover img {
            transform: scale(1.05);
        }

        .practice-card h3 {
            color: #0288d1;
            margin-bottom: 0.5em;
        }

        .practice-card p {
            line-height: 1.6;
        }

        .practice-card iframe {
            width: 100%;
            height: 200px;
            margin-top: 1em;
            border-radius: 10px;
        }

        .video-link {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 10;
            background-color: rgba(255, 255, 255, 0);
        }

        footer {
            background-color: #92E341;
            color: black;
            text-align: center;
            padding: 0.5em;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 2em;
        }

        h2 {
            color: #0288d1;
            margin-bottom: 1em;
        }

        nav {
            background-color: #92E341;
            margin-bottom: 2em;
        }

        li {
            list-style-type: none;
        }
        footer {
            background-color: #92E341;
            color: white;
            text-align: center;
            padding: 0.5em;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 2em;
        }
        .practice-card{
            margin-right: 10px;
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
    <main>
        <section class="practice row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="practice-card">
                <h3>Soil Preparation</h3>
                <p>Preparing the soil involves plowing, leveling, and adding organic matter to create a suitable
                    environment for seeds.</p>
                <a href="https://www.youtube.com/watch?v=yQGwGXQi3n4" class="video-link" target="_blank"></a>
                <iframe src="https://www.youtube.com/embed/yQGwGXQi3n4" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
               <div class="practice-card">
               <h3>Sowing</h3>
                <p>Sowing involves planting seeds at the right depth and spacing to ensure optimal growth and yield.</p>
                <a href="https://www.youtube.com/watch?v=Sdx54YgNS0c" class="video-link" target="_blank"></a>
                <iframe src="https://www.youtube.com/embed/Sdx54YgNS0c" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="practice-card">
                <h3>Irrigation</h3>
                <p>Irrigation provides the necessary water to crops at various growth stages to ensure healthy
                    development.</p>
                <a href="https://www.youtube.com/watch?v=pTBcK9zOAFk" class="video-link" target="_blank"></a>
                <iframe src="https://www.youtube.com/embed/pTBcK9zOAFk" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                </div>
                
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="practice-card">
                <h3>Fertilizing</h3>
                <p>Applying fertilizers helps provide essential nutrients that crops need to grow and produce yields.
                </p>
                <a href="https://www.youtube.com/watch?v=aRmT4JAQP_Y" class="video-link" target="_blank"></a>
                <iframe src="https://www.youtube.com/embed/aRmT4JAQP_Y" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
               <div class="practice-card">
               <h3>Weeding</h3>
                <p>Weeding involves removing unwanted plants that compete with crops for nutrients, water, and sunlight.
                </p>
                <a href="https://www.youtube.com/watch?v=jvaivzrr-kU" class="video-link" target="_blank"></a>
                <iframe src="https://www.youtube.com/embed/jvaivzrr-kU" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="practice-card">
                <h3>Pest Control</h3>
                <p>Using various methods to control pests that can damage crops and reduce yields.</p>
                <a href="https://www.youtube.com/watch?v=OKWH3I29UZY" class="video-link" target="_blank"></a>
                <iframe src="https://www.youtube.com/embed/OKWH3I29UZY" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12
            ">
                <div class="practice-card">
                <h3>Harvesting</h3>
                <p>Harvesting is the process of gathering mature crops from the fields, ensuring they are collected at
                    the right time for optimal quality.</p>
                <a href="https://www.youtube.com/watch?v=a50k3V9Igfg" class="video-link" target="_blank"></a>
                <iframe src="https://www.youtube.com/embed/a50k3V9Igfg" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                </div>
            </div>
        </section>
    </main>
    <div>
        <footer class="footer">
            <p class="footer_copyright" style="text-align:center">
                © Copyright 2024. Sudhar.
            </p>
        </footer>
    </div>
</body>

</html>