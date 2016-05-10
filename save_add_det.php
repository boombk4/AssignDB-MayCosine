<html>
<head>
<title></title>
</head>
<body>
<?php
include('connect.php');
$strSQL = "INSERT INTO DETAILS_M VALUES";
$strSQL .="('".$_POST["txtID_DET"]."','".$_POST["txtID_PRO"]."','".$_POST["txtID_DEAL"]."','".$_POST["txtNUMBER_DET"]."','".$_POST["txtTOTAL_DET"]."') ";
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
<meta http-equiv="refresh" content="1; url=index_DETAILS_M.php">
</html>
