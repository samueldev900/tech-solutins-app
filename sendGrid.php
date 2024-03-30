<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require 'lib/vendor/autoload.php';   
        // Verificar se os dados $_POST foram armazenados na sessão
        $dotenv=Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
        $dotenv->load();

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("samueloliveira121@hotmail.com", "Cliente");
        $email->setSubject("Cliente Solicitando atendimento");
        $email->addTo("samueloliveira900@gmail.com", "Samuel Gmail");
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "
            <center>
                <h1>Dados do Cliente</h1>
                <table style=\"width: 300px; height: 300px; background-color: lightgray;\">
                    <tr>
                        <td>Nome:</td>
                        <td>".$_SESSION['nome']."</td>
                    </tr>
                    <tr>
                        <td>Telefone:</td>
                        <td>".$_SESSION['phonenumber']."</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>".$_SESSION['email']."</td>
                    </tr>
                </table>
            </center>"
        );
        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
       /*      print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n"; */
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
        
?>


    
</body>
</html>