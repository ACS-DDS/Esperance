
<!DOCTYPE html>
<html>
<head>
	<title>Esperance</title>
</head>
<body>
<p>Bienvenue sur l'app esperance. La seule application qui prédit le temps qu'il vous reste à vivre.</p>

<form method="post" action="<?php echo base_url() ?>controller/esperance/">
	
		<label for="departement">Departement</label>
		<select name="departement">
		  	<option>Ain</option>
		  	<option>Aisne</option>
		  	<option>Allier</option>
		  	<option>Alpes-de-Haute-Provence</option>
		  	<option>Hautes-Alpes</option>
		  	<option>Alpes-Maritimes</option>
		  	<option>Ardeche</option>
		</select><br>
		<label for="male">Homme</label>
		<input type="radio" name="gender" id="male" value="homme"><br>
		<label for="female">Femme</label>
		<input type="radio" name="gender" id="female" value="femme"><br>
		<label for="age">Age</label>
		<input type="number" name="age" id="age" min="0" max="80"><br>
		<input type="submit" value="Submit">
  	
</form>
<?php if (isset($erreur)) {
	echo $erreur;
}

?>
<?php if (isset($esperance)) {
	echo $esperance;
}
?>

</body>
</html>