<?php
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
            color: red; /* Cor do texto escura */
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

    <h2>Erro na conexão com o banco de dados.</h3>
    <h2>Verifique nome e senha do banco de dados.</h3>
    <button onclick="window.location.href='http://localhost'">Acessar localhost</button>
    <button onclick="window.location.href='http://localhost/dashboard'">Acessar dashboard</button>
    <button onclick="window.location.href='http://localhost/phpmyadmin'">Acessar phpmyadmin</button>
    
</body>
</html>