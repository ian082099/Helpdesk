<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/HelpDesk/PHPMailer/src/Exception.php';
require 'C:/xampp/htdocs/HelpDesk/PHPMailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/HelpDesk/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? $_POST["email"] : null;
    $verificationCode = isset($_POST["verification_code"]) ? $_POST["verification_code"] : null;
    
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "db_tickets";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if ($email && $verificationCode) {
        // Generate a random verification code
        $generatedCode = rand(100000, 999999);
        
        // Send verification code via email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'hxhb929@gmail.com';
            $mail->Password = 'gumc wzlw xirk oslj';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            
            $mail->setFrom('hxhb929@gmail.com', 'BSCS HelpDesk');
            $mail->addAddress($email);
            
            $mail->isHTML(true);
            $mail->Subject = 'Verification Code';
            $mail->Body = "Your verification code is: $verificationCode. Please enter this code to verify your request.";
            
            if ($mail->send()) {
                $insertSql = "INSERT INTO tickets (email, verification_code, status) VALUES (?, ?, 'Pending')";
                $insertStmt = $conn->prepare($insertSql);
                $insertStmt->bind_param("ss", $email, $verificationCode);
                $insertStmt->execute();
                $insertStmt->close();
                echo 'email_sent';
            } else {
                error_log('Mailer Error: ' . $mail->ErrorInfo);
                echo 'email_error';
            }
        } catch (Exception $e) {
            error_log('Exception: ' . $e->getMessage());
            echo 'email_error';
        }
    } elseif ($verificationCode) {
        $sql = "SELECT * FROM tickets WHERE verification_code = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $verificationCode);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userEmail = $row['email'];
            
            $updateSql = "UPDATE tickets SET status = 'Verified' WHERE verification_code = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("s", $verificationCode);
            $updateStmt->execute();
            $updateStmt->close();
            echo 'valid';
        } else {
            echo 'invalid';
        }
        
        $stmt->close();
    } else {
        echo 'error';
    }
    
    $conn->close();
} else {
    echo 'error';
}
?>
