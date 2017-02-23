<?php
class register_contact extends base
{	
	function run($task="")
	{	
		$this->table= "register_contact";
		$this->setRootPath("_menu_");
		switch($task) {	
			default:
				parent::run($task);
		}
	}
	function add()
	{
		die();
	}

	function edit()
	{
		die();
	}
	
	function grid()
	{		
		$table = "(select * from {$this->table}  ) as _table";		
		$this->arr_filter= array(
			array(
				"field" 	=>"email",
				"display" 	=> "Email",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["email"])?$_REQUEST["email"]:"",
			),
			/*array(
				"field" 	=>"phone",
				"display" 	=> "Điện thoại",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["phone"])?$_REQUEST["phone"]:"",
			),
			array(
				"field" 	=>"fullname",
				"display" 	=> "F.Name",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["fullname"])?$_REQUEST["fullname"]:"",
			),*/
			
			/*array(
				"field" 	=> "create_date_from",
				"display" 	=> "Ngày đăng ký từ",
				"filter_condition" => " create_date >= '{$_REQUEST['create_date_from']}' ",
				"type" 		=> "date",
				"style" 	=> "width:160px;",
				"selected" 	=> isset($_REQUEST["create_date_from"])?$_REQUEST["create_date_from"]:"",
				"filterable"=>true
			),
			array(
				"field" 	=> "create_date_to",
				"display" 	=> "Ngày đăng ký đến",
				"filter_condition" => " create_date <= '{$_REQUEST['create_date_to']}' ",
				"type" 		=> "date",
				"style" 	=> "width:160px;",
				"selected" 	=> isset($_REQUEST["create_date_to"])?$_REQUEST["create_date_to"]:"",
				"filterable"=>true
			),*/
			/*array(
				"field" 	=>"message",
				"display" 	=> "Khóa học",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["message"])?$_REQUEST["message"]:"",
			),*/
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
				"field" => "email",
				"display" => "Email",
				"width" => "160",
				"sql" => "",
				"sortable" => true,
				"editable" => false
			),
			/*array(
				"field" => "fullname",
				"display" => "F.Name",
				"width" => "160",
				"sql" => "",
				"sortable" => true,
				"editable" => false
			),
			array(
				"field" => "phone",
				"display" => "Điện thoại",
				"width" => "160",
				"sql" => "",
				"sortable" => true,
				"editable" => false
			),*/
			/*array(
				"field" => "message",
				"display" => "Khóa học đăng ký",
				"width" => "160",
				"sql" => "",
				"sortable" => true,
				"editable" => false
			),*/
			array(
				"field" => "create_date",
				"display" => "Ngày đăng ký",
				"width" => "160",
				"sql" => "",
				"sortable" => true,
				"editable" => false
			),
		);
		$this->arr_action[0] = array();
		$this->arr_action[1] = array();
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);
	}
}

?>