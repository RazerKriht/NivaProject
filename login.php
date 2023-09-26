<?php 
$title = "Авторизация";
require_once "bocks/head.php";
require_once "bocks/header.php";

    $data = $_POST;
    if(  isset($data['do_login'])){
        $errors = array();
        $user = R::findOne('users', 'login = ?', array($data['login']));
        if($user ){
            //Телефон существует
            if(password_verify($data['pass'], $user->password)){
                //Пароль верный
                $_SESSION['logged_user'] = $user;
                header('Location: /niva');
                exit;
                
            } else{
                $errors[] = 'Пароль неверный';
            }
        } else{
            $errors[] = 'Пользователь с таким телефоном не найден';
        }
    }
    if(!empty($errors)){
        echo '<div style="color:red;">'.array_shift($errors).'</div>';
    }
?>

<form action="" method="post">
    <p><p>Телефон</p>
    <input type="text" name="login" value="<?php echo @$data['login'];?>"></p>
    <p><p>Пароль</p>
    <input type="password" name="pass"></p>
    <p><input type="submit" value="Войти" name="do_login"></p>
</form>

<?php require_once "bocks/footer.php"?>