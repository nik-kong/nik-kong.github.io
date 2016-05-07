<?php
session_start(); 
   include'db_connect.php'; 
    include'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>О нас</title>
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
					<a href="index.html">Главная</a><span>/</span>О нас
				</div>
			</div>
			<div class="container">
                <section>
                    <div class="row">
                        <div class="span4">
                            <h4 class="title">Энергетический консалтинг и аудит</h4>
                             <p>Компания 4M-consulting предлагает Вам профессиональное решение любой стоящей перед Вами задачи из области энергетической политики в рамках отдельно взятого предприятия или предметной отрасли в целом, особенно советуем обратить внимание на услуги бизнес-планирования и решения для повышения эффективности бизнеса, применение которых позволит избежать ошибок и выбрать правильное инвестиционное решение на стадии планирования бизнеса, и ускорит воплощение любой бизнес-идеи в жизнь, а затем повысит эффективность Вашего бизнеса на любой стадии его жизненного цикла.</p>                   
                        </div>
                        <div class="span4">
                            <h4 class="title">Что такое энергоконсалтинг?</h4>
                            <p>Энергетический консалтинг - это комплекс услуг по консультированию  потребителей энергетических ресурсов в области энергосбережения и энергетической эффективности, направленных на снижение  капитальных и эксплуатационных затрат.</p>
                             <p>Основная задача энергоконсалтинга заключается в комплексном анализе, оценке и разработке технических и организационно-экономических решений в области энергетической политики в рамках отдельно взятого предприятия или предметной отрасли в целом.</p>
                        </div>
                        <div class="span4">
                            <h4 class="title">Результат</h4>
                        	<p>Результатом  энергоконсалтинга  является сформированный  набор мероприятий, направленных на решение проблем оптимизации энергопотребления и создания систем управления  энергетическими ресурсами.</p>
                        </div>                        
                    </div>
                </section>
                <section>
                	<h2 class="title">Наши сотрудники</h2>
                    <p>На текущий момент компания состоит из слаженного коллектива опытных специалистов, укомплектованных современным оборудованием и  обладающих пакетом собственных методических наработок и патентов.</p>
                	<div class="row">
                         
                            <?php
                        $result=mysql_query('SELECT * FROM `employees`'); // запрос на выборку
                        while($row=mysql_fetch_array($result)){
                            $img_path = 'up-img/'.$row["photo"];     
                            echo'<div class="span3">';
                            echo'<div class="profile">';
                            echo'<img src=\'up-img/',$row["photo"],'\'>';
                            echo'<h4>'.$row["surname"].'</h4>';
                            echo'<h5>'.$row["name"].' '.$row["patronymic"].'</h5>';
                            echo'<div class="profile_title">'.$row["post"].'</div>';
                            echo'<p>'.$row[""].'</p>';
                            echo'</div>';
                            echo'</div>';
                                }
                            ?>                                        
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
