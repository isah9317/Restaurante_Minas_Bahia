<?php
session_start();

// Conectar ao banco de dados
$conn = new mysqli('localhost', 'root', 'usbw', 'minas_bahia');

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados do formulário
    $username = $conn->real_escape_string($_POST['nome']); // Alterado para 'nome' para refletir o campo correto
    $password = $conn->real_escape_string($_POST['senha']);

    // Consultar o banco de dados para encontrar o usuário
    $sql = "SELECT * FROM usuarios WHERE nome='$username'"; // Alterado para buscar pelo campo 'nome'
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verificar se a senha é válida
        if (isset($user['senha']) && password_verify($password, $user['senha'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['nome']; // Armazena o nome de usuário na sessão
            $_SESSION['id'] = $user['id']; // Armazena o ID do usuário na sessão
            
            // Redireciona para a página index3.html
            header("Location: index3.html");
            exit; // Certifique-se de usar exit após header para evitar execução adicional
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }
}

$conn->close();
?>
