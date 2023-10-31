<?php



include_once 'Conectar.php';

class Usuario
{
	private $id;

	private $nome;
	private $email;
	private $senha;
	private $con;

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	public function getemail()
	{
		return $this->email;
	}

	public function setemail($email)
	{
		$this->email = $email;
		return $this;
	}
	public function getSenha()
	{
		return $this->senha;
	}
	public function setSenha($senha)
	{
		$this->senha = $senha;
		return $this;
	}

	public function getNome()
	{
		return $this->nome;
	}


	public function setNome($nome)
	{
		$this->nome = $nome;
		return $this;
	}
	public function consultar()
	{
		$this->con = new Conectar();
		$sql = "SELECT * FROM usuario WHERE email = ? AND senha = ?;";
		$executar = $this->con->prepare($sql);
		$executar->bindValue(1, $this->email);
		$executar->bindValue(2, sha1($this->senha));

		return $executar->execute() == 1 ? $executar->fetchColumn() : false;
	}
	public function salvar()
	{
		$this->con = new Conectar();
		$sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
		$sql = $this->con->prepare($sql);
		$sql->bindValue(1, $this->nome);
		$sql->bindValue(2, $this->email);
		$sql->bindValue(3, sha1($this->senha));

		return $sql->execute() == 1 ? TRUE : FALSE;
	}
}
