<?php 

class User extends Db{
	
	protected function getAllUsers(){
		$sql = "SELECT * FROM user";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0){
			while ($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
	}
	protected function getUser($by,$id){
		$sql = "SELECT * FROM user WHERE $by='$id'";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0){
			while ($row = $result->fetch_assoc()){
				$data = $row;
			}
			return $data;
		}
	}
	public function getUserName($by,$id){
		$data = $this->getUser($by,$id);
			return $data['user'];	
	}	
	public function getUserAvatar($by,$id){
		$data = $this->getUser($by,$id);
			return $data['avatar'];	
	}	
	public function getActiveUser($by,$id){
		$data = $this->getUser($by,$id);
			unset($data['pass']);
			return $data;	
	}	
}

class ViewUser extends User{
	public function showAllUsers(){
		$datas = $this->getAllUsers();
		echo 'number of users: '.count($datas) .'<table class="sum usertable "><tr><td>#</td><td>e-mail</td><td>username</td><td>rights</td><td>password</td></tr>';
		foreach($datas as $data){
			unset($data['pass']);
			echo '<tr><td>'.$data['id'].'</td>'.
				'<td>'.$data['email'].'</td>'.
				'<td>'.$data['user'].'</td>'.
				'<td>'.$data['rights'].'</td>'.
				'<td>expunged</td></tr>';
		}
		echo '</table>';	
	}
	public function showUser($id){
		$data = $this->getUser('id',$id);
		echo '<table class="sum usertable "><tr><td>#</td><td>e-mail</td><td>username</td><td>password</td></tr>';
			unset($data['pass']);
			echo '<tr><td>'.$data['id'].'</td>'.
				'<td>'.$data['email'].'</td>'.
				'<td>'.$data['user'].'</td>'.
				'<td>expunged</td></tr>';
		echo '</table>';	
	}
	public function showUserByEmail($email){
		$data = $this->getUser('email',$email);
		echo '<table class="sum usertable "><tr><td>#</td><td>e-mail</td><td>username</td><td>password</td></tr>';
			unset($data['pass']);
			echo '<tr><td>'.$data['id'].'</td>'.
				'<td>'.$data['email'].'</td>'.
				'<td>'.$data['user'].'</td>'.
				'<td>expunged</td></tr>';
		echo '</table>';	
	}

}
class ShowAllUsers extends ViewUser{
	public function __construct(){
		$datas = $this->showAllUsers();
	}
}
class UpdateUser extends User{
	public function updateAvatar($avatar){
		$avatar= "avatar='".$avatar."'";
		$id = "id='".$_SESSION['user']['id']."'";
		$this->qU1($avatar,'user',$id);
	}
}
?>