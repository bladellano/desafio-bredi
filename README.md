## Desafio BREDI
Aplicação que realiza CRUD de produtos relacionado com categorias.
* Utilizando composer para instalação dependências;
* Orientação a objetos;
* Princípio DRY;
* Princípio SOLID;
* Melhores práticas e PSRs;
* MVC.

#### Dependências
* PHP 7.3.11
* Apache Server 2.4 +
* Ver 15.1 Distrib 10.1.37-MariaDB, for Win32 (AMD64)

#### Componentes
* Router - para criar rotas e verbalização rest.
* DataLayer - trabalhar com camdas de conexão com a base de dados;
* League Plates - Componente que trabalhar com criação de template nativo do Php;
* Matthiasmullie Minify - Para minificar as folhas de estilo e script javascript.

#### Instalação
A instalação do sistema pode ser feita seguindo os seguintes passos:
> ATENÇAO: Os passos para instalação descritos nesta documentação, assumem que a aplicação rodará em uma estação Windows e que contenha todas as dependências instaladas e configuradas.

* Clonar ou baixar o projeto diretamente no `localhost` da estação.
```bash
C:\xampp\htdocs
```
* Depois que baixar o respositório, instalar as dependências com o composer. Vá até um terminal ou prompt.
```bash
C:\xampp\htdocs\desafio-bredi\composer install
```
* Configurar o arquivo 'source\Config.php' a constant 'DATA_LAYER_CONFIG'
```bash
define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "db_bredi",
    "username" => "root",
    "passwd" => "root",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);
```
* Criar uma base de dados. 
```bash
Importar a base de dados contida na aplicação 'db_bredi.sql'
```

* Depois de seguir todos os passos, vá ate um navegador.
```bash
http://localhost/desafio-bredi/
```
### Creditos
Esta aplicação foi desenvolvida por [Caio Dellano Nunes da Silva](mailto:bladellano@gmail.com).
<br>
Site: www.dellanosites.com.br
