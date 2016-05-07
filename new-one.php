<?php
session_start();
   include'db_connect.php';   
 include'functions.php';
$id = clear_string($_GET["id"]); 
$_SESSION['id'] = $id;
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
					<a href="index.html">Главная</a><span>/</span>Новости
				</div>
			</div>
			<div class="container">
                <section>
                	<div class="row">
                       <div class="span8">
                    	<?php
                        $result=mysql_query('SELECT * FROM `news`  WHERE id='.$id.''); // запрос на выборку
                        while($row=mysql_fetch_array($result)){
                        
                        echo'<div class="post">';
                        echo'<h2 class="title"><a href="new-one.php?id='.$row["id"].'">'.$row["title"].'</a></h2>';
                        echo'<img src=\'up-img/',$row["image"],'\'>';
                        echo'<div class="post_info">';
                        echo'<div class="fleft">Дата добавления <span>'.$row["date"].'</span></div>';
                        //echo'<div class="fright"><a href="#">х</a> комментариев</div>';                                    
                        echo'<div class="clear"></div>';
                        echo'</div>';
                        echo'<p>'.$row["text"].'</p>';
                        echo'</div>';
                               }
                            ?> 
          <!--Комментарии-->                  
                        <h4>Комментарии</h4>
                            <div id="comments">
                                <ol>
                                  <?php
                        $result=mysql_query('SELECT * FROM `reviews`  WHERE id_news='.$id.' and moderate=1'); // запрос на выборку
                        while($row=mysql_fetch_array($result)){
                                echo'<li>';
                                echo'<div class="avatar"><a href="#"><img src="images/avatar1.jpg" width="68" height="68" alt="" /></a></div>';
                                echo'<div class="comment_right">';
                                echo'<div class="comment_info"><a href="#">'.$row["user_name"].'</a> <span>|</span>'.$row["date"].'<span>|</span>';
                                echo'</div>'.$row["comment"].'</div>';
                                echo'<div class="clear"></div>';                                        
                                echo'</li>'; 
                                       }
                            ?> 
                                                                 
                                </ol>
                            </div> 
                          
          <!--Комментарии-->  
                         
          <!--Форма_комментарии-->
                        <h4>Добавить комментарий</h4>
                          <div class="comment_form">
                               <form id="ajax-contact-form" action="handler_comment.php" method="post">
                               <p id="comment_message"></p>
                                <input class="span5" type="text" id="name" name="name" value="" placeholder="Имя" />
                                <textarea name="message" id="message" class="span7" value="" placeholder="Сообщение.." ></textarea>
                                <div class="clear"></div>
                                <input type="reset" class="contact_btn1" value="Очистить форму" />
                                <input type="submit" class="contact_btn1" name="reg_submit" id="form_submit" value="Добавить" />
                                <div class="clear"></div>
                            </form>
                          </div>
          <!--Форма_комментарии-->                                    
                       
                            </div> 
          <!--Другие новости-->                  
                        <div class="span4">
                        <h2 class="title">Другие новости</h2><hr>
                         <?php
                        $result=mysql_query('SELECT * FROM `news` WHERE id<>'.$id.''); // запрос на выборку
                        while($row=mysql_fetch_array($result)){
                        
                        echo'<div class="post">';
                        echo'<h5 class="title"><a href="new-one.php?id='.$row["id"].'">'.$row["title"].'</a></h5>';
                        
                        echo'<h6>'.$row["description"].'</h6>';
                        echo'</div>';
                        
                               }
                            ?>     
                            
                        </div>   
         <!--Другие новости-->                                            
                            	                	
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
    <script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/myscript.js"></script>
    <script type="text/javascript" src="js/site-script.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/jquery.form.js"></script>
    <script type="text/javascript" src="js/comment-valid.js"></script>
    
    <script>
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

