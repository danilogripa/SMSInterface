<!DOCTYPE html>
<!--[if IE 8]>    <html lt-ie9" lang="it"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="it"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="stylesheets/framework.min.css">
  <link rel="stylesheet" href="stylesheets/app.css">
</head>
<body style="background:#fff;">
<?php
//Funzioni utili by Targetweb
//Funzione Replace " " in "_" (evitiamo possibili errori)
function fSpace($string)
{
	return str_replace(" ", "_", $string);
}

//Funzione per ricavare l' estensione di un File
function fExt($string)
{ 
	//Controllo il file
	$trova_punto = explode(".", $string);
	$estensione = $trova_punto[count($trova_punto) - 1];
	$estensione = strtolower($estensione);
	
	// Se non ci sono estensioni
	if (isset($trova_punto[1]) == FALSE)
	{
		return '';
	}
	//Ritorno il valore dell' estensione
	return $estensione;
}
//Fine funzioni


//Effettuo l' upload...
$uploaddir = 'upload/';
//Evito mi dia errore se avvio l'iframe...
if(isset($_FILES['txt_file']['name'])):
	$uploadfile = fspace($_FILES['txt_file']['name']);
else:
	$uploadfile = "";
endif;
$upload = $uploaddir . $uploadfile;
//Controllo che sia stato specificato un file
if(!strlen($uploadfile) == 0)
{
	//Controllo l' estensione del file
	if((fExt($uploadfile) == 'txt') or (fExt($uploadfile) == 'jpg')  or (fExt($uploadfile) == 'pdf') or (fExt($uploadfile) == 'csv'))
	{
		
		//Eseguo l' upload
		if(move_uploaded_file($_FILES['txt_file']['tmp_name'], $upload))
		{
			//Upload eseguito con successo
			echo '<div class="alert-box success">';
  			echo "Successo!";  
  			echo '<a href="" class="close">&times;</a>';
  			echo '</div>';
			echo "<input type='text' name='upload' id='upload' value='upload/" . $uploadfile."' style='display:none;' />"; 
			echo "<br />";
			
		}else{

			//Upload fallito
			echo "Upload OK !";
		}

	}else{

		//Messaggio di errore estensione non valida
		echo "Arquivo nao valido";
	}

} else {

	//Messaggio di errore nessun file specificato
	echo "<h1>Importe o CSV do seu pc</h1>";
	echo "<p style='margin-top:-10px;'>Envie sms em massa</p>";
}
?>

<form enctype="multipart/form-data" method="post" action="upload.php">
	file: <input type="file" name="txt_file" class="upload_label" size="40">
	<input type="submit" class="secondary button" value="Upload">
</form>

</body>
</html>
