 <?php 
	if(isset($_POST) && isset($_POST['DangNhap']) && isset($_SESSION))
	{
		$username = $_POST['username'];
		$pass = $_POST['pass'];
		$sql="select MA_KH,TEN_KH,DIA_CHI,SDT,GIOI_TINH,EMAIL,username,password from khach_hang ";
		$row = $db->QueryAll($sql);
		foreach($row as $value)
		{
			if($username == $value['username'] && $pass == $value['password'])
			{
				$_SESSION["makh"] = $value['MA_KH'];
				$_SESSION["tenkh"] = $value['TEN_KH'];
				$_SESSION["diachi"] = $value['DIA_CHI'];
				$_SESSION["sdt"] = $value['SDT'];
				$_SESSION["gioitinh"] = $value['GIOI_TINH'];
				$_SESSION["email"] = $value['EMAIL'];
				$_SESSION["ten_dang_nhap"] = $username;
				$_SESSION["mat_khau"] = $pass;	
			}
		}
	}
	if (isset($_POST['out']))
	{
		unset($_SESSION["ten_dang_nhap"]);
		unset($_SESSION["mat_khau"]);
		unset($_SESSION["tenkh"]);
		unset($_SESSION["diachi"]);
		unset($_SESSION["sdt"]);
		unset($_SESSION["gioitinh"]);
		unset($_SESSION["email"]);
		unset($_SESSION["name"]);
		unset($_SESSION["xulydh"]);
		//unset($xukydh);
	}
?>
 <!--login-->
  <div class="container-fluid login">
    <div class="row ">
      <div class="col-md-offset-7 col-md-5">
        <div class="row"> 
         <?php if(!isset($_SESSION["ten_dang_nhap"])){ ?> <div class="col-md-4 fa fa-user " data-target="#htdangnhap" data-toggle="modal" ><a href="#"> Đăng nhập </a></div><?php }?>
          <div class="col-md-4 fa fa-pencil-square-o" data-target="#htdangky" data-toggle="modal" ><a href="#"> Đăng ký </a> </div>
          <div class="col-md-3 " ><?php if(isset($_SESSION["ten_dang_nhap"])){ ?><form action="" method="post"><button type="submit" name="out" value="Out" style="padding:0px; background:#000
          ; color:#FFF; border:0px;">Log out</button></form><a href="index.php?mod=suainfo&user=<?php echo $_SESSION["ten_dang_nhap"]?>&tenkh=<?php echo $_SESSION["tenkh"]?>&diachi=<?php echo $_SESSION["diachi"]; ?>&sdt=<?php echo $_SESSION["sdt"]; ?>&gioitinh=<?php echo $_SESSION["gioitinh"]; ?>&mail=<?php echo $_SESSION["email"];?>&pass=<?php echo $_SESSION["mat_khau"]; ?>"><?php  echo $_SESSION["ten_dang_nhap"];}?></a></div>
          <a href="#" id="btn" class="a"><div class="col-md-1 glyphicon glyphicon-menu-hamburger fa-2x nut"  style="float:right;"> </div></a>
          </div>
      </div>
    </div>
  </div>
  <!--end login--> 
  <!--logo & search-->
  <div class="container-fluid logo">
    <div class="row">
      <div class="col-md-offset-1 col-md-2 " style="float:left;"><a href="index.php"> <img src="images/logo.jpg" /> </a></div>
      <div class="col-md-9">
        <div class="col-md-offset-1 col-md-7 kctop" style="float:left">
          <form action="index.php" method="get">
            <div style="float:left">
            <input type="hidden" name="xuly" value="cake"/>
              <input type="date" name="gttim" value="" placeholder="Tìm sản phẩm..." style="height:45px; font-size:18px;" size="22px"/> 
            </div>
            <div style="float:left">
              <button type="submit" value="Tim" name= "Tim" id="" style="background:#FFF">
              <div class="col-md-1 fa fa-search fa-3x"> </div>
              </button>
            </div>
          </form>
          <div class="clear"> </div>
        </div>
        <a href="index.php?mod=giohang"><div class="col-md-offset-1 col-md-1 fa fa-shopping-cart fa-3x kctop" style="float:left"></span></div></a>
        
        <div class="clear"> </div>
      </div>
    </div>
  </div>
  <!--end logo & search--> 
<!-- hộp thoại đăng nhập -->
  <div class="modal" id="htdangnhap">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body" style="text-align:center;">
          <form action="" method="post">
            <div class="glyphicon glyphicon-user fa-2x">
              <input type="text" value="" name="username" id="" placeholder="Tên Tài Khoản" size="40px;" style="font-size:20px;"/>
            </div>
            <div class="glyphicon glyphicon-lock fa-2x kctop">
              <input type="password" value="" name="pass" id="" placeholder="Mật khẩu" size="40px" style="font-size:20px;"/>
            </div>
            <div class="kctop">
              <button type="submit" id="" name="DangNhap" value="" class="accept">Đăng Nhập</button>
            </div>
          </form>
          <a href="#">
          <div class="mismdk"> Quên mật khẩu ? </div>
          </a> <a href="#">
          <div class="dky" data-target="#htdangky" data-toggle="modal"> Đăng ký </div>
          </a>
          <div class="clear"> </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">Thoát</button>
        </div>
      </div>
    </div>
  </div>
  <!--hộp thoại đăng ký -->
  <div class="modal" id="htdangky">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body" style="text-align:center">
          <form action="index.php" method="post">
            <div>
              <input type="text" value="" name="tentk" id="" placeholder="Tên Tài Khoản" size="40px" style="font-size:20px;"/>
            </div>
            <div class="kctop" >
              <input type="password" value="" name="mk" id="" placeholder="Mật khẩu" size="40px" style="font-size:20px;"/>
            </div>
            <div class="kctop" >
              <input type="password" value="" name="mk1" id="" placeholder="Xác nhận mật khẩu" size="40px" style="font-size:20px;"/>
            </div>
            <div class="kctop" >
              <input type="text" value="" name="tenkh" id="" placeholder="Tên người dùng" size="40px" style="font-size:20px;"/>
            </div>
             <div class="kctop" >
              <input type="text" value="" name="diachi" id="" placeholder="Địa chỉ" size="40px" style="font-size:20px;"/>
            </div>
             <div class="kctop" >
             Giới Tinh : 
              <input type="radio" value="nam" name="gioitinh" id="gioitinh" size="40px" style="font-size:20px;" checked="checked"/> Nam
              <input type="radio" value="nu" name="gioitinh" id="gioitinh" size="40px" style="font-size:20px;"/> Nữ
            </div>
            <div class="kctop" >
              <input type="text" value="" name="sdt" id="" placeholder="SDT" size="40px" style="font-size:20px;"/>
            </div>
            <div class="kctop" >
              <input type="email" value="" name="mail" id="" placeholder="Email" size="40px" style="font-size:20px;"/>
            </div>
            <div class="dieukhoan">
            <input type="hidden" name="xldangky" value="dk"/>
              <input type="checkbox" value="" name="dk" id="" checked="checked" style="height:20px; width:20px;">
              Tôi đồng ý với <a href="#" class="a"> <span style="color:#00F"> điều khoản này </span></a></div>
            <div class="kctop">
              <button type="submit" id="" name="DangKy" value="" class="accept">Đăng Ký</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">Thoát</button>
        </div>
      </div>
    </div>
  </div>
  <!--end hộp thoại đăng ký--> <!--end hộp thoại đăng nhập--> 