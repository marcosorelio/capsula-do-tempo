<?php

class Usuario{
    
    private $id;
    private $nome;
    private $nome_arquivo;
    private $telefone;
    
    function getNome() {
        return $this->nome;
    }
    function setNome($nome) {
        $this->nome = $nome;
    }
    function getNomeArquivo() {
        return $this->nome_arquivo;
    }
    function setNomeArquivo($nome_arquivo) {
        $this->nome_arquivo = $nome_arquivo;
    }
    function getTelefone() {
        return $this->telefone;
    }
    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function getId() {
        return $this->id;
    }
    function setId($id) {
        $this->id = $id;
    }
}

