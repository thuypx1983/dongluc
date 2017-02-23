<?php
class datagrid
{
	
	function display($table, $arr_cols, $arr_filter, $submit_url="?", $arr_action, $arr_checkall, $action_width=80, $debug = false, $table_record = 0)
	{
		global $oSmarty;
		global $oDb;
		
		if(!is_array($arr_action)){
			$oSmarty -> assign("has_action",'0');
		}
		elseif(count($arr_action)<=0)
		{
			$oSmarty -> assign("has_action",'0');
		}

		foreach($arr_action as $key => $action)
		{
			if($action['display'])
			{
				$arr = $action['display'];
				$arr_action[$key]['field'] = trim($arr["field"]);
				$arr_action[$key]['value'] = trim($arr["value"]);
				$arr_action[$key]['operation'] = trim($arr["operation"]);
			}
		}


		$arr_align = array(
			"text" => "left",
			"number" => "right",
			"float" => "right",
			"date" => "center",
			"datetime" => "center",
			"boolean" => "center",
			"movie" => "center",
			"img" => "center"
		);

		//set_root_path($root_path);

		$where= "";
		$tmp= array();

		$scroll_width= 0;

		$primary_key = "id";
		foreach($arr_cols as $k=>$col)
		{
			if($col['searchable'])
			{
				$oSmarty -> assign("has_search",1);
			}

			if(isset($col['primary_key']) && $col['primary_key'])
			{
				$primary_key = $col['field'];
			}
			if(isset($col['order_default']) && $col['order_default'] != '')
			{
				$order_default = $col['field'];
				$sort = $col['order_default'];
			}
			
			if($col['width']=="")
			{
				$arr_cols[$k]["width"]= 100;
			}
			
			if($col['visible']!="hidden" && $col['fixed']==false)
			{
				$scroll_width+= ($col['width']>0)?$col['width']:100;
			}
		}
		
		$oSmarty->assign("scroll_width", $scroll_width);		

		if($arr_filter)
		{
			foreach($arr_filter as $row){
				switch ($row['type'])
				{
					case 'date':
						if($row["selected"] != "")
						{
							$row['operator'] = ($row['operator'])?$row['operator']:"=";
							if(isset($row['filter_condition']) && $row['filter_condition'] != '')
							{
								$tmp[]= " ".$row['filter_condition'];
							}
							else
							{
								$tmp[]= " date(".$row["field"].")".$row['operator']."'".$row["selected"]."' ";
							}
						}
						break;
					case 'text':
						if($row["selected"] != "")
						{
							if($row["sql"] != "")
							{
								$tmp[] = "lower(".$row["field"].") in (".$row["sql"].")";
							}
							else
								$tmp[] = "lower(".$row["field"].") like lower('%".trim($row["selected"])."%')";

						}
						break;


					default:
						if($row["selected"] != "")
						{
							if(isset($row['filter_condition']) && $row['filter_condition'] != '')
							{
								$tmp[]= " ".$row['filter_condition'];
							}
							else
							{
								$tmp[]= " ".$row["field"]."='".$row["selected"]."' ";
							}
						}
						break;
				}
			}

			if($tmp != '')
			$where.= implode(" and ", $tmp);
			$oSmarty->assign("arr_filter", $arr_filter);

			$arr_search_by_option= array(
				"username" => "Username",
				"email" => "Email"
			);
		}
		$oSmarty->assign("arr_search_by_option", $arr_search_by_option);
		/*start tham so grid*/

		if(isset($_REQUEST["sort_by"]))
			$sort_by = $_REQUEST["sort_by"];
		elseif($order_default)
			$sort_by = $order_default;
		else
			$sort_by = $primary_key;

		if(isset($_REQUEST["sort_value"]))
			$sort_value = $_REQUEST["sort_value"];

		elseif($order_default)
			$sort_value = "asc";
		else
			$sort_value = "desc";


		$search_by= isset($_REQUEST["search_by"])?$_REQUEST["search_by"]:"";

		$search_value= isset($_REQUEST["search_value"])?$_REQUEST["search_value"]:"";

		$per_page= (isset($_REQUEST["per_page"]) && is_numeric($_REQUEST["per_page"]) && $_REQUEST["per_page"]>0)?(int)$_REQUEST["per_page"]:15;

		$page= (isset($_REQUEST["page"]) && is_numeric($_REQUEST["page"]) && $_REQUEST["page"]>0)?(int)$_REQUEST["page"]:1;

		/*end tham so grid*/

		$search_complex = "";
		if($search_value!="")
		{
			$search_type = 'text';
			foreach($arr_cols as $col)
			{
				if($col['field'] == $search_by)
				{
					$search_type = $col['datatype'];
					if(isset($col["sql"]) and $col["sql"] != "")
					{
						
						$search_complex = $col["sql"];
					}
				}
			}

			switch($search_type)
			{
				case 'number':
					if(!is_numeric($search_value))
						$search_value = 0;
					$sql_search = $search_by." = '".trim($search_value)."'";
					break;
				case 'date';
					$sql_search = $search_by." = '".trim($search_value)."'";
					break;
				case 'boolean':
					$sql_search = $search_by." = '".trim($search_value)."'";
					break;
				default:
					$sql_search = "lower($search_by) like lower('%".trim($search_value)."%')";
					break;
			}

			if($where != "")
				$where .= "  and ";

			if($search_complex != "")
				$where .= " exists($search_complex and $sql_search) ";
			else
				$where .= $sql_search;

		}

		if($where!="")
			$where= " where $where ";
		
		$order= " order by $sort_by $sort_value ";
		
		//Neu bien truyen vao la 1 mang, khong phai ten bang		
		if(is_array($table))
		{
			if($table_record>0)
				$number_record = $table_record;
			else
				$number_record = count($table);			
			//echo $number_record;
		}
		else
		{
			$number_record= $oDb->getOne("select count(".$primary_key.") from $table $where");
		}
		
		/*if(PEAR::isError($number_record))
			die($number_record->getMessage());*/

		if($number_record < $per_page*($page-1))
		{
			$page= ceil($number_record/$per_page);
		}

		if(!is_array($table))
		{

			$sql= "select ".$primary_key;
			
			foreach($arr_cols as $key => $col)
			{
				if(!isset($col['primary_key']) || !$col['primary_key'])
				{
					if(!isset($col["sql"]) || $col["sql"]=="")
						$sql.= ", ".$col["field"];
					else
						$sql.= ", (".$col["sql"].") as ".$col["field"];

					if($col['datatype'] == 'img' && isset($col['tooltip']) && $col['tooltip'] != '')
					{
						$sql .= ", " .$col['tooltip'];
					}

					$arr_cols[$key]["align"] = $arr_align[$col["type"]];
				}
			}
			$sql.= " from $table ";
			
			
			$data = $oDb ->limitQuery($sql.$where.$order,$per_page*($page-1),$per_page);
			//echo $data;
			if($debug)
				print_r($data);
			
			while ($row = $data -> fetchRow())
			{

					$arr_value[] = $row;
			}
			
		}
		else	//Neu bien truyen vao la 1 mang, khong phai ten bang thi lay gia tri mang do lam gia tri tra ve
		{
			$arr_key = array_keys($table);
			if($table_record>0)
			{
				$from = 0;
				$to = count($table);
			}
			else
			{
				$from = ($page-1) * $per_page;
				$to = ($number_record < $from + $per_page)? $number_record:$from+$per_page;	
			}
			if($from<0)
				$from= 0;
				
			for($i = $from; $i < $to ;$i++)
			{
				$arr_value[] = $table[$arr_key[$i]];
			}
			//$arr_value = $table;
		}

		if($debug == true)
		{
			echo $sql;
			echo "<pre>";
			print_r($arr_value);
			echo "</pre>";
		}
		
		$action_width = ($action_width)?$action_width:80;

		$oSmarty -> assign("pkey",$primary_key);
		$oSmarty -> assign("action_width",$action_width);
		$oSmarty->assign("sort_by", $sort_by);
		$oSmarty->assign("sort_value", $sort_value);
		$oSmarty->assign("search_by", $search_by);
		$oSmarty->assign("search_value", $search_value);
		$oSmarty->assign("per_page", $per_page);
		$oSmarty->assign("page", $page);
		$oSmarty->assign("number_record", $number_record);
		$oSmarty->assign("index_start", $per_page*($page-1)+1);
		$oSmarty->assign("number_page", ceil($number_record/$per_page));
		$oSmarty->assign("submit_url", $submit_url);
		$oSmarty->assign("arr_cols", $arr_cols);
		$oSmarty->assign("number_cols", count($arr_cols)+1);

		if(count($arr_checkall))
			$oSmarty-> assign("arr_check",$arr_checkall);
		$oSmarty-> assign("hideIndex",$hideIndex);
		

		$oSmarty->assign("arr_value", $arr_value);
		$oSmarty->assign("arr_action", $arr_action);
		
		$oSmarty -> assign("path", SITE_URL."admin/modules/datagrid/templates");



		$url= selfURL();
		if(strpos($url, "&msg=")>0)
			$_SESSION['grid_url']= substr($url, 0, strpos($url, "&msg=") );
		else
			$_SESSION['grid_url']= $url;
				
		$oSmarty->display("file:".str_replace('datagrid.module.php','',__FILE__)."templates/datagrid.tpl");
	}

}

?>