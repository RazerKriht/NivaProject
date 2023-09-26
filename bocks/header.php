<?php
require "db.php"
?>
<header>
<div id="logo"><a href="/niva"><span>N</span>iva</a></div>
    <div id="menu" class="default">
	        <ul>
            <?php if(isset($_SESSION['logged_user'])) :?>
	            <li><a href="add_flat.php">Добавить квартиру</a></li>
	            <li><a href="myFlats.php">Мои Квартиры</a></li>
            <?php endif;?>
            <?php if(isset($_SESSION['logged_user'])) :?>
	            <li><a href="logout.php">Выйти</a></li>
            <?php else :?>
	            <li><a href="signup.php">Регестрация</a></li>
	            <li><a href="login.php">Войти</a></li>
            <?php endif;?>
            <?php if(isset($_SESSION['logged_user'])) :?>
                
	    </div>
        <div id="headerPhone">+<?php echo $_SESSION['logged_user']->login; ?></div>
            <?php endif;?>
	        </ul>
    </header>
    