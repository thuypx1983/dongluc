<?php
class product extends base
{
	var $table = "product";
	var $table_category = "product_type";
	var $table_group = "product_group";
	var $table_type = "type";
	
	function run($task, $param="")
	{
		$this->table = "product";
		$this->table_product_type = "product_type";
		$this->table_type = "type";
		$this->where = " WHERE lang = '{$_SESSION['lang']}' AND is_active = 1 ";
		$this->order = " ORDER BY z_index DESC, create_date DESC ";
		$this->pre = "mua-hang-truc-tuyen";
		
		switch($task)
		{
			case "menu": 
				$this->menu(); 
				break;
			case "menu_responsive": 
				$this->menu_responsive(); 
				break;	
			case "search"; 
				$this->search(); 
				break;	
			case "cart_info"; 
				$this->cart_info(); 
				break;	
			case "detail": 
				$this->detail(); 
				break;
			case "category": 
				$this->category($param); 
				break;
			case "book": 
				$this->showBook(); 
				break;
			case "book_detail": 
				$this->book_detail(); 
				break;
			case "cart_add": 
				$this->cart_add(); 
				break;
			case "cart_del": 
				$this->cart_del(); 
				break;
			case "cart_clear": 
				$this->cart_clear(); 
				break;
			case "cart_update": 
				$this->cart_update(); 
				break;
			case "cart_save": 
				$this->cart_save(); 
				break;
			case "cart_view": 
				$this->cart_view(); 
				break;
			case "filter": 
				$this->filter(); 
				break;	
			case "list_top_home": 
				$this->list_top_home(); 
				break;	
			case "list_top": 
				$this->list_top(); 
				break;	
			case "list_type": 
				$this->list_type(); 
				break;
			case "rating": 
				$this->rating(); 
				break;	
			default: case "list": 
				$this->showList(); 
				break;
			default: case "slider_left":
				$this->slider_left();
				break;
		}
		
	}
	
	function rating()
	{
		if($_GET['ajax'] == "true") {
			#echo '<pre>'; print_r($_POST); echo '</pre>';
			if($_SESSION['captcha_raty_a']+$_SESSION['captcha_raty_b']==$_POST['captcha_raty_c']) {
				$row = array(
					"product_id"  => $_POST["product_id"]+0,
					"score"       => $_POST["rating"]+0,
					"subject"     => $_POST["subject"],
					"content"     => strip_tags($_POST["content"]),
					"create_date" => date("Y-m-d H:i:s")
				);
				$this->db->autoExecute("product_rating", $row, DB_AUTOQUERY_INSERT);

				unset($_SESSION['captcha_raty_a']);
				unset($_SESSION['captcha_raty_b']);
				echo mysql_error();
			} else {
				echo 'false|Sai mã bảo mật|'.$_SESSION['captcha_raty_a'].'+'.$_SESSION['captcha_raty_b'].' = |';
			}
			exit();
		}
		if(!isset($_SESSION['captcha_raty_a'])) {
			$_SESSION['captcha_raty_a'] = rand(1, 10);
			$_SESSION['captcha_raty_b'] = rand(1, 10);
		}

		$this->smarty->display("rating.tpl");
	}

	function search()
	{
		$this->smarty->display("search.tpl");
	}

	function cart_info()
	{
		$this->smarty->display("cart_info.tpl");
	}

	function filter()
	{
		// chuan bi viet
		$filter["color"]    = $this->db->getAll("SELECT * FROM product_color ORDER BY z_index DESC");      
		$filter["size"]     = $this->db->getAll("SELECT * FROM product_size ORDER BY z_index DESC");         
		$filter["material"] = $this->db->getAll("SELECT * FROM product_material ORDER BY z_index DESC");
		$filter["price"]    = $this->db->getAll("SELECT * FROM product_price ORDER BY id DESC");      

		$this->smarty->assign("filter", $filter);
		$this->smarty->display("filter.tpl");
	}

	function list_top_home()
	{
		$rows = $this->db->getAll("
				SELECT id, title, link, photo, code, price_sale, 
				REPLACE( link_out, 'http://', 'https://' ) AS link_out
				FROM {$this->table}
				WHERE is_top = 1
				ORDER BY z_index DESC LIMIT 20
			");
		echo mysql_error();
		$this->smarty->assign("rows", $rows);
		$this->smarty->display("list_top_home.tpl");
	}

	function list_top()
	{
		// chuan bi viet
		$this->smarty->display("list_top.tpl");
	}

	function list_type()
	{
		$rows = $this->db->getAll("
				SELECT id, title, link, link_to, thumb
				FROM {$this->table_product_type}
				WHERE parent_id = 0
				ORDER BY z_index DESC
			");
		echo mysql_error();
		$this->smarty->assign("rows", $rows);
		$this->smarty->display("list_type.tpl");	
	}

	function cart_add() {
		$not_exist= true;
		if(isset($_POST["quantity"]) && is_numeric($_POST["quantity"]) && $_POST["quantity"] > 0) {
			$quantity = $_POST["quantity"];
		} else {
			$quantity = 1;
		}
		//kiem tra san pham co trong gio hang chua ?
		foreach($_SESSION["cart"] as $k=> $row)	{
			if($row["id"]==$_POST["id"]) {
				//$_SESSION["cart"][$k]["quantity"] = $_SESSION["cart"][$k]["quantity"]+$quantity;
				$_SESSION["cart"][$k]["quantity"] = $quantity;
				$not_exist= false;
				break;
			}
		}
		
		if($not_exist) {
			$row = $this->db->getRow("SELECT * FROM {$this->table} WHERE id = '{$_POST['id']}' ");
			$_SESSION["cart"][] = array(
				"id"         => $_POST["id"], 
				"title"      => base64_encode($row["title"]),
				"quantity"   => $quantity,
				"link"       => $_POST["link"],
				"color_name" => $_POST["color_name"],
				"color_code" => $_POST["color_code"],
				"size"       => $_POST["size"],
				"price"      => $row["price_sale"],
				"price_goc"  => $row["price"],
				"discount"   => $row["discount"],
				"photo"      => $row["photo"],
				"is_format"  => 0,
			);
		}
		//redirect(SITE_URL."gio-hang/");
		//$this->smarty->display("cart_view.tpl");
		//$this->smarty->display("ajax_cart_view.tpl");
	}
	
	function cart_del()	{
		foreach($_SESSION["cart"] as $k=>$row)
		{
			if($row["id"] == $_POST["id"])
			{
				unset($_SESSION["cart"][$k]);
				break;
			}
		}
		//$this->smarty->display("ajax_cart_view.tpl");
		$this->smarty->display("cart_view_ajax.tpl");
	}

	function cart_clear() {
		$_SESSION["cart"]= array();
		//$this->smarty->display("ajax_cart_view.tpl");
		$this->smarty->display("cart_view_ajax.tpl");
	}
	
	function cart_save()
	{
		if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST["cart_save"]))
		{
			if (count($_SESSION["cart"])>0)
			{
				$user_id = 0;
				if($_SESSION['user']['id']>0) {
					$user_id = $_SESSION['user']['id'];
				}
				
				$row = array(
					"user_id"     => $user_id,
					"address"     => $_POST["address"],
					"email"       => $_POST["email"],
					"name"        => $_POST["fullname"],
					"cust_note"   => $_POST["message"],
					"phone"       => $_POST["phone"],
					"province"    => $_POST["province"],
					"is_process"  => 0,
					"create_date" => date("Y-m-d H:i:s"),
				);
					
				$this->db->autoExecute("orders", $row, DB_AUTOQUERY_INSERT);
				echo mysql_error();
				$orders_id = mysql_insert_id();
				
				foreach($_SESSION["cart"] as $cart)
				{
					$ins = array(
						"order_id"   => $orders_id,
						"product_id" => $cart["id"],
						"price"      => $cart["price"],
						"price_text" => $cart["price_text"],
						"quantity"   => $cart["quantity"],
						"color_name" => $cart["color_name"],
						"color_code" => $cart["color_code"],
						"size"       => $cart["size"],
						"discount"   => $cart["discount"],
						"price_goc"  => $cart["price_goc"],
					);
					
					$this->db->autoExecute("order_detail", $ins, DB_AUTOQUERY_INSERT);
					
				}
				$this->smarty->assign('is_success', 1);
				/*xóa giỏ hàng*/
				$_SESSION["cart"] = array();
				
				$sql = "
					SELECT 
						t1.title, t1.code, 
						t2.price, t2.quantity, t2.discount, t2.price_goc, t2.color_code, t2.color_name, t2.size
					FROM product t1 LEFT JOIN order_detail t2 ON t1.id = t2.product_id 
					WHERE t2.order_id = '{$orders_id}' ";

				$list =  $this->db->getAll($sql);
				
				$this->smarty->assign('list', $list);
				
				//send email
				$subject= "Mua hàng trực tuyến trên ".SITE_ALIAS.": ".$_POST['fullname'];
				$content= "<b>Xin chào ".SITE_ALIAS." !</b><br /><br />";
				$content.= "Tên khách hàng: ".$_POST['fullname']."<br />Số ĐT: ".$_POST['phone']."<br />Email: ".$_POST['email']."<br /><br />";
				$content.= "Lời nhắn: ".$_POST['message']."<br /><br />";
				$content.= "Đã tạo một đơn hàng trên ".SITE_ALIAS." với những sản phẩm:<br/><br/>";
				$content .= $this->smarty->fetch('email_temp.tpl');
				$content .= "<br/><br/>";
				
				$email_contact = $this->db->getOne("select email_contact from contact");
				$email_contact = $email_contact!=''?$email_contact:"hung.ngo@netlink.vn";
				$email_contact = trim($email_contact);
				$email_contact = "hung.ngo@netlink.vn";
				
				if(!sendMail($email_contact, $_POST['fullname'], $subject, $content, $_POST['email'], $_POST['email']))
				{
					//alert("Chưa gửi được Email, vui lòng thử lại hoặc kiểm tra kết nối mạng!");
				}
				else
				{
					//alert("Đã gửi thành công, chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất!");
				}
				
				
			}
			else
			{
				alert("Tạo đơn hàng thành công! Chúng tôi sẽ liên hệ với quý khách hàng trong thời gian ngắn nhất. Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi.");
				redirect(SITE_URL);
				return "";
			}
		}
		
		$row = $_SESSION['user'];
		if(!$row) {
			$row = $_POST;
		} else {
			$row = $this->db->getRow("SELECT * FROM user WHERE id = '{$_SESSION['user']['id']}' ");
		}
		$this->smarty->assign("row", $row);
		
		$province = $this->db->getAssoc("SELECT title, title FROM province ORDER BY title ASC");
		$this->smarty->assign("province", $province);
		$this->smarty->display("cart_save.tpl");
	}
	
	function cart_view()
	{
		// function is here...
		
		if($_SERVER['REQUEST_METHOD']=="POST" && !isset($_POST["cart_save"]))
		{
			foreach($_POST["id"] as $k=>$id)
			{
				foreach($_SESSION["cart"] as $k1=>$row)
				{
					if($row["id"] == $id)
					{
						if(is_numeric($_POST["quantity"][$k]) && $_POST["quantity"][$k] > 0)
						{
							$_SESSION["cart"][$k1]["quantity"] = $_POST["quantity"][$k];
						}
					}
				}
			}
			//$this->smarty->display("cart_view_result.tpl");
			$this->smarty->display("cart_view_ajax.tpl");
			return;
		}
		
		if (isset($_SESSION["cart"]))
		{
			foreach($_SESSION["cart"] as $k=>$v)
			{
				// format lai gia tien ve integer, title ve endcode
				if($v["is_format"]==0)
				{
					$_SESSION["cart"][$k]["title"]      = base64_decode($v["title"]);
					$_SESSION["cart"][$k]["price_text"] = $v["price"];
					$_SESSION["cart"][$k]["price"]      = preg_replace("/[^0-9]/", "", $v["price"]);
					$_SESSION["cart"][$k]["is_format"]  = 1;
				}
			}
		}
		$this->smarty->display("cart_view.tpl");
	}
	
	function category($param="")
	{
		
		$order = " ORDER BY z_index DESC ";

		/*menu 4 cap*/
		$rows = $this->db->getAll("SELECT id, title, link, link_to, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND parent_id = 0 $order ");
		if($_GET['pid']!='') {
			$_GET['id'] = $this->db->getOne("SELECT product_type_id FROM {$this->table} WHERE id = '{$_GET['pid']}'");
		}
		if($_GET['id']!='') {
			$temp[] = $_GET['id'];
			$pid = $this->db->getOne("SELECT parent_id FROM {$this->table_category} WHERE id = '{$_GET['id']}'");
			if($pid) {
				$temp[] = $pid;
				$pid = $this->db->getOne("SELECT parent_id FROM {$this->table_category} WHERE id = '{$pid}'");
				if($pid) {
					$temp[] = $pid;
					$pid = $this->db->getOne("SELECT parent_id FROM {$this->table_category} WHERE id = '{$pid}'");
					if($pid) {
						$temp[] = $pid;
						$pid = $this->db->getOne("SELECT parent_id FROM {$this->table_category} WHERE id = '{$pid}'");
						if($pid) {
							$temp[] = $pid;
						}	
					}	
				}	
			}
		}
		
		$temp = array_reverse($temp);
		
		foreach($rows as $k=>$v) {
			if($temp[0]==$v['id']) {
						
			}
			$rows[$k]['sub'] = $this->db->getAll("SELECT id, title, link, link_to, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND parent_id = '{$v['id']}' $order ");
			// mảng này để lấy trạng thái select ngoài category
			$rows[$k]['sub_ids'] = $this->db->getCol("SELECT id FROM {$this->table_category} {$this->where} AND parent_id = '{$v['id']}' $order ");
			foreach($rows[$k]['sub'] as $k1=>$v1) {
				if($temp[1]==$v1['id']) {
					
				}
				$rows[$k]['sub'][$k1]['sub'] = $this->db->getAll("SELECT id, title, link, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND parent_id = '{$v1['id']}' $order ");
                $rows[$k]['sub'][$k1]['sub_ids'] = $this->db->getCol("SELECT id FROM {$this->table_category} {$this->where} AND parent_id = '{$v1['id']}' $order ");
				foreach($rows[$k]['sub'][$k1]['sub'] as $k2=>$v2) {
					if($temp[2]==$v2['id']) {
						$rows[$k]['sub'][$k1]['sub'][$k2]['sub'] = $this->db->getAll("SELECT id, title, link, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND parent_id = '{$v2['id']}' $order ");
                        $rows[$k]['sub'][$k1]['sub'][$k2]['sub_ids'] = $this->db->getCol("SELECT id FROM {$this->table_category} {$this->where} AND parent_id = '{$v2['id']}' $order ");
						foreach($rows[$k]['sub'][$k1]['sub'][$k2]['sub'] as $k3=>$v3) {
							if($temp[3]==$v3['id']) {
								$rows[$k]['sub'][$k1]['sub'][$k2]['sub'][$k3]['sub'] = $this->db->getAll("SELECT id, title, link, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND parent_id = '{$v3['id']}' $order ");
								$rows[$k]['sub'][$k1]['sub'][$k2]['sub'][$k3]['sub_ids'] = $this->db->getCol("SELECT id FROM {$this->table_category} {$this->where} AND parent_id = '{$v3['id']}' $order ");
							}
						}
					}
				}
			}
		}
		#echo "<pre>";print_r($rows);echo"</pre>";
		$this->smarty->assign("rows", $rows);
		
		if ($param=="responsive") {
			$this->smarty->display("category_responsive.tpl");
		} else {
			$this->smarty->display("category.tpl");
		}
	}
	
	function book_detail()
	{
		
		$sql = "
			SELECT *
			FROM {$this->table}
			{$this->where} AND id = '{$_GET['bid']}'
		";

		$row = $this->db->getRow($sql);
		// kiem tra khong thay ban ghi
		if(!$row)
			header('Location: '.SITE_URL."ooops");

		$row['selfURL'] = selfURL();
		$row["content"] = stripslashes($row["content"]);
		$row['content'] = html_entity_decode($row['content'], ENT_QUOTES, "UTF-8");
		$row["content"] = str_replace("upload/editor/", SITE_URL."upload/editor/", $row["content"]);
		$row["pre_link"] = $this->pre."/".$row["link"];
		
		if (isset($_SESSION["cart"]))
		{
			foreach ($_SESSION["cart"] as $k=>$v)
			{
				if($row["id"] == $v["id"])
				{
					$row["in_cart"] = 1;
					$row["quantity"] = $v["quantity"];
					break;
				}
			}
		}
		
		$this->smarty->assign("row", $row);
		
		// San pham cung chuyen muc
		$sql = "SELECT *, concat('{$this->pre}', '/', link) AS pre_link FROM {$this->table} {$this->where} AND product_group_id = '{$row['product_group_id']}' AND id != '{$_GET['bid']}' ";
		
		$rows = $this->db->getAll($sql);
		$this->smarty->assign("rows", $rows);
				
		$this->smarty->assign("root_link", $this->pre);
		$this->smarty->display("book_detail.tpl");
	}
	
	function showBook()
	{
		$order_key = "title ASC";
		// lay san pham
		$order = " ORDER BY z_index DESC, $order_key ";
		$where = " WHERE is_active = 1 AND lang = '{$_SESSION['lang']}' ";
		// tim kiem san pham
		if($_GET['keyword']!='') {
			$where .= " AND title LIKE '%{$_GET['keyword']}%' ";
			//$keyword = "tim-kiem/".str_replace(" ", "+", $_GET['keyword'])."/";
		}
		if($_GET['id']!='') {
			$where .= " AND product_group_id = '{$_GET['id']}' ";
			/*$where .= " AND product_type_id = (SELECT id FROM product_type WHERE id ='{$_GET['id']}' LIMIT 1 )  ";*/			
			/*$where .= " AND ( product_type_id = '{$_GET['id']}' OR product_type_id IN (SELECT id FROM product_type WHERE parent_id = '{$_GET['id']}' ) OR product_type_id IN (SELECT id FROM product_type WHERE parent_id IN (SELECT id FROM product_type where parent_id = '{$_GET['id']}' ) ) ) ";*/			
			$group = $_GET['group']."-".$_GET['id']."/";
		}	
		// phuc vu cho paging

		$page = isset($_GET['page'])?$_GET['page']:1;

		$limit = 3;

		$start = $limit*($page-1);			
		$sql = "
				SELECT 
					*, concat('{$this->pre}', '/', link) as pre_link
				FROM {$this->table}
				$where
				$condition
				$order
				LIMIT $start, $limit
			";
		$rows = $this->db->getAll($sql);
		
		
		if (isset($_SESSION["cart"]))
		{
			foreach ($rows as $k=>$v)
			{
				foreach ($_SESSION["cart"] as $cart)
				{
					if($cart["id"] == $v["id"])
					{
						$rows[$k]["in_cart"] = 1;
						$rows[$k]["quantity"] = $cart["quantity"];
					}
				}
			}
		}
		
		$this->smarty->assign("rows", $rows);
		$action_path = SITE_URL.$this->pre."/".$group.$keyword."trang-{i}/";
		$numrows=$this->db->getOne("SELECT count(id) FROM {$this->table} $where $condition");
		$oPaging=new Paging($numrows, $limit,Null, "page");		
		$oPaging->set_current_page($page);
		$oPaging->set_action_path($action_path);
		$oPaging->set_site_url(SITE_URL);		
		if($numrows>$limit) {
			$this->smarty->assign("paging", $oPaging->string_paging());
		}

		$this->smarty->assign("index_start", $limit * ($page - 1) + 1);
		$this->smarty->assign("numrows", $numrows);
		$this->smarty->assign("selfURL", selfURL());
		echo mysql_error();
		$this->smarty->assign("root_link", $this->pre);
		$this->smarty->display("showBook.tpl");
	}
	
	function showList($condition="", $limit = 15) {
		
		#echo '<pre>'; print_r($_GET); echo '</pre>';
		#echo '<pre>'; print_r($_SERVER); echo '</pre>';

		if($_GET['id']!='') {
			
			// breadcrumb
			$bread = array();
			$temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} where id = '{$_GET['id']}' ");
			$bread[] = $temp;
			if($temp['parent_id']>0) {
				$temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} where id = '{$temp['parent_id']}' ");
				$bread[] = $temp;
				if($temp['parent_id']>0) {
					$temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} where id = '{$temp['parent_id']}' ");					
					$bread[] = $temp;
					if($temp['parent_id']>0) {
						$temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} where id = '{$temp['parent_id']}' ");					
						$bread[] = $temp;
						if($temp['parent_id']>0) {
							$temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} where id = '{$temp['parent_id']}' ");					
							$bread[] = $temp;
						}
					}
				}
			}
			$this->smarty->assign("bread", array_reverse($bread));
			
		}
		$where = "";
		if($_GET['id']!='') {
			/*$where = " AND product_type_id = '{$_GET['id']}' ";*/
			/*$where .= " AND product_type_id = (SELECT id FROM product_type WHERE id ='{$_GET['id']}' LIMIT 1 )  ";*/			
			$where .= " AND ( product_type_id = '{$_GET['id']}' OR product_type_id IN (SELECT id FROM product_type WHERE parent_id = '{$_GET['id']}' ) OR product_type_id IN (SELECT id FROM product_type WHERE parent_id IN (SELECT id FROM product_type where parent_id = '{$_GET['id']}' ) ) ) ";
			$category = $_GET['cate']."-".$_GET['id']."/";
		}

		
		if($_GET['keyword']!='') {
			$_GET['keyword'] = trim($_GET['keyword']);
			$where .= " AND ( title LIKE '%{$_GET['keyword']}%' OR code LIKE '%{$_GET['keyword']}%' ) ";
			
		}
		if($_GET['color_id']!='') {
			$where .= " AND id IN (SELECT product_id FROM product_has_color WHERE color_id = '{$_GET['color_id']}' ) ";
		}
		if ($_GET['price_id']!='') {
			$info_price = $this->db->getRow("SELECT from_val, to_val FROM product_price WHERE id = '{$_GET['price_id']}' ");

			if ($info_price["to_val"] > 0) {	
				$sub_w = " AND price_sale <= {$info_price[to_val]} ";
			}

			$where .= " AND ( price_sale >= {$info_price['from_val']} {$sub_w} ) ";
			#echo $where;
		}
		if ($_GET['matr_id']!='') {
			$imp = @str_replace('-', ',', $_GET['matr_id']);
			$where .= " AND id IN (SELECT product_id FROM product_has_material WHERE material_id IN ($imp) ) ";
			#echo $where;
		}

		$sort = $this->order;
		if ($_GET['sort']!='') {

			if ($_GET['sort']=='pasc') {
				$sort = " ORDER BY price_sale ASC ";
			} elseif ($_GET['sort']=='pdesc') {
				$sort = " ORDER BY price_sale DESC ";
			} elseif ($_GET['sort']=='old') {
				$sort = " ORDER BY id ASC ";
			} else {
				$sort = " ORDER BY id DESC ";
			}
			$sort .= ", create_date DESC";

		}
		
		// phuc vu cho paging
		$page = isset($_GET['page'])?$_GET['page']:1;
		$limit = 16;
		$start = $limit*($page-1);			
		$sql = "
				SELECT
					*, concat('{$this->pre}', '/', link) as pre_link
				FROM {$this->table}
				{$this->where} {$where}
				$condition
				{$sort}
				LIMIT $start, $limit
			";
		
		$rows = $this->db->getAll($sql);
		#echo mysql_error();
		$this->smarty->assign("rows", $rows);

		// nối thêm truy vấn để search
		$query_get = "";
		$ex = @explode("/", selfURL());
		$last = $ex[count($ex)-1];
		$pos = strpos($last, '&');
		if ($pos !== false) {
			$query_get = $last;
			if ($_GET['cate'] == '') {
				$category = "san-pham/";
			}
		}
		
		$action_path = SITE_URL.$category."trang-{i}/".$query_get;
		$numrows=$this->db->getOne("SELECT count(id) FROM {$this->table} {$this->where} $where $condition");
		$oPaging=new Paging($numrows, $limit,Null, "page");		
		$oPaging->set_current_page($page);
		$oPaging->set_action_path($action_path);
		$oPaging->set_site_url(SITE_URL);		
		if($numrows>$limit) {
			$this->smarty->assign("paging", $oPaging->string_paging());
		}

		$this->smarty->assign("index_start", $limit * ($page - 1) + 1);
		$this->smarty->assign("numrows", $numrows);
		$this->smarty->assign("selfURL", selfURL());

		$this->smarty->display("showList.tpl");

	}
	
	function detail() {
		
		$sql = "
			SELECT *
			FROM {$this->table}
			{$this->where} AND id = '{$_GET['pid']}'
		";

		$row = $this->db->getRow($sql);
		// kiem tra khong thay ban ghi

		$row['selfURL']  = selfURL();
		$row["content"]  = stripslashes($row["content"]);
		$row['content']  = html_entity_decode($row['content'], ENT_QUOTES, "UTF-8");
		$row["content"]  = str_replace("upload/editor/", SITE_URL."upload/editor/", $row["content"]);
		
		$row['color']  = $this->db->getAll("
				SELECT * FROM product_color
				WHERE id IN (
						SELECT color_id FROM product_has_color WHERE product_id = '{$_GET['pid']}'
					)
				ORDER BY z_index DESC
			");
		$row['size']  = $this->db->getAll("
				SELECT * FROM product_size
				WHERE id IN (
						SELECT size_id FROM product_has_size WHERE product_id = '{$_GET['pid']}'
					)
				ORDER BY z_index DESC
			");
		// remove P tag, remove &nbsp;
		$row["embed"] = str_replace("&nbsp;", '', $row["embed"]);
		$row["embed"] = preg_replace('/<\/?p(.|\s)*?>/', '', $row["embed"]);

		$row["photos"] = $this->db->getAll("SELECT id, photo FROM product_photo WHERE product_id = {$row['id']} ORDER BY z_index DESC");
		#print_r($row["photos"]);
		$raty = $this->db->getAll("SELECT * FROM product_rating WHERE product_id = {$row['id']} ");
		$tb_raty = $this->db->getOne("SELECT AVG(score) AS tb_score FROM product_rating WHERE product_id = {$row['id']} ");
		$row['rate_score'] = $tb_raty;
		$row['rate_count'] = count($raty);

		$this->smarty->assign("row", $row);

		$_GET['id'] = $row['product_type_id'];
		// breadcrumb
		if($_GET['pid']!='') {
			$bread = array();
			$bread[] = $row;
			$temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} {$this->where} AND id = '{$_GET['id']}' ");
			$bread[] = $temp;
			if($temp['parent_id']>0) {
				$temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} {$this->where} AND id = '{$temp['parent_id']}' ");
				$bread[] = $temp;
				if($temp['parent_id']>0) {
					$temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} {$this->where} AND id = '{$temp['parent_id']}' ");					
					$bread[] = $temp;
					if($temp['parent_id']>0) {
						$temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} {$this->where} AND id = '{$temp['parent_id']}' ");					
						$bread[] = $temp;
					}
				}
			}
		}
		$this->smarty->assign("bread", array_reverse($bread));

		// San pham cung chuyen muc
		$where_c = " AND ( product_type_id = '{$_GET['id']}' OR product_type_id IN (SELECT id FROM product_type WHERE parent_id = '{$_GET['id']}' ) OR product_type_id IN (SELECT id FROM product_type WHERE parent_id IN (SELECT id FROM product_type where parent_id = '{$_GET['id']}' ) ) ) ";
		//$where_c = " AND product_type_id = '{$row['product_type_id']}' ";
		$sql = "SELECT *, concat('{$this->pre}', '/', link) AS pre_link FROM {$this->table} {$this->where} AND id != '{$_GET['pid']}' {$where_c} ";
		
		$rows = $this->db->getAll($sql);
		$this->smarty->assign("rows", $rows);

		$this->smarty->display("detail.tpl");

	}

	function menu_responsive()
	{
		$this->smarty->display("menu_responsive.tpl");
	}

	function menu() {
		$order = " ORDER BY z_index DESC ";
		/*menu 4 cap*/
		$rows = $this->db->getAll("SELECT id, title, link, link_to, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND parent_id = 0 $order ");
		if($_GET['pid']!='') {
			$_GET['id'] = $this->db->getOne("SELECT product_type_id FROM {$this->table} WHERE id = '{$_GET['pid']}'");
		}
		
		foreach($rows as $k=>$v) {
			
			$rows[$k]['sub'] = $this->db->getAll("SELECT id, title, link, link_to, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND parent_id = '{$v['id']}' $order ");
			// mảng này để lấy trạng thái select ngoài category
			$rows[$k]['sub_ids'] = $this->db->getCol("SELECT id FROM {$this->table_category} {$this->where} AND parent_id = '{$v['id']}' $order ");
			foreach($rows[$k]['sub'] as $k1=>$v1) {
				
				$rows[$k]['sub'][$k1]['sub'] = $this->db->getAll("SELECT id, title, link, link_to, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND parent_id = '{$v1['id']}' $order ");
				foreach($rows[$k]['sub'][$k1]['sub'] as $k2=>$v2) {
					if($temp[2]==$v2['id']) {
						$rows[$k]['sub'][$k1]['sub'][$k2]['sub'] = $this->db->getAll("SELECT id, title, link, link_to, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND parent_id = '{$v2['id']}' $order ");
						foreach($rows[$k]['sub'][$k1]['sub'][$k2]['sub'] as $k3=>$v3) {
							if($temp[3]==$v3['id']) {
								$rows[$k]['sub'][$k1]['sub'][$k2]['sub'][$k3]['sub'] = $this->db->getAll("SELECT id, title, link, link_to, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND parent_id = '{$v3['id']}' $order ");
								
							}
						}
					}
				}
			}
		}
		$this->smarty->assign("rows", $rows);

		// vùng miền
		$region = $this->db->getAll("SELECT * FROM region ORDER BY id DESC");
		
		//dịch vụ
		
		$news_category = $this->db->getAll("SELECT * FROM news_category ORDER BY z_index ASC ");
		$cats=array();
		foreach($news_category as $item){
			if($item['parent_id']==0){
				$item['children']=array();
				$cats[$item['id']]=$item;	
			}
		}
		foreach($news_category as $item){
			if($item['parent_id']>0){
				$cats[$item['parent_id']]['children'][]=$item;	
			}
		}
		$this->smarty->assign("cats", $cats);
		
		$this->smarty->assign("region", $region);
		$this->smarty->display("menu.tpl");
	}

	function menu_home() {
		
		$row = $this->db->getRow("SELECT * FROM type WHERE link = '{$_GET['menu_type']}' ");
		// kiem tra khong thay ban ghi
		if(!$row)
			header('Location: '.SITE_URL."ooops");
		$row["content"] = str_replace("upload/editor/", SITE_URL."upload/editor/", $row["content"]);	
		$this->smarty->assign("row", $row);
		
		$order = " ORDER BY z_index DESC ";
		$sql = "
			SELECT id, title, link, concat('{$_GET['menu_type']}', '/', link) as pre_link, thumb, content
			FROM {$this->table_category}
			{$this->where} AND parent_id = 0 AND menu_type = '{$_GET['menu_type']}'
			$order
		";
		$rows = $this->db->getAll($sql);
		
		/*foreach($rows as $k=>$v) {
			$rows[$k]['sub'] = $this->db->getAll("SELECT id, title, link, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND parent_id = '{$v['id']}' $order ");
		}*/
		
		$this->smarty->assign("rows", $rows);
		$this->smarty->assign("root_link", $this->pre);
		
		$this->smarty->display('menu_home.tpl');
	}
	
	function menu_hoz()
	{
		
		$order = " ORDER BY z_index DESC ";
		// lay type
		$rows = $this->db->getAll("SELECT id, title, link FROM {$this->table_type} ORDER BY z_index DESC");
		
		// lay product_type (bai chuyen muc)
		foreach($rows as $k=>$v) {
			$rows[$k]['sub'] = $this->db->getAll("SELECT id, title, link, link_to, concat('{$v['link']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND menu_type = '{$v['link']}' AND parent_id = 0 $order ");
			foreach($rows[$k]['sub'] as $k1=>$v1) {
				$rows[$k]['sub'][$k1]['sub'] = $this->db->getAll("SELECT id, title, link, link_to, concat('{$v['link']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND menu_type = '{$v['link']}' AND parent_id = '{$v1['id']}' $order ");
				/*foreach($rows[$k]['sub'][$k1]['sub'] as $k2=>$v2) {
					$rows[$k]['sub'][$k1]['sub'][$k2]['sub'] = $this->db->getAll("SELECT id, title, link, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND menu_type = '{$_GET['menu_type']}' AND parent_id = '{$v2['id']}' $order ");
					foreach($rows[$k]['sub'][$k1]['sub'][$k2]['sub'] as $k3=>$v3) {
						
							$rows[$k]['sub'][$k1]['sub'][$k2]['sub'][$k3]['sub'] = $this->db->getAll("SELECT id, title, link, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND menu_type = '{$_GET['menu_type']}' AND parent_id = '{$v3['id']}' $order ");
							
						
					}
				}*/
			}
		}
		
		//echo"<div style='background:#ffc;'><pre>";print_r($menu_hoz);echo"</pre></div>";

		$this->smarty->assign("menu_hoz", $rows);
		$this->smarty->display("menu_hoz.tpl");
	}
	
	function menu_quick() {
		$rows = $this->db->getAll("SELECT * FROM menu_quick ORDER BY z_index DESC ");
		$this->smarty->assign("rows", $rows);
		$this->smarty->display('menu_quick.tpl');
	}
	
	function getPageinfo($task="")
	{	
		$page= array("");
		switch($task)
		{
			case "list_type":
				$row["title"]       = "Sản phẩm";
				$row["description"] = "Sản phẩm";
				$row["keyword"]     = "Sản phẩm";
				break;
			case "list":
				$row = $this->db->getRow("select title, description, seo_title, seo_description, seo_keyword, parent_id from product_type where id='{$_GET['id']}' ");				
				/*if($row["parent_id"]>0) {
					$temp = $this->db->getRow("SELECT title, text_menu FROM product_type WHERE id = '{$row['parent_id']}' ");
					$row["title_parent"] = $temp["title"];
					$row["text_menu_parent"] = $temp["text_menu"];
				}*/
				break;
			case "detail":
				if ($_GET["pid"]!="")
				{
					$row = $this->db->getRow("select title, seo_title, seo_description, seo_keyword from product where id='{$_GET['pid']}' ");
				}
				break;
			case "menu_home":
				$row = $this->db->getRow("select title, seo_title, seo_description, seo_keyword from type where link='{$_GET['menu_type']}' ");
				break;
			case "book":
				if ($_GET["id"]!="")
				{
					$row = $this->db->getRow("select title, seo_title, seo_description, seo_keyword from {$this->table_group} where id='{$_GET['id']}' ");
				}
				else
				{
					$row["title"] = "Mua hàng trực tuyến";
					$row["description"] = "Mua hàng trực tuyến";
					$row["keyword"] = "Mua hàng trực tuyến";
				}
				break;
			case "cart_view":
				$row["title"] = "Giỏ hàng";
				$row["description"] = "Giỏ hàng";
				$row["keyword"] = "Giỏ hàng";
				break;
			case "cart_save":
				$row["title"] = "Thanh toán";
				$row["description"] = "Thanh toán";
				$row["keyword"] = "Thanh toán";
				break;
		}
		
		if($strip=='') {
			$strip = strip_tags($row['seo_description']!=""?$row['seo_description']:$row['description']);
			$strip = trim(substr($strip, 0, 170))."...";
		}
		$page["title"] = ($row["seo_title"]!='')?$row["seo_title"]:$row["title"];
		$page["title"] = stripslashes($page["title"]);
		if($row["parent_id"]>0) {
			$page["title"] = ($row["text_menu_parent"]!='')?$row["text_menu_parent"]." ".$page["title"]:$row["title_parent"]." ".$page["title"];	
		}
		if($strip=="...")
			$strip = $page["title"];	
		$page["description"] = html_entity_decode($strip, ENT_QUOTES, "UTF-8");
		$page["keyword"]= ($row["seo_keyword"]!='')?$row["seo_keyword"]:$row["title"];	
		if($_GET['keyword']!='') {
			$page["title"] = $this->smarty->getConfigVariable("search_title");
		}	
		if($_GET['page']>0) {
			$page["title"] .= " - Trang ".$_GET['page'];
		}
		return $page;
	}

    ////////////////////////////////////////////////
    //added by thuypx
    //////////////////////////////////
    function  slider_left(){
        $rows = $this->db->getAll("
				SELECT id, title, link, photo, code, price_sale, link_out
				FROM {$this->table}
				WHERE is_top = 1
				ORDER BY z_index DESC LIMIT 20
			");
        $this->smarty->assign("rows", $rows);
        $this->smarty->display("slider_left.tpl");
    }
}
?>