<?php

//fetch_user_chat_history.php

include('../inc/check_user_login.php');
include('database_connection.php');

echo fetch_user_chat_history($_SESSION['csc_id'], $_POST['to_user_id'], $connect);

?>