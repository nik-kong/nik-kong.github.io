<?php
session_start(); 
   include'db_connect.php'; 
include'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Регистрация</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
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
		<!--//header-->
        
    <!--container-->
    <div class="page_container">
    	<div class="wrap">
        	<div class="breadcrumb">
				<div>
					<a href="index.html">Главная</a><span>/</span>Регистрация
				</div>
			</div>
			<div class="container">
                <section>
                	
                    	
                    	<div class="span12">
                        	<h2 class="title">Заполните форму</h2>
                            <div class="contact_form">  
                            	<div id="note"></div>
                                <div id="fields">
                                    <form id="form_reg" action="handler_reg.php" method="post">
                                       <p id="reg_message"></p>
                                       <div id="block-form-registration">
                                        <input class="span7" type="text" name="login" value="" placeholder="Логин" />
                                        <input class="span7" type="text" name="name" value="" placeholder="Имя" />
                                        <input class="span7" type="text" name="surname" value="" placeholder="Фамилия" />
                                        <input class="span7" type="text" name="email" value="" placeholder="Email" />
                                        <input class="span7" type="text" name="phone" value="" placeholder="Телефон" />
                                        <input class="span7" type="text" name="password" value="" placeholder="Пароль" />
                                        
                                        <div class="clear"></div>
                                        <input type="reset" class="contact_btn1" value="Очистить форму" />
                                        <input type="submit" class="contact_btn1" name="reg_submit" id="form_submit" value="Регистрация" />
                                        <div class="clear"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>                	
                	
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

   <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
   
    <script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
    <script type="text/javascript" src="js/camera.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/superfish.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/jquery.tweet.js"></script>
    <script type="text/javascript" src="js/myscript.js"></script>
    <script type="text/javascript" src="/js/site-script.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/myscripts1.js"></script>
    <script type="text/javascript" src="js/jquery.form.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    
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
