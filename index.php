<?php
include_once('conect.php');
if ( isset($_POST['submit']) && !empty($_POST['chavexml']) ) {

	// busca o arquivo xml no diretorio
	// caso não encontre recarrega a página inicial
    $chave = $_POST['chavexml'] . ".xml";
    $xml=simplexml_load_file('./xml/'.$chave) or die(header('Location: index.php'));
    $chNFe=$xml->protNFe->infProt->chNFe;
	
	// testa se a NF já foi cadastrada
    $testeChave = mysqli_query($conn, "SELECT * FROM estoque WHERE chNFe = '$chNFe'");   
	if (mysqli_num_rows($testeChave) < 1) {

        $det=$xml->NFe->infNFe->det->count();
        for ($i=0; $i < $det; $i++) { 
			// evita erro em caso de aspas no código do produto
            $cProd=$xml->NFe->infNFe->det[$i]->prod->cProd;
			$cProd = str_replace('"', '', $cProd);
			$cProd = str_replace("'", "", $cProd);
            
			// evita erro em caso de aspas na descrição do produto
			$xProd=$xml->NFe->infNFe->det[$i]->prod->xProd;
			$xProd = str_replace('"', '', $xProd);
			$xProd = str_replace("'", "", $xProd);
            
			$NCM=$xml->NFe->infNFe->det[$i]->prod->NCM;
            
			$cst = "";
            foreach ($xml->NFe->infNFe->det[$i]->imposto->ICMS->children()->children() as $child){
				$cst=$cst . $child;
			}
            $cst=substr("$cst",0, 3);
            
			$CFOP=$xml->NFe->infNFe->det[$i]->prod->CFOP;
            $uCom=$xml->NFe->infNFe->det[$i]->prod->uCom;
            $qCom=$xml->NFe->infNFe->det[$i]->prod->qCom;
            $vUnCom=$xml->NFe->infNFe->det[$i]->prod->vUnCom;
            $cEAN=$xml->NFe->infNFe->det[$i]->prod->cEAN;
            $nf=$xml->NFe->infNFe->ide->nNF;
            $emit=$xml->NFe->infNFe->emit->xNome;
            $UF=$xml->NFe->infNFe->emit->enderEmit->UF;
            
			$data=$xml->NFe->infNFe->ide->dhEmi;
            $data=substr("$data",0, 10);
            
			$vNF=$xml->NFe->infNFe->total->ICMSTot->vNF;
            $dest=$xml->NFe->infNFe->dest->CNPJ;

			$pis=0;
			if (isset($xml->NFe->infNFe->det[$i]->imposto->PIS->children()[0]->pPIS)) {
				$pis = strval($xml->NFe->infNFe->det[$i]->imposto->PIS->children()[0]->pPIS);
				$pis = substr($pis, 0,4);
			};
						
			$cofins=0;
			if (isset($xml->NFe->infNFe->det[$i]->imposto->COFINS->children()[0]->pCOFINS)) {
				$cofins = strval($xml->NFe->infNFe->det[$i]->imposto->COFINS->children()[0]->pCOFINS);
				$cofins = substr($cofins, 0,4);
			};
			
			$pisCofins=$pis . "/" . $cofins;
			
			$pIPI=0;
			if (isset($xml->NFe->infNFe->det[$i]->imposto->IPI->IPITrib->pIPI)){
				$pIPI = $xml->NFe->infNFe->det[$i]->imposto->IPI->IPITrib->pIPI;
			};
			
			$pICMS="";
			if (isset($xml->NFe->infNFe->det[$i]->imposto->ICMS->children()[0]->pICMS)){
				$pICMS = $xml->NFe->infNFe->det[$i]->imposto->ICMS->children()[0]->pICMS;
			};
			
            $sql = "INSERT INTO estoque (codigo, descricao, ncm, cst, cfop, un, quantidade,valor,ean,nf,emit,uf,data,valornf,
            chNFe,destino,ipi,pisCofins,pICMS) 
            VALUES ('$cProd','$xProd','$NCM','$cst','$CFOP','$uCom','$qCom','$vUnCom','$cEAN',
            '$nf','$emit','$UF','$data','$vNF','$chNFe','$dest','$pIPI','$pisCofins','$pICMS')";
            $result = mysqli_query($conn, $sql);
        }
    }
}
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
            color: #ffffff; /* Cor do texto escura */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            transition: background-color 0.3s, color 0.3s;
        }

        .white-theme {
            background-color: #c9b7b7; /* Cor de fundo clara */
            color: #000000; /* Cor do texto escura */
        }

        h1, h2, h3 {
            color: inherit; /* Herda a cor do body */
        }

        a {
            color: #007bff; /* Cor dos links */
        }

        a:hover {
            color: #0056b3; /* Cor dos links ao passar o mouse */
        }

        .container {
            max-width: 800px;
            margin: auto;
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

    <form action="index.php" method="post" autocomplete="off">
        <input type="text" name="chavexml" id="chavexml" placeholder="CHAVE XML" autofocus required pattern="[0-9]{44}" 
        size="44" title="(Padrão chave xml, 44 caracteres, apenas números.)">
        <input type="submit" name="submit" id="submit" value="Enviar">
    </form>

    <p>DICA: Usar CSV para importar e OpenDocument Spreadsheet para exportar</p>
    <p>Para importar faça uma cópia da planilha de estoque, altere as configurações para modo Estados Unidos, (troca vírgula por ponto) e não pode ter separador de milhar.</p>
    <button onclick="window.open('http://localhost/dashboard', '_blank')">dashboard</button>
    <button onclick="window.open('http://localhost/phpmyadmin', '_blank')">phpmyadmin</button>
    <button onclick="window.open('http://localhost/estoque/tabela.php', '_blank')">tabela</button>


    <button id="theme-toggle">mudar tema</button>
    <script>
        const button = document.getElementById('theme-toggle');

        button.addEventListener('click', () => {
            document.body.classList.toggle('white-theme');
            button.textContent = document.body.classList.contains('white-theme') ? 'tema escuro' : 'tema claro';
        });
    </script>
</body>
</html>