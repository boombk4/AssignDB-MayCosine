<html>
<head>
<title></title>
</head>
<body>
<?php
include('connect.php');
$strSQL = "INSERT INTO CUSTOMER_M VALUES";
$strSQL .="('".$_POST["txtID_CUS"]."','".$_POST["txtFIRSTNAME_CUS"]."','".$_POST["txtLASTNAME_CUS"]."','".$_POST["txtPHONE_CUS"]."','".$_POST["txtADDRESS_CUS"]."') ";
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
<meta http-equiv="refresh" content="1; url=index_CUSTOMER_M.php">
</html>
