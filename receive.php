<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/favicon1.ico" type="image/x-icon">
    <title>Tech Solutions</title>
</head>
    <style>
   /*      body{
            display: grid;
            place-items: center;
            height: 100vh
        } */
        main{
            display: grid;
            place-items: center;
            margin-top: 100px;
        }

    </style>
<body>
    <main>
        <img src="imagens/check-image.jpg" alt="">
        <h1>Dados enviados</h1>
        <p id="message">Muito obrigado <?=ucwords(strtolower($_POST['nome'])) ?> pelo interesse. Em breve, nossa equipe entrará em contato.</p>
        
        <?php 
            require_once "connect.php";
            session_start();
            $_SESSION = $_POST;


            $nome = ucwords(strtolower($_POST['nome'])); // You might want to further validate/sanitize these inputs
            $phonenumber = $_POST['phonenumber'];
            $email = $_POST['email'];
            $project = $_POST['project'];
            
            $sql = "USE cadastro";

            $conn->query($sql);

            $sql = "INSERT INTO cliente (id, nome, telefone, email, tipoProjeto) VALUES (NULL, '$nome', '$phonenumber', '$email', '$project')";
            try {
                // Execute a consulta SQL
                $conn->query($sql);
                require_once "sendGrid.php";

            } catch (mysqli_sql_exception $exception) {
                // Verifique se houve um erro relacionado a valores duplicados
                if ($exception->getCode() === 1062) { // Código de erro 1062 indica valores duplicados
                    echo "<style>#message { display: none; }</style>";
                    echo "<p id='mensage-erro'>$nome, seus dados já estão cadastrados. Aguarde que logo nossa equipe entrará em contato.</p>";
                } else {
                    echo "Erro: " . $exception->getMessage();
                }
            }


        ?>
    </main> 
    
</body>
</html>