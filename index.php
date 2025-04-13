<?php
include_once "./app/conexao/Conexao.php";
include_once "./app/dao/UsuarioDAO.php";
include_once "./app/model/Usuario.php";
include_once "./app/model/AuthToken.php";

//instancia as classes
$usuario = new Usuario();
$auth = new AuthToken();
$usuariodao = new UsuarioDAO();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Comentarios Virtuais - BackEnd</title>
    <style>
        .menu,
        thead {
            background-color: #bbb !important;
        }

        .row {
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col">

            <div class="form-group bg-light">

                <form action="app/controller/UsuarioController.php" method="POST">
                    <h3>Cadastro Auth</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" disabled name="id" value="0" placeholder="Id" autofocus
                                class="form-control" require />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="session_token" disabled placeholder="Token sessao"
                                value="<?= $auth->getSessionToken() ?>" class="form-control" require />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" disabled placeholder="Tempo de sessao"
                                value="<?= $auth->getTimeSession() ?>" class="form-control" require />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="token" placeholder="Token" value="<?= $auth->getToken() ?>"
                                class="form-control" require />
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-lg btn-block" type="submit"
                                name="cadastrarToken">Enviar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="col">
            <div class="form-group bg-light">

                <form action="app/controller/UsuarioController.php" method="POST">
                    <h3>Cadastro Usuario</h3>
                    <div class="row">

                        <div class="col-md-12">
                            <input type="text" name="id" value="0" placeholder="Id" autofocus class="form-control"
                                require />
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <input type="text" name="nome" value="<?= $usuario->getNome() ?>" placeholder="Nome"
                                autofocus class="form-control" require />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="telefone" placeholder="Telefone"
                                value="<?= $usuario->getTelefone() ?>" class="form-control" require />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <input class="form-control form-control-sm" name="nome_arquivo" type="file"
                                placeholder="Nome do arquivo" value="<?= $usuario->getNomeArquivo() ?>" id="formFile">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-lg btn-block" type="submit"
                                name="cadastrarUsuario">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group bg-light">

                <form id="sessionToken">
                    <h2>Verificar Sessao Ativa</h2>

                    <div class="row">
                        <div class="col-md-12">

                            <input type="text" for="validationServer02" name="session_token" placeholder="Token"
                                value="" class="form-control is-invalid"
                                id="validationServer02" require />
                            <div class="invalid-feedback">
                                Token invalido!
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Validar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $("#sessionToken").submit(function (event) {
                event.preventDefault(); // Impede o envio padrão do formulário   

                var dados = $(this).serialize();

                $.ajax({
                    type: "POST",
                    url: "app/controller/UsuarioController.php",
                    data: dados,
                    success: function (response) {
                        // Código a ser executado após a resposta do PHP
                        console.log(response); // Exibe a resposta do PHP no console
                    }
                });
            });
        });

    </script>



</body>

</html>