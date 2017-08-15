<?php
class user extends base {	

	function run($task= "")
	{
		$this->where=" where 1=1 ";
		switch ($task)
		{			
			case "password":				
		  		$this->password();
		  		break;
			case "logout":				
		  		$this->logout();
		  		break;	
			default: case "login":				
		  		$this->login();
		  		break;
		}
	}

	
	function logout()
	{
		$this->db->query("update user set is_status=0, session_id='' where id={$_SESSION['user_id']}");
		
		$sql= "insert into user_log(user_id, create_date, action) values({$_SESSION['user_id']}, now(), 'Đăng xuất thành công')";
		$this->db->query($sql);
		setcookie("user_id", ''); /* xoa remember*/
		$_SESSION['admin_menu']= "";
		$_SESSION["admin_permission"]= "";
		$_SESSION["username"]= "";
		$_SESSION["user_id"]= "";
		$_SESSION['user_type_id']= "";
		$_SESSION["user_avatar"]= "";
		
		$this->smarty->assign("error", "logout_success");
		$this->smarty->assign("error_echo", "Đăng xuất thành công ! Vui lòng chờ trong giây lát ...");
		header("location: admin?");
	}	
	
	function setLogin($user)
	{
		$_SESSION["user_id"]= $user["id"];
		$_SESSION["username"]= $user["username"];
		$_SESSION["email"]= $user["email"];
		$_SESSION["user_type_id"] = $user["user_type_id"];			
		
		$this->db->query("update user set is_status=1, session_id='".session_id()."' where id={$_SESSION['user_id']}");
		
		$sql= "insert into user_log(user_id, create_date, action) values({$_SESSION['user_id']}, now(), 'Đăng nhập thành công')";
		$this->db->query($sql);
		
		//Permission		
		$sql= "select admin_menu_id from user_permission where user_type_id='".$_SESSION["user_type_id"]."'";
		
		if($_SESSION["username"]=="root")
			$sql= "select id from admin_menu";
		
		$_SESSION['admin_permission']= $this->db->getCol($sql);
							
		//print_r($_SESSION['admin_permission']);
					
		if(is_array($_SESSION['admin_permission']) && count($_SESSION['admin_permission'])>0)
		{
			$menu = $this->db->getAll("SELECT * FROM admin_menu where is_show=1 AND parent_id=0 AND id in (".implode(",", $_SESSION['admin_permission']).") order by z_index asc"); echo mysql_error();
			
			foreach($menu as $key=>$value)
			{
				$menu[$key]["sub"]= $this->db->getAll("SELECT * FROM admin_menu where is_show=1 AND parent_id={$value['id']} AND id in (".implode(",", $_SESSION['admin_permission']).") order by z_index asc");
				
				foreach($menu[$key]["sub"] as $k=>$v)
				{
					$menu[$key]["sub"][$k]["sub"]= $this->db->getAll("SELECT * FROM admin_menu where is_show=1 AND parent_id={$v['id']} AND id in (".implode(",", $_SESSION['admin_permission']).") order by z_index asc");
				}
			}
			$_SESSION['admin_menu']= $menu;
		}
	}
	
	function login()
	{
		global $oSmarty, $oDb;	
		
		/* kiem tra remember */
		if($_COOKIE["user_id"]>0)
		{
			$user= $oDb->getRow("select * from user where id='".$_COOKIE["user_id"]."'");
					
			if(count($user)>0)
			{		
				if($user["is_active"]==1)
				{
					$this->setLogin($user);
					
					header("location: admin.php"); exit();						
				}	
			}
			
		}

		
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			//echo "select * from user where username='".$_POST["tex_username"]."'";
			
			$user= $oDb->getRow("select * from user where username='".$_POST["tex_username"]."'");
					
			if(count($user)>0)
			{		
				/* echo $user["password"];
				echo "<br>";
				echo  sha1(md5(PASSSWORD_HASH.$_POST["tex_password"])); */
				
				if($user["password"]==sha1(md5(PASSSWORD_HASH.$_POST["tex_password"])))
				{
					$this->setLogin($user);
					
					if($_POST['remember_me'])
						setcookie("user_id", $user["id"], time()+3600*24*7); /* luu 1 tuan */
										
					$oSmarty->assign("error", "success");	
					$oSmarty->assign("error_echo", "Đăng nhập thành công! Vui lòng chờ trong giây lát...");					
																			
				}								
				else if($user["is_active"]!="1")
				{
					$oSmarty->assign("error", "inactive");
					$oSmarty->assign("error_echo", "Tài khoản chưa kích hoạt, vui lòng kích hoạt tài khoản");	
				}
				else
				{
					$oSmarty->assign("error", "wrong_password");
					$oSmarty->assign("error_echo", "Bạn nhập sai password ! Vui lòng thử lại...");	
				}
			}
			else
			{
				$oSmarty->assign("error", "wrong_username");
				$oSmarty->assign("error_echo", "Bạn nhập sai username ! Vui lòng thử lại...");	
			
			}
		}		
		
		$oSmarty->display('login.tpl');
	}
	
	function password()
	{
		global $oSmarty, $oDb;	
		
		if($_GET["setpass"]!="")
		{
			
			$setpass= explode(",", base64_decode($_GET["setpass"]));

			$email= $setpass[0];
			$username= $setpass[1];			
			$setpasskey= $setpass[2];
			
			$user= $oDb->getRow("select * from user where username='$username'");
			if(count($user)>0)
			{
				if($user["setpasskey"]==$setpasskey)
				{
					$newpass=rand(123456, 654321);
					$oDb->query("update user set password='". md5($newpass)."', setpasskey='' where username='$username'");
					
					$subject= "Mat khau moi cho tai khoan tren website" .SITE_URL;
					$content= "Chao ban, mat khau moi cua ban la: $newpass, ten dang nhap la: $username ban co the dang nhap vao he thong: <a href='".SITE_URL."index.php?mod=user&task=login'>tai day</a>";
					if(!sendMail($email,"", $subject, $content))
					{
						$oSmarty->assign("error", "Lỗi trong quá trình gửi mail");
					}
					else
					{
						$oSmarty->assign("error", "Bạn vui lòng kiểm tra email để nhận lại mật khẩu mới. <a href='".SITE_URL."'>Quay lại trang chủ</a>");	
					}
				}
				else
				{
					$oSmarty->assign("error", "Lỗi cập nhật thông tin, vui lòng thử lấy lại mật khẩu: <a href='".SITE_URL."admin.php?mod=user&task=password'>tại đây</a>");					
				}
				
			}
			else
			{
				$oSmarty->assign("error", "Lỗi truy cập hệ thống. <a href='".SITE_URL."'>Quay lại trang chủ</a>");
			}
			
		}
		else
		{
			if($_SERVER['REQUEST_METHOD']=="POST")
			{

				$user= $oDb->getRow("select * from user where username='".$_POST["tex_username"]."'");
				if(count($user)>0)
				{
									
					if($user["is_active"]=="0")
					{		
						$oSmarty->assign("error", "Tài khoản đang bị khóa !");	
					}
					elseif($user["email"]!=$_POST["tex_email"])
					{		
						$oSmarty->assign("error", "Bạn nhập sai email! Vui lòng thử lại");																
					}
					else
					{						
						$setpasskey= md5(rand(123456,654321));
						
						$setpasslink= SITE_URL."admin.php?mod=user&task=password&setpass=".base64_encode($_POST["tex_email"].",".$_POST["tex_username"].",".$setpasskey);
						
						$oDb->query("update user set setpasskey='$setpasskey' where username='".$_POST["tex_username"]."'");
						
						/*$oSmarty->get_config_vars("msg");*/
						
						$subject= "Kich hoat mat khau moi cho tai khoan tren website" .SITE_URL;						
						$content= "Chao ban, ban da gui yeu cau kich hoat lai mat khau cho tai khoan: ".$_POST["tex_username"]." ban click vao lien keu sau de kich hoat mat khau moi: <a href='$setpasslink'>Kich hoat mat khau moi</a>";
						
						/*gui mail trong PHP, chi chay dc khi may chu cho phep chay ham mail() . co SMTP server de gui mail*/
						
						/*SMTP authen co tk email, dung thu vien phpmailer*/
						/*sendMail("ngotuanhung2003@gmail.com", "Ngo tuan hung", "em chao dai ka", "chao ban");*/
						
						/*if(!mail($_POST["tex_email"], $subject, $content))
							$oSmarty->assign("error", "Lỗi trong quá trình gửi mail");
						else
							$oSmarty->assign("error", "Bạn vui lòng kiểm tra email để kích hoạt mật khẩu mới");	*/	
							
						if(!sendMail($_POST["tex_email"], $_POST["tex_username"], $subject, $content))
							$oSmarty->assign("error", "Lỗi trong quá trình gửi mail");
						else
							$oSmarty->assign("error", "Bạn vui lòng kiểm tra email để kích hoạt mật khẩu mới");
					
					}	
						
				}
				else
				{
					$oSmarty->assign("error", "Bạn nhập sai username hoặc email! Vui lòng thử lại");	
				}
			}					
		}
		$oSmarty->display('password.tpl');
	}

}
?>