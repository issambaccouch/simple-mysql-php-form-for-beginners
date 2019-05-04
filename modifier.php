<?php


$cin=$_GET['cin'];

                // Connection à la base de données
                $conn = mysqli_connect('localhost', 'root', '', 'agencewfbd');
                if (!$conn) {
                    die('Could not connect to MySQL: ' . mysqli_connect_error());
                }

                 //Préparation de requête
				
				$result = mysqli_query($conn, "SELECT * FROM achat where cin='".$cin."';");

                // Exécution de requête
              $row = mysqli_fetch_array($result);
                  


echo "
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel='stylesheet' href='css/bootstrap.css'>



<!-- Latest compiled and minified JavaScript -->
    <script src='js/jquery.js'></script>
</head>
<body>
    

<div class='row'>
  <div class='col-md-6 col-md-offset-3' >
<form action='traitModification.php' method='Get'>
    <div class='form-group'>
    <label >CIN</label>
    <input type='text' class='form-control'  pattern='[0-9]{8}' value='" .$cin."'name='cin'  >
  </div>
   <div class='form-group'>
    <label >Nom</label>
    <input type='text' class='form-control'  value='". $row["nom"] ."' name='nom'>
  </div>
  <div class='form-group'>
    <label >Prenom</label>
    <input type='text' class='form-control' value='". $row["prenom"] ."' name='prenom'>
  </div>
  <div class='form-group'>
    <label >Email address</label>
    <input type='email' class='form-control'  value='". $row["email"] ."' name='email'>
  </div>
  <div class='form-group'>
    <label >Telephone</label>
    <input type='text' class='form-control'  pattern='[0-9]{8}' value='". $row["telephone"] ."' name='telephone'>
  </div>
 <div class='form-group'>
    <label >Date de naissance</label>
    <input type='date' class='form-control'  max='1995-12-31' min='1990-01-01' value='". $row["date"] ."' name='date'>
  </div>    

    
<label>Sexe</label>
<div class='radio'>
    <label>";
	if ($row["sexe"]=="homme")
	echo "
    <input type='radio' name='optionsRadios'  value='homme'checked >
        Homme
    </label>
</div>
                
<div class='radio'>
    <label>
    <input type='radio' name='optionsRadios' value='femme' >
    Femme
    </label>
</div>";
else
	echo "
<input type='radio' name='optionsRadios'  value='homme' >
        Homme
    </label>
</div>
                
<div class='radio'>
    <label>
    <input type='radio' name='optionsRadios' value='femme' checked >
    Femme
    </label>
</div>

";

echo "  
<div class='column one'>
  <select class='mdb-select md-form' name='car' required>
    <option value='". $row["date"] ."' disabled selected>Choisissez votre modele de voiture </option>
    <option value='BMW5'>BMW 5</option>
    <option value='BMWM6'>BMW M6</option>
    <option value='BMWX5'>BMW X5</option>
    <option value='bmw3'>BMW 3</option>
    <option value='bmwi8'>BMW i8</option>
  </select>
</div>                      
<button type='submit' class='btn btn-default'>envoyer</button>
<button type='reset' class='btn btn-default'>annuler</button>
</form>

    </div>
    </div>





</body>
</html>

";

                // Libération de ressource reservé (optionnel)
                mysqli_free_result($result);
                // Fermeture de connection (optionnel)
                mysqli_close($conn);



?>