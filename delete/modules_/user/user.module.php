<?php
class user extends base
{
	function getcaptcha()
	{
		echo $_SESSION['key_captcha'];
	}
	function newcaptcha()
	{
		include("lib/captcha/captcha.class.php");
	}
	
	function password()
	{
		if($_GET["setpass"]!="" && $_SERVER['REQUEST_METHOD']!="POST")
		{		
			$setpass= explode(",", base64_decode($_GET["setpass"]));

			$email= $setpass[0];
			$username= $setpass[1];			
			$setpasskey= $setpass[2];
			
			$user= $this->db->getRow("select * from user where username='$username'");
			if(count($user)>0)
			{
				if($user["setpasskey"]==$setpasskey)
				{
					$newpass = rand(123456, 654321);
					$this->db->query("update user set password='". sha1(md5(PASSSWORD_HASH.$newpass)) ."', setpasskey='' where username='$username'");
					
					
					$this->smarty->assign("msg_success", "");	
					
					
					/*gửi mail kèm link xác nhận*/		
					$subject = "Mật khẩu mới trên trang PRWeb.vn";						
					$content = "<b>Xác nhận mật khẩu thành công.</b><br><br>Tên đăng nhập của bạn là: <b>{$username}</b><br>Mật khẩu mới của bạn là: <b>{$newpass}</b><br><br>Vui lòng đăng nhập và thực hiện đổi mật khẩu trong mục sửa thông tin tài khoản của bạn.";
											
					if(!sendMail($user["email"], $user["username"], $subject, $content)) {
						$this->smarty->assign("msg_success", "PRWeb.vn đã gửi cho bạn mật khẩu mới vào hòm thư <strong>".$user["email"]."</strong>. Vui lòng kiểm tra mail");	
					} else {					
						$this->smarty->assign("msg_error", "Lỗi: tài khoản <b>{$username}</b> không tồn tại, vui lòng thử lại");
					}
				}
				else
				{
					$this->smarty->assign("msg_error", "Lỗi: Yêu cầu lấy lại mật khẩu không thành công, vui lòng thử lại");					
				}
				
			}
			else
			{
				$this->smarty->assign("msg_error", "Lỗi: tài khoản <b>{$username}</b> không tồn tại, vui lòng thử lại");
			}
			$this->smarty->display('password_result.tpl');
			exit();	
		}
		
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			$_POST["text_email"] = trim($_POST["text_email"]);
			
			$user= $this->db->getRow("select * from user where email='".$_POST["text_email"]."'");
			
			if(count($user)>0)
			{				
				$setpasskey= md5(rand(123456, 654321));
				
				$setpasslink= SITE_URL."?mod=user&task=password&setpass=".base64_encode($user["email"].",".$user["username"].",".$setpasskey);
				
				$this->db->query("update user set setpasskey='$setpasskey' where email='".$user["email"]."'"); echo mysql_error();
				
				/*gửi mail kèm link xác nhận*/		
				$subject= "Xác nhận mật khẩu mới";						
				$content= "Xin chào: <b>{$user['username']}</b><br><br>";
				$content.= "Bạn vừa gửi yêu cầu lấy lại mật khẩu cho tài khoản của bạn trên PRWeb.vn, vui lòng click vào link bên dưới để xác nhận mật khẩu mới:<br><br>";
				$content.= "<a href='{$setpasslink}'>{$setpasslink}</a>";
										
				if(!sendMail($user["email"], $user["username"], $subject, $content)) {
					$msg = "false|";
					//$msg .= "Lỗi trong quá trình gửi mail";
					$msg .= $user["email"]." va ".$user["username"];
				} else {					
					$msg = "true|";
					$msg .= "Bạn vui lòng kiểm tra email để xác nhận mật khẩu mới";
				}
			}
			else
			{
				$msg = "false|";
				$msg .= "Không có ai đăng ký với Email này. Vui lòng kiểm tra lại";
			}
			echo $msg;
			return;
		}					
		
		$this->smarty->display('password.tpl');
	}
	
	function logout()
	{
		$this->db->query("update user set is_status=0, session_id='' where id={$_SESSION['user']['user_id']}");
		
		$sql= "insert into user_log(user_id, create_date, action) values({$_SESSION['user']['id']}, now(), 'Đăng xuất thành công')";
		$this->db->query($sql);
		setcookie("front_user_id", ''); /* xoa remember*/
		$_SESSION["user"] = array();
		
		$this->smarty->assign("msg_success", "Đăng xuất thành công ! Vui lòng chờ trong giây lát ...");
		
		redirect(SITE_URL, 2);
		
		$this->smarty->display('logout.tpl');
	}
	
	function setLogin($user)
	{
		$_SESSION["user"] = $user;	
		
		$this->db->query("update user set is_status=1, session_id='".session_id()."' where id={$_SESSION['user']['id']}");
		
		$sql= "insert into user_log(user_id, create_date, action) values({$user['id']}, now(), 'Đăng nhập thành công')";
		$this->db->query($sql);
		
		/* 
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
		} */
	}
	
	function login() {

		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			$user= $this->db->getRow("select * from user where email='".$_POST["tex_email"]."'");
			if(count($user)>0)
			{									
				if($user["password"]==sha1(md5(PASSSWORD_HASH.$_POST["tex_password"])))
				{
					if($user["is_active"]!="1") {
						$msg_error = "Tài khoản chưa kích hoạt, vui lòng kích hoạt tài khoản";
					}
					else
					{
						$this->setLogin($user);
						
						//if($_POST['remember_me'])
							//setcookie("front_user_id", $user["id"], time()+3600*24*7); /* luu 1 tuan */
							
						$msg_success = "Đăng nhập thành công. Đang chuyển hướng...";
					}
				}
				else {
					$msg_error = "Bạn nhập sai mật khẩu ! Vui lòng thử lại";
				}
			}
			else {
				$msg_error = "Tài khoản không tồn tại! Vui lòng thử lại";
			}
			$this->smarty->assign("msg_error", $msg_error);
			$this->smarty->assign("msg_success", $msg_success);
		}		
		//setcookie("front_user_id", ''); /* xoa remember*/
		$this->smarty->display('login.tpl');
	}
	
	function beginer() {
		if($_SESSION['user']["email"]!='') {
			redirect(SITE_URL);
			alert('Bạn đã đăng nhập rồi');
			exit();
		}
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{	
			if(isset($_POST['dangnhap'])) {
				$this->login();
			}
			else if(isset($_POST['dangky'])) {
				$this->register();		
			}
		}
		
		//$this->smarty->display('register.tpl');
	}
	
	function active()
	{
		$where= "";
		$email= "";	
		//print_r($_GET);
		/*kiem tra neu active tu API*/
		if(strpos($_GET['email'], '@')!==false)
		{
			$where= " where email='".$_GET['email']."' ";
		}			
		else
		{
			$where= " where md5(id)='".$_GET['code']."' ";
			$email= base64_decode($_GET['email']);
		}
		//echo $where;
		$user= $this->db->getRow("select * from user {$where}");
		if(count($user)>0)
		{
			if($user['is_active']==1)
			{
				$this->smarty->assign("msg_error", "Tài khoản <b>{$user['username']}</b> đã được kích hoạt trước đó rồi, vui lòng đăng nhập để sử dụng dịch vụ");
			}
			else
			{
				
				$sql= "update user set is_active=1";
				if($email!='')
					$sql.= ", email='{$email}'";
				$sql.= " {$where} and is_active!=-1";
				
				$this->db->query($sql); echo mysql_error();
				
				$this->smarty->assign("msg_success", "Tài khoản của bạn đã được kích hoạt thành công. Vui lòng đăng nhập để sử dụng dịch vụ");
			}
			
			//redirect("?mod=user&task=login", 2);
		}
		else
		{
			$this->smarty->assign("msg_error", "Tài khoản người dùng không tồn tại, vui lòng kiểm tra lại");	
			//redirect("?mod=user&task=reSendEmail", 2);
		}
		
		$this->smarty->display("active.tpl");
	}
	
	function reSendEmail()
	{
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			$user= $this->db->getRow("select * from user where username='".$_POST["username"]."'");
					
			if(count($user)>0)
			{		
							
				if($user["password"]==sha1(md5(PASSSWORD_HASH.$_POST["password"])))
				{	
					$email= $user['email'];
					
					$exist= 0;
					if($_POST['email']!='')
					{
						$exist= $this->db->getOne("select id from user where email='{$_POST['email']}' and username!='".$_POST["username"]."' ");
						
						$email= $_POST['email'];
					}
					
					if($exist==0)
					{
						$id= $user['id'];
						
						$subject= "Kích hoạt tài khoản";						
						$content= "Xin chào: <b>{$_POST['username']}</b><br><br>";
						$content.= "Bạn vừa gửi yêu cầu kích hoạt lại tài khoản trên Textlink.vn, vui lòng click vào link dưới đây để kích hoạt tài khoản của bạn:<br/><br/>";
						$content .= "<a href='".SITE_URL."?mod=user&task=active&code=".md5($id)."&email=".base64_encode($_POST['email'])."'>".SITE_URL."?mod=user&task=active&code=".md5($id)."&email=".base64_encode($_POST['email'])."</a><br/><br/>";
						$content .= "Hoặc bạn cũng có thể copy đường link trên past lên thanh địa chỉ của trình duyệt nếu không click được vào link.";
						
						
							
						if(!sendMail($email, $_POST["username"], $subject, $content))
						{
							$this->smarty->assign("msg_error", "Lỗi trong quá trình gửi mail");
						}
						else
						{
							$this->smarty->assign("msg_success", "Mail xác nhận kích hoạt tài khoản đã được gửi tới hòm thư: <b></b> của bạn. Vui lòng kiểm tra email để kích hoạt tài khoản");
						}
					}
					else
					{
						$this->smarty->assign("msg_error", "Email đã đã được sử dụng cho tài khoản khác, vui lòng thử lại với email khác");
					}
				}								
				else
				{
					$this->smarty->assign("msg_error", "Bạn nhập sai password ! Vui lòng thử lại...");	
				}
			}
			else
			{
				$this->smarty->assign("msg_error", "Bạn nhập sai username ! Vui lòng thử lại...");	
			
			}
		}
		$this->smarty->display('re_send.tpl');
	}
	
	function checkIsset()
	{
		if($_REQUEST["username"]!="")
		{
			$test = $this->db->getOne("select username from user where username='{$_REQUEST[username]}'");
			if($test!="")
				echo "ok";
			else
				echo "not";
		}
		else if($_REQUEST["email"]!="")
		{
			$test = $this->db->getOne("select email from user where email='{$_REQUEST[email]}'");
			if($test!="")
				echo "ok";
			else
				echo "not";	
		}

	}
	
	/*
	function thongbao()
	{
		if($_GET["code"]!="")
		{
			$code = $this->db->getAll("select * from user where md5(id) = '{$_GET[code]}'");
			if(count($code)>0)
			{
				$this->db->query("update user set is_active = 1 where id = '{$code[0][id]}'");
				echo "chao mung ".$cod["username"]." den voi textlink.vn";
				$_SESSION["is_reg"] = "";
			}
			else
				header("location: ?mod=user&task=login");
		}
		else
		{
			$this->smarty->display('thongbao.tpl');
		}
	}
	*/
	
	function authentication()
	{
		if(empty($_SESSION["user"]))
			header("location: ".SITE_URL."?mod=user&task=login");
	}
	
	function upgrade()
	{
		$this->authentication();
		
		if($_SESSION["user"]["utype"]!='pub+adv')
		{
			if($_SERVER["REQUEST_METHOD"]=="POST")
			{
				$this->db->query("update user set utype='pub+adv' where id = '{$_SESSION[user][id]}'");
				$_SESSION["user"]["utype"] = "pub+adv";
				
				redirect(SITE_URL."?mod=user&task=update_profile");
			}
			
			$this->smarty->display('upgrade_utype.tpl');
		}
		else
		{
			redirect(SITE_URL."?mod=user&task=update_profile");	
		}
	}
	
	function confirmNewMail()
	{
		$msg_error= "";
		$msg_success= "";
			
		$user= $_GET['user'];
		$user= explode("|", base64_decode($user));
		
		if(count($user)==2)
		{
			$exist= $this->db->getOne("select id from user where id='{$user[0]}' and new_email='{$user[1]}'");
			if(!($exist>0))
			{
				$msg_error= "Có lỗi xảy ra, vui lòng thực hiện lại!";
			}
		}
		else
		{
			$msg_error= "Có lỗi xảy ra, vui lòng thực hiện lại!";			
		}
		
		if($msg_error=="")
		{
			$this->db->query("update user set email=new_email, new_email='' where id='{$user[0]}'");
			echo mysql_error(); 
			$msg_success= "Cập nhật thành công email \"{$user[1]}\" mới cho tài khoản của bạn.";
		}
		
		$this->smarty->assign("msg_error", $msg_error);
		$this->smarty->assign("msg_success", $msg_success);
		$this->smarty->display("confirm_new _mail.tpl");
	}
	
	function history() {
		
		$sql = "
				select 
				t1.title, t1.photo, t1.giaohang, t1.create_date,
				t2.price, t2.quantity, t2.discount,
				t3.is_process
				from product t1 left join order_detail t2
				on t2.product_id = t1.id left join orders t3
				on t3.id = t2.order_id
				where t3.user_id = {$_SESSION['user']['id']}
				order by t1.create_date desc
			";
		$rows = $this->db->getAll($sql);
		echo mysql_error();
		$this->smarty->assign("rows", $rows);
		$this->smarty->display('history.tpl');
	}
	
	function update_profile()
	{
		$this->authentication();
		$this->imagePath = 'upload/avatar/';
		$this->imageThumb = 'upload/avatar/thumb/';
		
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			/*
			echo "<pre>";print_r($_POST);echo "</pre>";
			return;*/
			
			$msg_error= "";
			$msg_success= "";
			
			$row= array(
				"fullname" => $_POST["fullname"],
				"phone" => $_POST["phone"],
				"address" => $_POST["address"],
			);
			
			if($_POST["che_delphoto"]=="on")
			{
				if(is_file($this->imagePath.$_POST["hid_oldphoto"]))
					$this->unlinkPhoto($this->imagePath, $_POST["hid_oldphoto"]);
				$row["avatar"]= "";		
			}
			if($_FILES['avatar']['name']!='')
			{
				$row['avatar']= $_FILES['avatar']['name'];
				$this->thumbSave($_FILES['avatar']['tmp_name'], $this->imagePath.$_FILES['avatar']['name']);
				$this->thumbSave($_FILES['avatar']['tmp_name'], $this->imageThumb.$_FILES['avatar']['name'], 300, 250, "");
			}
			
			$user = $this->db->getRow("select * from user where id = '{$_SESSION[user][id]}'");
			
			if($user["password"]!=sha1(md5(PASSSWORD_HASH.$_POST["password"])))
			{
				$msg_error.= "Mật khẩu cũ không đúng.";
			}

			if($_POST["password_new"]!="")
			{
				$row["password"] = sha1(md5(PASSSWORD_HASH.$_POST["password_new"]));
			}
			
			if($msg_error=="")
			{
				$this->db->autoExecute("user", $row, DB_AUTOQUERY_UPDATE, "id = '{$_SESSION[user][id]}'");
                $msg_success = "Cập nhật thành công.";
			}
			$this->smarty->assign("msg_error", $msg_error);
			$this->smarty->assign("msg_success", $msg_success);
		}
		
		$row = $this->db->getRow("select * from user where id = '{$_SESSION[user][id]}'");
		$this->smarty->assign("row", $row);
		
		$this->smarty->display('update_profile.tpl');
	}
	
	function register()
	{
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{	
			if(strcasecmp($_SESSION['key_captcha'], $_POST['captcha']))
			{
				$this->smarty->assign("msg_error", "Sai mã bảo mật"); 
				$msg_error = "Sai mã bảo mật";
			}
			else
			{
				$user= $this->db->getRow("select * from user where email='{$_POST['email']}'");
				
				if(count($user)>0 && $user['email']== $_POST["email"]) {
					$msg_error = "Email đã được sử dụng";
				} else {
					$user_type_id = $this->db->getOne("select id from user_type where is_registered=1")+0;
					
					$row= array(
						"username" => $_POST["email"],
						"email" => $_POST["email"],
						"password" => sha1(md5(PASSSWORD_HASH.$_POST["password"])),
						"is_active" => 0,
						"user_type_id" => $user_type_id,
						"create_date" => date("Y-m-d H:i:s"),
						"phone" => $_POST["phone"],
						"fullname" => $_POST["fullname"],
						"address" => $_POST["address"],
					);
					$email= $_POST["email"];
					$this->db->autoExecute("user", $row, DB_AUTOQUERY_INSERT); echo mysql_error();
					
					$id = mysql_insert_id();	
					
					if(mysql_error()!='')
					{
						$msg_error = "Lỗi trong quá trình đăng ký tài khoản, vui lòng thử lại";
					} else 	{
						
						/*Gửi email thông thường*/
						
						$subject= "Đăng ký tài khoản trên ".SITE_ALIAS;
						$content= "Xin chào: <b>{$_POST['email']}</b><br><br>";
						$content.= "Bạn vừa đăng ký tài khoản trên ".SITE_ALIAS.", để bắt đầu sử dụng dịch vụ lòng click vào link dưới đây để kích hoạt tài khoản của bạn:<br/><br/>";
						$content .= "<a href='".SITE_URL."?mod=user&task=active&code=".md5($id)."&email=".base64_encode($_POST['email'])."'>".SITE_URL."?mod=user&task=active&code=".md5($id)."&email=".base64_encode($_POST['email'])."</a><br/><br/>";
						$content .= "Hoặc bạn cũng có thể copy đường link trên và paste lên thanh địa chỉ của trình duyệt nếu không click được vào link.";
				
						if(!sendMail($email, $_POST["username"], $subject, $content)) {
							
							$msg_error = "Đăng ký tài khoản thành công<br />Tuy nhiên đã xảy ra lỗi trong quá trình gửi mail <a href=''>Thử lại</a>";
						}
						else {
							$msg_success = "Đăng ký tài khoản thành công<br />Mail xác nhận kích hoạt tài khoản đã được gửi tới hòm thư: <b>".$email."</b> của bạn. Vui lòng kiểm tra email để kích hoạt tài khoản";
						}
					}
				}
			}		
			$this->smarty->assign("msg_error", $msg_error);
			$this->smarty->assign("msg_success", $msg_success);
		}
		$province = $this->db->getAssoc("select id, title from province order by title asc");
		$this->smarty->assign("province", $province);
		$this->smarty->display('register.tpl');
	}
	
	function sendEmailActive($id)
	{
		$subject= "Chào mừng bạn đến với " .SITE_URL;						
		$content= "Kích vào đây luôn và ngay để kích hoạt tài khoản của bạn";
		$content .= "<br/><a href='".SITE_URL."?mod=user&code=".md5($id)."'>Hot</a>";
		
		if(!sendMail($_POST["email"], $_POST["username"], $subject, $content))
		{
			$this->smarty->assign("error_echo", "Lỗi trong quá trình gửi mail");
			return false;
		}
		else
		{
			$this->smarty->assign("error_echo", "Bạn vui lòng kiểm tra email để kích hoạt mật khẩu mới");
			return true;
		}
	}
	
	
	function getPageinfo($task="")
	{
		$page= array("");
		switch($task)
		{
			case "update_profile": 
				$page["title"]= "Thông tin tài khoản";
				$page["description"]= "Thông tin tài khoản";
				$page["keyword"]= "Thông tin tài khoản";
				break;
			case "history": 
				$page["title"]= "Hóa đơn của bạn";
				$page["description"]= "Hóa đơn của bạn";
				$page["keyword"]= "Hóa đơn của bạn";
				break;
			case "login": 
				$page["title"]= "Đăng nhập";
				$page["description"]= "Đăng nhập";
				$page["keyword"]= "Đăng nhập";
				break;
			case "register":
				$page["title"]= "Đăng ký";
				$page["description"]= "Đăng ký";
				$page["keyword"]= "Đăng ký";
				break;
			case "password": 
				$page["title"]= "Lấy lại mật khẩu - ".SITE_ALIAS;
				$page["description"]= "Lấy lại mật khẩu - ".SITE_ALIAS;
				$page["keyword"]= "Lấy lại mật khẩu - ".SITE_ALIAS;
				break;
			case "active": 
				$page["title"]= "Kích hoạt tài khoản - ".SITE_ALIAS;
				$page["description"]= "Kích hoạt tài khoản - ".SITE_ALIAS;
				$page["keyword"]= "Kích hoạt tài khoản - ".SITE_ALIAS;
				break;
			case "list": 
				$page["title"]= "ten nhom";
				$page["description"]= "ten nhom";
				$page["keyword"]= "ten nhom";
				break;
			case "detail": 
				//doc trong csdl ra
				$row= $this->db->getRow("select title, description from product where id='{$_GET[id]}'");
				$page["title"]= $row["title"];
				$page["description"]= $row["description"];
				$page["keyword"]= "ten nhom";
				break;	
		}
		return $page;
	}

}

?>