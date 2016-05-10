<html>
<head>
<title></title>
</head>
<body>
<?php
include('connect.php');
$newDate = date("d-M-y", strtotime($_POST["txtDATE_TRAN"]));
$strSQL = "INSERT INTO TRANTSPORT_M VALUES";
$strSQL .="('".$_POST["txtID_TRAN"]."','".$_POST["txtID_DEAL"]."','".$newDate."','".$_POST["txtPOST_TRAN"]."') ";
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
