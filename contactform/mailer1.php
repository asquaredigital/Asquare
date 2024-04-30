<?php

require '../../vendor/vendor/autoload.php';

use Aws\Ses\SesClient;
use Aws\Exception\AwsException;

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Script accessed directly without form submission
    $response = array('message' => 'Invalid request.');
    echo json_encode($response);
    exit;
}

// Validate form fields
if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["subject"]) || empty($_POST["message"])) {
    // If any field is empty, send error response
    $response = array('message' => 'All fields are required.');
    echo json_encode($response);
    exit;
}

// Sanitize input data
$u_name = sanitize_input($_POST["name"]);
$u_email = sanitize_input($_POST["email"]);
$subject = sanitize_input($_POST["subject"]);
$msg = sanitize_input($_POST["message"]);

// Validate email format
if (!filter_var($u_email, FILTER_VALIDATE_EMAIL)) {
    // If email is not valid, send error response
    $response = array('message' => 'Invalid email format.');
    echo json_encode($response);
    exit;
}

// Load AWS configuration
$config = require '../../vendor/config.php';
$awsKey = $config['aws']['key'];
$awsSecret = $config['aws']['secret'];
$awsRegion = $config['aws']['region'];

$sesClient = new SesClient([
    'version' => 'latest',
    'region' => $awsRegion,
    'credentials' => [
        'key' => $awsKey,
        'secret' => $awsSecret,
    ],
]);

// Set up email headers
$headers = "From: www.asquare.tech" . "\r\n" .
    "Reply-To: $u_email" . "\r\n";

// Set up email content
$message = "Name: $u_name\nEmail: $u_email\nMessage: $msg";

$senderEmail = 'asquaremailer@gmail.com';
$recipientEmail = 'elavarasan5193@gmail.com';

try {
    $result = $sesClient->sendEmail([
        'Destination' => [
            'ToAddresses' => [$recipientEmail],
        ],
        'Message' => [
            'Body' => [
                'Text' => [
                    'Charset' => 'UTF-8',
                    'Data' => $message,
                ],
            ],
            'Subject' => [
                'Charset' => 'UTF-8',
                'Data' => $subject,
            ],
        ],
        'Source' => $senderEmail,
        'ReplyToAddresses' => [$u_email], // Specify Reply-To header
    ]);

    // Prepare JSON response
    $response = "Email sent successfully";
    echo $response;
} catch (AwsException $e) {
    // Prepare JSON error response
    $response = ['message' => 'Failed to send email.', 'error' => $e->getAwsErrorMessage()];
    echo json_encode($response);
}

?>
