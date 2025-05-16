<?php
$conn = mysqli_connect('localhost', 'root', '') or die(header('Location: error200.php'));
$resultCreateDatabase = mysqli_query($conn, 'CREATE DATABASE IF NOT EXISTS `meu_banco` DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_general_ci;');
$conn = mysqli_connect('localhost', 'root', '', 'meu_banco') or die(header('Location: error200.php'));
$resultCreateTable = mysqli_query($conn, 'CREATE TABLE IF NOT EXISTS `estoque` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `descricao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ncm` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cst` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cfop` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `un` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `quantidade` float NULL DEFAULT NULL,
  `valor` float NULL DEFAULT NULL,
  `ean` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nf` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `emit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `uf` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `data` date NULL DEFAULT NULL,
  `valornf` float NULL DEFAULT NULL,
  `chNFe` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `destino` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ipi` float NULL DEFAULT NULL,
  `pisCofins` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pICMS` float NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
  ) ENGINE = InnoDB AUTO_INCREMENT = 1080 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque - Jean Lima</title>
    <style>
        body {
            background-color: #121212; /* Cor de fundo clara */
            color: pink; /* Cor do texto escura */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        button {
            padding: 10px 15px;
            margin-top: 20px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>

    <h3>Estamos criando a conexão com o banco de dados.</h3>
    <h3>Tente acessar novamente.</h3>
    <h3>Se o erro persistir verifique nome e senha do banco de dados.</h3>
    <button onclick="window.location.href='http://localhost'">Acessar localhost</button>
    <button onclick="window.location.href='http://localhost/dashboard'">Acessar dashboard</button>
    <button onclick="window.location.href='http://localhost/phpmyadmin'">Acessar phpmyadmin</button>
    
</body>
</html>