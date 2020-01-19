<div style=”margin-left: 630px; height: 200px; width: 400px; border: 1px solid black;” align=”left” id=”myDetails” >
<?php
$p= new productSummary();
if(isset($_POST[‘pInfoSubmit’])){
$pictureCount = $p->getPictureCount();
}else{
$pictureCount = $p->getPictureCount();
if(isset($_POST[‘o1imgSubmit’])){
$pictureCount = $p->getPictureCount();
//header(“Location: addI.php”);
}
}
?> * You have ” <b> <?php echo $p->getProductCount();?> </b>” Product(s) and ” <b><?php echo $p->getPictureCount();?></b> ” Image(s) Listed in Premium Listings. </div>
#########END
//BEGIN CLASS
<?php
Class productSummary{
public $productCount, $pictureCount;
function productSummary(){
$username = @$_SESSION[‘username’];
//Connects to your Database
//TODOs: UPDATE MYSQL FUNCTIONS to MySQLi
mysql_connect(“localhost”, “username”, “password”) or die(mysql_error());
mysql_select_db(“owenDB”) or die(mysql_error());
$sql4ProductSummary = mysql_query(“SELECT count(ptitle) as productCount, count(o1img) as o1img, count(o2img) as o2img, count(o3img) as o3img, count(o4img) as o4img, count(o5img) as o5img FROM productinfo WHERE username = ‘$username'”)or die(mysql_error());
$productSummaryCount = mysql_fetch_array($sql4ProductSummary);
extract($productSummaryCount);
$this->productCount = $productCount;
$pictureCount = $o1img+$o2img+$o3img+$o4img+$o5img;
$this->pictureCount = $pictureCount;
}
function getProductCount(){
return $this->productCount;
}
function getPictureCount(){
return $this->pictureCount;
}
}
?>