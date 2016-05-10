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
<form action="save_edit_tran.php?CusID=<?php echo $_GET["CusID"];?>" name="frmEdit" method="post">
<?php
include('connect.php');
$strSQL = "SELECT * FROM TRANTSPORT_M WHERE ID_TRAN = '".$_GET["CusID"]."' ";
$objParse = oci_parse ($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
$objResult = oci_fetch_array($objParse);

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
<center><h1>EDIT TRANTSPORT MAYBELLINE</</h1></center>
<br><br>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_tran </div></th>
<th width="150"> <div align="center">id_deal </div></th>
<th width="150"> <div align="center">date_tran </div></th>
<th width="150"> <div align="center">post_tran </div></th>
</tr>
<tr>
<td><input type="text" name="txtID_TRAN" size="5" value="<?php echo $objResult["ID_TRAN"];
?>"></td>
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
<td><input type="date" name="txtDATE_TRAN" size="15" value="<?php echo date("Y-m-d", strtotime($objResult["DATE_TRAN"]));
?>"></td>
<td><input type="text" name="txtPOST_TRAN" size="5" value="<?php echo $objResult["POST_TRAN"];
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
