<?php
class orders extends base
{	
	function run($task="")
	{	
		$this->table = "orders";
		$this->where = " where lang='{$_SESSION[lang]}' ";
		$this->order = " order by z_index asc ";
		$this->size  = array("width"=>200, "height"=>150);

		//$this->imagePath ="upload/product/";

		$this->setRootPath("_menu_");
			switch($task)
			{
				case "view": 
					$this->view();
					break;
					/*$title= $this->db->getOne("select title from pages where id=".$_GET["id"]); 
					redirect(SITE_URL."pages/".$_GET["id"]."-".remove_marks($title).".html");*/
								
				default:
					parent::run($task);
			}
	}

	function view()
	{
		$row = $this->db->getRow("select * from {$this->table} where id='".$_GET['id']."'");
		#$row["province"] = $this->db->getOne("select title from province where id = {$row['province_id']}");
		$this->smarty->assign('row', $row);
			
		$sql = "
			select 
				t1.title, t1.code,
				t2.price, t2.quantity, t2.discount, t2.price_goc, t2.color_code, t2.color_name, t2.size
				from product t1 left join order_detail t2 on t1.id = t2.product_id 
				where t2.order_id = $_GET[id]";
		$list =  $this->db->getAll($sql);
		$this->smarty->assign('list', $list);
		
		$this->smarty->display('order_detail.tpl');
	}
	
	function edit()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			
			$row = array(
				"lang"         => $_SESSION["lang"],
				"address"      => $_POST["address"],
				"gender"       => $_POST["gender"],
				"email"        => $_POST["email"],
				"cust_name"    => $_POST["cust_name"],
				"province_id"  => $_POST["province_id"],
				"cust_note"    => $_POST["cust_note"],
				"create_date"  => $_POST["create_date"],
				"is_processed" => $_POST["is_processed"],
				"phone"        => $_POST["phone"],
				"note"         => $_POST["note"],								
				);
				
			$this->db -> autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE, "id='".$_GET["id"]."'");

			$msg= "Cập nhật thành công";
			$this->smarty->assign("msg", $msg);

			//$this->redirect("?mod=product&task=edit&id=".mysql_insert_id);
						
			//exit();
		}
		
		
		$row = $this->db->getRow("select * from {$this->table} where id='".$_GET['id']."'");
		$this->smarty->assign('row', $row);
		$province = $this->db->getAssoc("select id, title from province order by title asc");
		$this->smarty->assign("province", $province);
		
		$this->smarty->display('orders.tpl');
	}
	
	
	function grid()
	{
		$this->table= "(select * from {$this->table} ) as _table";	
		
		//print_r ($_GET);
		$this->arr_filter= array(
			/*array(
				"field" 	=> "province_id",
				"display" 	=> "Khách hàng ở",
				"style" 	=> "width:160px;",
				"type" => "select",
				"option" => $this->db->getAssoc("select id, title from province order by title asc"),
				"selected" 	=> isset($_REQUEST["province_id"])?$_REQUEST["province_id"]:"",
			),*/
			array(
				"field" 	=> "is_process",
				"display" 	=> "Xử lý",
				"style" 	=> "width:160px;",
				"type" => "select",
				"option" => array("0"=>"Chưa xử lý", "1"=>"Đã xử lý"),
				"selected" 	=> isset($_REQUEST["is_process"])?$_REQUEST["is_process"]:"",
			),
			array(
				"field" 	=> "name",
				"display" 	=> "Tên khách hàng",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["name"])?$_REQUEST["name"]:"",
			),
		);
		 
		$this->arr_cols= array(			
			array(
				"field" => "id",					
				"primary_key" =>true,
				"visible"=>"hidden",
				"type" => "text",
				"sortable" => true,
				"searchable" => true,
				
			),	
			/*array(
				"field" => "province_id",
				"display" => "Tỉnh/ Thành phố",
				"sql" => "select title from province where id = _table.province_id",
				"type" => "text",
				"sortable" => true,
				"editable" => false,
				),	*/
			array(
				"field"    => "name",
				"display"  => "Tên khách hàng",
				"sql"      => "",
				"sortable" => true,
				"editable" => false
				),
			array(
				"field"    => "email",
				"display"  => "Email",
				"sql"      => "",
				"sortable" => true,
				"editable" => false
				),
			array(
				"field"    => "phone",
				"display"  => "Số điện thoại",
				"sql"      => "",
				"sortable" => true,
				"editable" => false
				),
			array(
				"field"    => "address",
				"display"  => "Địa chỉ",
				"sql"      => "",
				"sortable" => true,
				"editable" => false
				),
			array(
				"field"    => "province",
				"display"  => "Tỉnh thành",
				"sql"      => "",
				"sortable" => true,
				"editable" => false
				),	
			array(
				"field"    => "create_date",
				"display"  => "Ngày",
				"type"     => "date",
				"sortable" => true,
				"editable" => false
			),
			array(
				"field"    => "is_process",
				"display"  => "Đã xử lý",
				"type"     => "boolean",
				"sortable" => true,
				"editable" => true,
				"width"    => 60,
			),	
			
			array(
				"field"    => "cust_note",
				"display"  => "Ghi chú",
				"sortable" => true,
				"editable" => false
			),	
			
			/*array(
				"field" => "user_id",
				"display" => "User",
				"option" => $this->db->getAssoc(" select id, username from user order by username "),
				"datatype" => "select",	
				"searchable" => true,
				"editable" => true
			)
		*/
		);
		
		
		echo '
			<script type="text/javascript">
				function loadCategory(type)
				{
					
					$.get("?ajax=true&mod=content&task=loadCategory&type="+type, function(result){
						$("select#category").html(result);						
					});
				}
			</script>
		';
	
		$this->arr_action= array(
			
			array(
				"task"    => "delete",
				"text"    => "Delete",
				"icon"    => "delete.jpg",
				"confirm" => "Are you sure?",
				"action"  => "",
				"tooltip" => "Delete record"		
			),
			
			array(
				"task"    => "view",
				"action"  => "view",
				"icon"    => "view.jpg",
				"tooltip" => "View",
				"text"    => "View"
				),

		);
		
		echo "<script>
			function view(id)
			{
				window.location='?mod=orders&task=view&id='+id;
			}
		</script>";
	
		$this->datagrid->display($this->table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
	}
	
		
}
?>