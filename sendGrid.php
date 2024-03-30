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
                    <div style=\"background-color: lightgray; width: 100%; height:500px; padding-top: 100px;\">
                        <h1>Cliente Solicitando atendimento</h1>
                        <table style=\"border: 1px solid black; border-collapse: collapse; background-color: white;width: 350px; height: 100px; \">
                            <caption style=\"font-size: 22px; background-color: gray;\"><strong>Dados do Cliente</strong></caption>
                            <tr><td style=\"border: 1px solid black;padding: 10px;\">NOME: </td><td style=\"border: 1px solid black;padding: 10px; \">".$_SESSION['nome']."</td></tr>
                            <tr><td style=\"border: 1px solid black;padding: 10px;\">TELEFONE: </td><td style=\"border: 1px solid black;padding: 10px;\">".$_SESSION['phonenumber']."</td></tr>
                            <tr><td style=\"border: 1px solid black;padding: 10px;\">EMAIL: </td><td style=\"border: 1px solid black;padding: 10px;\">".$_SESSION['email']."</td></tr>
                        </table>
                    </div>
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