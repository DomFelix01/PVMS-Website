<?php
// Configurações do Banco de Dados
$servername = "localhost";
$username = "root"; // Substitua pelo seu usuário
$password = ""; // Substitua pela sua senha
$dbname = "pvms_db";

// Conexão com o Banco de Dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar Conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Verificar se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Inserir dados na tabela
    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Mensagem salva com sucesso!";
    } else {
        echo "Erro ao salvar mensagem: " . $conn->error;
    }
}

// Fechar Conexão
$conn->close();
?>
