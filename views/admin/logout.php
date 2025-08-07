<?php
session_start();
unset($_SESSION['username']); 
session_destroy();

header('Location: ' . BASE_URL_ADMIN . '&action=login');
exit;
?>