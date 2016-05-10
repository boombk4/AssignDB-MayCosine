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
<form action="save_edit_pro.php?CusID=<?php echo $_GET["CusID"];?>" name="frmEdit" method="post">
<?php
include('connect.php');
$strSQL = "SELECT * FROM product_m WHERE ID_PRO = '".$_GET["CusID"]."' ";
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
<center><h1>EDIT PRODUCT MAYBELLINE</</h1></center>
<br><br>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_pro </div></th>
<th width="150"> <div align="center">name_pro </div></th>
<th width="150"> <div align="center">price_pro </div></th>
<th width="150"> <div align="center">type_pro </div></th>
<th width="150"> <div align="center">pic_pro </div></th>
</tr>
<tr>
<td><input type="text" name="txtID_PRO" size="5" value="<?php echo $objResult["ID_PRO"];
?>"></td>
<td><input type="text" name="txtNAME_PRO" size="50" value="<?php echo $objResult["NAME_PRO"];
?>"></td>
<td><input type="text" name="txtPRICE_PRO" size="3" value="<?php echo $objResult["PRICE_PRO"];
?>"></td>
<td><input type="text" name="txtTYPE_PRO" size="15" value="<?php echo $objResult["TYPE_PRO"];
?>"></td>
<td><input type="text" name="PIC_PRO" size="300" value="<?php echo $objResult["PIC_PRO"];
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
