<?php
class contact extends base
{
	function run($task="")
	{		
		switch( $task ){
			case "map":
				$this->mapContact();
				break;
			case "ask":
				$this->formContact();
				break;
			default:
				$this->showContact();
				break;
		}
	}
	
	function mapContact()
	{
		$where = " WHERE is_active = 1 ";
		$order = " ORDER BY z_index DESC ";		
		
		$branch = $this->db->getAll("SELECT * FROM network_mangluoi $where $order ");
		foreach ($branch as $k=>$v)
		{
			$temp = $this->db->getRow("SELECT * FROM network_vitri $where AND mangluoi_id = '{$v['id']}' ORDER BY is_primary DESC ");
			$branch[$k]["lat"] = $temp["lat"];
			$branch[$k]["lon"] = $temp["lon"];
		}
		$marker = $this->db->getAll("SELECT * FROM network_vitri $where ORDER BY title ASC ");
		foreach ($marker as $k=>$v)
		{
			//$marker[$k]["content"] = htmlentities($v["content"], ENT_QUOTES, "UTF-8");
			//$marker[$k]["content"] = trim($v["content"]);
			$marker[$k]["content"] = preg_replace( "/\r|\n/", "", $v["content"]);
			
		}
		$this->smarty->assign("branch", $branch);
		$this->smarty->assign("marker", $marker);
		$this->smarty->display("mapContact.tpl");
	}
	
	function formContact()
	{	
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			
			if(strcasecmp($_SESSION['key_captcha'], $_POST['captcha']))
			{
				alert("Sai mã bảo mật!");
			}
			else
			{
				$row = array(
					"email" => $_POST["email"],
					"fullname" =>$_POST["fullname"],
					"phone"=>$_POST["phone"],
					"message"=>$_POST["message"],
					"create_date"=>date("Y-m-d H:i:s"),
				);
				$this->db->autoExecute("register_contact", $row, DB_AUTOQUERY_INSERT);
				
				//send email
				$subject= "Đăng ký học thử tại ".SITE_ALIAS.": ".$_POST['fullname'];
				$content= "<b>Xin chào ".SITE_ALIAS." !</b><br /><br />";
				$content.= "Tên học viên: ".$_POST['fullname']."<br />Số ĐT: ".$_POST['phone']."<br />Email: ".$_POST['email']."<br /><br />";
				$content.= "Khóa học đăng ký: ".$_POST['message']."<br /><br />";
				
				//$email_contact = "hung.ngo@netlink.vn";
				$email_contact = $this->db->getOne("select email_contact from contact");
				$email_contact = $email_contact!=''?$email_contact:"hung.ngo@netlink.vn";
				$email_contact = trim($email_contact);

				if(!sendMail($email_contact, $_POST['fullname'], $subject, $content, $_POST['email'], $_POST['email']))
				{
					alert("Chưa gửi được Email, vui lòng thử lại hoặc kiểm tra kết nối mạng!");
				}
				else
				{
					alert("Đã gửi thành công, chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất!");
				}
			}
		}
		
		$row = $this->db->getRow("select * from contact WHERE lang = '{$_SESSION['lang']}' ");
		$row["support"] = stripslashes($row["support"]);
		$this->smarty->assign("row", $row);
		
		$khoahoc_option = $this->db->getAssoc("SELECT title, title FROM news_category WHERE menu_type = 'khoa-hoc-tieng-nhat'");
		$this->smarty->assign("khoahoc_option", $khoahoc_option);
		
		$this->smarty->display("formContact.tpl");
	}
	
	function showContact()
	{	
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			
			if(strcasecmp($_SESSION['key_captcha'], $_POST['captcha']))
			{
				alert("Sai mã bảo mật!");
			}
			else
			{
				/*$row = array(
					"email" => $_POST["email"],
					"fullname" =>$_POST["fullname"],
					"phone"=>$_POST["phone"],
					"message"=>$_POST["message"],
					"create_date"=>date("Y-m-d H:i:s"),
				);
				$this->db->autoExecute("register_contact", $row, DB_AUTOQUERY_INSERT);*/
				
				//send email
				$subject= "Thư liên hệ từ ".SITE_ALIAS.": ".$_POST['fullname'];
				$content= "<b>Xin chào ".SITE_ALIAS." !</b><br /><br />";
				$content.= "Tên khách hàng: ".$_POST['fullname']."<br />Số ĐT: ".$_POST['phone']."<br />Email: ".$_POST['email']."<br /><br />";
				$content.= "Thông điệp muốn gửi: ".$_POST['message']."<br /><br />";
				
				
				$email_contact = $this->db->getOne("select email_contact from contact");
				$email_contact = $email_contact!=''?$email_contact:"hung.ngo@netlink.vn";
				$email_contact = trim($email_contact);
				
				if(!sendMail($email_contact, $_POST['fullname'], $subject, $content, $_POST['email'], $_POST['email']))
				{
					alert("Chưa gửi được Email, vui lòng thử lại hoặc kiểm tra kết nối mạng!");
				}
				else
				{
					alert("Đã gửi thành công, chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất!");
				}
			}
		}
		
		$row = $this->db->getRow("select * from contact WHERE lang = '{$_SESSION['lang']}' ");
		$row["info"] = stripslashes($row["info"]);
		$this->smarty->assign("row", $row);
		
		$this->smarty->display("showContact.tpl");	
	}
	
	function getPageinfo($task="") {
		if ($task=='ask')
			return $page = array(
				'title'=>'Đăng ký học thử',
				'description'=>'Đăng ký học thử',
				'keyword'=>'Đăng ký học thử'
			);
		else	
		return $page = array(
			"title"=>$this->smarty->getConfigVariable("contact_title"),
			"description"=>$this->smarty->getConfigVariable("contact_description"),
			"keyword"=>$this->smarty->getConfigVariable("contact_keyword"),
		);
	}
}
?>