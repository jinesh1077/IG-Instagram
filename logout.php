<?php

session_start();

session_destroy();

echo '<script>alert("You are logout now!!!"); location="login.php";</script>';

?>