<?php
session_start();

// Contoh data pengguna yang tersimpan (gantilah dengan data pengguna yang sebenarnya)
$validUser = [
    'email' => 'root@gmail.com',
    'password' => password_hash('11111', PASSWORD_DEFAULT) // Gantilah dengan hash password yang sebenarnya
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi login (gantilah dengan logika validasi yang sesuai)
    if ($email === $validUser['email'] && password_verify($password, $validUser['password'])) {
        // Login sukses
        $_SESSION['user'] = $validUser['email'];
        header('Location: dashboard.php'); // Gantilah dengan halaman tujuan setelah login
        exit;
    } else {
        // Login gagal
        $error = "Email atau password salah.";
        header('Location: login.php?error=' . urlencode($error));
        exit;
    }
} else {
    // Jika bukan POST request, kembali ke halaman login
    header('Location: login.php');
    exit;
}
