<html>
<head>
<title>ADD</title>
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
<center><img src="images/h6.PNG"></center>
<center><h1>ADD PRODUCT MAYBELLINE</h1></center>
<br><br>
<?php
include('connect.php');
$lastsql = "select max(id_pro) from PRODUCT_M";
$objParse = oci_parse($objConnect, $lastsql);
oci_execute ($objParse,OCI_DEFAULT);
$rslast = oci_fetch_array($objParse,OCI_BOTH);
$last = "P".sprintf("%04d", substr($rslast[0],-4)+1);

 ?>
<form action="save_add_pro.php" name="frmAdd" method="post">
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_pro </div></th>
<th width="150"> <div align="center">name_pro </div></th>
<th width="150"> <div align="center">price_pro </div></th>
<th width="150"> <div align="center">type_pro </div></th>
<th width="150"> <div align="center">pic_pro </div></th>
</tr>
<tr>
<td><input type="text" name="txtID_PRO" size="20" value="<?=$last;?>"></td>
<td><input type="text" name="txtNAME_PRO" size="20"></td>
<td><input type="text" name="txtPRICE_PRO" size="20"></td>
<td><input type="text" name="txtTYPE_PRO" size="20"></td>
<td><input type="text" name="PIC_PRO" size="20"></td>
</tr>
</table>
<br>
<center><input type="submit" name="submit" value="submit"></center>
</form>
</body>
</html>
