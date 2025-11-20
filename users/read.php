<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ler Usuário</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/read.css">
    <style>

    </style>
</head>
<body>
    <div class="container">
        <div class="central-box">
            <h1>Leitura de Usuário</h1>
            <div class="user-data">
                <?php
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
                    $the_email = $row['usr_email'];
                    $the_creation_date = $row['usr_creation_date'];
                    echo "<h2>$the_name</h2>";
                    echo "<a href='#'>$the_email</a>";
                    echo "<p>$the_creation_date</p>";
                    echo "</div>";
                    echo "<div class='edit-and-delete-container'>";
                    echo "<a href='/users/update.php?id=$the_id' class='link-button'>Editar</a>";
                    echo "<a href='/users/delete.php?id=$the_id' class='link-button'>Deletar</a>";
                    echo "</div>";
               }


                // Terminando a conexão
                mysqli_close($conn);
                ?>

        </div>
        <a href="/users" class="link-button return-button">Voltar</a>
    </div>
</body>
</html>