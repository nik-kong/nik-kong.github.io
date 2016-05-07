<?php
session_start();
   include'db_connect.php';  
include'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Сайт</title>
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
			<!--слайдшоу-->
			<div id="main_slider">
				<div class="camera_wrap" id="camera_wrap_1">
					<div data-src="images/slider/slide1.jpg">
						<div class="camera_caption fadeIn">
							<!--<div class="slide_descr">Бла-бла-бла,</br>Бла-бла</br>Бла-бла-бла-бла</div>-->
						</div>
					</div>
					<div data-src="images/slider/slide2.jpg">
						<div class="camera_caption2 fadeIn">
							<!--<div class="slide_descr"><span class="cap_bg1">Какая-то</span> очень </br><span class="cap_bg2">важная информация</span></div>-->
						</div>
					</div>
					<div data-src="images/slider/slide3.jpg">
						<div class="camera_caption3 fadeIn">
							<!--<div class="slide_descr">aaaa</div>-->
						</div>
					</div>
				</div><!-- #camera_wrap_1 -->
				<div class="clear"></div>	
			</div>
			<!--слайдшоу-->
			
			<!--плюсы с кружочками-->
			<div align="center"><h3>Компания «4M» предлагает выполнение следующих видов работ:</h3></div>
			<div class="wrap planning">
				<div class="row">
					<a class="span3" href="javascript:void(0);">
						<span class="service_block">
							<span class="icon_block">
								<img src="images/icon1.png" />
							</span>							
							<span class="link_title">анализ потребления, производства и распределения энергоресурсов</span>
							
						</span>
					</a>
					<a class="span3" href="javascript:void(0);">
						<span class="service_block">
							<span class="icon_block">
								<img src="images/icon4.jpg" />
							</span>							
							<span class="link_title">анализ схем энергоснабжения</span>
							
						</span>
					</a>
					<a class="span3" href="javascript:void(0);">
						<span class="service_block">
							<span class="icon_block">
								<img src="images/icon3.jpg" />
							</span>							
							<span class="link_title">определение потенциала энергосбережения</span>
							
						</span>
					</a>
					<a class="span3" href="javascript:void(0);">
						<span class="service_block">
							<span class="icon_block">
								<img src="images/icon2.png" />
							</span>							
							<span class="link_title">разработку программ повышения энергоэффективности</span>
							
						</span>
					</a>
					<div class="clear"></div>
				</div>
			</div>
			<!--плюсы с кружочками-->
			
			<!--серая полоска-->
			<div class="wrap welcome_bg">
				<div class="welcome_block">
					<span>Энергетический консалтинг позволяет найти правильный путь экономии энергоресурсов, выявить первоочередные мероприятия и разработать перспективу энергосбережения предприятия в целом</span>
				<!--	<a class="welc_btn" href="javascript:void(0);">Read More</a>-->
				</div>
			</div> 
			<!--серая полоска-->
			
			<!--блок новостей
			<div class="wrap latest_news_block">
				<h2 class="title">Новости</h2>
				<ul class="row">
					<li class="span4 post_prev">
						<a class="post_img" href="#"><img src="images/blog/post_prev1.jpg" alt="" /></a>
						<a class="post_title" href="#">Бла</a>
						<p class="post_prev_date">дата</p>
						<div class="clear"></div>
					</li>
					<li class="span4 post_prev">
						<a class="post_img" href="#"><img src="images/blog/post_prev2.jpg" alt="" /></a>
						<a class="post_title" href="#">Бла-Бла</a>
						<p class="post_prev_date">дата</p>
						<div class="clear"></div>
					</li>
					<li class="span4 post_prev">
						<a class="post_img" href="#"><img src="images/blog/post_prev3.jpg" alt="" /></a>
						<a class="post_title" href="#">Бла-бла-бла</a>
						<p class="post_prev_date">дата</p>
						<div class="clear"></div>
					</li>
					<div class="clear"></div>
				</ul>
			</div>
			блок новостей-->

		</div>		
		<!--контейнер-->
		
		<!--дно-->
		<?php
   include'footer.php';  
        ?>
		<!--дно-->
	</div>
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
    <script type="text/javascript" src="js/camera.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/superfish.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/jquery.tweet.js"></script>
    <script type="text/javascript" src="js/myscript.js"></script>
    <script type="text/javascript" src="/js/site-script.js"></script>
    
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

