<?php
/*
    Criação da classe Usuario com o CRUD
*/
class UsuarioDAO
{

    public function createToken(AuthToken $authToken)
    {
        error_log(message: "\n Entrou - createToken");
        try {
            
            $sql = "INSERT INTO db_mysql_docker.auth (id, `token`, `session_token`, time_session) 
                VALUES(NULL, :token, :session_token, CURRENT_TIMESTAMP)";

            error_log(message: "\n Retorno CreateToken - sql: {$sql}");

            $p_sql = Conexao::getConexao()->prepare(query: $sql);
            $p_sql->bindValue(param: ":token", value: $authToken->getToken());
            $p_sql->bindValue(param: ":session_token", value: $authToken->getSessionToken());
            
            return $p_sql->execute();

        } catch (Exception $e) {
            error_log(message: "\n Erro ao inserir token: {$e}");

            return false;
        }
    }

    public function createUsuario(Usuario $usuario)
    {
        try {
            $sql = "INSERT INTO db_mysql_docker.cadastro (id, `nome`, `nome_arquivo`, telefone) 
            VALUES (NULL, :nome, :nome_arquivo, :telefone)";
            error_log(message: "Retorno createUsuario - sql: {$sql} \n");

            $p_sql = Conexao::getConexao()->prepare(query: $sql);

            $p_sql->bindValue(param: ":nome", value: $usuario->getNome());
            $p_sql->bindValue(param: ":nome_arquivo", value: $usuario->getNomeArquivo());
            $p_sql->bindValue(param: ":telefone", value: $usuario->getTelefone());

            return $p_sql->execute();

        } catch (Exception $e) {
            print "\n Erro ao inserir usuario: {$e} <br>";
        }
    }

    public function validaToken($token)
    {
        try {

            $sql = "SELECT token
                FROM db_mysql_docker.auth WHERE token = :token";
            error_log(message: "\n validaToken Array: $token");

            $p_sql = Conexao::getConexao()->prepare(query: $sql);
            $p_sql->bindValue(param: ":token", value: $token);
            $p_sql->execute();
            $lista = $p_sql->fetchAll(PDO::FETCH_OBJ);

            //print_r( value: $lista );
            foreach($lista as $value) { 
                echo $value['session_token'];
            } 
            
            if (count(value: $lista) > 0) {
              

                $auth = new AuthToken();
                $auth->setId(id: $lista['id']);
           
                $auth->setSessionToken(sessionToken: $lista['session_token']);
                $auth->setToken( token: $lista['token']);
                $auth->setTimeSession(timeSession: $lista['time_session']);
            }

            return $auth;

        } catch (Exception $e) {
            print "\n Erro ao consultar validaToken: {$e} <br>";
            return null;
        }
        

    }

    private function listaAutenticacao($row): AuthToken
    {
        $auth = new AuthToken();
        $auth->setId(id: $row['id']);
        $auth->setToken(token: $row['idade']);
        $auth->setSessionToken(sessionToken: $row['nome']);
        $auth->setTimeSession(timeSession: $row['sobrenome']);

        return $auth;
    }

}

?>