<?php 
$title = "Добваить квартиру";
require_once "bocks/head.php";
require_once "bocks/header.php";


$data = $_POST;
if(isset($data['do_expose'])){
    $errors = array();
    if(trim($data['title'])==''){
        $errors[] = 'Введите название кваритры';
    }
    if(trim($data['aderss'])==''){
        $errors[] = 'Введите адрес квартиры';
    }
    if(trim($data['price'])==''){
        $errors[] = 'Введите цену квартиры';
    }
    if(trim($data['description'])==''){
        $errors[] = 'Введите описание квартиры';
    }
    /* if(trim($data['photo'])==''){
        $errors[] = 'Загрузите фотографию';
    } */
    if(empty($errors)){
        //Можно регестрировать
        $flats = R::dispense('flats');
        $flats->userid = $_SESSION['logged_user']->id;
        $flats->title = $data['title'];
        $flats->aderss = $data['aderss'];
        $flats->price = $data['price'];
        $flats->description = $data['description'];
        /* $flats->photo = $data['photo']; */
        R::store($flats);
        header('Location: myFlats.php');
        exit;
         
    } else {
        echo '<div style="color:red;">'.array_shift($errors).'</div>';
    }
}

?>
<form action="" method="post">
    <p><p>Название</p>
    <input type="text" name="title"></p>
    <p><p>Адрес</p>
    <input type="text" name="aderss"></p>
    <p><p>Цена</p>
    <input type="text" name="price"></p>
    <p><p>Описание</p>
    <textarea name="description" id="" cols="30" rows="10"></textarea></p>
    <!-- <p><p>Фотография</p>
    <input type="file" name="photo" id=""></p> -->
    <p><input type="submit" value="Выставить" name="do_expose"></p>
</form>
<?php require_once "bocks/footer.php"?>