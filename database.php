<?php
// Este arquivo serve para a criação do banco de dados e da tabela.

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "proweb";

// Conexão 1 com o servidor
$conn = mysqli_connect($servername,$username,$password);

// Criação do banco de dados
$sql = "CREATE DATABASE proweb";
if (mysqli_query($conn, $sql) ) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

// Conexão 2 com o servidor e o banco de dados criado 
$conn = mysqli_connect($servername,$username,$password,$dbname);



// CreateTable
$sql = "CREATE TABLE usuarios (
usr_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
usr_name VARCHAR(40) NOT NULL,
usr_password CHAR(40) NOT NULL,
usr_email VARCHAR(40) NOT NULL,
usr_creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (mysqli_query($conn,$sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Terminando a conexão
mysqli_close($conn);
?>