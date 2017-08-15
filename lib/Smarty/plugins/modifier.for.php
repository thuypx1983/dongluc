<?php

function smarty_modifier_for($k=100)
{    	
	$option = "<option value='0'>---0---</option>";
    for($i=1; $i<=$k; $i++)
		$option .= "<option value='".$i."'>".$i."</option>";

	return $option;
}
 

?>