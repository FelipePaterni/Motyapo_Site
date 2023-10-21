<?php



include_once 'Conectar.php';

class Usuario{
    private $id;
    private $email;
    private $senha;
    private $con;

	public function getId() {
		return $this->id;
	}
	
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}
		
	public function getemail() {
		return $this->email;
	}
	
	public function setemail($email): self {
		$this->email = $email;
		return $this;
	}
	public function getSenha() {
		return $this->senha;
	}
	public function setSenha($senha): self {
		$this->senha = $senha;
		return $this;
	}

    public function consultar() {
        $this->con = new Conectar();
        $sql = "SELECT * FROM usuario WHERE email = ? AND senha = ?;";
        $executar = $this->con->prepare($sql);
        $executar->bindValue(1, $this->email);
        $executar->bindValue(2, sha1($this->senha));
        
        return $executar->execute() == 1 ? $executar->fetchColumn() : false ;
    }

}