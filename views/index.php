
<p>
Na! Kezdjük már el.... <?=Config::$admin?>
</p>
<?php 
$list = new CategoryTable();

$ShowPublications=new ShowPublications();
echo '<br><hr><br>';
$ShowPublications->publicationsTable();
?>





