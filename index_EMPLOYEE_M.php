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
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<meta charset= "UTF-8" />
<body>
<?php
include('connect.php');
$strSQL = "SELECT * FROM EMPLOYEE_M order by id_emp asc";
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
<center><h2>EMPLOYEE MAYBELLINE</h2></center>
<div class="right"><a href=add_emp.php>Add</a>&nbsp;</div>
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
<td><div align="center"><?php echo $objResult["ID_EMP"];?></div></td>
<td><?php echo $objResult["FIRSTNAME_EMP"];?></td>
<td><?php echo $objResult["LASTNAME_EMP"];?></td>
<td><?php echo $objResult["POSITION_EMP"];?></td>
<td><?php echo $objResult["PHONE_EMP"];?></td>
<td><?php echo $objResult["ADDRESS_EMP"];?></td>
<td align="center">
<a href="edit_emp.php?CusID=<?php echo $objResult["ID_EMP"];?>">Edit</a>&nbsp;
<a href="delete_emp.php?CusID=<?php echo $objResult["ID_EMP"];?>">Delete</a>
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
