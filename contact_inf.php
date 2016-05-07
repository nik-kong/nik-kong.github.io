<?php
session_start();
   include'db_connect.php';  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Контакты</title>
<meta name="author" content="">

<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300,500' rel='stylesheet' type='text/css'>

<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" id="camera-css"  href="css/slide.css" type="text/css" media="all">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/skins/tango/skin.css" />
<link href="css/bootstrap-responsive.css" rel="stylesheet">



</head>
<body>
	<div class="container box_shadow">    
        
		<!--голова и меню-->
		<?php
   include'header.php';  
    session_start(); 
        ?>

		<!--голова и меню-->
		 
		<!--контейнер-->
<div class="page_container">
    	<div class="wrap">
        	<div class="breadcrumb">
				<div>
					<a href="index.html">Главная</a><span>/</span>Контакты
				</div>
			</div>
			<div class="container">
                <section>
                	<div class="row">
                       <div class="span1"></div>
                    	<div class="span10">
                              <h4>Наши контакты</h4> <hr>
                              <div class="row">
                            <div class="span5" align="right">
                    	       <p>тел.:+380480000000</p>
                    	       <p>+380483249835</p>
                    	       <p>email: 7004258@mail.ru</p>
                    	   </div> 
                    	   <div class="span5" align="left">
                               <p><strong>OOO"4M-consulting"</strong></p>
                    	       <p>г. Одесса</p>
                    	       <p>Французкий бульвар,33</p>
                    	   </div>
                          </div>
                           
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2748.4550209249946!2d30.755382452549643!3d46.45949439302996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xb63087caba9fc01a!2z0J7QtNC10YHRjNC60LAg0JrRltC90L7RgdGC0YPQtNGW0Y8!5e0!3m2!1sru!2sua!4v1453171454952" width="800" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                              
                        </div>
                    	                	
                	</div>
                </section>
            </div>
        </div>
    </div>				
		<!--контейнер-->
		
		<!--дно-->
		<?php
   include'footer.php';  
        ?>
		<!--дно-->
	</div>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
    <script type="text/javascript" src="js/camera.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/superfish.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/jquery.tweet.js"></script>
    <script type="text/javascript" src="js/myscript.js"></script>
    <script type="text/javascript" src="js/site-script.js"></script>
    <script type="text/javascript">
		$(document).ready(function(){	
			//Slider
			$('#camera_wrap_1').camera();
			
		});
	</script>
	<script>
    $(document).ready(function () {
        $('a#button-auth').click(function (e) {
            $(this).toggleClass('active');
            $('#top_auth').toggle();
                
            e.stopPropagation();
        });
        $('#top_auth').click(function (e) {
            e.stopPropagation();
        });

        $('body').click(function () {
            var link = $('a#button-auth');
            if (link.hasClass('active')) {
                link.click();
            }
        });
    });

</script>
	
</body>
</html>

