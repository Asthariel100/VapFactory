
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Vap Factory</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<?php 
try
{$pdo = new PDO('mysql:host=localhost:3306; dbname=VapFactory','root', 'AIRriValz182', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"));
echo '<div>Connexion reussie</div>';
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>

<body>

<table>
   <?php
 echo  "<tr><th></th>
 <th>Référence</th>
 <th>Article</th>
 <th>Description</th>
 <th>Prix/Achat</th>
<th>Prix/Vente</th>
 <th>Qte/Stock</th>
 <th>Type</th>
 <th></th>
</tr>";

$bdd = new PDO('mysql:host=localhost:3306; dbname=VapFactory','root', 'AIRriValz182', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"));
$requete = $bdd->query("SELECT * FROM produits");
while($resultat = $requete->fetch()){
echo "<tr>
<td><a href='delete.php?id=".$resultat['id']."'>Suppr</a></td>
    <td>".$resultat['reference']."</td>
    <td>".$resultat['article']."</td>
    <td>".$resultat['description']."</td>
    <td>".$resultat['prix_achat']."</td>
    <td>".$resultat['prix_vente']."</td>
    <td>".$resultat['quantite']."</td>
    <td>".$resultat['type']."</td>
    <td><a href='modifier.php?id=".$resultat['id']."'>mdf</a></td>
  </tr>";
}

  ?>
</table>


<form method="post">
<input placeholder="Reference"name="reference"></input> 
<input placeholder="Article"name="article"></input>
<input placeholder="Description"name="description"></input>
<input placeholder="Prix achat"name="prix_achat"></input>
<input placeholder="prix vente"name="prix_vente"></input>
<input placeholder="Nb Stock"name="quantite"></input>
<input placeholder="Type"name="type"></input>
<button type="submit">Ajouter</button>
</form>
   <?php
 

   $reference = $_POST["reference"];
   $article = $_POST["article"];
   $description = $_POST["description"];
   $prix_achat = $_POST["prix_achat"];
   $prix_vente = $_POST["prix_vente"];
   $quantite = $_POST["quantite"];
   $type = $_POST["type"];
  
   
   addproduct($pdo,$reference, $article, $description, $prix_achat,$prix_vente,$quantite,$type);

   function addproduct($pdo,$reference, $article, $description, $prix_achat,$prix_vente,$quantite,$type) {
      try {
			$sql = "INSERT INTO produits (reference, article, description, prix_achat,prix_vente,quantite, type)
					VALUES ('$reference', '$article', '$description','$prix_achat','$prix_vente','$quantite','$type')";
	    	$pdo->query($sql);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
       
	}
   
   ?> 
</body>
</html>