<?php
session_start();
if ($_POST[op] != "ds") {
$display_block = "
<center><form method=POST action=\"$_SERVER[PHP_SELF]\">
<table>
<tr>
<td align=\"center\" colspan=\"2\">
<h3> โปรด Login เพื่อเข้าสู่ระบบ</h3><br></td>
</tr>
<tr>
<td align=\"right\">Username :</td>
<td><input name=\"username\" type=\"text\" size=\"20\" autofocus></td>
</tr>
<tr>
<td align=\"right\">Password :</td>
<td><input name=\"password\" type=\"password\" size=\"20\"></td>
</tr>
<tr>
<td align=\"center\" colspan=\"2\"><br>
<input type=\"hidden\" name=\"op\" value=\"ds\">
<input type=submit name=\"submit\" value=\"เข้าสู่ระบบ\">
<input type=\"reset\" value=\"ล้างข้อมูล\" name=\"reset\">
</td>
</tr>
</table>
</form></center>";
} else {
include 'config.php';
if ($_POST['username'] == "$adminuser" AND $_POST['password'] == "$adminpass") {
$_SESSION[login] = "true";
$_SESSION[username] = "$adminuser";
header("Location: $redirectpage");
exit;
} else {
$display_block = "<center><font face=\"Tahoma\" size=\"5\"
หรือ ผิดพลาด โปรดกลับไปกรอกใหม่อีกครั้ง color=\"#FF0000\">Username Password <a href=\"$_SERVER
[PHP_SELF]\"> คลิกทีนี	</a></font></center>";
}
}
?>
<html>
<head>
<title>LOGIN</title>
<meta http-equiv="Content-Type" content="text/html; charset= "UTF-8">
<style>
body{
background-image: url("images/h42.jpg");
font-family:"Tahoma";
}
table{background:#ff9999;
border-radius:20px;
color:#ffffff;padding:20px;}
</style>
</head>
<body>
<br><br><br><br><br><br>
<?php echo "$display_block"; ?>
</body>
</html>
