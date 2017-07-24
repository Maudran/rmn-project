<?php
require_once 'controller.php';
?>
<!DOCTYPE html>
<html>
	<head>
    	<title>CV de Maryanne</title>
    	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  		<link rel="stylesheet" type="text/css" href="/rmn-project/css/style.css" media="screen" />
  		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
     	 rel="stylesheet">
     	 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
     	 <script src="https://use.fontawesome.com/13efbd30e6.js"></script>
	</head>
	<body id="<?php echo $bodyId ?>">

	

    <?php
    if ($view) {
        include ('view/'.$view);
    }
    ?>

 

	<div id="footer-container">

		<div id="social-links">
			<h3 class="titlestyle">Réseaux sociaux</h3>
	  		<a href="https://www.linkedin.com/in/maryanne-audran-b16569119/" title="LinkedIn" target="_blank" class="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i> LinkedIn</a>
	  		<a href="https://www.facebook.com/maryanne.audran.9" title="Facebook" target="_blank" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
		</div>

	  	<div id="other-links"> 
	  		<h3 class="titlestyle">Autre</h3>
	  		<a href="/rmn-project/contact.htm" title="Me contacter" class="contact-link">Me contacter</a>
	  		<a href="/rmn-project/CV_maryanne_audran.pdf" title="Mon CV en pdf" target="_blank" class="cv-link">Télécharger mon CV</a>
	   	</div>

	 </div>

	 <?php /*echo '<p>Cette ligne est écrite en PHP '.rand(0, 9999).'</p>';*/ ?>
  	</body>
</html>