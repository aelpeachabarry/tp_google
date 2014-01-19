<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Google like</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery.js"></script>
  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
  
</head>
<body>
<?php
require('connexion.php');
error_reporting(E_ERROR | E_PARSE);
?>
<section id="wrap">
 
	<?php
	if(!isset($_GET['page']))
	     $page = 'home';
	else
		$page = $_GET['page'];

		 
	switch($page)
	{
			
		case 'home' :
		{
			require('view/view_form.php');
			break;
		}
		case 'result' :
		{
			require('controller/control_bibliotheque.php');
			require('controller/control_parsing.php');
			require('model/model_class_select.php');
			require('view/view_result.php');
			break;
	
		}
		case 'robot' :
		{
			require('controller/control_bibliotheque.php');
			require('controller/control_parsing.php');
			require('model/model_class_select.php');
			require('view/view_robot.php');
			break;
	
		}
		case '404' :
		{
			require('view/view_404.php');
			break;
		}
		default:
		{
			require('view/view_form.php');
		}			
		  
	}

	?>

</section>
<?php
 require('js/key_up_ajax.js');
?>
</body>
</html>