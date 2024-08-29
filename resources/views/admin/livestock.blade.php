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
            background-size: cover;
            background-repeat: no-repeat;
        }

        .container {
            max-width: 800px;
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
            color: black;
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

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            table-layout: fixed;
        }

        table th,
        table td {
            text-align: center;
        }

        textarea {
            width: 100%;
        }

        .prescription {
            line-break: anywhere;
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

    <!-- New section for displaying animals -->
    <div class="">
        <h2 class="mt-2">Animal List</h2>
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Birthdate</th>
                        <th>Color</th>
                        <th>Feeding Time</th>
                        <th>Gender</th>
                        <th>Image</th>
                        <th>Prescription</th>
                        <th>Report</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="animal-list">
                    <!-- Dynamic content will be loaded here -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit Form Modal -->
    <div class="modal fade" id="editAnimalModal" tabindex="-1" aria-labelledby="editAnimalModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAnimalModalLabel">Edit Animal</h5>
                </div>
                <div class="modal-body">
                    <form id="edit-livestock-form">
                        <input type="hidden" id="edit-animal-id">
                        <div class="form-group">
                            <label for="edit-animal-name">Animal Name:</label>
                            <input type="text" id="edit-animal-name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-birthdate">Birthdate:</label>
                            <input type="date" id="edit-birthdate" name="birthdate" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-color">Color:</label>
                            <input type="color" id="edit-color" name="color" required>
                        </div>
                        <div class="form-group vaccinated">
                            <label>Vaccinated:</label>
                            <div class="d-flex align-items-center">
                                <input type="radio" id="edit-vaccinated-yes" name="vaccinated" value="yes">
                                <label for="edit-vaccinated-yes">Yes</label>
                            </div>
                            <div class="d-flex align-items-center">
                                <input type="radio" id="edit-vaccinated-no" name="vaccinated" value="no">
                                <label for="edit-vaccinated-no">No</label>
                            </div>
                        </div>
                        <div class="form-group hidden" id="edit-vaccination-date-group">
                            <label for="edit-vaccination-date">Vaccination Date:</label>
                            <input type="date" id="edit-vaccination-date" name="vaccinated_date">
                        </div>
                        <div class="form-group">
                            <label for="edit-feeding-time">Feeding Time:</label>
                            <input type="time" id="edit-feeding-time" name="feeding_time" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-gender">Gender:</label>
                            <select id="edit-gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-image">Upload New Image:</label>
                            <input type="file" id="edit-image" name="image" accept="image/*">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Doctor Number Modal -->
    <div class="modal fade" id="doctorNumberModal" tabindex="-1" role="dialog" aria-labelledby="doctorNumberModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="doctorNumberModalLabel">Doctor Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="doctor-info-form">
                        <input type="hidden" id="livestock_id" value="2"> <!-- Hidden field for livestock ID -->

                        <div class="form-group">
                            <label for="doctor-name">Doctor Name:</label>
                            <input type="text" id="doctor-name" name="doctor_name">
                        </div>
                        <div class="form-group">
                            <label for="prescription">Prescription:</label>
                            <textarea id="doctor-prescription" name="prescription"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Report Modal -->
    <!-- Modal Structure -->
    <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Dynamic content will be injected here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <footer>
        <p>© 2024 Farm Management App. All rights reserved.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            // Set up CSRF token for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Function to load animals into the table
            function loadAnimals() {
                $.ajax({
                    url: '{{ url('/show_livestock') }}',
                    type: 'GET',
                    success: function (response) {
                        var animalList = $('#animal-list');
                        animalList.empty(); // Clear existing rows
                        if (response.animals && response.animals.length) {
                            $.each(response.animals, function (index, animal) {
                                animalList.append(
                                    '<tr>' +
                                    '<td>' + animal.id + '</td>' +
                                    '<td>' + animal.name + '</td>' +
                                    '<td>' + animal.birthdate + '</td>' +
                                    '<td>' + animal.color + '</td>' +
                                    '<td>' + animal.feeding_time + '</td>' +
                                    '<td>' + animal.gender + '</td>' +
                                    '<td><img src="' + animal.image + '" width="100" height="100"></td>' +
                                    '<td class="prescription">' + (animal.prescription || 'No prescription details available') + '</td>' +
                                    '<td><button class="btn btn-primary btn-sm doctor-number-btn" data-id="' + animal.id + '">Doctor Report</button></td>' +
                                    '<td><button class="btn btn-primary btn-sm viewreport-btn" data-id="' + animal.id + '">View Report</button></td>' +

                                    '</tr>'
                                );
                            });
                        } else {
                            animalList.append('<tr><td colspan="10">No animals found</td></tr>');
                        }
                    },
                    error: function (response) {
                        console.error('Error:', response);
                        alert('An error occurred. Please try again.');
                    }
                });
            }

            // Load animals on page load
            loadAnimals();

            // Show/hide vaccination date field based on vaccination status
            $('input[name="vaccinated"]').change(function () {
                if ($(this).val() === 'yes') {
                    $('#vaccination-date-group').removeClass('hidden');
                } else {
                    $('#vaccination-date-group').addClass('hidden');
                }
            });

            // Handle Doctor report button click
            $(document).on('click', '.doctor-number-btn', function () {
                var animalId = $(this).data('id');

                $.ajax({
                    url: '/get_doctor_info/' + animalId, // Adjust the URL to match your route
                    type: 'get',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        $('#doctor-name').val(response.doctor_name || '');
                        $('#doctor-prescription').val(response.prescription || '');
                        $('#livestock_id').val(animalId);
                        $('#doctorNumberModal').modal('show');
                    },
                    error: function (response) {
                        console.error('Error:', response);
                        alert('Failed to fetch doctor information. Please try again.');
                    }
                });
            });

            // Handle edit button click
            $(document).on('click', '.edit-btn', function () {
                var id = $(this).data('id');

                $.ajax({
                    url: '/edit_livestock/' + id,
                    method: 'GET',
                    success: function (response) {
                        if (response) {
                            // Populate modal with the animal data
                            $('#edit-animal-id').val(response.id);
                            $('#edit-animal-name').val(response.name);
                            $('#edit-birthdate').val(response.birthdate);
                            $('#edit-color').val(response.color);
                            $('#edit-feeding-time').val(response.feeding_time);
                            $('#edit-gender').val(response.gender);

                            if (response.vaccinated === 'yes') {
                                $('#edit-vaccinated-yes').prop('checked', true);
                                $('#edit-vaccination-date-group').removeClass('hidden');
                                $('#edit-vaccination-date').val(response.vaccinated_date);
                            } else {
                                $('#edit-vaccinated-no').prop('checked', true);
                                $('#edit-vaccination-date-group').addClass('hidden');
                            }

                            $('#editAnimalModal').modal('show');
                        }
                    },
                    error: function (response) {
                        console.error('Error:', response);
                        alert('Failed to load animal data. Please try again.');
                    }
                });
            });
            $(document).ready(function () {
                $(document).on('click', '.viewreport-btn', function () {
                    var reportId = $(this).data('id');

                    $.ajax({
                        url: '/report/' + reportId,
                        method: 'GET',
                        success: function (response) {
                            $('#reportModal .modal-body').html(response);
                            $('#reportModal').modal('show');
                        },
                        error: function () {
                            $('#reportModal .modal-body').html('An error occurred while fetching the report.');
                            $('#reportModal').modal('show');
                        }
                    });
                });
            });

            // Handle livestock form submission
            $('#livestock-form').submit(function (event) {
                event.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: '{{ url('/add_livestock') }}',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.success) {
                            $('.success-message').show();
                            loadAnimals(); // Refresh the list
                            $('#livestock-form')[0].reset(); // Reset form
                            $('#livestockModal').modal('hide');
                        } else {
                            alert('Failed to add livestock. Please try again.');
                        }
                    },
                    error: function (response) {
                        console.error('Error:', response);
                        alert('An error occurred. Please try again.');
                    }
                });
            });

            // Handle edit livestock form submission
            $('#edit-livestock-form').submit(function (event) {
                event.preventDefault(); // Prevent the default form submission

                // Retrieve the ID from the form's data attribute or a hidden input field
                var livestockId = $(this).data('id'); // Adjust this if the ID is elsewhere

                // Create FormData object from the form
                var formData = new FormData(this);

                $.ajax({
                    url: '{{ url('/update_livestock') }}/' + livestockId, // Include the ID in the URL
                    type: 'POST', // Use POST method
                    data: formData, // Send the form data
                    contentType: false, // Prevent jQuery from setting Content-Type header
                    processData: false, // Prevent jQuery from processing the data
                    success: function (response) {
                        if (response.success) {
                            $('.success-message').show(); // Show success message
                            loadAnimals(); // Refresh the list of animals
                            $('#edit-livestock-form')[0].reset(); // Reset the form fields
                            $('#editAnimalModal').modal('hide'); // Hide the modal
                        } else {
                            alert('Failed to update livestock. Please try again.'); // User-friendly alert
                        }
                    },
                    error: function (response) {
                        console.error('Error:', response); // Log the error for debugging
                        alert('An error occurred. Please try again.'); // User-friendly error alert
                    }
                });
            });

            // Handle doctor info form submission
            $('#doctor-info-form').submit(function (event) {
                event.preventDefault(); // Prevent the form from submitting the traditional way
                var formData = $(this).serialize(); // Serialize form data
                var id = $('#livestock_id').val(); // Get the value of the livestock_id field

                $.ajax({
                    url: '{{ url('/save_doctor_info') }}/' + id, // Construct the URL with the livestock_id
                    type: 'POST', // HTTP method
                    data: formData, // Data to send to the server
                    success: function (response) {
                        console.log('Success response:', response); // Log the response for debugging
                        if (response.success) {
                            console.log('Doctor information saved successfully.');
                            location.reload(); // Refresh the page
                            $('#doctorNumberModal').modal('hide'); // Hide the modal
                        } else {
                            alert('Doctor information saved successfully.');
                            location.reload();// Alert if success is not true
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error); // Log the error message for debugging
                        alert('An error occurred. Please try again.'); // Alert for general errors
                    }
                });
            });

        });
    </script>

</body>

</html>