<?php 
    @$email = isset($_POST['email']) ? $_POST['email'] : NULL;
    @$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : NULL;
    @$username = isset($_POST['username']) ? $_POST['username'] : NULL;
    @$pass_crypt = hash('sha512',$_POST['pwd']);
?>