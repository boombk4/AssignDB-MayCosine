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
<center><h1>ADD TRANTSPORT MAYBELLINE</h1></center>
<br><br>
<?
include('connect.php');
$lastsql = "select max(id_tran) from TRANTSPORT_M";
$objParse = oci_parse($objConnect, $lastsql);
oci_execute ($objParse,OCI_DEFAULT);
$rslast = oci_fetch_array($objParse,OCI_BOTH);
$last = "T".sprintf("%04d", substr($rslast[0],-4)+1);

$dealsql = "select id_deal from DEALING_M order by id_deal asc ";
$objParse = oci_parse($objConnect, $dealsql);
oci_execute ($objParse,OCI_DEFAULT);


?>
<form action="save_add_tran.php" name="frmAdd" method="post">
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_tran </div></th>
<th width="150"> <div align="center">id_deal </div></th>
<th width="150"> <div align="center">date_tran </div></th>
<th width="150"> <div align="center">post_tran </div></th>
</tr>
<tr>
<td><input type="text" name="txtID_TRAN" size="20" value="<?=$last;?>"></td>
<td>
  <select name="txtID_DEAL">
  <?
  while($rsdeal = oci_fetch_array($objParse,OCI_BOTH))
  {
    ?>
  <option value="<?=$rsdeal[0];?>"><?=$rsdeal[0];?></option>
  <?
}
?>
</select>
</td>
<td><input type="date" name="txtDATE_TRAN" size="20"></td>
<td><input type="text" name="txtPOST_TRAN" size="20"></td>
</tr>
</table>
<br>
<center><input type="submit" name="submit" value="submit"></center>
</form>
</body>
</html>
