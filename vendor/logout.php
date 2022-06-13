<?php
session_start();
unset($_SESSION['user']);
header('Location:/www/index.php');