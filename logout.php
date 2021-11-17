<?php

require 'lib/session.php';

Session::init();

unset($_SESSION['user']);
unset($_SESSION['error']);
session_destroy();

header('Location: homepage.php');
exit;