<?php
    require_once("database.php");
    require_once("tg.php");
    $token = '5273575396:AAEYQwgAlpG38iFVTWMJIhElaO_fZXxiRxI';
    if ($_GET["action"]){
        //Bot connection processing
        if (!empty($_POST)){
            //Bot connection method POST processing
        }else{
            //Bot connection method GET procesing
        }
    }else{
        if (!empty($_POST)){
            if (file_get_contents('php://input')){
                //Processing Telegram Bot
            }else{
                echo '<h1>403 | Unauthorised access prohibited!</h1>';
            }
        }else{
            echo '<h1>403 | Unauthorised access prohibited!</h1>';
        }
    }
//API methods: init_bot, update_list(id),get_task(id),send_task(id)
?>