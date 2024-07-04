<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Assist - Sign In</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .video-bg {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
        }

        .container {
            animation: fadeIn 1s ease-in-out;
            position: relative;
            z-index: 1;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .form-icon-container {
            position: relative;
        }

        .form-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .logo {
            width: 150px;
            height: auto;
        }

        form {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 20px;
        }
    </style>
</head>

<body>
    <!-- Video Background -->
    <video autoplay muted loop class="video-bg">
        <source src="video/farm-background-video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="container">
        <div class="row justify-content-center min-vh-100 py-5">
            <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
                <div class="d-flex justify-content-center">
                    <a class="d-flex flex-center text-decoration-none mb-4" href="/">
                        <!-- <img src="images/farm-assist-logo.jpg" alt="Logo" class="logo"> -->
                    </a>
                </div>
                <div class="text-center mb-7">
                    <h3 class="text-1000">Sign In</h3>
                    <p class="text-700">Access your farmer account</p>
                </div>

                <form method="POST">
                    @csrf

                    <div class="mb-3 text-start">
                        <label class="form-label" for="email">Email address</label>
                        <div class="form-icon-container">
                            <input class="form-control form-icon-input" id="email" type="email" name="email"
                                placeholder="name@example.com" required autofocus autocomplete="email" />
                            <span class="fas fa-user text-900 fs--1 form-icon"></span>
                        </div>
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label" for="password">Password</label>
                        <div class="form-icon-container">
                            <input class="form-control form-icon-input" id="password" type="password" name="password"
                                placeholder="Password" required autocomplete="current-password" />
                            <span class="fas fa-key text-900 fs--1 form-icon"></span>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 mb-3" type="submit">Sign In</button>
                </form>
                <!-- <div class="text-center"><a class="fs--1 fw-bold" href="sign-up.html">Create an account</a></div> -->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
