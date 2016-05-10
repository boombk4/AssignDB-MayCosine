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
<form action="save_edit_deal.php?CusID=<?php echo $_GET["CusID"];?>" name="frmEdit" method="post">
<?php
include('connect.php');
$strSQL = "SELECT*from dealing_m WHERE ID_DEAL = '".$_GET["CusID"]."' ";
$objParse = oci_parse ($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
$objResult = oci_fetch_array($objParse);

$empsql = "select id_emp from EMPLOYEE_M order by id_emp asc ";
$objParse = oci_parse($objConnect, $empsql);
oci_execute ($objParse,OCI_DEFAULT);

$cussql = "select id_cus from CUSTOMER_M order by id_cus asc ";
$cusParse = oci_parse($objConnect, $cussql);
oci_execute ($cusParse,OCI_DEFAULT);

if(!$objResult)
{
echo "Not found CustomerID=".$_GET["CusID"];
}
else
{
?>
<center><h1>EDIT DEALING MAYBELLINE</</h1></center>
<br><br>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_deal </div></th>
<th width="150"> <div align="center">id_emp </div></th>
<th width="150"> <div align="center">id_cus </div></th>
<th width="150"> <div align="center">date_deal </div></th>
<th width="150"> <div align="center">total_deal </div></th>
</tr>
<tr>
<td><input type="text" name="txtID_DEAL" size="6" value="<?php echo $objResult["ID_DEAL"];
?>"></td>
<td>
  <select name="txtID_EMP">
  <?
  while($rsemp = oci_fetch_array($objParse,OCI_BOTH))
  {
    if ($rsemp[0]==$objResult["ID_EMP"])
    {
      $select = "selected";
    }
    else {
      $select ="";
    }
    ?>
  <option value="<?=$rsemp[0];?>"<?echo $select;?>><?=$rsemp[0];?></option>
  <?
}
?>
</select>
</td>
<td>
  <select name="txtID_CUS">
  <?
  while($rscus = oci_fetch_array($cusParse,OCI_BOTH))
  {
    if ($rscus[0]==$objResult["ID_CUS"])
    {
      $select = "selected";
    }
    else {
      $select ="";
    }
    ?>
  <option value="<?=$rscus[0];?>"<?echo $select;?>><?=$rscus[0];?></option>
  <?
}
?>
</select>




</td>
<td><input type="date" name="txtDATE_DEAL" size="15" value="<?php echo date("Y-m-d", strtotime($objResult["DATE_DEAL"]));
?>"></td>
<td><input type="text" name="txtTOTAL_DEAL" size="5" value="<?php echo $objResult["TOTAL_DEAL"];
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
