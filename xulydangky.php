<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php 
$flag = true;
$tb = "";
if(isset($_POST) && isset($_POST['DangKy']))
{
	$kh = new KhachHang();
	$sql1 = "select EMAIL from khach_hang";
	$mailsql = $kh->QueryAll($sql1);
	$mail = $_POST['mail'];
	$tentk = $_POST['tentk'];
	$mk = $_POST['mk'];
	$mk1 = $_POST['mk1'];
	$tenkh = $_POST['tenkh'];
	$diachi = $_POST['diachi'];
	$sdt = $_POST['sdt'];
	$gioitinh = $_POST['gioitinh'];
	$dk = $_POST['dk'];
	if($tentk=="")
	{
		$tb .="Không để username rỗng";
		$flag = false;	
	}
	if($mk=="")
	{
		$tb .="Không để mật khẩu rỗng";
		$flag = false;	
	}
	if($mk!=$mk1)
	{
		$tb .="Mật khẩu nhập lại không trùng";
		$flag = false;	
	}
	if($tenkh=="")
	{
		$tb .="Không để tên khách hàng rỗng";
		$flag = false;	
	}
	if($diachi=="")
	{
		$tb .="Không để địa chỉ rỗng";
		$flag = false;	
	}
	if($sdt=="" || !is_numeric($sdt))
	{
		$tb .="Nhập sdt không hợp lệ";
		$flag = false;	
	}
	if($mail=="")
	{
		$tb .="Không để email rỗng";
		$flag = false;	
	}
	foreach ($mailsql as $value)
	{
		if($mail==$value['EMAIL'])
		{
			$tb .= "Email trùng";	
			$flag = false;
		}
	}
	if($flag)
	{
		$data = $kh->themkh(NULL,$tenkh,$diachi,$sdt,$gioitinh,$mail,$tentk,$mk);
		echo "Đăng ký thành công";	
	}
}
?>
<body>
<div>
<?php echo $tb;?>
<a href="index.php" style="color:#009;"> Quay lại trang chủ </a>
</div>
</body>
</html>