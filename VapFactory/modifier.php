<?php 
echo "<form method='post'>
<input placeholder='Reference'name='reference'></input> 
<input placeholder='Article'name='article'></input>
<input placeholder='Description'name='description'></input>
<input placeholder='prix achat'name='prix_achat'></input>
<input placeholder='prix vente'name='prix_vente'></input>
<input placeholder='Nb Stock'name='quantite'></input>
<input placeholder='Type'name='type'></input>
<button type='submit'>Ajouter</button>
</form>";

if (isset($_POST['reference'])){
$id=$_GET['id'];
$reference = $_POST["reference"];
   $article = $_POST["article"];
   $description = $_POST["description"];
   $prix_achat = $_POST["prix_achat"];
   $prix_vente = $_POST["prix_vente"];
   $quantite = $_POST["quantite"];
   $type = $_POST["type"];
$bdd = new PDO('mysql:host=localhost:3306; dbname=VapFactory','root', 'AIRriValz182', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"));
$sql = "UPDATE produits SET reference=?, article=?, description=?, prix_achat=?, prix_vente=?, quantite=?, type=? WHERE id=? ";
$bdd->prepare($sql)->execute([$reference, $article, $description,$prix_achat,$prix_vente,$quantite,$type,$id]);


header('location:vapfactory.php');
}
?>