<?php
session_start();
if (!isset($_SESSION[login])) {
header("Location: login.php");
exit;
}
?>
<html>
<head>
<title>DEALING</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<meta charset= "UTF-8" />


<body>
<?php
include('connect.php');
$strSQL = "SELECT*from dealing_m order by id_deal asc";
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
<center><h2>DEALING MAYBELLINE</h2></center>
<div class="right"><a href=add_deal.php>Add</a>&nbsp;</div>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_deal </div></th>
<th width="150"> <div align="center">id_emp </div></th>
<th width="150"> <div align="center">id_cus </div></th>
<th width="150"> <div align="center">date_deal </div></th>
<th width="150"> <div align="center">total_deal </div></th>
<th width="150"> <div align="center">action_cus </div></th>
</tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><div align="center"><?php echo $objResult["ID_DEAL"];?></div></td>
<td><?php echo $objResult["ID_EMP"];?></td>
<td><?php echo $objResult["ID_CUS"];?></td>
<td><?php echo $objResult["DATE_DEAL"];?></td>
<td><?php echo $objResult["TOTAL_DEAL"];?></td>
<td align="center">
<a href="edit_deal.php?CusID=<?php echo $objResult["ID_DEAL"];?>">Edit</a>&nbsp;
<a href="delete_deal.php?CusID=<?php echo $objResult["ID_DEAL"];?>">Delete</a>
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
