<?php
// Database credentials
$servername = "127.0.0.1";
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password if set
$dbname = "db_tickets";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the most recent ticket data from the database
$sql = "SELECT * FROM tickets ORDER BY ticket_id DESC LIMIT 1";

$result = $conn->query($sql);

if ($result === false) {
    // Handle query error
    echo "Error executing query: " . $conn->error;
} elseif ($result->num_rows > 0) {
    // Output data of the most recent ticket
    $row = $result->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" href="./img/cs.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <title>Ticket Details</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column; /* Align items vertically */
                min-height: 100vh; /* Set minimum height of the body to 100% of the viewport height */
                background-image: url(./img/bg1.png);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center center;
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
                position: relative; /* Required for positioning the footer */
            }

            .container {
                max-width: 600px;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                margin-bottom: auto; /* Push the container to the top */
                color: #fff; /* White font color */
                font-weight: bold; /* Bold font weight */
            }

        h2 {
    margin-top: 0;
    margin-bottom: auto; /* Push the h2 element to the top */
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    color: #fff; /* White color */
    font-size: 30px; /* Example font size, adjust as needed */
}


            p {
                margin-bottom: 10px;
            }

            strong {
                font-weight: bold;
            }

            .btn {
                display: inline-block;
                padding: 8px 20px;
                margin: 10px; /* Add margin to create space between buttons */
                font-size: 16px;
                text-decoration: none;
                color: #fff;
                border-radius: 5px;
            }

            .btn-primary {
                background-color: maroon;
                font-weight: bold;
            }

            .btn-danger {
                background-color: #dc3545;
            }

            footer {
                position: absolute;
                bottom: -90px;
                width: 100%;
                background-color: #910000;
                color: #fff;
                padding: -10px;
                text-align: center;
            }

            footer a {
                color: #fff;
                text-decoration: none;
            }

            footer a:hover {
               text-decoration: none;
            }

            .card {
                width: 100%;
                max-width: 600px; /* Set maximum width to match the container */
                margin: 0 auto; /* Center the card horizontally */
                background-color: rgba(0, 0, 0, .3);
                backdrop-filter: blur(10px);
            }

         img {
     left: 2%;
    top: 0px; /* Adjust the value to move the image down */
    transform: translate(0);
    border-radius: 50%;
    width: 200px;
    height: 200px;
    cursor: pointer;
    position: absolute;
}


            .button-container {
                text-align: center;
                margin-top: 10px; /* Adjust the margin as needed */
            }

            .btn-create,
            .btn-home {
                margin: 10px; /* Add margin to create space between buttons */
            }
   .btn-submit {
    display: inline-block;
    margin: 40px; 
    /* Your button styles */
}
.btn-container {
    text-align: center;
}
            .icon {
               font-size: 60px; /* Adjust the size as needed */
            }
             #feedback {
            background-color: transparent;
            border: 1px solid white;
            color: white;
            resize: none;
        }
        
        .zoom-in {
  transform: scale(1.2);
  transition: transform 0.3s ease;
}

/* Hover effect */
.icon:hover {
  transform: scale(1.2);
  transition: transform 0.3s ease;
}
  input[type="radio"] {
            display: none;
        }

        /* Style the label as the clickable element */
        .rating-label {
            cursor: pointer;
        }
        i {
    font-size: 40px;
    cursor: pointer;
    transition: .4s;
}

i:hover {
    color: rgb(28, 199, 199);
    transform: scale(1.5);
}
        </style>
    </head>
    <body>
    <main>
        <div class="container">
           <img src="./img/cs.png" alt="Picture">
            <div class="card">
                <div class="card-body">
                    <h2>Ticket Details</h2>
                    <p><strong>Ticket Number:</strong> <?php echo $row["ticket_id"]; ?></p>
                    <p><strong>Student Number:</strong> <?php echo $row["student_number"]; ?></p>
                    <p><strong>Name:</strong> <?php echo $row["name"]; ?></p>
                    <p><strong>Email:</strong> <?php echo $row["email"]; ?></p>
                    <p><strong>Phone:</strong> <?php echo $row["phone"]; ?></p>
                    <p><strong>Course:</strong> <?php echo $row["course"]; ?></p>
                    <p><strong>Year:</strong> <?php echo $row["year"]; ?></p>
                    <p><strong>Help Topic:</strong> <?php echo $row["help_topic"]; ?></p>
                    <p><strong>Description:</strong> <?php echo $row["description"]; ?></p>
                    <br>
                    <div class="button-container">
                        <a href="create_ticket.php" class="btn btn-primary btn-create">Create Another Ticket</a>
                        <a href="index.php" class="btn btn-danger btn-home">Home</a>
                    </div>
                </div>
            </div>
            <br>
            <div id ="feedback-container">
            
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <label for="rating">Rate Us:</label><br>
             <div style="display: flex;">
        <div style="text-align: center; margin-right: 20px;">
            <input type="radio" id="rating1" name="rating" value="Terrible">
            <label for="rating1"><i class="far fa-angry icon" onclick="zoomIn('rating1', this)"></i></label><br>
            <span onclick="zoomIn('rating1', this)">Terrible</span>
        </div>
        <div style="text-align: center; margin-right: 20px;">
            <input type="radio" id="rating2" name="rating" value="Bad">
            <label for="rating2"><i class="far fa-frown icon" onclick="zoomIn('rating2', this)"></i></label><br>
            <span onclick="zoomIn('rating2', this)">Bad</span>
        </div>
        <div style="text-align: center; margin-right: 20px;">
            <input type="radio" id="rating3" name="rating" value="Okay">
            <label for="rating3"><i class="far fa-meh icon" onclick="zoomIn('rating3', this)"></i></label><br>
            <span onclick="zoomIn('rating3', this)">Okay</span>
        </div>
        <div style="text-align: center; margin-right: 20px;">
            <input type="radio" id="rating4" name="rating" value="Good">
            <label for="rating4"><i class="far fa-smile icon" onclick="zoomIn('rating4', this)"></i></label><br>
            <span onclick="zoomIn('rating4', this)">Good</span>
        </div>
        <div style="text-align: center;">
            <input type="radio" id="rating5" name="rating" value="Amazed">
            <label for="rating5"><i class="far fa-grin icon" onclick="zoomIn('rating5', this)"></i></label><br>
            <span onclick="zoomIn('rating5', this)">Amazed</span>
        </div>
    </div>
<br><br>
                    <label for="feedback">Feedback:</label><br>
    <textarea id="feedback" name="feedback" rows="8" cols="75"></textarea>
                    <br><br>
             <div class="btn-container">
    <button type="submit" class="btn btn-primary btn-submit" id="submitButton">Submit</button>
</div>

                </form>
            </div>
        </div>
          
    </main>
    <footer>
        <br>
        <p><a href="https://www.google.com/maps/search/?api=1&query=University+Road+NBP+Reservation+Brgy.+Poblacion%2C+City+of+Muntinlupa%2C+Philippines%2C+1776" target="_blank"><i class="fas fa-map-marker-alt fa-sm"></i> University Road NBP Reservation Brgy. Poblacion, City of Muntinlupa. Philippines, 1776</a></p>
<p><i class="far fa-envelope fa-sm"></i> plmuncomm@plmun.edu.ph</p>
<p><a href="https://www.facebook.com/PLMUN.BSCS.SOCIETY" target="_blank"><i class="fab fa-facebook-square fa-sm"></i> Visit our Facebook page</a></p>
    </footer>
     <script>
        let currentZoomedIcon = null;

        function zoomIn(id, icon) {
            if (currentZoomedIcon !== null) {
                currentZoomedIcon.classList.remove('zoom-in');
            }

            if (currentZoomedIcon !== icon) {
                icon.classList.add('zoom-in');
                currentZoomedIcon = icon;
            } else {
                currentZoomedIcon = null;
            }
        }
    </script>
    </body>
    </html>
  <?php
} else {
    echo "No recent ticket found";
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if 'rating' and 'feedback' are set in the $_POST array
    if (isset($_POST['rating']) && isset($_POST['feedback'])) {
        // Get the submitted rating and feedback
        $rating = $_POST['rating'];
        $feedback = $_POST['feedback'];
        
        // Prepare and bind SQL statement to insert feedback into the database
        $stmt = $conn->prepare("INSERT INTO feedback (ticket_id, student_number, name, emojie, feedback) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $ticket_id, $student_number, $name, $rating, $feedback);
        
        // Retrieve the ticket data from the database again
        $sql = "SELECT * FROM tickets ORDER BY ticket_id DESC LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Assign variables for Ticket ID, Student Number, and Name
            $ticket_id = $row["ticket_id"];
            $student_number = $row["student_number"];
            $name = $row["name"];
        } else {
            echo "<h2>Error: No recent ticket found</h2>";
        }
        
        // Execute the SQL statement
        if ($stmt->execute()) {
            // Display success message using SweetAlert
            echo "<script>
                    Swal.fire({
                      title: 'Good job!',
                      text: 'Feedback Saved Successfully!',
                      icon: 'success',
                      confirmButtonText: 'OK'
                    }).then(() => {
                        document.getElementById('feedback-container').style.display = 'none';
                    });
                  </script>";
        } else {
            // Display error message using SweetAlert
            echo "<script>
                    Swal.fire({
                      title: 'Oops...',
                      text: 'Error Saving Feedback: ".$conn->error."',
                      icon: 'error',
                      confirmButtonText: 'OK'
                    });
                  </script>";
        }
        
        // Close statement
        $stmt->close();
    } else {
        // Handle case where 'rating' or 'feedback' is not set in $_POST
        echo "<script>
                Swal.fire({
                  title: 'Oops...',
                  text: 'Please provide both rating and feedback.',
                  icon: 'error',
                  confirmButtonText: 'OK'
                });
              </script>";
    }
}

// Close database connection
$conn->close();
?>
