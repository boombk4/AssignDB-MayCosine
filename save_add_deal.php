<html>
<head>
<title></title>
</head>
<body>
<?php
include('connect.php');
$newDate = date("d-M-y", strtotime($_POST["txtDATE_DEAL"]));
$strSQL = "INSERT INTO DEALING_M VALUES";
$strSQL .="('".$_POST["txtID_DEAL"]."','".$_POST["txtID_EMP"]."','".$_POST["txtID_CUS"]."','".$newDate."','".$_POST["txtTOTAL_DEAL"]."') ";
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
