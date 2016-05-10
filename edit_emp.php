<html>
<head>
<title>EDIT</title>
</head>
<body>
<style>
body{
font-family:"Tahoma";
background-image: url("images/h34.PNG");
#background: #FFFFCC;
}
table{background:#cccc99;
color:#FFF;
padding:10px;
font-family:"Tahoma";
font-size: 13px;
}
</style>
<body>
<center><img src="images/h6.PNG"></center>
<form action="save_edit_emp.php?CusID=<?php echo $_GET["CusID"];?>" name="frmEdit" method="post">
<?php
include('connect.php');
$strSQL = "select * from employee_m WHERE ID_EMP = '".$_GET["CusID"]."' ";
$objParse = oci_parse ($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
$objResult = oci_fetch_array($objParse);
if(!$objResult)
{
echo "Not found CustomerID=".$_GET["CusID"];
}
else
{
?>
<center><h1>EDIT EMPLOYEE MAYBELLINE</</h1></center>
<br><br>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_emp </div></th>
<th width="150"> <div align="center">firstname_emp </div></th>
<th width="150"> <div align="center">lastname_emp </div></th>
<th width="150"> <div align="center">position_emp </div></th>
<th width="150"> <div align="center">phone_emp </div></th>
<th width="150"> <div align="center">address_emp </div></th>
</tr>
<tr>
<td><input type="text" name="txtID_EMP" size="5" value="<?php echo $objResult["ID_EMP"];
?>"></td>
<td><input type="text" name="txtFIRSTNAME_EMP" size="20" value="<?php echo $objResult["FIRSTNAME_EMP"];
?>"></td>
<td><input type="text" name="txtLASTNAME_EMP" size="20" value="<?php echo $objResult["LASTNAME_EMP"];
?>"></td>
<td><input type="text" name="txtPOSITION_EMP" size="20" value="<?php echo $objResult["POSITION_EMP"];
?>"></td>
<td><input type="text" name="txtPHONE_EMP" size="9" value="<?php echo $objResult["PHONE_EMP"];
?>"></td>
<td><input type="text" name="txtADDRESS_EMP" size="30" value="<?php echo $objResult["ADDRESS_EMP"];
?>"></td>
</tr>
</table>
<?php
}
oci_close($objConnect);
?>
<br>
<center><input type="submit" name="submit" value="submit"></center>
</form>
</body>
</html>
