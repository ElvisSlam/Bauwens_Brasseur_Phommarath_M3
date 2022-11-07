<?php
<<<<<<< HEAD
session_start();
unset($_SESSION['username']);
$_SESSION = array();
=======
unset($_SESSION['username']);
>>>>>>> f3ef06771091a1df884b25e7e5c5b86f2a87fdfd
session_destroy();
header('Location: formConnexion.php');
?>