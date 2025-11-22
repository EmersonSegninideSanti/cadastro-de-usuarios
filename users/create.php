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
            <form action="/users/create.php" method="POST">
                <?php 
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    // Produção do HTML
                    echo "<label for='name'>Nome Completo</label>";
                    echo "<input id='name' name='name' type='text' required minlength='5' maxlength='50' class='text-input'>";
                    echo "<label for='email'>E-mail</label>";
                    echo "<input id='email' name='email' type='email' required  class='text-input'>";
                    echo "<label for='password'>Senha</label>";
                    echo "<input id='password' name='password' type='password' required minlength='8' class='text-input'> <br> <br>";
                    echo "<input type='submit' class='text-input submit-button' value='Enviar'>";
                } else {
                    $servername = "127.0.0.1";
                    $username = "root";
                    $password = "";
                    $dbname = "proweb";
                    $form_name = $_POST['name'];
                    $form_email = $_POST['email'];
                    $form_password = $_POST['password'];

                    // Conexão
                    $conn = mysqli_connect($servername,$username,$password,$dbname);

                    // Consulta
                    $sql = " 
                    INSERT INTO usuarios (usr_name,usr_email,usr_password)
                    VALUES ('$form_name','$form_email','$form_password')
                    ";
                    $result = mysqli_query($conn,$sql);

                    // Produção do HTML
                    if ($result) {
                        echo "<p class='conclusion-msg'>Usuário Criado!</p>";
                    } else {
                        echo "<p class='failure-msg'>Criação Fracassada!</p>";
                    }
                    echo "<label for='name'>Nome Completo</label>";
                    echo "<input id='name' name='name' type='text' required minlength='5' maxlength='50' class='text-input' value='$form_name'>";
                    echo "<label for='email'>E-mail</label>";
                    echo "<input id='email' name='email' type='email' required  class='text-input' value='$form_email'>";
                    echo "<label for='password'>Senha</label>";
                    echo "<input id='password' name='password' type='password' required minlength='8' class='text-input' value='$form_password'> <br> <br>";
                    echo "<input type='submit' class='text-input submit-button' value='Enviar'>";
                }

                ?>
            </form>
        </div>
        <a href="/users" class="link-button return-button">Voltar</a>
    </div>
</body>
</html>