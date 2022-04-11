<?php

//update_last_activity.php

include('../inc/check_user_login.php');
include('database_connection.php');

$query = "
UPDATE login_details 
SET last_activity = now() 
WHERE user_id = '".$_SESSION["csc_id"]."'
";

$statement = $connect->prepare($query);

$statement->execute();

?>

