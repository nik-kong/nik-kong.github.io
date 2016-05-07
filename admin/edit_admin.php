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

  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a> \ <a href='edit_admin.php' >Изменить администратора</a>";
  
  include'db_connect.php';
    include'functions.php'; 
  mysql_query ("set_client='utf8'");
   mysql_query ("set character_set_results='utf8'");
   mysql_query ("set collation_connection='utf8_general_ci'");
   mysql_query ("SET NAMES utf8");
   header("Content-Type: text/html; charset=utf-8");

   $id = clear_string($_GET["id"]);    
    }else
{
    header("Location: login.php");
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



    </head>

    <body>
        <div class="container box_shadow">

            <?php
   include'header.php';  
    session_start(); 
        ?>
                <section>

                    <div class="row">
                        <div class="span4"></div>
                        <div class="span4">
                            <br>
                            <h2 class="title" align="left">Заполните форму</h2>
                            <div class="contact_form">
                                <div id="note"></div>
                                <div id="fields">
                                    <?php
$result = mysql_query("SELECT * FROM admin WHERE id='$id'",$link);
 
 If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
do
{
if ($row["view_admin"] == "1") $view_admin = "checked";
    echo '
                                    <form id="ajax-contact-form" method="post" align="center" action="handler_edit_admin.php?id='.$row["id"].'">
                                      <p id="reg_message"></p>
                                       <div id="block-form-registration">
                                        <input class="span4" type="text" name="login" value="'.$row["login"].'" placeholder="Логин" />
                                        <input class="span4" type="text" name="password" value="" placeholder="Пароль" />
                                        <input class="span4" type="text" name="name" value="'.$row["name"].'" placeholder="Имя" />
                                        <input class="span4" type="text" name="email" value="'.$row["email"].'" placeholder="Email" />
                                        <div class="clear"></div>
                                        <input type="checkbox" name="view_admin" id="view_admin" value="1" '.$view_admin.' />
                                                    <label id="view_admin_label" for="view_admin">Просмотр администраторов.</label>
                                        <div class="clear"></div><br>
                                        <div align="right">
                                        <input type="reset" class="contact_btn1" value="Очистить форму" />
                                        <input type="submit" class="contact_btn1" name="submit_edit" id="form_submit" value="Изменить" />
                                        </div>
                                        <div class="clear"></div>
                                        </div>
                                    </form> ';

}
  while($row = mysql_fetch_array($result));
}  
  
?>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

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
        <script type="text/javascript" src="/js/site-script.js"></script>

        <!--  <script type="text/javascript" src="js/myscripts1.js"></script>-->
        <script type="text/javascript" src="js/jquery.form.js"></script>
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script>
            $("#ajax-contact-form").validate({
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        success: function (data) {

                            if (data == 'edit') {
                                $("#block-form-registration").fadeOut(300, function () {
                                    $("#reg_message").addClass("reg_message_good").fadeIn(400).html("Все норм!");
                                    $("#form_submit").hide();
                                });
                            } else {
                                $("#reg_message").addClass("reg_message_error").fadeIn(400).html(data);
                            }
                        }
                    });
                }
            });
        </script>
    </body>

    </html>