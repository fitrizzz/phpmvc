<?php

class Mahasiswa_model{ // quey data base
	// private $mhs = [
		// [
		// 	"nama" => "Lord",
		// 	"matrik_number" => "D032410321",
		// 	"email" => "asd@gamil.com",
		// 	"jurusan" => "Software"
		// ],
		// [
		// 	"nama" => "Ackerman",
			// "matrik_number" => "D032410910",
		// 	"email" => "qwe@gamil.com",
		// 	"jurusan" => "Media"
		// ],
		// [
		// 	"nama" => "Amer",
		// 	"matrik_number" => "D032410001",
		// 	"email" => "poi@gamil.com",
		// 	"jurusan" => "AI"
		// ],
		// [
		// 	"nama" => "Lalalaa",
		// 	"matrik_number" => "D032410492",
		// 	"email" => "sjd@gamil.com",
		// 	"jurusan" => "Security"
		// ]
	// ];


	// public function __construct() {
	// 	$dsn = "mysql:host=localhost;dbname=phpmvc";
		
	// 	try{
	// 		$this->dbh = new PDO($dsn,"root","");
	// 	}catch(PDOException $e){
	// 		die($e->getMessage());
	// 	}
	// }

	private $table = 'mahasiswa';
	private $db;

	public function __construct(){
		$this->db = new Database;
	}

	public function getAllMahasiswa(){
		// return $this->mhs;

		// $this->sql = $this->dbh->prepare("SELECT * FROM mahasiswa");
		// $this->sql->execute();
		// return $this->sql->fetchAll(PDO::FETCH_ASSOC);


		$this->db->query("SELECT * FROM " . $this->table);
		return $this->db->resultSet();
	}

	public function getMahasiswaById($id){
		$this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");

		$this->db->bind('id',$id);
		return $this->db->single();


	}


	public function tambahDataMahasiswa($data){

		// var_dump($data);
		$query = "INSERT INTO mahasiswa
					VALUES ('',:nama, :matrik_number, :email, :jurusan)";
		$this->db->query($query);
		$this->db->bind("nama", $data["nama"]);
		$this->db->bind("matrik_number", $data["matrik_number"]);
		$this->db->bind("email", $data["email"]);
		$this->db->bind("jurusan", $data["jurusan"]);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusDataMahasiswa($id){
		$query = "DELETE FROM mahasiswa WHERE id =:id";
		$this->db->query($query);
		$this->db->bind('id',$id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function ubahDataMahasiswa($data){

		// var_dump($data);
		$query = "UPDATE mahasiswa SET 
					nama = :nama ,
					matrik_number = :matrik_number,
					email = :email,
					jurusan = :jurusan
					WHERE id = :id";
		$this->db->query($query);
		$this->db->bind("nama", $data["nama"]);
		$this->db->bind("matrik_number", $data["matrik_number"]);
		$this->db->bind("email", $data["email"]);
		$this->db->bind("jurusan", $data["jurusan"]);
		$this->db->bind("id", $data["id"]);

		$this->db->execute();

		return $this->db->rowCount();
	}

		public function cariDataMahasiswa(){
			$keyword = $_POST["keyword"];
			$query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
			$this->db->query($query);
			$this->db->bind('keyword',"%$keyword%");
			return $this->db->resultSet();
		}
}