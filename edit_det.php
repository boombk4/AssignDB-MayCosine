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
<form action="save_edit_det.php?CusID=<?php echo $_GET["CusID"];?>" name="frmEdit" method="post">
<?php
include('connect.php');
$strSQL = "select * from details_m WHERE ID_DET = '".$_GET["CusID"]."' ";
$objParse = oci_parse ($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
$objResult = oci_fetch_array($objParse);

$prosql = "select id_pro from PRODUCT_M order by id_pro asc ";
$objpro = oci_parse($objConnect, $prosql);
oci_execute ($objpro,OCI_DEFAULT);

$dealsql = "select id_deal from DEALING_M order by id_deal asc ";
$dealParse = oci_parse($objConnect, $dealsql);
oci_execute ($dealParse,OCI_DEFAULT);

if(!$objResult)
{
echo "Not found CustomerID=".$_GET["CusID"];
}
else
{
?>
<center><h1>EDIT DETAILS MAYBELLINE</</h1></center>
<br><br>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_det </div></th>
<th width="150"> <div align="center">id_pro </div></th>
<th width="150"> <div align="center">id_deal </div></th>
<th width="150"> <div align="center">number_det </div></th>
<th width="150"> <div align="center">total_det </div></th>
</tr>
<tr>
<td><input type="text" name="txtID_DET" size="6" value="<?php echo $objResult["ID_DET"];
?>"></td>
<td>
  <select name="txtID_PRO">
  <?
  while($rspro = oci_fetch_array($objpro,OCI_BOTH))
  {
    if ($rspro[0]==$objResult["ID_PRO"])
    {
      $select = "selected";
    }
    else {
      $select ="";
    }
    ?>
  <option value="<?=$rspro[0];?>"<?echo $select;?>><?=$rspro[0];?></option>
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
    if ($rsdeal[0]==$objResult["ID_DEAL"])
    {
      $select = "selected";
    }
    else {
      $select ="";
    }
    ?>
  <option value="<?=$rsdeal[0];?>"<?echo $select;?>><?=$rsdeal[0];?></option>
  <?
}
?>
</select>

</td>
<td><input type="text" name="txtNUMBER_DET" size="5" value="<?php echo $objResult["NUMBER_DET"];
?>"></td>
<td><input type="text" name="txtTOTAL_DET" size="5" value="<?php echo $objResult["TOTAL_DET"];
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
