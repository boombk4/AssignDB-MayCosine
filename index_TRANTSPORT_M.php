<?php
session_start();
if (!isset($_SESSION[login])) {
header("Location: login.php");
exit;
}
?>
<html>
<head>
<title>TRANTSPORT</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<meta charset= "UTF-8" />
<body>
<?php
include('connect.php');
$strSQL = "SELECT * FROM TRANTSPORT_M order by id_tran asc";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
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
<center><h2>TRANTSPORT MAYBELLINE</h2></center>
<div class="right"><a href=add_tran.php>Add</a>&nbsp;</div>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_tran </div></th>
<th width="150"> <div align="center">id_deal </div></th>
<th width="150"> <div align="center">date_tran </div></th>
<th width="150"> <div align="center">post_tran </div></th>
<th width="150"> <div align="center">action_cus </div></th>
</tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><div align="center"><?php echo $objResult["ID_TRAN"];?></div></td>
<td><?php echo $objResult["ID_DEAL"];?></td>
<td><?php echo $objResult["DATE_TRAN"];?></td>
<td><?php echo $objResult["POST_TRAN"];?></td>
<td align="center">
<a href="edit_tran.php?CusID=<?php echo $objResult["ID_TRAN"];?>">Edit</a>&nbsp;
<a href="delete_tran.php?CusID=<?php echo $objResult["ID_TRAN"];?>">Delete</a>
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
