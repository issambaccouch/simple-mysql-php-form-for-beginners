



<?php
    
    $cin =$_GET["cin"];
    $nom =$_GET["nom"];
    $prenom =$_GET["prenom"];
    $email =$_GET["email"];
    $telephone =$_GET["telephone"];
    $date =$_GET["date"];       
    $sexe=$_GET["optionsRadios"];
    $car=$_GET["car"];
  
$html ="

<head>
<!-- Latest compiled and minified CSS -->
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'
integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'
integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM'
crossorigin='anonymous'></script>  
<body>
    
   
    

     <h3 align='center'>Modification réusssite pour $prenom  $nom</h3>  
	 
     ";        
             
echo "$html" ;

$html ="

    
   
    <table border ='1' align='center' >
	<caption> Listes des achat </caption>
            <thead>
                <tr>                    
                    <th>CIN</th>
                    <th>NOM</th>
					<th>PRENOM</th>
					 <th>DateNaissance</th>
					 <th>EMAIL</th>
					 <th>TELEPHONE</th>
					 <th>GENRE</th>
                     <th>car</th>
					  <th>Modif</th>
					  <th>supp</th>
					
					
					
					
                </tr>
            </thead>
	
	

                
     ";        
             
echo "$html" ;

                // Connection à la base de données
                $conn = mysqli_connect('localhost', 'root', '', 'agencewfbd');
                if (!$conn) {
                    die('Could not connect to MySQL: ' . mysqli_connect_error());
                }
				$req = "UPDATE achat SET  nom='$nom', prenom='$prenom', email='$email', telephone='$telephone', date='$date', sexe='$sexe', car='$car' WHERE achat.cin = '$cin';";
				mysqli_query ($conn,$req);
				$result = mysqli_query($conn, 'SELECT * FROM achat');

                // Exécution de requête
                while (($row = mysqli_fetch_array($result)) != NULL) {
                    echo '
                <tr>
                    <td>' . $row["cin"] . '</td>
                    <td>' . $row["nom"] . '</td>
					<td>' . $row["prenom"] . '</td>
					<td>' . $row["date"] . '</td>
					<td>' . $row["email"] . '</td>
					<td>' . $row["telephone"] . '</td>
                    <td>' . $row["sexe"] . '</td>
                    <td>' . $row["car"] . '</td>
					<td><a href=\'modifier.php?cin='. $row["cin"] .'\'><img src=\'modifier.jpg\' width=\'30\' > modifier</a></td>
					<td><a href=\'traitSuppression.php?cin='. $row["cin"] .'\'><img src=\'supprimer.jpg\' width=\'30\' > supprimer</a></td>
					
                </tr>
                ';
                }
				echo "</table> 
				<br>
				<a href='index.html'> ajouter un achat </a>
				";

                // Libération de ressource reservé (optionnel)
                mysqli_free_result($result);
                // Fermeture de connection (optionnel)
                mysqli_close($conn);


?>