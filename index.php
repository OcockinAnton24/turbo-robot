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
                if ($data['callback_query']){
                    //Processing Callback
                    $callbdata = $data['callback_query'];
                    $chatid = $callbdata["from"]["id"];
                }else{
                    if($msg == '/start'){
                        sendMessage($chatid, "Здравствуйте, вас приветствует бот бесплатных книг flibusta\nЧтобы найти книги, просто напишите название книги или автора",$token);
                    }else{
                        sendMessage($chatid, $msg, $token);
                    }
                }
            }else{
                echo '<h1>403 | Unauthorised access prohibited!</h1>';
            }
        }else{
            echo '<h1>403 | Unauthorised access prohibited!</h1>';
        }
    }
//API methods: init_bot, update_list(id),get_task(id),send_task(id)
?>