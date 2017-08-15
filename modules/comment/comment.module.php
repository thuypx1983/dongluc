<?php
class comment extends base {	
	function run($task= "")
	{	
		$this->table = "comment";
		switch ($task)
		{
			case "load_comment_new":
				$this->load_comment_new();
				break;	
			case "load_comment_product":
				$this->load_comment_product(); 
				break;
			default:
				case "load_comment" :
				$this->load_comment();
				break;
		}
	}
	
	function load_comment_product()
	{
		
		$temp = $this->db->getRow("select id, title, parent_id from product_category where link = '{$_GET['cate']}' ");
		if($temp['parent_id']>0) {
			$temp = $this->db->getRow("select id, title, parent_id from product_category where id = '{$temp['parent_id']}' ");
			if($temp['parent_id']>0) {
				$temp = $this->db->getRow("select id, title, parent_id from product_category where id = '{$temp['parent_id']}' ");					
			}
		}
		
		$rows = $this->db->getAll("select * from comment where is_active = '1' AND parent_id = 0 AND product_id IN (SELECT id FROM product WHERE is_active = 1 AND ( product_category_id = '{$temp['id']}' OR product_category_id IN (SELECT id FROM product_category WHERE parent_id = '{$temp['id']}' ) )) order by create_date desc");
		$this->smarty->assign("rows", $rows);
		$this->smarty->display('load_comment_product.tpl');
	}
	
	function load_comment_new() {
		$rows = $this->db->getAll("select * from comment where is_active = '1' AND parent_id = 0 order by create_date desc limit 5");
		$this->smarty->assign("rows", $rows);
		$this->smarty->display('load_comment_new.tpl');
	}
	function load_comment() {
		/*echo "<em>Chức năng bình luận đang được bảo trì và sẽ được mở ra vào ngày 23/5/2014</em>";
		
		return;*/
		/* tạo comment */
		#echo '<pre>'; print_r($_POST); echo '</pre>';
		if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['submit_comment']==1) {
			if($_SESSION['captcha_a']+$_SESSION['captcha_b']==$_POST['captcha_c']) {
					$row = array(
						"type"          => $_POST["type"],
						"name"          => $_POST["name"],
						"parent_id"     => $_POST["parent_id"]+0,
						"email"         => $_POST["email"],
						"product_id"    => $_POST["type"]=="product"?$_POST["product_id"]:0,
						"product_title" => $_POST["product_title"],
						"link"          => $_POST["link"],
						"create_date"   => date("Y-m-d H:i:s"),
						/*"is_active"   => $_POST["is_active"]+0,*/
						"is_active"     => 1, /*set active*/
						"is_read"       => $_POST["is_read"]+0,
						"reply_to_name" => $_POST["reply_to_name"],
					);
					$rtn = "";
					if($_POST["reply_to_name"]!='') {
						$rtn = "<rep>@".$_POST["reply_to_name"]."</rep>";
					}
					$row["content"] = $rtn.strip_tags($_POST["content"]);
					
					$this->db->autoExecute("comment", $row, DB_AUTOQUERY_INSERT);
					$msg_success = "Cảm ơn bạn đã gửi câu hỏi cho chúng tôi";
					$_POST["content"] = "";
					unset($_SESSION['captcha_a']);
					unset($_SESSION['captcha_b']);
					#header('Location: '.$_SERVER['HTTP_REFERER']);
				} else {
				$msg_error = "Sai mã bảo mật vui lòng nhập lại!";
			}
			$this->smarty->assign("msg_success", $msg_success);
			$this->smarty->assign("msg_error", $msg_error);
			//alert($msg);
			//exit();
		}
		/* tạo session captcha */
		$_SESSION['captcha_a'] = rand(1, 10);
		$_SESSION['captcha_b'] = rand(1, 10);
		//$product_id = $this->db->getOne("SELECT id FROM product WHERE link = '{$_GET['link']}' ");
		// Đọc comment
		$cur_url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		
		$count_comment = $this->db->getAll("SELECT id FROM comment WHERE is_active = 1 AND link = '{$cur_url}' ");
		$this->smarty->assign("count_comment", count($count_comment));
		$order_by = " count_sub DESC, create_date ASC ";
		if($_GET['order_by']=='new') {
			$order_by = " id DESC ";
		}
		$comment = $this->db->getAll("
			SELECT 
				*,
				( SELECT count(id) FROM comment WHERE parent_id = c.id AND is_active = 1 ) as count_sub
			FROM comment c
			WHERE link = '{$cur_url}'
			AND parent_id = 0
			AND is_active = 1
			ORDER BY $order_by
		");
		
		foreach($comment as $k=>$v) {
			$comment[$k]["sub"] = $this->db->getAll("
				SELECT 
					*
				FROM comment
				WHERE link = '{$cur_url}'
				AND parent_id = '{$v['id']}'
				AND is_active = 1
				ORDER BY create_date ASC
			");
		}
		
		echo mysql_error();
		#echo '<pre>'; print_r($comment); echo '</pre>';
		$this->smarty->assign("comment", $comment);
		$this->smarty->display('load_comment.tpl');
	}
	
	function getDaysDiff($time) {
		$days = (strtotime(date("Y-m-d H:i:s")) - strtotime($time)) / (60 * 60);
		return round($days);
	}
}
?>