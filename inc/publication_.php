<?php 

class Publication extends Db{
	protected function getAllPublications(){
		$data = $this->qR('*','publications');
		return $data;
	}
	protected function getPublicationById($id){
		$data = $this->qRwo('*','publications',"id='".$id."'",'');
		return $data;
	}
	protected function getOrderById($id){
		$data = $this->qRwo('*','arrangement',"project='".$id."'",'');
		return $data;
	}
	


	
}

class UpdatePublication extends Publication{
	public function createPublication($id,$name){
		$avatar= "projectname='".$name."'";
		$id = "id='".$id."'";
		$this->qU1($avatar,'publications',$id);
	}
	public function updatePublicationName($id,$name){
		$projectname= "projectname='".$name."'";
		$id = "id='".$id."'";
		$this->qU1($projectname,'publications',$id);
	}
	public function updateOrder($id,$order){
//		$avatar= "avatar='".$avatar."'";
//		$id = "id='".$_SESSION['user']['id']."'";
//		$this->qU1($avatar,'user',$id);
	}
}



class ShowPublications extends Publication{
	public function getPublicationName($id){
		$result = $this->getPublicationById($id);
		foreach($result as $row){
			$name = $row['projectname'];
		}
		return $name;
	}	
	public function showPublicationName($id){
		$name = $this->getPublicationName($id);
			echo $name;
	}	
	public function publicationOrder($id){
		$result = $this->getOrderById($id);
		foreach($result as $row){
			$data[$row['parent']]= $row['ordering'];
		}
		return $data;
	}	
	public function publicationH2($id){
		$result = $this->getOrderById($id);
		foreach($result as $row){
			$data= $row['h2'];
		}
		return $data;
	}	
	
	public function publicationOrderKeys($id){
		$result = $this->getOrderById($id);
		foreach($result as $row){
			$data[]= $row['parent'];
		}
		return $data;
	}

	public function publicationOrderIds($id){
		$result = $this->getOrderById($id);
		foreach($result as $row){
			$data[]= $row['id'];
		}
		return $data;
	}

	public function publicationOrderList($id){
		$order = $this->publicationOrder($id);
		$orderKeys = $this->publicationOrderIds($id);
		foreach($orderKeys as $orderKey){
			$orderList[$orderKey] = explode(',',$order[$orderKey]);
		}
		return $orderList;
	}	
	public function publicationOrderListNames($id){
		$DisplayBlog = new DisplayBlog(); // blog objectum to get names
		$orderKeys = $this->publicationOrderKeys($id); // how many order rows are there and the parent_id-s
		$orderList = $this->publicationOrderList($id); // list orders by rows, the key is the orderkey
		for($i=0; $i<count($orderKeys);$i++){
			for($j=0; $j<count($orderList[$orderKeys[$i]]);$j++){
				$data[$i][$j]['id'] = $orderList[$orderKeys[$i]][$j];
				$data[$i][$j]['name'] = $DisplayBlog->getName($orderList[$orderKeys[$i]][$j]);
			}
		}
		return $data;
	}
	public function showPublicationOrderListNames($id){
		$DisplayBlog = new DisplayBlog();
		$orderKeys = $this->publicationOrderKeys($id);
		$orderList = $this->publicationOrderList($id);
		$this->showPublicationName($id);
		echo '<ul class="pub_ul">';
		for($i=0; $i<count($orderKeys);$i++){
			echo '<li title="'.$DisplayBlog->getArticleMeta($orderKeys[$i]).'">'.$DisplayBlog->getName($orderKeys[$i]).'<br><ul class="sub_pub_ul">';
			for($j=0; $j<count($orderList[$orderKeys[$i]]);$j++){
				echo '<li title="'.$DisplayBlog->getArticleMeta($orderList[$orderKeys[$i]][$j]).'">';
				echo $DisplayBlog->getName($orderList[$orderKeys[$i]][$j]);
				echo '</li>';
			}
			echo '</li></ul>';
		}
		echo '</ul>';
	}
	public function showPublicationOrderSelect($id){
		$DisplayBlog = new DisplayBlog();
		$orderKeys = $this->publicationOrderKeys($id);
		$orderList = $this->publicationOrderList($id);
		$this->showPublicationName($id);
		for($i=0; $i<count($orderKeys);$i++){
			echo $DisplayBlog->getName($orderKeys[$i]).'<br><select size="'.count($orderList[$orderKeys[$i]]).'" class="sfrom">';
			for($j=0; $j<count($orderList[$orderKeys[$i]]);$j++){
				echo '<option title="'.$DisplayBlog->getArticleMeta($orderList[$orderKeys[$i]][$j]).'" value="'.$orderList[$orderKeys[$i]][$j].'" id="o'.$orderList[$orderKeys[$i]][$j].'"  ondblclick="addthis(this.id)">';
				echo $DisplayBlog->getName($orderList[$orderKeys[$i]][$j]);
				echo '</option>';
			}
			echo '</select><br>';
		}
		echo '';
	}
	public function showPublicationOrderSelectOptgroup($id){
		$DisplayBlog = new DisplayBlog();
		$orderKeys = $this->publicationOrderKeys($id);
		$orderList = $this->publicationOrderList($id);
		$this->showPublicationName($id);
		echo '<br><select multiple size="10">';
		for($i=0; $i<count($orderKeys);$i++){
			echo '<optgroup label="'.$DisplayBlog->getName($orderKeys[$i]).'">';
			for($j=0; $j<count($orderList[$orderKeys[$i]]);$j++){
				echo '<option title="'.$DisplayBlog->getArticleMeta($orderList[$orderKeys[$i]][$j]).'" value="'.$orderList[$orderKeys[$i]][$j].'" id="o'.$orderList[$orderKeys[$i]][$j].'"  ondblclick="addthis(this.id)">';
				echo $DisplayBlog->getName($orderList[$orderKeys[$i]][$j]);
				echo '</option>';
			}
			echo '</optgroup>';
		}
		echo '</select>';
	}







	public function publicationsTable(){
		$result = $this->getAllPublications();
		echo '<table class="sum">';
			echo '<tr><td>Publikáció neve</td><td>Leírás</td>';
		if(isset($_SESSION['user']['id'])){
			echo '<td>szerkeszt</td><td>átnevez</td></tr>';
		}else{
			echo '</tr>';
		}
		foreach($result as $row){
			echo '<tr><td><a href="index.php?menu=present&pubid='.$row['id'].
				'">'.$row['projectname'].
				'</a></td><td>'.$row['user'].
				'</td>';
				if(isset($_SESSION['user']['id'])){
				if(($row['user']==$_SESSION['user']['id'])){
					echo '<td><form menu="index.php?menu=publication" method="post"><input type="hidden" name="editId" class="hidden" value="'.$row['id'].'" readonly><input type="submit" value="szerkeszt"></form></td>';					
					echo '<td><form menu="index.php?menu=publication" method="post"><input type="text" name="rename" value="'.$row['projectname'].'"><input type="hidden" name="renameId" class="hidden" value="'.$row['id'].'" readonly><input type="submit" value="átnevez"></form></td></tr>';
				}else{ echo '<td style="background: transparent;border: none;">n/a</td><td style="background: transparent;border: none;">n/a</td></tr>';}
				}
		}
		echo '</table>';
	}	
}
?>













