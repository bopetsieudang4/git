<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php 
$tin = new TinTuc();
$data = $tin->selectAllTT();
foreach($data as $value)
{?>
<div style="margin-top:20px; color:#F00; text-align:center"><h1><?php echo $value['TIEU_DE']; ?></h1></div>
<div style="margin-top:30px; text-align:center"><h3><?php echo str_replace("\r\n","<br>", $value['NOI_DUNG']);?></div></div>
<?php }?>
</body>
</html>