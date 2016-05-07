<?php
session_start();
   include'db_connect.php';  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Новости</title>
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
       
        <?php
   include'header.php';  
    session_start(); 
        ?>
		<!--//header-->
        
    <!--container-->
    <div class="page_container">
    	<div class="wrap">
        	<div class="breadcrumb">
				<div>
					<a href="index.html">Главная</a><span>/</span>Услуги
				</div>
			</div>
			<div class="container">
                <section>
                    <div class="row span12">
                        <h2 class="title">Энергетический консалтинг</h2>
                        <p>OOO"4M-consulting" предлагает широкий спектр аналитических, консалтинговых и проектно-ориентированных услуг в области энергетики как для отдельных предприятий и организаций, так и для территориальных образований:</p>
                                          
                    </div>
                </section>
                
                <section>                        
                            <?php
                        $result=mysql_query('SELECT * FROM `services`'); // запрос на выборку
                        while($row=mysql_fetch_array($result)){
                            echo'<div class="row">';
                            echo'<div class="span1"></div>';
                            echo'<div class="span10 services">';
                            echo'<h4>'.$row["title"].'</h4>';
                            
                            echo'<p>'.$row["text"].'</p>';
                            echo'</div>';
                            
                            echo'</div>';
                                }
                            ?>
                </section>
            </div>
        </div>
    </div>
    <!--//container-->
    
    <!--footer-->
		<?php
   include'footer.php';  
        ?>
		<!--//footer-->
	</div>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/superfish.js"></script>
    <script type="text/javascript" src="js/jquery.tweet.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/myscript.js"></script>
    <script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/myscripts1.js"></script>
    <script type="text/javascript" src="js/jquery.form.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/site-script.js"></script>
   
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
