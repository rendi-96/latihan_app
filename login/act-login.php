<?php
session_start();
include "config.php";

$username = $_POST['username'];
$password = $_POST['password'];

$op = $_GET['op'];

if($op=="in"){
    $sql = mysqli_query($con, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($sql)==1){//jika berhasil akan bernilai 1
        $qry = mysqli_fetch_array($sql);
        $_SESSION['username'] = $qry['username'];
		$_SESSION['nama'] = $qry['nama'];
        $_SESSION['level'] = $qry['level'];
        if($qry['level']=="admin"){
            header("location:../template/index.php");
        }
		else if($qry['level']=="user"){
            header("location:../template/index.php");
        }
    }else{
		?>
		<script language="JavaScript">
			alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
			document.location='../index.php';
		</script>
		<?php
    }
}else if($op=="out"){
    unset($_SESSION['username']);
    unset($_SESSION['level']);
    header("location:../index.php");
}
?>
