<html>
<head>
<title></title>
</head>
<body>
<?php
include('connect.php');
$strSQL = "INSERT INTO PRODUCT_M VALUES";
$strSQL .="('".$_POST["txtID_PRO"]."','".$_POST["txtNAME_PRO"]."','".$_POST["txtPRICE_PRO"]."','".$_POST["txtTYPE_PRO"]."','".$_POST["PIC_PRO"]."') ";
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
<meta http-equiv="refresh" content="1; url=index_PRODUCT_M.php">
</html>
