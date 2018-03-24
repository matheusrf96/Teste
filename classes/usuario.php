<?php

class Usuario{
    private $id;
    private $username;
    private $email;
    private $senha;
    private $primeiroNome;
    private $ultimoNome;
    private $msgPanico;
    private $usuarioAtivo;
    private $dataCriacao;
    private $caminhoFotoPerfil;

    public function __construct($user, $email, $senha, $pNome, $uNome, $msgPanico){
        // definir id

        if(strlen($user) > 0 && strlen($user) < 45){
            $this->$username = $user;
        }

        $this->email = $email;
        $this->senha = md5($senha);
        
        if(strlen($pNome) >= 45){
            $this->primeiroNome = substr($pNome, 0, 44);
        }
        else{
            $this->primeiroNome = $pNome;
        }

        if(strlen($uNome) >= 45){
            $this->ultimoNome = substr($uNome, 0, 44);
        }
        else{
            $this->ultimoNome = $uNome;
        }

        $this->msgPanico = "Socorro!";
        $this->ativo = TRUE;        
        $this->dataCriacao = (new \DateTime())->format('Y-m-d H:i:s');
        //definir caminho da foto

    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        if(strlen($username) > 0 && strlen($username) < 45){
            $this->$username = $username;
        }

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function setSenha($senha)
    {
        $this->senha = md5($senha);

        return $this;
    }


    public function getPrimeiroNome()
    {
        return $this->primeiroNome;
    }
    public function setPrimeiroNome($primeiroNome)
    {
        if(strlen($primeiroNome) >= 45){
            $this->primeiroNome = substr($primeiroNome, 0, 44);
        }
        else{
            $this->primeiroNome = $primeiroNome;
        }

        return $this;
    }

    public function getUltimoNome()
    {
        return $this->ultimoNome;
    }
    public function setUltimoNome($ultimoNome)
    {
        if(strlen($ultimoNome) >= 45){
            $this->ultimoNome = substr($ultimoNome, 0, 44);
        }
        else{
            $this->ultimoNome = $ultimoNome;
        }

        return $this;
    }

    public function getMsgPanico()
    {
        return $this->msgPanico;
    }
    public function setMsgPanico($msgPanico)
    {
        $this->msgPanico = $msgPanico;

        return $this;
    }

    public function getUsuarioAtivo()
    {
        return $this->usuarioAtivo;
    }
    public function setUsuarioAtivo($usuarioAtivo)
    {
        $this->usuarioAtivo = $usuarioAtivo;

        return $this;
    }

    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }

    public function getCaminhoFotoPerfil()
    {
        return $this->caminhoFotoPerfil;
    }
    public function setCaminhoFotoPerfil($caminhoFotoPerfil)
    {
        $this->caminhoFotoPerfil = $caminhoFotoPerfil;

        return $this;
    }
}

?>