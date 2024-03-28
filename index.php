<?php 
require 'lib/vendor/autoload.php';

$dotenv=Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();


$email = new \SendGrid\Mail\Mail();
$email->setFrom("samueloliveira121@hotmail.com", "Samuel Hotmail");
$email->setSubject("Sending with Twilio SendGrid is Fun");
$email->addTo("samueloliveira900@gmail.com", "Samuel Gmail");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>HTML AQUI</strong>"
);
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}

?>