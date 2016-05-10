<?php
session_start();
if (!isset($_SESSION[login])) {
header("Location: login.php");
exit;
}
?>
<html>
<head>
<title>Index</title>
</head>
<meta charset= "UTF-8" />
<style>
body{
font-family:"Tahoma";
background-image: url("images/h36.PNG");
#background: #FFFFCC;
}
table{background:#9999cc;
border-radius:0px;
color:#FFF;
padding:10px;
font-family:"Tahoma";
font-size: 13px;
}
</style>
<body>
<center><img src="images/h6.PNG"></center>
<center><a href=index_EMPLOYEE_M.php>รายชื่อพนักงาน</a>
&nbsp;&nbsp;<a href=index_CUSTOMER_M.php>รายชื่อลูกค้า</a>
&nbsp;&nbsp;<a href=index_PRODUCT_M.php>รายการสินค้า</a>
&nbsp;&nbsp;<a href=index_DEALING_M.php>การซื้อขายสินค้า</a>
&nbsp;&nbsp;<a href=index_TRANTSPORT_M.php>การขนส่ง</a>
&nbsp;&nbsp;<a href=index_DETAILS_M.php>รายละเอียดการซื้อขายสินค้า</a>
</center>
<br><center><h2>ระบบฐานข้อมูลการจัดการขายสินค้า MAYMELLINE </h2></center>
<center><form action="" method="post" name="form1">
<select name="sl" onChange="send()">
<option disabled selected><center>
<?php
if(empty($_POST[sl])){echo "กรุณาเลือกรายการ";}
else if ($_POST[sl]==1) {echo "1.แสดง ชื่อลูกค้า นามสกุลลูกค้า และ ราคารวมของการซื้อขาย";}
else if ($_POST[sl]==2) {echo "2.แสดง ชื่อพนักงาน นามสกุลพนักงาน ตำแหน่ง และ วันที่การซื้อขาย";}
else if ($_POST[sl]==3) {echo "3.แสดง รหัสการซื้อขาย รหัสรายละเอียดการซื้อขาย ชื่อพนักงาน และ นามสกุลพนักงานที่ให้บริการ";}
else if ($_POST[sl]==4) {echo "4.แสดง รหัสการซื้อขาย และ รหัสรายละเอียดการซื้อขาย ชื่อลูกค้า และ นามสกุลลูกค้าที่ให้บริการ";}
else if ($_POST[sl]==5) {echo "5.แสดง รหัสการขนส่ง รหัสการซื้อขาย หมายเลขวัสดุ วันที่";}
else if ($_POST[sl]==6) {echo "6.แสดง ผลรวมราคาสินค้า ราคาสินค้ามากสุด ราคาสินค้าน้อยสุด ค่าเฉลี่ยราคาสินค้า ";}
else if ($_POST[sl]==7) {echo "7.แสดง รหัสพนักงาน ชื่อพนักงาน นามสกุลพนักงาน ตำแหน่งพนักงานที่มี W ตัวใหญ่ อยู่ข้างหน้า โทรศัพท์พนักงาน ที่อยู่พนักงาน";}
else if ($_POST[sl]==8) {echo "8.แสดงรหัสพนักงาน ที่ทำการส่งสินค้า หมายเลขวัสดุ 13290";}
else if ($_POST[sl]==9) {echo "9.แสดงรหัสการซื้อขาย ที่มีพนักงานชื่อ Joong Kiเป็นคนให้บริการ";}
else if ($_POST[sl]==10) {echo "10.แสดงรหัสการซื้อขาย ที่มีลูกค้าชื่อ  Ji Won เป็นคนซื้อ";}
else if ($_POST[sl]==11) {echo "11.แสดงรหัสรายละเอียดการซื้อขาย และ จำนวน ที่มีการซื้อขายสินค้า MAYBELLINE THE NUDES PALETTE";}
else if ($_POST[sl]==12) {echo "12.สร้าง view เพื่อแสดง รหัสสินค้า ชื่อสินค้า และราคาสินค้า";}
else if ($_POST[sl]==13) {echo "13.สร้าง view เพื่อแสดง รหัสพนักงาน และ ชื่อพนักงานที่ทำงานตำแหน่ง Accounts";}
else if ($_POST[sl]==14) {echo "14.สร้าง view เพื่อแสดง รหัสลูกค้า ชื่อลูกค้าที่มีชื่อขึ้นต้นด้วย T";}
else if ($_POST[sl]==15) {echo "15.สร้าง view เพื่อแสดง รหัสการขนส่ง วันที่การขนส่ง และหมายเลขวัสดุท 14000";}
else if ($_POST[sl]==16) {echo "16.แสดง ชื่อลูกค้า และ วันที่การซื้อขายที่มียอดรวมน้อยกว่า 1000 บาท";}
else if ($_POST[sl]==17) {echo "17.แสดง ชื่อสินค้าที่มีการซื้อขายมากกว่า 5 ชิ้น";}
else if ($_POST[sl]==18) {echo "18.แสดง ชื่อลูกค้า ที่อยู่ลูกค่าที่มียอดซื้อมากกว่า 500 บาท และซื้อตั้งแต่วันที่ 26-JUN-16 ขึ้นไป";}
else if ($_POST[sl]==19) {echo "19.แสดง รหัสพนักงาน ชื่อพนักงาน นามสกุลพนักงาน";}
else if ($_POST[sl]==20) {echo "20.แสดงชื่อพนักงาน นามสกุลพนักงาน ที่ทำการส่งสินค้าตั้งแต่วันที่";}
?>
</center></option>
<option value ="1">1.แสดง ชื่อลูกค้า นามสกุลลูกค้า และ ราคารวมของการซื้อขาย</option>
<option value ="2">2.แสดง ชื่อพนักงาน นามสกุลพนักงาน ตำแหน่ง และ วันที่การซื้อขาย</option>
<option value ="3">3.แสดง รหัสการซื้อขาย รหัสรายละเอียดการซื้อขาย ชื่อพนักงาน และ นามสกุลพนักงานที่ให้บริการ</option>
<option value ="4">4.แสดง รหัสการซื้อขาย และ รหัสรายละเอียดการซื้อขาย ชื่อลูกค้า และ นามสกุลลูกค้าที่ให้บริการ</option>
<option value ="5">5.แสดง รหัสการขนส่ง รหัสการซื้อขาย หมายเลขวัสดุ วันที่</option>
<option value ="6">6.แสดง ผลรวมราคาสินค้า ราคาสินค้ามากสุด ราคาสินค้าน้อยสุด ค่าเฉลี่ยราคาสินค้า</option>
<option value ="7">7.แสดง รหัสพนักงาน ชื่อพนักงาน นามสกุลพนักงาน ตำแหน่งพนักงานที่มี W ตัวใหญ่ อยู่ข้างหน้า โทรศัพท์พนักงาน ที่อยู่พนักงาน</option>
<option value ="8">8.แสดงรหัสพนักงาน ที่ทำการส่งสินค้า หมายเลขวัสดุ 13290</option>
<option value ="9">9.แสดงรหัสการซื้อขาย ที่มีพนักงานชื่อ Joong Kiเป็นคนให้บริการ</option>
<option value ="10">10.แสดงรหัสการซื้อขาย ที่มีลูกค้าชื่อ  Ji Won เป็นคนซื้อ</option>
<option value ="11">11.แสดงรหัสรายละเอียดการซื้อขาย และ จำนวน ที่มีการซื้อขายสินค้า MAYBELLINE THE NUDES PALETTE</option>
<option value ="12">12.สร้าง view เพื่อแสดง รหัสสินค้า ชื่อสินค้า และราคาสินค้า</option>
<option value ="13">13.สร้าง view เพื่อแสดง รหัสพนักงาน และ ชื่อพนักงานที่ทำงานตำแหน่ง Accounts</option>
<option value ="14">14.สร้าง view เพื่อแสดง รหัสลูกค้า ชื่อลูกค้าที่มีชื่อขึ้นต้นด้วย T</option>
<option value ="15">15.สร้าง view เพื่อแสดง รหัสการขนส่ง วันที่การขนส่ง และหมายเลขวัสดุท 14000</option>
<option value ="16">16.แสดง ชื่อลูกค้า และ วันที่การซื้อขายที่มียอดรวมน้อยกว่า 1000 บาท</option>
<option value ="17">17.แสดง ชื่อสินค้าที่มีการซื้อขายมากกว่า 5 ชิ้น</option>
<option value ="18">18.แสดง ชื่อลูกค้า ที่อยู่ลูกค่าที่มียอดซื้อมากกว่า 500 บาท และซื้อตั้งแต่วันที่ 26-JUN-16 ขึ้นไป</option>
<option value ="19">19.แสดง รหัสพนักงาน ชื่อพนักงาน นามสกุลพนักงาน</option>
<option value ="20">20.แสดงชื่อพนักงาน นามสกุลพนักงาน ที่ทำการส่งสินค้าตั้งแต่วันที่</option>
</select>
</form></center>
<script>
function send(){
document.form1.submit();
}
</script>
<?php
if(empty($_POST[sl])){
$_POST[sl]=0;
}
?>
<?php
include('connect.php');
if ($_POST[sl]==1){
$strSQL = "SELECT customer_m.firstname_cus as firstname,customer_m.lastname_cus as lastname,dealing_m.total_deal as total from customer_m join dealing_m on customer_m.id_cus = dealing_m.id_cus";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">firstname </div></th>
<th width="150"> <div align="center">lastname </div></th>
<th width="150"> <div align="center">total </div></th>
</tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["FIRSTNAME"];?></td>
<td><?php echo $objResult["LASTNAME"];?></td>
<td><?php echo $objResult["TOTAL"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else if ($_POST[sl]==2){
$strSQL = "SELECT employee_m.firstname_emp as firstname,employee_m.lastname_emp as lastname,employee_m.position_emp as position,dealing_m.date_deal from employee_m join dealing_m on employee_m.id_emp = dealing_m.id_emp";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">firstname </div></th>
<th width="150"> <div align="center">lastname </div></th>
<th width="150"> <div align="center">position </div></th>
<th width="150"> <div align="center">date_deal </div></th>
</tr>

<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["FIRSTNAME"];?></td>
<td><?php echo $objResult["LASTNAME"];?></td>
<td><?php echo $objResult["POSITION"];?></td>
<td><?php echo $objResult["DATE_DEAL"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else if ($_POST[sl]==3){
$strSQL = "SELECT dealing_m.id_deal,details_m.id_det,employee_m.firstname_emp as firstname,employee_m.lastname_emp as lastname from dealing_m join details_m on dealing_m.id_deal = details_m.id_deal join employee_m on dealing_m.id_emp = employee_m.id_emp order by id_deal asc";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_deal </div></th>
<th width="150"> <div align="center">id_det </div></th>
<th width="150"> <div align="center">firstname </div></th>
<th width="150"> <div align="center">lastname </div></th>
</tr>

<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["ID_DEAL"];?></td>
<td><?php echo $objResult["ID_DET"];?></td>
<td><?php echo $objResult["FIRSTNAME"];?></td>
<td><?php echo $objResult["LASTNAME"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else if ($_POST[sl]==4){
$strSQL = "SELECT dealing_m.id_deal,details_m.id_det,customer_m.firstname_cus as firstname,customer_m.lastname_cus as lastname from dealing_m join details_m on dealing_m.id_deal = details_m.id_deal join customer_m on dealing_m.id_cus = customer_m.id_cus order by id_deal asc";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_deal </div></th>
<th width="150"> <div align="center">id_det </div></th>
<th width="150"> <div align="center">firstname </div></th>
<th width="150"> <div align="center">lastname </div></th>
</tr>

<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["ID_DEAL"];?></td>
<td><?php echo $objResult["ID_DET"];?></td>
<td><?php echo $objResult["FIRSTNAME"];?></td>
<td><?php echo $objResult["LASTNAME"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else if ($_POST[sl]==5){
$strSQL = "select id_tran,id_deal,post_tran as post,date_tran,to_char(date_tran,'DD/MM/YY') as date_tran12 from TRANTSPORT_M";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_tran </div></th>
<th width="150"> <div align="center">id_deal </div></th>
<th width="150"> <div align="center">post </div></th>
<th width="150"> <div align="center">dete_tran </div></th>
<th width="150"> <div align="center">date_tran </div></th>
</tr>

<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["ID_TRAN"];?></td>
<td><?php echo $objResult["ID_DEAL"];?></td>
<td><?php echo $objResult["POST"];?></td>
<td><?php echo $objResult["DATE_TRAN"];?></td>
<td><?php echo $objResult["DATE_TRAN12"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else if ($_POST[sl]==6){
$strSQL = "SELECT sum(price_pro) as sum ,max(price_pro) as max ,min(price_pro) as min,avg(price_pro) as avg
from product_m";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">sum </div></th>
<th width="150"> <div align="center">max </div></th>
<th width="150"> <div align="center">min </div></th>
<th width="150"> <div align="center">avg </div></th>
</tr>

<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["SUM"];?></td>
<td><?php echo $objResult["MAX"];?></td>
<td><?php echo $objResult["MIN"];?></td>
<td><?php echo $objResult["AVG"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else if ($_POST[sl]==7){
$strSQL = "select id_emp as id,firstname_emp as firstname,lastname_emp as lastname,position_emp as position,phone_emp as phone,address_emp as address from EMPLOYEE_M where position_emp LIKE 'W%'";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id </div></th>
<th width="150"> <div align="center">firstname </div></th>
<th width="150"> <div align="center">lastname </div></th>
<th width="150"> <div align="center">position </div></th>
<th width="150"> <div align="center">phone </div></th>
<th width="150"> <div align="center">address</div></th>
</tr>

<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["ID"];?></td>
<td><?php echo $objResult["FIRSTNAME"];?></td>
<td><?php echo $objResult["LASTNAME"];?></td>
<td><?php echo $objResult["POSITION"];?></td>
<td><?php echo $objResult["PHONE"];?></td>
<td><?php echo $objResult["ADDRESS"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else if ($_POST[sl]==8){
$strSQL = "select id_emp from dealing_m where  id_deal= (select id_deal from trantsport_m where post_tran = '13290')";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_emp</div></th>
</tr>

<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["ID_EMP"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else if ($_POST[sl]==9){
$strSQL = "select id_deal from dealing_m where  id_emp IN (select id_emp from EMPLOYEE_M where FIRSTNAME_EMP = 'Joong Ki')";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_deal</div></th>
</tr>

<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["ID_DEAL"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else if ($_POST[sl]==10){
$strSQL = "select id_deal from dealing_m where  id_cus IN (select id_cus from CUSTOMER_M where firstname_cus = 'Ji Won')";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_deal</div></th>
</tr>

<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["ID_DEAL"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else if ($_POST[sl]==11){
$strSQL = "select id_det,number_det from details_m where  id_pro = (select id_pro from product_m where name_pro = 'MAYBELLINE THE NUDES PALETTE')";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_det</div></th>
<th width="150"> <div align="center">number_det</div></th>
</tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["ID_DET"];?></td>
<td><?php echo $objResult["NUMBER_DET"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else if ($_POST[sl]==12){
$strSQL = "SELECT * FROM product_view";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_pro_v</div></th>
<th width="150"> <div align="center">name_pro_v</div></th>
<th width="150"> <div align="center">price_pro_v</div></th>
</tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["ID_PRO_V"];?></td>
<td><?php echo $objResult["NAME_PRO_V"];?></td>
<td><?php echo $objResult["PRICE_PRO_V"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else if ($_POST[sl]==13){
$strSQL = "select * from employee_view";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_emp_v</div></th>
<th width="150"> <div align="center">first_emp_v</div></th>
<th width="150"> <div align="center">position_emp_v</div></th>
</tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["ID_EMP_V"];?></td>
<td><?php echo $objResult["FIRSTNAME_EMP_V"];?></td>
<td><?php echo $objResult["POSITION_EMP_V"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else if ($_POST[sl]==14){
$strSQL = "select * from customer_view";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_cus_v</div></th>
<th width="150"> <div align="center">firstname_cus_v</div></th>
<th width="150"> <div align="center">lastname_cus_v</div></th>
</tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["ID_CUS_V"];?></td>
<td><?php echo $objResult["FIRSTNAME_CUS_V"];?></td>
<td><?php echo $objResult["LASTNAME_CUS_V"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else if ($_POST[sl]==15){
$strSQL = "select * from trantsport_view";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_tran_v</div></th>
<th width="150"> <div align="center">date_tran_v</div></th>
<th width="150"> <div align="center">post_tran_v</div></th>
</tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["ID_TRAN_V"];?></td>
<td><?php echo $objResult["DATE_TRAN_V"];?></td>
<td><?php echo $objResult["POST_TRAN_V"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else if ($_POST[sl]==16){
$strSQL = "SELECT customer_m.firstname_cus as first,customer_m.lastname_cus as lastname,dealing_m.date_deal from customer_m join dealing_m on customer_m.id_cus = dealing_m.id_cus where total_deal < 1000";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">first</div></th>
<th width="150"> <div align="center">lastname</div></th>
<th width="150"> <div align="center">date_deal</div></th>
</tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["FIRST"];?></td>
<td><?php echo $objResult["LASTNAME"];?></td>
<td><?php echo $objResult["DATE_DEAL"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else if ($_POST[sl]==17){
$strSQL = "select name_pro as product from product_m where id_pro in (select id_pro from details_m where number_det > 5)";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">product</div></th>
</tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["PRODUCT"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else if ($_POST[sl]==18){
$strSQL = "select customer_m.firstname_cus as first,address_cus as address from customer_m join dealing_m on customer_m.id_cus = dealing_m.id_cus where total_deal > 500 and date_deal = '26-JUN-16'";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">first</div></th>
<th width="150"> <div align="center">address</div></th>
</tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["FIRST"];?></td>
<td><?php echo $objResult["ADDRESS"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else if ($_POST[sl]==19){
$strSQL = "select id_emp,firstname_emp ||' '||lastname_emp as name from employee_m order by id_emp asc";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">id_emp</div></th>
<th width="150"> <div align="center">name</div></th>
</tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["ID_EMP"];?></td>
<td><?php echo $objResult["NAME"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else if ($_POST[sl]==20){
$strSQL = "select firstname_emp as firstname,lastname_emp as lastname from employee_m join dealing_m on employee_m.id_emp = dealing_m.id_emp join trantsport_m on trantsport_m.id_deal = dealing_m.id_deal";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
?>
<table align="center" border="1">
<tr>
<th width="150"> <div align="center">firstname</div></th>
<th width="150"> <div align="center">lastname</div></th>
</tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
<tr>
<td><?php echo $objResult["FIRSTNAME"];?></td>
<td><?php echo $objResult["LASTNAME"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
oci_close($objConnect);
?>
</body>
</html>
