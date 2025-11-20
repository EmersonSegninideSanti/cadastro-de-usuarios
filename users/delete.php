<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Usuário</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/read.css">
    <style>

    </style>
</head>
<body>
    <div class="container">
        <div class="central-box">
            <h1>Deleção de Usuário</h1>
            <div class="user-data">
                
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


                    //Produção do HTML
                    while($row = mysqli_fetch_assoc($result)) {
                        $the_id = $row['usr_id'];
                        $the_name = $row['usr_name'];
                        echo "<h3>Deletar este Usuário?</h3>";
                        echo "<p>Nome: $the_name</p>";
                        echo "<p>id: $the_id</p>";
                    }

                    // Terminando a conexão
                    mysqli_close($conn);
                } else {
                    $servername = "127.0.0.1";
                    $username = "root";
                    $password = "";
                    $dbname = "proweb";
                    $form_id = $_POST['id'];

                    // Conexão
                    $conn = mysqli_connect($servername,$username,$password,$dbname);

                    // Consulta
                    $sql = " 
                    DELETE FROM usuarios
                    WHERE usr_id = $form_id
                    ";
                    $result = mysqli_query($conn,$sql);


                    //Produção do HTML
                    if ($result) {
                        echo "<p class='conclusion_msg'>Usuário Deletado!</p>";
                    } else {
                        echo "<p class='failure_msg'>Deleção Fracassada!</p>";
                    }


                    // Terminando a conexão
                    mysqli_close($conn);
                }
                ?>
            </div>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    $id = $_GET['id'];
                    echo "<div class='edit-and-delete-container'>";
                    echo "<a href='/users' class='link-button'>Cancelar</a>";
                    echo "<form action='/users/delete.php' method='POST'>";
                    echo "<input type='hidden' name='id' value='$id'>";
                    echo "<input class='link-button' type='submit' value='Deletar'>";
                    echo "</form>";
                    echo "</div>;";
                }
                ?>
        </div>
        <a href="/users" class="link-button return-button">Voltar</a>
    </div>
</body>
</html>