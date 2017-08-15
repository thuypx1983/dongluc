<?php
class admin_menu extends base {	

	function run($task="")
	{		
		$this->table= "admin_menu";
		$this->setRootPath("_menu_");
		
		switch ($task)
		{			
			default:
				parent::run($task);
		}
	}

	function getOptions()
	{
		$option= array();
		$opt_parent= $this->db->getAssoc("select id, title from {$this->table} where parent_id=0 order by z_index desc");
		foreach($opt_parent as $k=>$v)
		{
			$option[$k] = $v;
			
			$opt_sub1= $this->db->getAssoc("select id, title from {$this->table} where parent_id=$k order by z_index desc");
			foreach($opt_sub1 as $k1=>$v1)
			{
				$option[$k1] = "--- ".$v1;
			}
		}
		
		return $option;
	}

	function add()
	{
		global $oForm, $oFCKeditor, $oDb, $oSmarty;

		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			
			$row= array(
				"title" => $_POST["title"],
				"link" => $_POST["link"],
				"z_index" => $_POST["z_index"],				
				"is_show" => $_POST["is_show"]+0,				
				"parent_id" => $_POST["parent_id"]
			);				
								
			$oDb -> autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);

			$this->redirect("add");
			exit();
		
			$oSmarty->assign("row", $row);	
		}
		
		$oSmarty->assign("parent", $this->getOptions());
		
		$oSmarty->display("admin_menu.tpl");
	}
	
	function edit()
	{
		global $oSmarty, $oDb;
		
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			
			$row= array(
				"title" => $_POST["title"],
				"link" => $_POST["link"],
				"z_index" => $_POST["z_index"],				
				"is_show" => $_POST["is_show"]+0,			
				"parent_id" => $_POST["parent_id"]
			);							
									
			$oDb -> autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE, "id='".$_GET["id"]."'");

			$this->redirect("edit");
			exit();
			
		}
		
		if(!is_array($row))
			$row= $oDb->getRow("select * from {$this->table} where id='".$_GET["id"]."'");
		
		$oSmarty->assign("row", $row);
		$oSmarty->assign("parent", $this->getOptions());
						
		$oSmarty->display("admin_menu.tpl");
	}

	
	function grid()
	{		
		
		$this->table = "(SELECT * FROM {$this->table}) as _menu ";
		
		$this->arr_filter= array(
			array(
				"field" 	=>"title",
				"display" 	=> "Title",
				"name" 		=> "title",
				"type" 		=> "text",
				"style" 	=> "width:160px;",
				"selected" 	=> isset($_REQUEST["title"])?$_REQUEST["title"]:"",
				"filterable"=>true
			),
			array(
				"field" 	=>"parent_id",
				"display" 	=> "Danh mục cha",
				"type" 		=> "select",
				"option" 		=> $this->getOptions(),
				"style" 	=> "width:160px;",
				"selected" 	=> isset($_REQUEST["parent_id"])?$_REQUEST["parent_id"]:"",
				"filterable"=>true
			),
			array(
				"field" 	=>"is_show",
				"display" 	=> "Ẩn/Hiện",
				"type" 		=> "select",
				"style" 	=> "width:160px;",
				"option" 	=> array("0"=>"No", "1"=>"Yes"),
				"selected" 	=> isset($_REQUEST["is_show"])?$_REQUEST["is_show"]:"",
				"filterable"=>true
			),
		); 
		
		$option= $this->getOptions();
		
		$this->arr_cols= array(		
			
			array(
				"field" => "id",
				"display" => "ID",
				"type" => "text",
				"sortable" => true,
				"visible"=>"hidden",
				"primary_key" =>true
			),
			array(
				"field" => "parent_id",
				"display" => "Parent",
				"type" => "select",
				//"sql" => " select title from menu where id=parent_id ",
				"option" => $option,
				"sortable" => true,
				"editable" => true,
			),
			array(
				"field" => "title",
				"display" => "Title",
				"type" => "text",
				"sortable" => true,
				"editable" => true,
			),
			array(
				"field" => "link",
				"display" => "Link",
				"type" => "text",
				"sortable" => true,
				"searchable" => true,
				"editable" => true,
			),
			array(
				"field" => "is_show",
				"display" => "Show ?",
				"type" => "boolean",
				"sortable" => true,
				"searchable" => true,
				"editable" => true,
			),
			array(
				"field" => "z_index",
				"display" => "Order",
				"type" => "number",
				"sortable" => true,
				"searchable" => true,
				"editable" => true,
				"width" => 80
			)
		);
		
		$this->arr_action= array(
			array(
				"task" => "add",
				"action" => "",
				"tooltip" => "Add record"		
			),
			
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
			)
			
		);
		
		$this->arr_check = array(
			array(
				"task" => "multi_delete",
				"display" => "Delete"
			)
		);

		$this->datagrid->display($this->table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, $this->debug);		
		
	}		
	
}

?>