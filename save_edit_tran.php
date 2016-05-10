<html>
<head>
<title></title>
</head>
<body>
<?php
include('connect.php');
$newDate = date("d-M-y", strtotime($_POST["txtDATE_TRAN"]));
$strSQL = "UPDATE TRANTSPORT_M SET ";
$strSQL .="ID_TRAN = '".$_POST["txtID_TRAN"]."' ";
$strSQL .=",ID_DEAL = '".$_POST["txtID_DEAL"]."' ";
$strSQL .=",DATE_TRAN = '".$newDate."' ";
$strSQL .=",POST_TRAN  = '".$_POST["txtPOST_TRAN"]."' ";
$strSQL .="WHERE ID_TRAN = '".$_GET["CusID"]."' ";

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
<meta http-equiv="refresh" content="1; url=index_TRANTSPORT_M.php">
</html>
