<div class="header">
		
<div id="block-header">

<div id="block-header1" >
<h3>"4M-consulting". Панель Управления</h3>
<p id="link-nav" ><?php echo $_SESSION['urlpage']; ?></p> 
</div>

<div id="block-header2" >
<p align="right"><a href="admins.php" >Администраторы</a> | <a href="?logout">Выход</a></p>
<p align="right"><?php echo $_SESSION['admin_name']; ?></p>
</div>

</div>
    
    <div class="navbar navbar_ clearfix">
					<div class="container menu_bg">
						<nav id="main_menu">
							<div class="menu_wrap">
								<ul class="nav sf-menu">
									<li class="current first"><a href="clients.php">Пользователи</a></li>
									<li class="last"><a href="news_adm.php">Новости</a></li>
									<li class="sub-menu first"><a href="serv_adm.php">Услуги</a></li> 
									<li class="sub-menu last"><a href="empl.php">Сотрудники</a></li>
									<li class="sub-menu first"><a href="comments.php">Комментарии</a></li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
		</div>