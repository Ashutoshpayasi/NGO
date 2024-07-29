<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $phone = $_POST["phone"];
    

    // Construct email message
    $to = "asutoshpayasi2001@gmail.com"; 
    $subject = "New Form Submission - " . $subject;
    $messageBody = "Name: $name\nEmail: $email\nSubject: $subject\nContact: $phone\nMessage: $message";

    $headers = "From: $email";

    if (mail($to, $subject, $messageBody, $headers)) {
        echo json_encode(["success" => true]); 
        sleep(2);
        echo"<script>alert('Thank you for contacting us. As soon as possible we will contact you.')</script>"; 
        header("Location: index.php");
    } else {
        echo json_encode(["success" => false]);;
        echo"<script>alert('Something went wrong. Please try again.')</script>";
        header("Location: index.php");
    }
} else {
    echo json_encode(["success" => false]);
}
?>
