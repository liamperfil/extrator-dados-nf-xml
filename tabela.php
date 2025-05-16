<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela @liamperfil</title>
    <style>
        table, th, td {
            border-collapse: collapse;
            border: 1px solid;
        }
    </style>
</head>
<body>

<h1>Planilha Estoque</h1>


<?php
include_once('conect.php');

$sql="SELECT MAX(id) as id_x, codigo, descricao, cfop, un, SUM(quantidade) as qtd_x, MAX(valor) as valor_x, emit FROM estoque GROUP BY codigo, descricao ORDER BY descricao ASC;";
$result = mysqli_query($conn,$sql);

echo "
<table>
    <tr>
        <th>id_x</th>
        <th>codigo</th>
        <th>descricao</th>
        <th>cfop</th>
        <th>un</th>
        <th>qtd_x</th>
        <th>valor_x</th>
        <th>emit</th>
    </tr>
";

foreach($result as $rowi) {
    echo "<tr>";
    echo '<td>'.$rowi['id_x'];
    echo '<td>'.$rowi['codigo'];
    echo '<td>'.$rowi['descricao'];
    echo '<td>'.$rowi['cfop'];
    echo '<td>'.$rowi['un'];
	
	$novaqtd = number_format($rowi['qtd_x'], 2, '.', '');
    echo '<td>'.$novaqtd;

    echo '<td>'.$rowi['valor_x'];
    echo '<td>'.substr($rowi['emit'], 0,20);
};

echo "</table>";


?>

</table>
</body>
</html>