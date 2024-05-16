<?php 
session_start();

$validUser = [
    'email' => 'root@gmail.com',
    'password' => password_hash('11111', PASSWORD_DEFAULT)
];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];


    if ($email === $validUser['email'] && password_verify($password, $validUser['password'])) {
        //Login Sukses
        $_SESSION['user'] = $validUser['email'];
        header('Location:dashboard.php');
        exit;
    }else{
        // login gagal
        $error = "Email atau password salah.";
        header('Location: login.php?error='.urlencode($error));
        exit;
    }
}else{
    //Jika bukan POST Request,kembali ke halaman login
    header('Location: login.php');
    exit;
}
