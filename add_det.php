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
<center><h1>ADD DETAILS MAYBELLINE</h1></center>
<br><br>
<?php
include('connect.php');
$lastsql = "select max(id_det) from DETAILS_M";
$objParse = oci_parse($objConnect, $lastsql);
oci_execute ($objParse,OCI_DEFAULT);
$rslast = oci_fetch_array($objParse,OCI_BOTH);
$last = "DT".sprintf("%04d", substr($rslast[0],-4)+1);

$prosql = "select id_pro from PRODUCT_M order by id_pro asc ";
$objParse = oci_parse($objConnect, $prosql);
oci_execute ($objParse,OCI_DEFAULT);

$dealsql = "select id_deal from DEALING_M order by id_deal asc ";
$dealParse = oci_parse($objConnect, $dealsql);
oci_execute ($dealParse,OCI_DEFAULT);


 ?>
<form action="save_add_det.php" name="frmAdd" method="post">
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_det </div></th>
<th width="150"> <div align="center">id_pro </div></th>
<th width="150"> <div align="center">id_deal </div></th>
<th width="150"> <div align="center">number_det </div></th>
<th width="150"> <div align="center">total_det </div></th>
</tr>
<tr>
<td><input type="text" name="txtID_DET" size="20" value="<?=$last;?>"></td>
<td>
  <select name="txtID_PRO">
  <?
  while($rspro = oci_fetch_array($objParse,OCI_BOTH))
  {
    ?>
  <option value="<?=$rspro[0];?>"><?=$rspro[0];?></option>
  <?
}
?>
</select>
</td>
<td>
  <select name="txtID_DEAL">
  <?
  while($rsdeal = oci_fetch_array($dealParse,OCI_BOTH))
  {
    ?>
  <option value="<?=$rsdeal[0];?>"><?=$rsdeal[0];?></option>
  <?
}
?>
</select>

</td>
<td><input type="text" name="txtNUMBER_DET" size="20"></td>
<td><input type="text" name="txtTOTAL_DET" size="20"></td>
</tr>
</table>
<br>
<center><input type="submit" name="submit" value="submit"></center>
</form>
</body>
</html>
