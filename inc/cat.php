<?php 
class Cat extends db{
	protected function getAllCategory(){
		$data = $this->qR('*','category');
		return $data;
	}
	protected function getCategory($id){
		$sql = "SELECT * FROM category WHERE id = '$id'";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0){
			while ($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
	}
	public function getAllCat(){
		$data = $this->qR('*','category');
		return $data;
	}	
}
class CatName extends Cat{
	public function getCatName($id){
		$data = $this->getCategory($id);
		return $data[0]['title'];
	}
	public function getCatDescription($id){
		$data = $this->getCategory($id);
		return $data[0]['description'];
	}
}

class SelectCat extends Cat{
	public function __construct($selectedCat){
		$result = $this->getAllCategory();
		echo '<select name="selectcategory">';
		foreach($result as $row){
			if ($row['id'] == $selectedCat){ $selected=' selected';}else{ $selected='';}
			echo '<option value="'.$row['id'].'" '.$selected.'>'.$row['title'].' ('.$row['id'].')</option>';
		}
		echo '</select>';
	}	
}
class SelectCategory extends Cat{
	public function __construct($action){
		$result = $this->getAllCategory();
		echo '<form name="selectcategoryform" method="post" action="'.$action.'"><select name="selectcategory" onchange="this.form.submit()">';
			echo '<option value="">-= válasszon kategóriát =- </option>';
		foreach($result as $row){
			echo '<option value="'.$row['id'].'">'.$row['title'].' </option>';
		}
		echo '</select></form>';
	}	
}
class CategoryTable extends Cat{
	public function __construct(){
		$result = $this->getAllCategory();
		echo '<table class="sum">';
		echo '<tr><td>Blog címe</td><td>Leírás</td><td>Utolsó változás</td></tr>';
		foreach($result as $row){
			echo '<tr><td><a href="index.php?menu=list&catid='.$row['id'].
				'">'.$row['title'].
				'</a></td><td>'.strip_tags($row['description'],'<a>').
				'</td><td></td></tr>';
		}
		echo '</table>';
	}	
}
?>