<?php 

unset($_COOKIE);
session_destroy($_SESSION);

header("Location:  ../../index.html");


?>