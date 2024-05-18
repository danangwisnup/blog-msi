<?php
// Replace with your real receiving email address
$receiving_email_address = 'danangwisnu9502@gmail.com';

// Retrieve form data using $_POST
$name = $_POST['nama'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['pesan'];

// Set headers
$headers = "From: $name <$email>" . "\r\n";
$headers .= "Reply-To: $email" . "\r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Email body
$email_body = "
    <html>
    <head>
        <title>Pesan Baru dari Form Kontak</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                background-color: #f4f4f4;
                padding: 20px;
            }
            .container {
                max-width: 600px;
                margin: auto;
                background: #ffffff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
            h2 {
                color: #333333;
                border-bottom: 1px solid #cccccc;
                padding-bottom: 10px;
            }
            p {
                margin: 10px 0;
            }
            .footer {
                margin-top: 20px;
                text-align: center;
                color: #666666;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h2>New Message from Contact Form</h2>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Subject:</strong> <?php echo htmlspecialchars($subject); ?></p>
            <p><strong>Message:</strong></p>
            <p><?php echo nl2br(htmlspecialchars($message)); ?></p>
        </div>
        <div class='footer'>
            <p>Pesan ini dikirim melalui formulir kontak di situs web Anda.</p>
        </div>
    </body>
    </html>
";

// Send email
$mail_sent = mail($receiving_email_address, $subject, $email_body, $headers);

// Check if mail sent successfully
if ($mail_sent) {
  echo 'Email sent successfully.';
} else {
  echo 'Failed to send email. Please try again later.';
}
