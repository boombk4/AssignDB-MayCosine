<html>
<head>
<title></title>
</head>
<body>
<?php
include('connect.php');
$strSQL = "UPDATE EMPLOYEE_M SET ";
$strSQL .="ID_EMP = '".$_POST["txtID_EMP"]."' ";
$strSQL .=",FIRSTNAME_EMP = '".$_POST["txtFIRSTNAME_EMP"]."' ";
$strSQL .=",LASTNAME_EMP  = '".$_POST["txtLASTNAME_EMP"]."' ";
$strSQL .=",POSITION_EMP = '".$_POST["txtPOSITION_EMP"]."' ";
$strSQL .=",PHONE_EMP  = '".$_POST["txtPHONE_EMP"]."' ";
$strSQL .=",ADDRESS_EMP = '".$_POST["txtADDRESS_EMP"]."' ";
$strSQL .="WHERE ID_EMP = '".$_GET["CusID"]."' ";
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
<meta http-equiv="refresh" content="1; url=index_EMPLOYEE_M.php">
</html>
