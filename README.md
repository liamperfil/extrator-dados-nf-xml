# Estoque

Script para gerenciar o estoque, desenvolvido em PHP. Permite a importação de dados de produtos a partir de arquivos XML, facilitando o cadastro e controle de itens no estoque para fins especificos.

## Funcionalidades

* **Importação de Dados XML:** Permite a importação de informações de produtos através de arquivos XML, agilizando o processo de cadastro.
* **Cadastro de Produtos:** Armazena informações detalhadas sobre os produtos, incluindo código, descrição, NCM, CST, CFOP, unidade, quantidade, valor, EAN, nota fiscal, emitente, UF, data, valor da nota fiscal, chave NFe, destino, IPI, PIS/Cofins e pICMS.
* **Interface de Usuário:** Possui uma interface web simples para interação com o sistema.
* **Conexão com Banco de Dados:** Utiliza um banco de dados MySQL para armazenar os dados do estoque.
* **Tratamento de Erros:** Inclui páginas de erro para tratar falhas na conexão com o banco de dados e outros problemas.
* **Temas:** Possibilidade de alternar entre temas claro e escuro.

## Arquivos do Projeto

* `conect.php`: Arquivo responsável pela conexão com o banco de dados MySQL.
* `error.php`: Página exibida em caso de erro ao criar o banco de dados ou a tabela.
* `error200.php`: Página exibida em caso de erro na conexão com o banco de dados (problemas com nome ou senha).
* `index.php`: Página principal da aplicação, onde é realizada a importação dos dados XML e exibida a interface do usuário.

## Configuração

1.  **Banco de Dados:**
    * Certifique-se de ter o MySQL instalado e em execução.
    * O script `error.php` tenta criar o banco de dados `meu_banco` e a tabela `estoque` automaticamente. Verifique as permissões e configurações do seu MySQL se houver falha na criação.
    * As credenciais de conexão com o banco de dados estão no arquivo `conect.php`.  Modifique-as se necessário.
2.  **Arquivos XML:**
    * Os arquivos XML a serem importados devem ser colocados no diretório `./xml/`.
    * O nome do arquivo XML deve corresponder à chave de acesso informada no formulário da página principal (`index.php`).
3.  **Servidor Web:**
    * Coloque os arquivos do projeto em um diretório acessível pelo seu servidor web (ex: `htdocs` no Apache).
    * Acesse a aplicação através do navegador.

## Utilização

1.  Na página principal (`index.php`), insira a chave de acesso do arquivo XML (sem a extensão `.xml`).
2.  Clique em "Enviar" para importar os dados do XML para o banco de dados.
3.  Utilize os botões na página para acessar o `dashboard` (se configurado), `phpmyadmin` ou a tabela de dados (`tabela.php`).
4.  O botão "mudar tema" permite alternar entre os temas claro e escuro.

## Observações

* A aplicação espera que os arquivos XML sigam um formato específico, conforme o layout da Nota Fiscal Eletrônica (NF-e).
* Há sugestões de usar CSV para importação manual e OpenDocument Spreadsheet para exportação, caso necessário.
* A importação via CSV requer a configuração do modo Estados Unidos (ponto como separador decimal e sem separador de milhar).