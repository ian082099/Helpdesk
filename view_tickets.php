<?php
// Replace these with your actual database credentials
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "db_tickets";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize $result variable
$result = null;

// Check if the search form is submitted and search input is not empty
if(isset($_POST['search_ticket_id']) && !empty($_POST['search_ticket_id'])) {
    // Get the search query from the form
    $search_ticket_id = $_POST['search_ticket_id'];
    
    // Construct SQL query to filter tickets by ticket_id
    $sql = "SELECT * FROM tickets WHERE ticket_id LIKE '%$search_ticket_id%'";
    
    // Execute SQL query
    $result = $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Tickets</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="style_view.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- Favicon -->
   <link rel="icon" href="./img/cs.png" type="image/x-icon">
</head>

<body>

<main>
 
    <div class="container">
     <img src="./img/cs.png" alt="Picture">
        <h3>View Your Tickets</h3>
        <!-- Search form -->
      <form method="post">
    <div class="form-group">
        <input type="text" class="form-control" id="search_ticket_id" name="search_ticket_id" placeholder="Enter ticket number">
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
</form>

        <br>
        <!-- Ticket table -->
        <div class="mainbody">
        <div class="table-container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                     <th>Ticket Number</th>
                        <th>Student Number</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Help Topic</th>
                        <th>Description</th> <!-- Adjusted width for Description column -->
                        <th>Status</th>
                        <th>Comply by</th>
                        <th>Comply date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if $result is not null and has rows
                    if ($result !== null && $result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["ticket_id"] . "</td>";
                            echo "<td>" . $row["student_number"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["phone"] . "</td>";
                            echo "<td>" . $row["course"] . "</td>";
                            echo "<td>" . $row["year"] . "</td>";
                            echo "<td>" . $row["help_topic"] . "</td>";
                            echo "<td>" . $row["description"] . "</td>"; // Description column
                            echo "<td>" . $row["status"] . "</td>";
                            echo "<td>" . $row["comply_by"] . "</td>";
                            echo "<td>" . $row["comply_date"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>No data available</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
         </div>
        <div class="btn-container">
            <a href="index.php" class="btn btn-primary btn-back">Back</a>
        </div>
   
    </div>
</main>
<footer>
    <br>

      <p><a href="https://www.google.com/maps/search/?api=1&query=University+Road+NBP+Reservation+Brgy.+Poblacion%2C+City+of+Muntinlupa%2C+Philippines%2C+1776" target="_blank"><i class="fas fa-map-marker-alt fa-sm"></i>
       University Road NBP Reservation Brgy. Poblacion, City of Muntinlupa. Philippines, 1776</a></p>
<p><a href="mailto:plmuncomm@plmun.edu.ph"><i class="far fa-envelope fa-sm"></i> plmuncomm@plmun.edu.ph</a></p>

<p><a href="https://www.facebook.com/PLMUN.BSCS.SOCIETY" target="_blank"><i class="fab fa-facebook-square fa-sm"></i> Visit our Facebook page</a></p>
   
</footer>
</body>
</html>
