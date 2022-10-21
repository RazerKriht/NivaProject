<?php 
$title = "Мои квартиры";
require_once "bocks/head.php";
require_once "bocks/header.php";
?>

<div id="wraper">
    <div id="leftCol">

        <?php 
        $numFlats = R::count('flats');

        if($numFlats>0){
            for ($i=1; $i <= $numFlats; $i++) { 
                $flat = R::load('flats', $i);
                if($flat->userid==$_SESSION['logged_user']->id){
                    echo '<div class="article">';
                    echo '<h2>'.$flat->title.'</h2>';
                    echo '<p><b>Адрес:</b>'.$flat->aderss.'</p>';
                    echo '<p><b>Цена:</b>'.$flat->price.'</p>';
                    echo '<p><b>Описание:</b><br/>'.$flat->description.'</p>';
                    echo '</div> ';

                }
            }
        }
        
        ?>
    </div>
</div>
<?php require_once "bocks/footer.php"?>