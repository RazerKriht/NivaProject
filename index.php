<?php 
$title = "Главная";
require_once "bocks/head.php"?>
<body>
    <?php require_once "bocks/header.php"?>

    <div id="wraper">
        <div id="leftCol">
            <?php
            $numFlats = R::count('flats');
            if($numFlats>0){
                $flat = R::load('flats', 1);
                echo '<div class="bigArticle">';
                echo '<h2>'.$flat->title.'</h2>';
                $owner = R::load('users', $flat->userid);
                echo '<p><b>Владелец:</b> +'.$owner->login.'</p>';
                echo '<p><b>Адрес:</b>'.$flat->aderss.'</p>';
                echo '<p><b>Цена:</b>'.$flat->price.'</p>';
                echo '<p><b>Описание:</b><br/>'.$flat->description.'</p>';
                echo '</div> ';
                echo '<div class="clear"><br></div>';
                if($numFlats>1){
                    for ($i=2; $i <= $numFlats; $i++) { 
                        $flat = R::load('flats', 1);
                        echo '<div class="article">';
                        echo '<h2>'.$flat->title.'</h2>';
                        $owner = R::load('users', $flat->userid);
                        echo '<p><b>Владелец:</b> +'.$owner->login.'</p>';
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
