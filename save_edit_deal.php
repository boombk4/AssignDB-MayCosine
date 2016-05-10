<html>
<head>
<title></title>
</head>
<body>
<?php
include('connect.php');
$newDate = date("d-M-y", strtotime($_POST["txtDATE_DEAL"]));
$strSQL = "UPDATE DEALING_M SET ";
$strSQL .="ID_DEAL = '".$_POST["txtID_DEAL"]."' ";
$strSQL .=",ID_EMP = '".$_POST["txtID_EMP"]."' ";
$strSQL .=",ID_CUS  = '".$_POST["txtID_CUS"]."' ";
$strSQL .=",DATE_DEAL = '".$newDate."' ";
$strSQL .=",TOTAL_DEAL  = '".$_POST["txtTOTAL_DEAL"]."' ";
$strSQL .="WHERE ID_DEAL = '".$_GET["CusID"]."' ";
$objParse = oci_parse($objConnect, $strSQL);
$objExecute = oci_execute($objParse, OCI_DEFAULT);
if($objExecute)
{
oci_commit($objConnect); //*** Commit Transaction ***//
echo "Save Done.";
}
else
{
oci_rollback($objConnect); //*** RollBack Transaction ***//
echo "Error Save [".$strSQL."";
}
oci_close($objConnect);
?>
</body>
<meta http-equiv="refresh" content="1; url=index_DEALING_M.php">
</html>
