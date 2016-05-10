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
<form action="save_edit_cus.php?CusID=<?php echo $_GET["CusID"];?>" name="frmEdit" method="post">
<?php
include('connect.php');
$strSQL = "select*from customer_m WHERE ID_CUS = '".$_GET["CusID"]."' ";
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
<center><h1>EDIT CUSTOMER MAYBELLINE</</h1></center>
<br><br>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_cus </div></th>
<th width="150"> <div align="center">firstname_cus </div></th>
<th width="150"> <div align="center">lastname_cus </div></th>
<th width="150"> <div align="center">phone_cus </div></th>
<th width="150"> <div align="center">address_cus </div></th>
</tr>
<tr>
<td><input type="text" name="txtID_CUS" size="5" value="<?php echo $objResult["ID_CUS"];?>"></td>
<td><input type="text" name="txtFIRSTNAME_CUS" size="20" value="<?php echo $objResult["FIRSTNAME_CUS"];
?>"></td>
<td><input type="text" name="txtLASTNAME_CUS" size="20" value="<?php echo $objResult["LASTNAME_CUS"];
?>"></td>
<td><input type="text" name="txtPHONE_CUS" size="9" value="<?php echo $objResult["PHONE_CUS"];
?>"></td>
<td><input type="text" name="txtADDRESS_CUS" size="30" value="<?php echo $objResult["ADDRESS_CUS"];
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
