<?php 
	// include 'fungsi.php';
	class Query
	{
		private $db;
		function __construct()
		{
			try {
				$this->db = new PDO("mysql:host=127.0.0.1;dbname=test_lks5","root","");
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (Exception $e) {
				die($e->getMessage());
			}
			return $this->db;
		}

		public function execute($sql , $param)
		{
			try{
				$result = $this->db->prepare($sql);
				$result->execute($param);	
			}catch(Exception $e){
				die($e->getMessage());
			}
		}

		public function getField($sql, $param)
		{
			try {
				$result = $this->db->prepare($sql);
				$result->execute($param);

				$row = $result->fetch();

			} catch (Exception $e) {
				die($e->getMessage());
			}
			return $row[0];
		}
		public function getRow($sql, $param)
		{
			try {
				$result = $this->db->prepare($sql);
				$result->execute($param);

				$row = $result->fetch();
			} catch (Exception $e) {
				die($e->getMessage());
			}
			return $row;
		}
		public function getResult($sql, $param)
		{
			try {
				$result = $this->db->prepare($sql);
				$result->execute($param);
			} catch (Exception $e) {
				die($e->getMessage());
			}

			return $result; 
		}

		public function login($email, $password)
		{
			$sql 	= "SELECT * FROM user WHERE email = :email ";
			$param	= array(':email'=>$email);
			$user = $this->execute($sql, $param);
			$data = $this->getRow($sql, $param);
			if ($data > 0){
 				if (password_verify($password, $data['password'])) {
					session_start($_SESSION['user_session']);
                    $_SESSION['user_session'] = $data['id'];
					return true;
				}else{
					echo "<script>alert('Maaf Email atau Password anda salah')</script>";
					return false;
				}
			}else{
				?>
				<script>alert('Maaf Email atau Password anda salah')</script>
				<?php
				return false;
			}
		}
		public function verifyEmail($email)
		{
			$sql 	= "SELECT * FROM admin WHERE email = :email ";
			$param	= array(':email'=>$email);
			$field = $this->getField($sql, $param);
			if (!$field=0) {
				return true;	
			}
		}

		public function loginAdmin($email, $password)
		{
			$sql 	= "SELECT * FROM admin WHERE email = :email ";
			$param	= array(':email'=>$email);
			$user = $this->execute($sql, $param);
			$data = $this->getRow($sql, $param);
			if ($data > 0){
 				if (password_verify($password, $data['password'])) {
					session_start();
                    $_SESSION['admin'] = $data['id'];
					return true;
				}else{
					echo "<script>alert('Maaf Email atau Password anda salah')</script>";
					return false;
				}
			}else{
				?>
				<script>alert('Maaf Email atau Password anda salah')</script>
				<?php
				return false;
			}
		}

		public function isLoggedIn()
		{
			if ($_SESSION['user_session']==null) {
				return true;
			}else{
				return false;
			}
		}


		public function getUser()
		{
			if (!$this->isLoggedIn()) {
				return false;
			}

			$sql = "SELECT * FROM user WHERE id = :id";
			$param = array(':id'=>$_SESSION['user_session']);
			return $this->getRow($sql, $param);
		}

		public function logout()
		{
			session_destroy();
			unset($_SESSION['user_session']);
			return true;
		}

		public function getLastError(){
            return $this->error;
        }
        public function paging($q, $data, $hal)
        {
        	$of = ($hal-1) * $data;
			$query = $this->execute(" $q where limit $of,$data",null);
			$jumlah = ceil($this->db->rowCount($this->execute($q,null),null)/$data);
			$paging = array('query' => $query, "jumlah"=>$jumlah, "no"=>$of);
			return $paging;
        }
	}
	$crud = new Query();
 ?>