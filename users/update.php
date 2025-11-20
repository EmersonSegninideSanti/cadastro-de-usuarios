<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Criação de Usuário</title>
    </style>
</head>
<body>
    <div class="container">
        <div class="central-box">
            <h1>Criação de Usuário</h1>
            <form action="/users/update.php" method="POST">
                <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "";
                        $dbname = "proweb";
                        $id = $_GET['id'];

                        // Conexão
                        $conn = mysqli_connect($servername,$username,$password,$dbname);

                        // Consulta
                        $sql = "
                            SELECT *
                            FROM usuarios
                            WHERE usr_id = $id
                        ";
                        $result = mysqli_query($conn,$sql);
                    
                        // Produção do HTML
                        while($row = mysqli_fetch_assoc($result)) {
                            $the_id = $row['usr_id'];
                            $the_name = $row['usr_name'];
                            $the_email = $row['usr_email'];
                            $the_password = $row['usr_password'];
                            echo "<label for='name'>Nome Completo</label>";
                            echo "<input id='name' name='name' type='text' required minlength='5' maxlength='50' class='text-input' value=$the_name>";
                            echo "<label for='email'>E-mail</label>";
                            echo "<input id='email' name='email' type='email' required  class='text-input' value='$the_email'>";
                            echo "<label for='password'>Senha</label>";
                            echo "<input id='password' name='password' type='password' required minlength='8' class='text-input' value='$the_password'> <br> <br>";
                            echo "<input type='hidden' name='id' value='$the_id'>";
                            echo "<input type='submit' class='text-input submit-button' value='Enviar'>";
                        }
                    } else {
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "";
                        $dbname = "proweb";
                        $form_id = $_POST['id'];
                        $form_name = $_POST['name'];
                        $form_email = $_POST['email'];
                        $form_password = $_POST['password'];

                        // Conexão
                        $conn = mysqli_connect($servername,$username,$password,$dbname);

                        // Consulta
                        $sql = "
                            UPDATE usuarios
                            SET usr_name = '$form_name',
                                usr_email = '$form_email',
                                usr_password = '$form_password'
                            WHERE usr_id = $form_id;
                        ";
                        $result = mysqli_query($conn,$sql);
                    
                        // Produção do HTML
                        if ($result) {
                            echo "<p class='conclusion_msg'>Usuário Alterado!</p>";
                        } else {
                            echo "<p class='failure_msg'>Alteração Fracassada!</p>";
                        }
                        echo "<label for='name'>Nome Completo</label>";
                        echo "<input id='name' name='name' type='text' required minlength='5' maxlength='50' class='text-input' value='$form_name'>";
                        echo "<label for='email'>E-mail</label>";
                        echo "<input id='email' name='email' type='email' required  class='text-input' value='$form_email'>";
                        echo "<label for='password'>Senha</label>";
                        echo "<input id='password' name='password' type='password' required minlength='8' class='text-input' value='$form_password'> <br> <br>";
                        echo "<input type='hidden' name='id' value='$form_id'>";
                        echo "<input type='submit' class='text-input submit-button' value='Enviar'>"; 
                    }

                

                ?>
            </form>
        </div>
        <a href="/users" class="link-button return-button">Voltar</a>
    </div>
</body>
</html>