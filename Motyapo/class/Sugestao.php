<?php
include_once 'Conectar.php';
class Sugestao
{
    private $id;
    private $dataPost;
    private $nome;
    private $sugestao;
    private $con;

    public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getDataPost() {
		return $this->dataPost;
	}
	public function setDataPost($dataPost) {
		$this->dataPost = $dataPost;
		return $this;
	}
	public function getNome() {
		return $this->nome;
	}
	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}
	public function getSugestao() {
		return $this->sugestao;
	}
	public function setSugestao($sugestao) {
		$this->sugestao = $sugestao;
		return $this;
	}

   
    public function salvar()
    {
        $this->con = new Conectar();
        $sql = "INSERT INTO sugestao (nome, sugestao, dataPost) VALUES (?, ?, ?)";
        $sql = $this->con->prepare($sql);
        $sql->bindValue(1, $this->nome);
        $sql->bindValue(2, $this->sugestao);
        $sql->bindValue(3, $this->dataPost);
    

        return $sql->execute() == 1 ? TRUE : FALSE;
    }
   
}
