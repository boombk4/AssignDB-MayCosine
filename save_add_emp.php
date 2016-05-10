<html>
<head>
<title></title>
</head>
<body>
<?php
 include('connect.php');
 $lastsql = "select max(id_emp) from EMPLOYEE_M";
 $objParse = oci_parse($objConnect, $lastsql);
 oci_execute ($objParse,OCI_DEFAULT);
 $rslast = oci_fetch_array($objParse,OCI_BOTH);
// echo var_dump($objResultlast);



$_POST["txtID_EMP"] = "E".sprintf("%04d", substr($rslast[0],-4)+1);


//  echo =$rslast[0]+1;
$strSQL = "INSERT INTO EMPLOYEE_M VALUES";
$strSQL .="('".$_POST["txtID_EMP"]."','".$_POST["txtFIRSTNAME_EMP"]."','".$_POST["txtLASTNAME_EMP"]."','".$_POST["txtPOSITION_EMP"]."','".$_POST["txtPHONE_EMP"]."','".$_POST["txtADDRESS_EMP"]."') ";
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
