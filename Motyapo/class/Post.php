<?php
include_once 'Conectar.php';
class Post
{
    private $id;
    private $dataPost;
    private $titulo;
    private $descricao;
    private $imagem = '';
    private $id_adm;
    private $con;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getData()
    {
        return $this->dataPost;
    }

    public function setData($dataPost): self
    {
        $this->dataPost = $dataPost;
        return $this;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo): self
    {
        $this->titulo = $titulo;
        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao): self
    {
        $this->descricao = $descricao;
        return $this;
    }
    public function getImagem()
    {
        return $this->imagem;
    }

    public function setImage($imagem): self
    {
        $this->imagem = $imagem;
        return $this;
    }
    public function getId_adm()
    {
        return $this->id_adm;
    }
    public function setId_adm($id_adm): self
    {
        $this->id_adm = $id_adm;
        return $this;
    }
    public function salvar()
    {
        $this->con = new Conectar();
        $sql = "INSERT INTO postagens (titulo, descricao, dataPost, imagem) VALUES (?, ?, ?, ?)";
        $sql = $this->con->prepare($sql);
        $sql->bindValue(1, $this->titulo);
        $sql->bindValue(2, $this->descricao);
        $sql->bindValue(3, $this->dataPost);
        $sql->bindValue(4, $this->imagem);

        return $sql->execute() == 1 ? TRUE : FALSE;
    }
    function consultar()
    {
        try {
            $this->con = new Conectar();
            $exec = $this->con->prepare("SELECT * FROM postagens");
            return $exec->execute() == 1 ? $exec->fetchAll() : FALSE;
        } catch (PDOException $exc) {
            echo "Erro de bd " . $exc->getMessage();
        }
    }

  
}
