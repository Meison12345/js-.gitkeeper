<?php
if(isset($_POST)){
    mail($_POST['email'], "Сообщение отправлено", $_POST['message']);
}
