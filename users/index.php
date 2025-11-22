<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ler Usuário</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/index.css">
</head>
<body>
    <div class="container">
        <div class="central-box">
            <h1>Display de Usuário</h1>
            <table>
                <tr><th>Id</th><th>Nome</th><th>Data de Inscrição</th></tr>
                <?php
                    $servername = "127.0.0.1";
                    $username = "root";
                    $password = "";
                    $dbname = "proweb";

                    // Conexão
                    $conn = mysqli_connect($servername,$username,$password,$dbname);

                    // Consulta
                    $sql = " 
                    SELECT *
                    FROM usuarios
                    ";
                    $result = mysqli_query($conn,$sql);


                    //Produção do HTML
                    while($row = mysqli_fetch_assoc($result)) {
                        $the_id = $row['usr_id'];
                        $the_name = $row['usr_name'];
                        $the_creation_date = $row['usr_creation_date'];
                        echo "<tr onclick='window.location=\"/users/read.php?id=$the_id\";' class='link-row'><td><a href='/users/read.php?id=$the_id'>$the_id</a></td><td><a href='/users/read.php?id=$the_id'>$the_name</a></td><td><a href='/users/read.php?id=$the_id'>$the_creation_date</a></td></tr>";
                    }


                    // Terminando a conexão
                    mysqli_close($conn);
                ?>
            </table>
        </div>
        <a href="/users/create.php" class="link-button create-button">Criar Novo Usuário</a>
    </div>
</body>
</html>