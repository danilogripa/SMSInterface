<?php 
//File elaborazione
// By Riccardo Mel
// And Simone "Wime" Palomba ?>

<?php 
//Recupero 
$upload = $_POST['upload'];
$messaggio =  stripslashes($_POST['messaggio']);

//Controlli & Anti-Hack
if (empty($upload)):
	echo '<p>Attenzione - Non hai inserito un file CSV da elaborare.</p>';
	exit();
else:
endif;
if ($upload == "undefined"):
	echo '<p>Attenzione -  Non hai inserito un file CSV da elaborare.</p>';
	exit();
else:
endif;
if (empty($messaggio)):
	echo '<p>Attenzione -  Non hai inserito un messaggio.</p>';
	exit();
else:
endif;
?>

<?php 
//Elaborazione 

$data = fopen ($upload, 'r');
$size = filesize($upload);
$content = fread($data, $size);
fclose ($data);
$csv_array = explode("," , $content);
//print_r ($csv_array);

$pattern = "^(\+)([0-9]{2})([0-9]{9,})$^";

//Looping
for ($i = 0; $i < count($csv_array); ++$i) {

$string = $csv_array[$i];
if (preg_match($pattern,$string))
{
	
	//Ok +39!
	//echo '<p>OK! '.$csv_array[$i].'</p>';
	//echo "<hr />";

$command="asterisk -rx ";
$output = shell_exec("$command \"dongle sms dongle0 $csv_array[$i] $messaggio \" ");
echo(nl2br($output));
sleep (9);

}
else
{

	//Senza +39!
	//echo '<p>Attenzione - '.$csv_array[$i].'</p>';
	//echo "<hr />";

$command="asterisk -rx ";
$output = shell_exec("$command \"dongle sms dongle0 +39$csv_array[$i] $messaggio \" ");
echo(nl2br($output));
sleep (9);

}
    
//$command="asterisk -rx ";
//$output = shell_exec("$command \"dongle sms dongle0 $csv_array[$i] si comunica che la sca a partire dal 19 06 eroghera lambrusco di modena certificato dop\" ");
//echo(nl2br($output));
//sleep (9);

} //foreach


//Result 
echo "<h2>Eseguito con successo. Grazie!</h2>";
?>
