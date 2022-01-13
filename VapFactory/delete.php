<?php
if (isset($_GET['id'])){
$id=$_GET['id'];
$bdd = new PDO('mysql:host=localhost:3306; dbname=VapFactory','root', 'AIRriValz182', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"));
$requete = $bdd->query("DELETE from produits WHERE id=$id ");
header('location:vapfactory.php');
}
?>