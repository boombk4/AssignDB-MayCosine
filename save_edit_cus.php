<html>
<head>
<title></title>
</head>
<body>
<?php
include('connect.php');
$strSQL = "UPDATE CUSTOMER_M SET ";
$strSQL .="ID_CUS = '".$_POST["txtID_CUS"]."' ";
$strSQL .=",FIRSTNAME_CUS = '".$_POST["txtFIRSTNAME_CUS"]."' ";
$strSQL .=",LASTNAME_CUS  = '".$_POST["txtLASTNAME_CUS"]."' ";
$strSQL .=",PHONE_CUS  = '".$_POST["txtPHONE_CUS"]."' ";
$strSQL .=",ADDRESS_CUS = '".$_POST["txtADDRESS_CUS"]."' ";
$strSQL .="WHERE ID_CUS = '".$_GET["CusID"]."' ";
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
