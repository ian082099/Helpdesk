<!DOCTYPE html>
    <html lang="en">
    <head>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Ticket</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="style_create.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- Favicon -->
 <link rel="icon" href="./img/cs.png" type="image/x-icon">

    <!-- JavaScript libraries -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- JavaScript code for displaying max tickets alert -->

    </head>
  
<style>

</style>
    
    <body>
    
    
    <main>
        
    <div class="container">
     
    
        <!-- Card -->
        <div class="card">
            <div class="card-body">
             <img src="./img/cs.png" alt="Picture">
              <label style="font-size: 30px;">Create Ticket</label>
    
          
        <!-- Form to submit ticket -->
        <form method="post" action="process_ticket.php" id="ticketForm">
            <div class="form-group">
                <label for="student_number">Student Number</label>
                <input type="text" class="form-control" id="student_number" name="student_number" placeholder="Type your Student Number" required>
            </div>
    
   <div class="form-row" id="fullname">
    <div class="form-group col-md-3">
        <label for="surname">Surname</label>
        <input type="text" class="form-control" id="surname" name="surname" placeholder="Type your Surname" required oninput="inputFilled()" required>
    </div>
    <div class="form-group col-md-3">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Type your First Name" required oninput="inputFilled()" required>
    </div>
    <div class="form-group col-md-2">
        <label for="middle_initial">Middle Initial</label>
        <input type="text" class="form-control" id="middle_initial" name="middle_initial" maxlength="10" placeholder="Type your Middle Initial" required oninput="inputFilled()" required>
    </div>
    <div class="form-group col-md-2">
        <label for="suffix">Suffix(optional)</label>
        <input type="text" class="form-control" id="suffix" name="suffix" placeholder="Type your Suffix" oninput="inputFilled()">
    </div>
</div>


       <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Type your Email Address" required oninput="inputFilled()" required>
                <p>(important input ACTIVE email address)</p>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Type your Phone Number" required oninput="inputFilled()" required>
            </div>
        </div>
    </div>
    
            
        <div class="row">
        <div class="col">
      <div class="form-group">
    <label for="course">Course/Year</label>
    <input type="text" class="form-control" id="course" name="course" value="Computer Science" readonly>
</div>
        </div>
        
        <div class="col">
            <div class="form-group">
                <label for="year">Year and Section</label>
                <input type="text" class="form-control" id="year" name="year" placeholder="Type your year and section" oninput="inputFilled()" required>
            </div>
        </div>
    </div>
    
        <div class="form-group">
        <label for="help_topic">Help Topic</label>
        <select class="form-control" id="help_topic" name="help_topic" oninput="inputFilled()" required>
            <option value="">Select Help Topic</option>
            <option value="General Inquiry">General Inquiry</option>
            <option value="Technical Support">Admission</option>
            <option value="Billing Issue">Enrollment</option>
            <option value="Other">Other</option> <!-- Add "Other" option -->
        </select>
    </div>
    
            <div class="form-group" id="otherHelpTopic" style="display: none;">
                <label for="other_help_topic">Other Help Topic</label>
                <input type="text" class="form-control" id="other_help_topic" name="other_help_topic" placeholder="Please specify">
            </div>
            
       <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="9" placeholder="How can we help you?" required oninput="inputFilled()" required></textarea>
    </div>
            <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
            <button type="reset" class="btn btn-reset" id="resetButton">Reset</button>
    <button type="button" class="btn btn-primary btn-submit" id="cancelButton">
        &#11013; <!-- Unicode character for large leftwards arrow: ⬅ -->
    </button>
    
    
        </form>
    </div>
      </div>
        </div>
    
   <script>
    document.getElementById('ticketForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission
    
        // Get the input values
        var studentNumber = document.getElementById('student_number').value;
        var email = document.getElementById('email').value;

        // Show loading animation
        Swal.fire({
            title: "Loading...",
            html: '<div class="text-center"><i class="fas fa-spinner fa-spin fa-3x"></i></div>',
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false
        });

        // Send an AJAX request to check if the student exists
        $.ajax({
            type: 'POST',
            url: 'check_student.php',
            data: {
                student_number: studentNumber,
                email: email
            },
            success: function(response) {
                // Handle response from check_student.php
                if (response.trim() === 'exists') {
                    confirmSubmission(); // Call confirmSubmission if student exists
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: 'Invalid Student number',
                        icon: 'error'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', xhr.responseText); // Log the error
                Swal.fire({
                    title: 'Error',
                    text: 'An error occurred. Please try again later.',
                    icon: 'error'
                });
            }
        });
    });
    
    function confirmSubmission() {
        // Display a confirmation dialog
        Swal.fire({
            title: "Confirm Submission",
            text: "By submitting this ticket, you agree to our Privacy Policy. Do you want to proceed?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Submit",
            cancelButtonText: "Cancel",
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                // Display a loading dialog
                Swal.fire({
                    title: "Creating ticket...",
                    text: "Please wait",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading(); // Show loading animation
                    }
                });
    
                // Gather form data
                var formData = $('#ticketForm').serialize();
    
                // Send the form data via AJAX
                $.ajax({
                    type: 'POST',
                    url: 'process_ticket.php',
                    data: formData,
                    success: function(response) {
                        console.log('AJAX Success:', response); // Log the response
                        if (response.trim() === 'ticket_created') {
                            Swal.fire({
                                title: "Success",
                                text: "Ticket created successfully. Redirecting...",
                                icon: "success",
                                timer: 2000,
                                showConfirmButton: false,
                                willClose: () => {
                                    window.location.href = "current_ticket.php"; // Redirect after success
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: response,
                                icon: 'error'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', xhr.responseText); // Log the error
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred. Please try again later.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    }
</script>



    <?php
    // Check if there's an error message in the URL
    if (isset($_GET['error']) && $_GET['error'] === 'max_tickets') {
    ?>
    <script>
        // Function to show max tickets alert
        function showMaxTicketsAlert() {
            Swal.fire({
                title: "Max tickets reached for today",
                text: "You have already created 2 or more tickets today.",
                icon: "error",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "create_ticket.php"; 
                }
            });
        }

        // Call the function to show the max tickets alert
        showMaxTicketsAlert();
    </script>
    <?php
    }
    ?>
 

          <script src="script_create.js"></script>
    </main>
    <footer>
    <br>
   <p><a href="https://www.google.com/maps/search/?api=1&query=University+Road+NBP+Reservation+Brgy.+Poblacion%2C+City+of+Muntinlupa%2C+Philippines%2C+1776" target="_blank"><i class="fas fa-map-marker-alt fa-sm"></i> University Road NBP Reservation Brgy. Poblacion, City of Muntinlupa. Philippines, 1776</a></p>
<p><a href="mailto:plmuncomm@plmun.edu.ph"><i class="far fa-envelope fa-sm"></i> plmuncomm@plmun.edu.ph</a></p>

<p><a href="https://www.facebook.com/PLMUN.BSCS.SOCIETY" target="_blank"><i class="fab fa-facebook-square fa-sm"></i> Visit our Facebook page</a></p>
    </footer>

    </body>
    </html>
