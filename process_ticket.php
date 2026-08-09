<?php
session_start(); // Start the session
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP; // Include SMTP class for SMTP debugging constants

// Include PHPMailer Autoloader
require 'C:/xampp/htdocs/HelpDesk/PHPMailer/src/Exception.php';
require 'C:/xampp/htdocs/HelpDesk/PHPMailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/HelpDesk/PHPMailer/src/SMTP.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debug received form data
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
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
    
    // Retrieve form data from POST
    $ticket_id = isset($_POST["ticket_id"]) ? $_POST["ticket_id"] : "";
    $student_number = isset($_POST["student_number"]) ? $_POST["student_number"] : "";
    $name = isset($_POST["firstname"]) ? strtoupper(trim($_POST["firstname"])) . " " . strtoupper(trim($_POST["middle_initial"])) . " " . strtoupper(trim($_POST["surname"])) : "";
    $name .= isset($_POST["suffix"]) && !empty($_POST["suffix"]) ? " " . strtoupper(trim($_POST["suffix"])) : "";
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
    $phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : "";
    $course = isset($_POST["course"]) ? $_POST["course"] : "";
    $year = isset($_POST["year"]) ? $_POST["year"] : "";
    $help_topic = isset($_POST["help_topic"]) ? $_POST["help_topic"] : "";
    $description = isset($_POST["description"]) ? trim($_POST["description"]) : "";
    
    // Update the ticket status in the database
    $sql_update_ticket = "UPDATE tickets SET status = 'Open' WHERE ticket_id = ?";
    $stmt_update_ticket = $conn->prepare($sql_update_ticket);
    $stmt_update_ticket->bind_param("i", $ticket_id); // Assuming ticket_id is an integer
    
    if ($stmt_update_ticket->execute()) {
        // Proceed with sending email to the user
        $mailTicket = new PHPMailer(true);
        $mailTicket->SMTPDebug = SMTP::DEBUG_OFF; // Disable verbose debugging
        
        try {
            $mailTicket->isSMTP();
            $mailTicket->Host = 'smtp.gmail.com';
            $mailTicket->SMTPAuth = true;
            $mailTicket->Username = 'hxhb929@gmail.com';
            $mailTicket->Password = 'gumc wzlw xirk oslj';
            $mailTicket->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mailTicket->Port = 587;
            
            // Recipients for the email
            $mailTicket->setFrom('hxhb929@gmail.com', 'BSCS HelpDesk');
            $mailTicket->addAddress($email); // Recipient's email address
            
            // Content for the email
            $mailTicket->isHTML(true);
            $mailTicket->Subject = 'Ticket Update Confirmation';
            $mailTicket->Body = "Hello $name,<br><br>Your ticket has been updated successfully.<br><br>Here are the details:<br><br>Student Number: $student_number<br>Name: $name<br>Email: $email<br>Phone: $phone<br>Course: $course<br>Year: $year<br>Help Topic: $help_topic<br>Description: $description<br><br>Thank you for reaching out. We will get back to you as soon as possible.";
            
            // Send the email
            if (!$mailTicket->send()) {
                throw new Exception("Email sending failed: " . $mailTicket->ErrorInfo);
            } else {
                // Update the user's input in the database
                $sql_update_user_input = "UPDATE tickets SET name = ?, email = ?, phone = ?, course = ?, year = ?, help_topic = ?, description = ?, student_number = ?  WHERE ticket_id = ?";
                $stmt_update_user_input = $conn->prepare($sql_update_user_input);
                $stmt_update_user_input->bind_param("ssssssssi", $name, $email, $phone, $course, $year, $help_topic, $description, $student_number, $ticket_id);
                
                
                if ($stmt_update_user_input->execute()) {
                    echo 'ticket_created';
                  
                } else {
                    echo "Error updating user input: " . $stmt_update_user_input->error;
                }
                
                // Close the statement for updating user input
                $stmt_update_user_input->close();
            }
        } catch (Exception $e) {
            // Log the error and provide a user-friendly message
            error_log("Error sending email: {$e->getMessage()}", 0);
            echo "An error occurred while sending the email. Please try again later.";
        }
    } else {
        echo "Error updating ticket status: " . $stmt_update_ticket->error;
    }
    
    // Close the database connection
    $stmt_update_ticket->close();
    $conn->close();
} else {
    echo 'Invalid request method';
}
?>
