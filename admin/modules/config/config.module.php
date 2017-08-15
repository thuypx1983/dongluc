<?php
class config extends base
{	
	function run($task="")
	{	
		
		$this->table= "configurations";
		
		$this->setRootPath("_menu_");
		switch($task)
		{		
			
			default:
				parent::run($task);
		}
	}
	
	
	function add()
	{
		if($_SESSION["username"]!='root') {
			header("Location: ".SITE_URL."admin");
		}
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$_POST["value"] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $_POST["value"]);
			$row=array(
				"name"=>$_POST["name"],
				"value"=>$_POST["value"],
				/*"value2"=>$_POST["value2"],
				"value3"=>$_POST["value3"],*/
				);

			$this->db -> autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			$this->smarty->assign("msg", "Thêm thành công");
			$this->redirect("add");
						
			exit();
		}
		
		
				
		$this->smarty->display('form.tpl');
	}
	
	function edit()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$_POST["value"] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $_POST["value"]);
			$row=array(
				"value"=>$_POST["value"],
				/*"value2"=>$_POST["value2"],
				"value3"=>$_POST["value3"],*/
				);
			if($_SESSION["username"]=='root') {
				$row["name"]= $_POST["name"];
			}
			$this->db -> autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			$this->smarty->assign("msg", "Cập nhật thành công");
			/*echo (mysql_error());
			$this->redirect("edit");
						
			exit();*/
		}
				
		$row=$this->db->getRow("select * from {$this->table} where id='".$_GET['id']."'");
		

		$this->smarty->assign('row',$row);
		$this->smarty->display('form.tpl');
	}
	
	
	function grid()
	{		

		$this->table = "(select * from {$this->table} ) as _table";	

		/*$this->arr_filter= array(
			array(
				"field" 	=>"name",
				"display" 	=> "Code",
				"style" 	=> "width:160px;",
				"selected" 	=> isset($_REQUEST["name"])?$_REQUEST["name"]:"",				
              	"type" => "text",
			),				 

		); */
		
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
				"field" => "name",
				"display" => "Code",
				"sql" => "",
				"width"=> "170",
				"type" => "text",
				"sortable" => true,
				"editable" => false
				),	

			array(
				"field" => "value",
				"display" => "Giá trị",
				"sql" => "",
				"sortable" => true,
				"editable" => false
			),
			/*array(
				"field" => "value2",
				"display" => "Giá trị 2",
				"sql" => "",
				"type" => "text",
				"sortable" => true,
				"editable" => true
			),
			array(
				"field" => "value3",
				"display" => "Giá trị 3",
				"sql" => "",
				"type" => "text",
				"sortable" => true,
				"editable" => true
			),*/
		);
		
		if($_SESSION["username"]!='root') {
			$this->arr_action[0] = array();
			$this->arr_action[2] = array();
			$this->arr_check = array();
		}
		
		$this->datagrid->display($this->table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);
	}		
}
?>