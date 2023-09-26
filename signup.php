<?php 
$title = "Регестрация";
require_once "bocks/head.php";
require_once "bocks/header.php";

$data = $_POST;
if(isset($data['do_signup'])){
    //Здесь регестрируем
    $errors = array();
    if(trim($data['login'])==''){
        $errors[] = 'Введите телефон';
    }

    if($data['pass']==''){
        $errors[] = 'Введите пароль';
    }
    if($data['pass_2']!=$data['pass']){
        $errors[] = 'Повторный пароль введен неверно';
    }

    if(R::count('users', "login = ?", array($data['login'])) > 0){
        $errors[] = 'Телефон уже зарегестрирован';
    }

    if(empty($errors)){
        //Можно регестрировать
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->password = password_hash($data['pass'], PASSWORD_DEFAULT);
        R::store($user);
        header('Location: login.php');
        exit;
         
    } else {
        echo '<div style="color:red;">'.array_shift($errors).'</div>';
    }
}
?>

<form action="" method="post">
    <p><p>Телефон</p>
    <input type="text" name="login" value="<?php echo @$data['login'];?>"></p>
    <p><p>Пароль</p>
    <input type="password" name="pass"></p>
    <p><p>Повторите пароль</p>
    <input type="password" name="pass_2"></p>
    <p><input type="submit" value="Зарегистрироваться" name="do_signup"></p>
</form>

<?php require_once "bocks/footer.php"?>