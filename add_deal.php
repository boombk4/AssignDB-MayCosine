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
<center><h1>ADD DEALING MAYBELLINE</h1></center>
<br><br>
<?php
include('connect.php');
$lastsql = "select max(id_deal) from DEALING_M";
$objParse = oci_parse($objConnect, $lastsql);
oci_execute ($objParse,OCI_DEFAULT);
$rslast = oci_fetch_array($objParse,OCI_BOTH);
$last = "DL".sprintf("%04d", substr($rslast[0],-4)+1);

$empsql = "select id_emp from EMPLOYEE_M order by id_emp asc ";
$objParse = oci_parse($objConnect, $empsql);
oci_execute ($objParse,OCI_DEFAULT);

$cussql = "select id_cus from CUSTOMER_M order by id_cus asc ";
$cusParse = oci_parse($objConnect, $cussql);
oci_execute ($cusParse,OCI_DEFAULT);


 ?>
<form action="save_add_deal.php" name="frmAdd" method="post">
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_deal </div></th>
<th width="150"> <div align="center">id_emp </div></th>
<th width="150"> <div align="center">id_cus </div></th>
<th width="150"> <div align="center">date_deal </div></th>
<th width="150"> <div align="center">total_deal </div></th>
</tr>
<tr>
<td><input type="text" name="txtID_DEAL" size="20" value="<?=$last;?>"></td>
<td>
  <select name="txtID_EMP">
  <?
  while($rsemp = oci_fetch_array($objParse,OCI_BOTH))
  {
    ?>
  <option value="<?=$rsemp[0];?>"><?=$rsemp[0];?></option>
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
    ?>
  <option value="<?=$rscus[0];?>"><?=$rscus[0];?></option>
  <?
}
?>
</select>
</td>
<td><input type="date" name="txtDATE_DEAL" size="20"></td>
<td><input type="text" name="txtTOTAL_DEAL" size="20"></td>
</tr>
</table>
<br>
<center><input type="submit" name="submit" value="submit"></center>
</form>
</body>
</html>
