<!-- <br>
<h3>LOGIN ADMINISTRATOR</h3>
<br>
<form action="" method="post">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" id=""></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" id=""></td>
        </tr>
        <tr>
            <td><input type="submit" value="LOGIN" name="login"></td>
        </tr>
    </table>
</form>
<-- 
// session_start();
// if (isset($_POST['login'])) {
//     include "../koneksi.php";
//     $username = mysqli_real_escape_string($koneksi, $_POST['username']);
//     $password = mysqli_real_escape_string($koneksi, sha1($_POST['password']));
//     $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
//     $query = mysqli_query($koneksi, $sql);
//     if (mysqli_num_rows($query) > 0) {
//         $data = mysqli_fetch_array($query);
//         $_SESSION['username'] = $data['username'];
//         $_SESSION['name'] = $data['name'];
//         header("location:index.php?page=produk");
//     } else {
//         echo "login anda gagal";
//     }
// }
?> -->
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "../koneksi.php";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, sha1($_POST['password']));

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $query = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
        $_SESSION['username'] = $data['username'];
        $_SESSION['name'] = $data['name'];
        header("Location: index.php?page=produk");
        exit();
    } else {
        echo "Login anda gagal!";
    }
}
?>
<!-- HTML form di bawah -->
<h3>LOGIN ADMINISTRATOR</h3>
<form action="" method="post">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" id=""></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" id=""></td>
        </tr>
        <tr>
            <td><input type="submit" value="LOGIN" name="login"></td>
        </tr>
    </table>
</form>
