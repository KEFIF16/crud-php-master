<?php 
  session_start();
if (isset($_SESSION['login']))
{
    echo 'Bonjour ' . $_SESSION['login'];
}else{
    header('location:login.php');
}
?>
<?php
session_start();
session_destroy();
header('location:login.php');
exit;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>