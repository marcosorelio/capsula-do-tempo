<?php
include_once "../conexao/Conexao.php";
include_once "../model/Usuario.php";
include_once "../model/AuthToken.php";
include_once "../dao/UsuarioDAO.php";

//instancia as classes
$usuariodao = new UsuarioDAO();
$usuario = new Usuario();
$auth = new AuthToken();


//pega todos os dados passado por POST
$d = filter_input_array(type: INPUT_POST);

if (isset($_POST['cadastrarToken'])) {
    error_log(message: "\n Entrou - POST cadastrarToken");

    $auth->setSessionToken(sessionToken: $d['user-session-value']);
    $auth->setToken(token: $d['user-session-value']);

    if ($usuariodao->createToken(authToken: gerarTokenCriptografico(auth: $auth))) {
        $arrResult = array(
            'return' => 'sucess',
            'session_token' => $auth->getSessionToken(),
            'token' => $auth->getToken()
        );

        echo json_encode(value: $arrResult);
    } else {
    $arrResult = array(
        'return' => 'error'
    );
    echo json_encode(value: $arrResult);
    }

} else if(isset($_POST['cadastrarUsuario'])){
    error_log(message: "Entrou - POST cadastrarUsuario \n");

    $usuario->setNome(nome: $d['nome']);
    $usuario->setTelefone(telefone: $d['telefone']);
    $usuario->setNomeArquivo(nome_arquivo: $d['nome_arquivo']);
    
    if ($usuariodao->createUsuario(usuario: $usuario)) {
        $arrResult = array(
            'return' => 'sucess',
            'usuario' => $usuario->getNome(),
            'telefone' => $usuario->getTelefone(),
            'nome_arquivo' => $usuario->getNomeArquivo()
        );
        echo json_encode(value: $arrResult);
    } else {
    $arrResult = array(
        'return' => 'error'
    );
    echo json_encode(value: $arrResult);
    }

}else if (isset($_POST['validaSessaoUsuario'])) {
    error_log(message: "Entrou - POST session_token \n");
    
    $token = $_POST['token'];
    
    $auth = $usuariodao->validaToken(token: $token);
           
    if ($auth != null) {
        $arrResult = array(
            'return' => 'sucess',
            'id' => $auth->getId(),
            'session_token' => $auth->getSessionToken(),
            'token' => $auth->getToken(),
            'time_session' => $auth->getTimeSession()
        );
        echo json_encode(value: $arrResult);
    } else {
    $arrResult = array(
        'return' => 'error'
    );
    echo json_encode(value: $arrResult);
    }


}else{
    error_log(message: "Entrou Else - POST \n");
    //header(header: "Location: ../../index.php");
    return false;
}


function gerarTokenCriptografico($auth): AuthToken{

    error_log(message: "Entrou Metodo - gerarTokenCriptografico: \n");

    $password = $auth->getToken();
    $password = password_hash(password: $password, algo: PASSWORD_DEFAULT);
    $auth->setToken(token: $password);
    return $auth;
}