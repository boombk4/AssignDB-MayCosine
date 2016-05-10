<?php
$timeout = 3600; // 3600 seconds = 60 minutes = 1 hour
ini_set(‘session.gc_maxlifetime’, $timeout);
session_start();
if (!isset($_SESSION[login])) {
     header("Location: login.php");
     exit;
}
?>
<html>
<head>
<title>PRODUCT</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<meta charset= "UTF-8" />

<body>
<?php
include('connect.php');
$strSQL = "SELECT * FROM product_m order by id_pro asc";
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
<center><h2>PRODUCT MAYBELLINE</h2></center>
<div class="right"><a href=add_pro.php>Add</a>&nbsp;</div>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_pro </div></th>
<th width="150"> <div align="center">name_pro </div></th>
<th width="150"> <div align="center">price_pro </div></th>
<th width="150"> <div align="center">type_pro </div></th>
<th width="150"> <div align="center">pic_pro </div></th>
<th width="150"> <div align="center">Action </div></th>
</tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><div align="center"><?php echo $objResult["ID_PRO"];?></div></td>
<td><div align="center"><?php echo $objResult["NAME_PRO"];?></div></td>
<td><div align="center"><?php echo $objResult["PRICE_PRO"];?></div></td>
<td><div align="center"><?php echo $objResult["TYPE_PRO"];?></div></td>
<td><div align="center"><img src="images/<?php echo $objResult["PIC_PRO"];?>" width="150" height="100"></div></td>
<td align="center">

<a href="edit_pro.php?CusID=<?php echo $objResult["ID_PRO"];?>">Edit</a>&nbsp;
<a href="delete_pro.php?CusID=<?php echo $objResult["ID_PRO"];?>">Delete</a>
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
