<?php
session_start();

// destroy the session
session_destroy();
header('Location: /PHPPROGRAM/IPT2/FINAL/php-crash-main/13_sessions.php');
