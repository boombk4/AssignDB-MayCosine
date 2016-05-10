<html>
<head>
<title></title>
</head>
<body>
<?php
include('connect.php');
$strSQL = "UPDATE PRODUCT_M SET ";
$strSQL .="ID_PRO = '".$_POST["txtID_PRO"]."' ";
$strSQL .=",NAME_PRO = '".$_POST["txtNAME_PRO"]."' ";
$strSQL .=",PRICE_PRO  = '".$_POST["txtPRICE_PRO"]."' ";
$strSQL .=",TYPE_PRO = '".$_POST["txtTYPE_PRO"]."' ";
$strSQL .=",PIC_PRO  = '".$_POST["PIC_PRO"]."' ";
$strSQL .="WHERE ID_PRO = '".$_GET["CusID"]."' ";
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
