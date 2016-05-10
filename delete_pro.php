<html>
<head>
<title>DELETE</title>
</head>
<body>
<?php
include('connect.php');
$strSQL = "DELETE FROM PRODUCT_M ";
$strSQL .="WHERE ID_PRO = '".$_GET["CusID"]."' ";
$objParse = oci_parse($objConnect, $strSQL);
$objExecute = oci_execute($objParse, OCI_DEFAULT);
if($objExecute)
{
oci_commit($objConnect); //*** Commit Transaction ***//
echo "Record Deleted.";
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
