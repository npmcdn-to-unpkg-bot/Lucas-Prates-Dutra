<?php
include "User.php";

$user = new User();
$user->constructor($_POST["first_name"],
$_POST["last_name"],
$_POST["email"],
$_POST["password"],
$_POST["birth_date"],
$_POST["sex"]);
//Conexão com o banco
$conecta = mysqli_connect("localhost", "root", "", "aula6");

// Testar a conexão do banco
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    echo "Conexao com banco OK <br/><br/>";
}

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$password = $_POST["password"];
$birth_date = $_POST["birth_date"];
$sex = $_POST["sex"];

$sql = "INSERT INTO TB_USUARIOS (FIRST_NAME, LAST_NAME, EMAIL, PASSWORD, BIRTH_DATE, SEX)
VALUES ('$first_name' , '$last_name', '$email', '$password', '$birth_date', '$sex')";

if ($conecta->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conecta->error;
}


/*$query = "SELECT COD, NOME, EMAIL, TELEFONE, DATA_NASCIMENTO, SEXO FROM TB_USUARIO";
$result = $conecta->query($query);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "Cod: " . $row["COD"]. " - Nome: " . $row["NOME"]. " - Email: " . $row["EMAIL"]. " - Telefone: " . $row["TELEFONE"].
            "Data de Nascimento: " . $row["DATA_NASCIMENTO"] . "Sexo: " . $row["SEXO"] . "<br/> ";
    }
} else {
    echo "0 results";
}*/

$conecta->close();

