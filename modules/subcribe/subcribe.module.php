<?php
class subcribe extends base
{
	function run($task, $param="")
	{
		switch($task)
		{
			case 'footer':
				$this->subcribe_footer();
				break;
			default:
				$this->home(); 
				break;
		}
	}

	function subcribe_footer()
	{
		$this->smarty->display("subcribe_footer.tpl");
	}
	function home() {
		#echo '<pre>'; print_r($_GET); echo '</pre>';
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			if(strcasecmp($_SESSION['key_captcha'], $_POST['register_captcha']))
			{
				$this->smarty->assign("msg_error", "Sai mã bảo mật"); 
				$msg_error = "Sai mã bảo mật";
			}
			else
			{
				$exit = $this->db->getAll("SELECT * FROM register_contact WHERE email = '{$_POST['register_email']}' ");
				if (count($exit) > 0) {
					$msg_error = "Email đã tồn tại!";
				} else {
					$row = array(
						"email" => $_POST["register_email"],
						"create_date"=>date("Y-m-d H:i:s")
					);
					$this->db->autoExecute("register_contact", $row, DB_AUTOQUERY_INSERT);
					$msg_success = "Đăng ký nhận tin thành công!" . mysql_error();	
				}
			}
			$this->smarty->assign("msg_error", $msg_error);
			$this->smarty->assign("msg_success", $msg_success);
		}
        $this->smarty->display("subcribe.tpl");
	}

  	function getPageinfo($task="")
	{
		$page = array(
			"title"       => "Đăng ký nhận tin",
			"description" => "Đăng ký nhận tin",
			"keyword"     => "Đăng ký nhận tin",
		);
		return $page;
	} 
}
?>