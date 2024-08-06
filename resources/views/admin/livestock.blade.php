<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiveStock Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-image: url(images/livestock_background.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 1s forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            opacity: 0;
            animation: fadeIn 1s forwards 0.5s;
        }

        .form-group {
            margin-bottom: 15px;
            opacity: 0;
            animation: fadeIn 1s forwards 0.75s;
            /* display: flex; */
            /* justify-content: space-between; */
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            width: calc(100% - 16px);
            padding: 8px;
            box-sizing: border-box;
            transition: border-color 0.3s, box-shadow 0.3s;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #28a745;
            box-shadow: 0 0 8px rgba(40, 167, 69, 0.2);
        }

        .form-group input[type="date"],
        .form-group input[type="time"] {
            padding: 7px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            opacity: 0;
            animation: fadeIn 1s forwards 1s;
        }

        .form-group button:hover {
            background-color: #218838;
            transform: scale(1.02);
        }

        .form-group button:focus {
            outline: none;
            box-shadow: 0 0 8px rgba(40, 167, 69, 0.5);
        }

        #color {
            height: 40px;
            padding: 0;
            border: none;
        }

        .success-message,
        .error-message {
            display: none;
            text-align: center;
            padding: 10px;
            color: #fff;
            margin-top: 10px;
            border-radius: 4px;
            animation: fadeIn 0.5s forwards;
        }

        .success-message {
            background-color: #28a745;
        }

        .error-message {
            background-color: #dc3545;
        }

        .hidden {
            display: none;
        }

        li {
            list-style-type: none;
        }

        .vaccinated input {
            width: auto;
            margin-right: 5px;
        }

        .form-group.vaccinated {
            display: flex;
            /* justify-content: start; */
        }

        nav {
            background-color: #92E341;
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
    <div class="container mt-5">
        <h2 class="mt-2">Animal Information</h2>
        <div class="success-message">Livestock added successfully</div>
        <div class="error-message">An error occurred. Please try again.</div>
        <form id="livestock-form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="animal-name">Animal Name:</label>
                <input type="text" id="animal-name" name="name" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Birthdate:</label>
                <input type="date" id="birthdate" name="birthdate" required>
            </div>
            <div class="form-group">
                <label for="color">Color:</label>
                <input type="color" id="color" name="color" required value="#ff0000">
            </div>
            <div class="form-group vaccinated">
                <label>Vaccinated:</label>
                <div class="d-flex align-items-center">
                    <input type="radio" id="vaccinated-yes" name="vaccinated" value="yes" required>
                    <label for="vaccinated-yes">Yes</label>
                </div>
                <div class="d-flex align-items-center">
                    <input type="radio" id="vaccinated-no" name="vaccinated" value="no" required>
                    <label for="vaccinated-no">No</label>
                </div>
            </div>
            <div class="form-group hidden" id="vaccination-date-group">
                <label for="vaccination-date">Vaccination Date:</label>
                <input type="date" id="vaccination-date" name="vaccinated_date">
            </div>
            <div class="form-group">
                <label for="feeding-time">Feeding Time:</label>
                <input type="time" id="feeding-time" name="feeding_time" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
    <div>
        <footer class="footer">
            <p class="footer_copyright" style="text-align:center">
                © Copyright 2024. Sudhar.
            </p>
        </footer>
    </div>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $('input[name="vaccinated"]').change(function () {
                if ($('#vaccinated-yes').is(':checked')) {
                    $('#vaccination-date-group').removeClass('hidden');
                } else {
                    $('#vaccination-date-group').addClass('hidden');
                    $('#vaccination-date').val(''); // Clear the vaccination date value
                }
            });

            $('#livestock-form').on('submit', function (e) {
                e.preventDefault();

                var formData = new FormData(this);
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

                // If vaccinated-no is checked, remove vaccinated_date from formData
                if ($('#vaccinated-no').is(':checked')) {
                    formData.delete('vaccinated_date');
                }

                $.ajax({
                    type: "POST",
                    url: "{{ route('add_livestock') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.status === 200) {
                            alert('Livestock added successfully.');
                            location.reload();
                            $('#livestock-form')[0].reset(); // Reset the form
                            $('#vaccination-date-group').addClass('hidden'); // Hide the vaccination date field
                        } else {
                            alert('Message: ' + response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        alert('An error occurred. Please try again.');
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>