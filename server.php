<?php
session_start();
if(isset($_POST['sbmt']))
{
    ob_end_clean(); 
    loginvalidate($_POST['CSR'],$_COOKIE['session_id_ass2'],$_POST['user_name'],$_POST['user_pswd']);
}

function loginvalidate($user_CSRF,$user_sessionID, $username, $password)
{
    if($username=="admin" && $password=="123" && $user_CSRF==$_COOKIE['csrf_token'] && $user_sessionID==session_id())
    {
        echo "<script> alert('Login Sucess') </script>";
        echo "Welcome Admin"."<br/>"; 
        echo "Visit ".'<a href="https://imashamedhani.blogspot.com/", target="_blank" >'. "https://www.imashamedhani.com" ."</a>"." For Tutorial";
        apc_delete('CSRF_token');
    }
    else
    {
        echo "<script> alert('Login Failed') </script>";
        echo "Login Failed ! "."<br/>"."Authorization Failed!! Please reset!";
        
    }
}
?>
