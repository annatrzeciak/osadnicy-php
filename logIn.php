<?php
    session_start();
    if(!isset($_POST['login'])||!isset($_POST('password'))){
        header('Location: inex.php');
        exit();
    }
    require_once 'connect.php';

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    if($connection->connect_errno!=0){
        echo 'Error: '.$connection->connect_errno;
    }
    else{
        $login=$_POST['login'];
        $password=$_POST['password'];
        
        $login = htmlentities($login, ENT_QUOTES, 'UTF-8');
        $password = htmlentities($password, ENT_QUOTES, 'UTF-8');
        
        $sql="SELECT * FROM uzytkownicy WHERE user='$login' AND pass='$password'";
        
        if($solution=@$connection->query(sprintf("SELECT * FROM uzytkownicy WHERE user='%s' AND pass='%s'",
        mysqli_real_escape_string($connection,$login),
        mysqli_real_escape_string($connection,$password)))){
            $number_users=$solution->num_rows;
            if($number_users>0){

                $row=$solution->fetch_assoc();
                $_SESSION['log']=true;
                $_SESSION['id']=$row['id'];
                $_SESSION['user']=$row['user'];
                $_SESSION['drewno']=$row['drewno'];
                $_SESSION['kamien']=$row['kamien'];
                $_SESSION['zboze']=$row['zboze'];
                $_SESSION['email']=$row['email'];
                $_SESSION['dnipremium']=$row['dnipremium'];
                
                unset($_SESSION['blad']);
                $solution->free_result();
                header('Location: play.php');
            }else{
                $_SESSION['blad']='<span style="color:red">Neproawidłowy login lub hasło</span>';
                header('Location: index.php');
            }
        }
        echo 'It works';
        $connection->close();
    }
 

    

?>
