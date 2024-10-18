<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/x-icon" href="minas.ico">
    <!-- Adiciona o Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .perfil {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .perfil img {
            border-radius: 50%;
            border: 2px solid #007bff;
            margin-bottom: 15px;
        }
        .perfil h2 {
            margin: 0 0 10px;
            font-size: 24px;
            color: #333;
        }
        .perfil p {
            margin: 5px 0;
            color: #666;
        }
        .botao {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 15px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
        }
        .botao:hover {
            background-color: #0056b3;
        }
    </style>
    <?php
    $conn = new mysqli('localhost', 'root', 'usbw', 'minas_bahia');

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
    
    $id=$_GET["id"];
    $sql = "SELECT * FROM usuarios WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

    }
    ?>
</head>
<body>
    <div class="perfil">
        <!-- Suponha que você tenha uma foto do usuário -->
       
        <!-- Informações do usuário -->
        <h2><?php echo $user["nome"]; ?></h2>
        <p>telefone: <?php echo $user["telefone"]; ?></p>

        <!-- Link para editar perfil -->
        <a href="editar.html" class="botao">Editar Perfil</a>
    </div>
</body>
</html>
