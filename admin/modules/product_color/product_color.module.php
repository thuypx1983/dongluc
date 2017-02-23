<?php
class product_color extends base
{	
	function run($task="")
	{	
		
		$this->table= "product_color";
		
		$this->setRootPath("_menu_");
		switch($task)
		{		
			
			default:
				parent::run($task);
		}
	}
	
	function add()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row=array(
				"title"=>$_POST["title"],
				"color_code"=>$_POST["color_code"],
				"z_index"=>($_POST["z_index"]>0)?$_POST["z_index"]:9999,
				);

			$this->db -> autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			echo mysql_error();
			$this->smarty->assign("msg", "Thêm thành công");
			$this->redirect("add");
			exit();
		}
		$this->smarty->display('color_form.tpl');
	}
	
	function edit()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row=array(
				"title"=>$_POST["title"],
				"color_code"=>$_POST["color_code"],
				"z_index"=>$_POST["z_index"]+0,
			);
			$this->db -> autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			$this->smarty->assign("msg", "Cập nhật thành công");
			/*echo (mysql_error());
			$this->redirect("edit");
			exit();*/
		}
				
		$row=$this->db->getRow("select * from {$this->table} where id='".$_GET['id']."'");
		$this->smarty->assign('row',$row);
		$this->smarty->display('color_form.tpl');
	}
	
	
	function grid()
	{		

		$this->table = "(select * from {$this->table} ) as _table";	

		$this->arr_filter= array(
			array(
				"field" 	=>"title",
				"display" 	=> "Tên màu",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["title"])?$_REQUEST["title"]:"",
			)
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
			array(
				"field" => "title",
				"display" => "Tên màu",
				"sql" => "",
				"width"=> "170",
				"type" => "text",
				"sortable" => true,
				"editable" => true
				),	

			array(
				"field" => "color_code",
				"display" => "Mã màu",
				"sql" => "",
				"type" => "color",
				"sortable" => true,
				"editable" => true
			),
			array(
				"field" => "z_index",
				"display" => "Thứ tự",
				"sql" => "",
				"width" => "50",
				"type" => "number",
				"sortable" => true,
				"editable" => true
			)
		);
		
		$this->datagrid->display($this->table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);
	}		
}
?>