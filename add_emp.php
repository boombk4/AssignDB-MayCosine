<html>
<head>
<title>ADD</title>
</head>
<style>
body{
font-family:"Tahoma";
background-image: url("images/h34.PNG");
#background: #FFFFCC;
}
table{background:#cccc99;
color:#FFF;
padding:10px;
font-family:"Tahoma";
font-size: 13px;
}
</style>
<body>
  <?php
  include('connect.php');
  $lastsql = "select max(id_emp) from EMPLOYEE_M";
  $objParse = oci_parse($objConnect, $lastsql);
  oci_execute ($objParse,OCI_DEFAULT);
  $rslast = oci_fetch_array($objParse,OCI_BOTH);
  $last = "E".sprintf("%04d", substr($rslast[0],-4)+1);

   ?>

<center><img src="images/h6.PNG"></center>
<center><h1>ADD EMPLOYEE MAYBELLINE</h1></center>
<form action="save_add_emp.php" name="frmAdd" method="post">
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_emp </div></th>
<th width="150"> <div align="center">firstname_emp </div></th>
<th width="150"> <div align="center">lastname_emp </div></th>
<th width="150"> <div align="center">position_emp </div></th>
<th width="150"> <div align="center">phone_emp </div></th>
<th width="150"> <div align="center">address_emp </div></th>
</tr>
<tr>
<td><input type="text" name="txtID_EMP" size="20" value="<?php echo $last; ?>"></td>
<td><input type="text" name="txtFIRSTNAME_EMP" size="20"></td>
<td><input type="text" name="txtLASTNAME_EMP" size="20"></td>
<td><input type="text" name="txtPOSITION_EMP" size="20"></td>
<td><input type="text" name="txtPHONE_EMP" size="20"></td>
<td><input type="text" name="txtADDRESS_EMP" size="20"></td>
</tr>
</table>
<br>
<center><input type="submit" name="submit" value="submit"></center>
</form>
</body>
</html>
