<?php 
class Blog extends Db{
	protected function getAllBlog(){
		$sql = "SELECT * FROM blog";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0){
			while ($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
	}
	protected function getBlogItem($id){
		$sql = "SELECT * FROM blog WHERE id = '$id'";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0){
			while ($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
	}
	public function getArticle($id){
		$data = $this->qR1('*','blog',"id='$id'");
		return $data;
	}
	protected function getBlogByCat($id){
		$sql = "SELECT * FROM blog WHERE cat_id = '$id'";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0){
			while ($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
	}
	public function newArticle($arr){
		// $arr[4]=$this->sanitize($arr[4]);
		// $arr[4]=Statics::sanitize($arr[4]);
		
		$cols="cat_id,par_id,title,meta,text,code,tags,img,user";
		$values="'$arr[0]','$arr[1]','$arr[2]','$arr[3]','$arr[4]','$arr[5]','$arr[6]','$arr[7]','$arr[8]'";
		$this->qC('blog',$cols,$values);
	}

	
}
class DisplayBlog extends Blog{
	public function getName($id){
		$result=$this->getArticle($id);
		return $result['title'];
	}	
	public function showName($id){
		$result=$this->getArticle($id);
		echo $result['title'];
	}		
	public function showContent($id){
		$result=$this->getArticle($id);
		echo $result['text'];
	}	
	public function getArticleMeta($id){
		$result=$this->getArticle($id);
		$ret = mb_substr($result['meta'].strip_tags($result['text']), 0, 255) . '...';
		return $ret;
	}	
	public function showAllBlog(){
		$result = $this->getAllBlog();
		echo '<table class="sum"><tr><td>id</td><td>title</td><td>Blog</td></tr>';
		foreach($result as $row){
			echo '<tr><td>' . $row['id'].'_'. $row['cat_id'].'</td><td>'.$row['title'].'</td><td>'.$row['text'].'</td></tr>';
		}
		echo '</table>';
	}
	public function showBlogItem($id){
		$result = $this->getBlogItem($id);
		foreach($result as $row){
			$CatName = new CatName();
			$getCatName = $CatName->getCatName($row['cat_id']);
			$User = new User();
			$getUserName = $User->getUserName('id',$row['user']);
			$getUserAvatar = $User->getUserAvatar('id',$row['user']);
			echo '<article id="'.$row['id'].'">';
			if(isset($_SESSION['user'])){
				if(($row['user']==$_SESSION['user']['id'])||($_SESSION['user']['rights']>7)){
				echo '<input type="button" class="btn artbtn artedit" name="'.$row['id'].'" value="E" alt="edit" title="edit"
				onclick="window.location.href = \'index.php?menu=felvisz&edit='.$row['id'].'\';">';
				if(isset($_GET['delete'])){$menu=str_replace('&delete='.$_GET['delete'],'',$_SERVER['QUERY_STRING']);}
					else{$menu=$_SERVER['QUERY_STRING'];}
				echo '<input type="button" class="btn artbtn artdelete" alt="delete" title="delete" name="'.$row['id'].'" value="X" onclick=" if(confirm(\'Biztos törli a cikket?\')) { window.location.href = \'index.php?'.$menu.'&delete='.$row['id'].'\'; }">';
				}
			}	
			echo '<div class="infobox">
				<img class="avatar" src="img/users/'.$getUserAvatar.'">
				<h5>'. $getUserName.
				'<br>'. $getCatName.
				'<br>'.$row['editdate'].
				'</h5></div>
				<h2>'.$row['title'].
				'</h2><div class="text">'.$row['text'].
				'</div>
				</article>';
		}
	}
	public function showBlogByCat($id){
		$result = $this->getBlogByCat($id);
		foreach($result as $row){
			$this->showBlogItem($row['id']);
		}
	}
	public function showBlogSelects(){
		$Cat = new Cat();
		$getAllCat = $Cat->getAllCat();
		$blog = $this->getAllBlog();
		for($i=0; $i<count($getAllCat);$i++){
			$result = $this->getBlogByCat($getAllCat[$i]['id']);
			echo $getAllCat[$i]['title'].'<br><select size="'.count($result).'" class="sfrom">';
			foreach($result as $row){
				echo '<option >'.$row['title'].'</option>';
			}
			echo '</select><br>';
		}
	}
}
class SelectTitle extends Blog{
	public function __construct($action){
		$result = $this->getAllBlog();
		echo '<form name="selecttitleform" method="post" action="'.$action.'"><select name="selecttitle" onchange="this.form.submit();"><option value="">-= válasszon cikket =-</option>';
		foreach($result as $row){
			echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
		}
		echo '</select></form>';
	}	
}
class UpdateBlog extends Blog{
	public function updateArticle($id,$set){
		$id = "id='".$id."'";
		$this->qU1($set,'blog',$id);
	}
}
class DeleteBlog extends Blog{
	public function deleteArticle($id){
		$result=$this->getArticle($id);
		$id="'".$id."'";
		$r = $this->qD('blog','id',$id);
		if($r>0){
		return $result['title'];
		}
	}
}




?>