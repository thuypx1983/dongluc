<?php
class orders extends base
{	
	function run($task="")
	{	
		$this->table= "orders";
		$this->where= " where lang='{$_SESSION[lang]}' ";
		$this->order= " order by z_index asc ";
		$this->size= array("width"=>200, "height"=>150);

		//$this->imagePath ="upload/product/";

		$this->setRootPath("_menu_");
		switch($task)
		{		
			case "getCategory":
				$this->getCategory();
				break;
			case"loadCategory":
				$this->loadCategory();
				break;
				
			default:
				parent::run($task);
		}
	}
	
	
	
	
	function edit()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			
			$row = array(
				"lang" => $_SESSION["lang"],
				"address" =>$_POST["address"],
				"gender"=>$_POST["gender"],
				"email"=>$_POST["email"],
				"cust_name"=>$_POST["cust_name"],
				"province_id"=>$_POST["province_id"],
				"cust_note"=>$_POST["cust_note"],
				"create_date"=>$_POST["create_date"],
				"is_processed"=>$_POST["is_processed"],
				"note"=>$_POST["note"],								
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
		$where_user= "";
		if($_SESSION["user_type_id"]!='1')
			$where_user= " where user_id='{$_SESSION[user_id]}' ";
		
		$this->table= "(select * from {$this->table} $where_user order by id desc ) as _table";	
		
		$where= "";
		if($_REQUEST["product_category_id"]!="")
			$where= " and product_category_id='{$_REQUEST[product_category_id]}' ";
		//print_r ($_GET);
		$this->arr_filter= array(
			 array(
				"field" 	=>"product_category_id",
				"display" 	=> "Loại nội dung",
				"style" 	=> "width:160px;",
				"name" 		=> "product_category_id",
				"selected" 	=> isset($_REQUEST["product_category_id"])?$_REQUEST["product_category_id"]:"",				
              	"options" 	=> $this->db->getAssoc("select id, title from product_category {$this->where} {$this->order}"),
				"filterable"=>true,
				"onchange"=>"loadCategory(this.value)"
			),
			
			array(
				"field" 	=>"user_id",
				"display" 	=> "User",
				"style" 	=> "width:160px;",
				"name" 		=> "user_id",
				"selected" 	=> isset($_REQUEST["user_id"])?$_REQUEST["user_id"]:"",				
              	"options" 	=> $this->db->getAssoc("select id, username from user order by username"),
				"filterable"=>true,				
			),
			array(
				"field" 	=>"title",
				"display" 	=> "Title",
				"name" 		=> "title",
				"type" 		=> "text",
				"style" 	=> "width:160px;",
				"selected" 	=> isset($_REQUEST["title"])?$_REQUEST["title"]:"",
				"filterable"=>true
			),
				
		);
		 
		$this->arr_cols= array(			
			array(
				"field" => "id",					
				"primary_key" =>true,
				"visible"=>"hidden",
				"datatype" => "text",
				"sortable" => true,
				"searchable" => true,
				
			),				
			
			
			array(
				"field" => "cust_name",
				"display" => "Tên khách hàng",
				"sql" => "",
				"datatype" => "text",
				"sortable" => true,
				"editable" => true
				),
						
			array(
				"field" => "create_date",
				"display" => "Ngày",
				"datatype" => "date",
				"sortable" => true,
				"editable" => true
			),
			array(
				"field" => "is_processed",
				"display" => "Đã xử lý",
				"datatype" => "boolean",
				"sortable" => true,
				"editable" => true,
				"width" => 60,
			),	
			
			array(
				"field" => "note",
				"display" => "Ghi chú",
				"datatype" => "text",
				"sortable" => true,
				"editable" => true
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
				"task" => "edit",
				"text" => "Edit",
				"icon" => "edit.png",
				"action" => "",
				"tooltip" => "Edit record"		
			),
			array(
				"task" => "delete",
				"text" => "Delete",
				"icon" => "delete.jpg",
				"confirm" => "Are you sure?",
				"action" => "",
				"tooltip" => "Delete record"		
			),
			

		
		);
	
		$this->datagrid->display($this->table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
	}
	
		
}
?>