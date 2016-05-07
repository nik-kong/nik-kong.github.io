<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth")
{
	define('myesite', true);
       
       if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }

  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a> \ <a href='empl.php.php' >Сотрудники</a>";
  
include'db_connect.php';
include'functions.php';             
$id = clear_string($_GET["id"]);
$action = $_GET["action"];
if (isset($action))
{
   switch ($action) {
        
        case 'delete':
     
      {
         $delete = mysql_query("DELETE FROM employees WHERE id = '$id'",$link);                  
      }

    break;
        
	}    
}
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Панель управления</title>
        <meta name="author" content="">

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300,500' rel='stylesheet' type='text/css'>

        <link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" id="camera-css" href="css/slide.css" type="text/css" media="all">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/skins/tango/skin.css" />
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
        <link href="jquery_confirm/jquery_confirm.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="jquery_confirm/jquery_confirm.js"></script>


    </head>

    <body>
        <div class="container box_shadow">

            <?php
   include'header.php';  
    session_start(); 
    $all_client = mysql_query("SELECT * FROM employees",$link);
    $result_count = mysql_num_rows($all_client);
        ?>
                <div id="" class="row">

                    <p align="right" id="add-style"><a href="add_empl.php">Добавить сотрудника</a></p>


                    <?php
if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';

if ($_SESSION['view_admin'] == '1')
{


	$result = mysql_query("SELECT * FROM employees ORDER BY id DESC",$link);
 
 If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
do
{  
    if  (strlen($row["photo"]) > 0 && file_exists("../up-img/".$row["photo"]))
{
$img_path = '../up-img/'.$row["photo"];
$max_width = 100; 
$max_height = 105; 
 list($width, $height) = getimagesize($img_path); 
$ratioh = $max_height/$height; 
$ratiow = $max_width/$width; 
$ratio = min($ratioh, $ratiow); 
// New dimensions 
$width = intval($ratio*$width); 
$height = intval($ratio*$height);    
}else
{
$img_path = "./images/no-image-90.png";
$width = 100;
$height = 105;
}
    
echo '
<ul id="list-admin" >

<li>
<img id="emp_adm_img" src="'.$img_path.'" width="'.$width.'" height="'.$height.'" />
<div id="emp_adm">
<h3><strong>ФИО</strong> - '.$row["surname"].' '.$row["name"].' '.$row["patronymic"].'</h3>
<p><strong>Должность</strong> - '.$row["post"].'</p>
<p><strong>Телефон</strong> - '.$row["phone"].'</p>
<p><strong>E-mail</strong> - '.$row["email"].'</p>
</div>
<p class="links-actions" align="right" ><a class="green" href="edit_empl.php?id='.$row["id"].'" >Изменить</a> | <a class="delete" rel="empl.php?id='.$row["id"].'&action=delete" >Удалить</a></p>
</li>
</ul>  

    ';
    
    
} while ($row = mysql_fetch_array($result));
}
    
}else{
   echo '<p id="form-error" align="center">У вас нет прав на просмотр администраторов!</p>'; 
}
?>
                </div>
        </div>
        <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
        <script type="text/javascript" src="js/camera.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/superfish.js"></script>
        <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="js/jquery.tweet.js"></script>
        <script type="text/javascript" src="js/myscript.js"></script>
        <script type="text/javascript" src="/js/site-script.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script>
            $.confirm = function (params) {

                if ($('#confirmOverlay').length) {
                    // Диалог подтверждения уже выведен на странице:
                    return false;
                }

                var buttonHTML = '';
                $.each(params.buttons, function (name, obj) {

                    // Генерируем разметку кнопок:

                    buttonHTML += '<a href="#" class="button ' + obj['class'] + '">' + name + '<span></span></a>';

                    if (!obj.action) {
                        obj.action = function () {};
                    }
                });

                var markup = [
			'<div id="confirmOverlay">',
			'<div id="confirmBox">',
			'<h1>', params.title, '</h1>',
			'<p>', params.message, '</p>',
			'<div id="confirmButtons">',
			buttonHTML,
			'</div></div></div>'
		].join('');

                $(markup).hide().appendTo('body').fadeIn();

                var buttons = $('#confirmBox .button'),
                    i = 0;

                $.each(params.buttons, function (name, obj) {
                    buttons.eq(i++).click(function () {

                        // Когда на кнопку нажимают, вызываем функцию действия
                        // и закрываем диалог подтверждения.

                        obj.action();
                        $.confirm.hide();
                        return false;
                    });
                });
            }

            $.confirm.hide = function () {
                $('#confirmOverlay').fadeOut(function () {
                    $(this).remove();
                });
            }
        </script>

    </body>

    </html>