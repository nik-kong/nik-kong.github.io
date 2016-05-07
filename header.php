
    <div class="header">

    <!--верх и вход-->
    <?php
        
        If ($_POST["button-auth"])
 {
     $login = clear_string($_POST["login"]);
    $pass  = clear_string($_POST["password"]);
    
  
 if ($login && $pass)
  {
   $pass   = md5(clear_string($_POST["password"]));
    $pass   = strrev($pass);
    $pass   = strtolower("nik2rv8q".$pass."2kong");
    

    
    if ($_POST["rememberme"] == "yes")
    {

            setcookie('rememberme',$login.'+'.$pass,time()+3600*24*31, "/");

    }    
     $result = mysql_query("SELECT * FROM users WHERE (login = '$login' OR email = '$login') AND password = '$pass'",$link);
   
 If (mysql_num_rows($result) > 0)
  {
    $row = mysql_fetch_array($result);
    session_start();
    $_SESSION['auth'] = 'yes_auth'; 
    $_SESSION['auth_id'] = $row["id"];
    $_SESSION['auth_pass'] = $row["password"];
    $_SESSION['auth_login'] = $row["login"];
    $_SESSION['auth_surname'] = $row["surname"];
    $_SESSION['auth_name'] = $row["name"];
    $_SESSION['auth_phone'] = $row["phone"];
    $_SESSION['auth_email'] = $row["email"];
  }else
  {
        $msgerror = "Неверный Логин и(или) Пароль."; 
  }

        
    }else
    {
        $msgerror = "Заполните все поля!";
    }
 
 }

            if ($_SESSION['auth'] == 'yes_auth')
                {
                echo '<div class="top_line"><p id="auth-user-info"><a id="link1" class="top-auth_vhod" href="#">Здравствуйте, '.$_SESSION['auth_name'].'!</a><a id="logout" class="top-auth_vhod" href="logout.php"> | Выйти </a></p></div>';}
            else{
                $_SESSION['auth_id'] = 0;
                echo '<div class="top_line"><p><a id="button-auth" class="top-auth_vhod" href="#">Вход | </a><a href="reg.php">  Регистрация</a></p></div>';   
                }
	       ?>

        <div id="top_auth">
            <?php
	
    if ($msgerror)
    {
        echo '<p id="msgerror" >'.$msgerror.'</p>';
        
    }
    
?>
                <form method="post" id="ajax-contact-form" >
                    <p>
                        <input type="text" name="login" id="auth_login" value="login" onFocus="if (this.value == 'login') this.value = '';" onBlur="if (this.value == '') this.value = 'login';" />
                    </p>
                    <p>
                        <input type="password" name="password" id="auth_password" value="password" onFocus="if (this.value == 'password') this.value = '';" onBlur="if (this.value == '') this.value = 'password';" />
                    </p>
                    <p>
                        <input type="checkbox" name="checkbox" id="auth_checkbox" />
                        <label id="checkbox" for="checkbox">Запомнить меня</label>
                    </p>
                    
                    <!-- <p id="ss"> <a href="#">Забыли пароль?</a></p>-->

                    <input type="submit" class="contact_btn" id="button-auth" name="button-auth" value="Войти" />
                    <div class="clear"></div>
                </form>

        </div>
        <!--верх и вход-->

        <div class="wrap">
            <div class="container">
                <div class="fleft logo">
                    <a href="index.html"><img src="images/my_logo.png" alt="" /></a>
                </div>
                <div class="fright">
                    <div class="phone_block">Phone: <span>048 000 000</span></div>
                    <div class="email_block">Email: <a href="#">7004258@mail.ru</a></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="navbar navbar_ clearfix">
                <div class="container menu_bg">
                    <nav id="main_menu">
                        <div class="menu_wrap">
                            <ul class="nav sf-menu">
                                <li class="current first"><a href="index1.php">Главная</a></li>
                                <li class="last"><a href="about.php">О нас</a></li>
                                <li class="sub-menu first"><a href="chat.php">Обратиться</a></li>
                                <li class="sub-menu last"><a href="serv.php">Услуги</a></li>
                                <li class="sub-menu first"><a href="news.php">Новости</a></li>
                                <li class="last"><a href="contact_inf.php">Контакты</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
</div>
