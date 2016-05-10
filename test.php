<?php
session_start();
if (!isset($_SESSION[login])) {
header("Location: login.php");
exit;
}
?>
<html>
<head>
<title>EMPLOYEE</title>
</head>
<meta charset="tis-620" />

<style>
body{
font-family:"Tahoma";
background-image: url("images/h36.PNG");
#background: #ffcc66;
}
table{background:#ffcc66;box-shadow: 5px 5px 5px #888888;
border-radius:10px;
color:#FFF;
padding:10px;
font-family:"Tahoma";
font-size: 13px;
}
</style>

<body>
<?php
include('connect.php');
$strSQL = "SELECT * FROM EMPLOYEE_M";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse);
?>
<a href=index.php><center><img src="images/h6.PNG"></center></a>
<center>
<a href=index_EMPLOYEE_M.php>รายชื่อพนักงาน</a>
&nbsp;&nbsp;<a href=index_CUSTOMER_M.php>รายชื่อลูกค้า</a>
&nbsp;&nbsp;<a href=index_PRODUCT_M.php>รายการสินค้า</a>
&nbsp;&nbsp;<a href=index_DEALING_M.php>การซื้อขายสินค้า</a>
&nbsp;&nbsp;<a href=index_TRANTSPORT_M.php>การขนส่ง</a>
&nbsp;&nbsp;<a href=index_DETAILS_M.php>รายละเอียดการซื้อขายสินค้า</a>
</center>

<br>
<center><h2>EMPLOYEE MAYBELLINE</h2></center>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_emp </div></th>
<th width="150"> <div align="center">firstname_emp </div></th>
<th width="150"> <div align="center">lastname_emp </div></th>
<th width="150"> <div align="center">position_emp </div></th>
<th width="150"> <div align="center">phone_emp </div></th>
<th width="150"> <div align="center">address_emp </div></th>
<th width="150"> <div align="center">action_cus </div></th>
</tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><div align="center"><?php echo $objResult[0];?></div></td>

<td align="center">

</td>
</tr>
<?php
}
?>
</table>
<?php
oci_close($objConnect);
?>
</body>
</html>
