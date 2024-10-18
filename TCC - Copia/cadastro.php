<?php
$servername = "localhost";
$username = "root";
$password = "usbw"; // Senha do banco de dados
$dbname = "minas_bahia"; // Nome do banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Capturando os dados do formulário com segurança
$nome = $conn->real_escape_string($_POST['nome']);
$telefone = $conn->real_escape_string($_POST['telefone']);
$senha = $_POST['senha'];

// Validando os dados
if (strlen($nome) < 3 || !preg_match("/^[a-zA-Z0-9]+$/", $nome)) {
    die("Nome de usuário inválido.");
}

if (strlen($telefone) != 15) { // Verifica o tamanho da máscara do telefone
    die("Número de telefone inválido.");
}

if (strlen($senha) < 8 || !preg_match("/[A-Z]/", $senha) || !preg_match("/[0-9]/", $senha)) {
    die("A senha não atende aos requisitos de segurança.");
}

// Hash da senha para garantir segurança
$senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

// SQL para inserir os dados no banco de dados
$sql = "INSERT INTO usuarios (nome, telefone, senha) VALUES ('$nome', '$telefone', '$senha_hashed')";

// Execução da query e verificação
if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
