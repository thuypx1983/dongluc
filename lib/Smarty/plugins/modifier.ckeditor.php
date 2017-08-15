<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty plugin
 *
 * Type:     modifier<br>
 * Name:     editor<br>
 * Date:     Feb 26, 2003
 * Purpose:  convert \r\n, \r or \n to <<br>>
 * Input:<br>
 *         - contents = contents to replace
 *         - preceed_test = if true, includes preceeding break tags
 *           in replacement
 * Example:  {name|$ckeditor:content}
 * @link http://smarty.php.net/manual/en/language.modifier.ckeditor.php
 *          nl2br (Smarty online manual)
 * @version  1.0
 * @author   nhocconvn_ltv	
 * @email dinhhungvn@gmail.com
 * @param string
 * @return string
 */

function smarty_modifier_ckeditor($name, $content="", $toolbar="Full", $width=850, $height=400, $upload_path="")
{
	$str = "<textarea style='width:".$width."px; height:".$height."px;' id=\"ckeditor_$name\" name=\"$name\" >".$content."</textarea>";
	
	if ($toolbar=="Basic")
	{
		$toolbar = "[
			{ name: 'document', items: [ 'NewPage', 'Preview'] },
			{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline'] },
			{ name: 'paragraph', items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
			{ name: 'tools', items: [ 'Maximize' ] },
		]";
	}
	elseif ($toolbar=="Video")
	{
		$toolbar = "[
			{ name: 'insert', items: [ 'oembed' ] },
			{ name: 'document', items: [ 'NewPage', 'Preview'] },
		]";
	}
	else if ($toolbar=="Admin")
	{
		$toolbar = "[
			{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview'] },
			[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],
			{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat' ] },
			{ name: 'paragraph', items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
			{ name: 'links', items: [ 'Link', 'Unlink'] },
			{ name: 'tools', items: [ 'Maximize' ] },
		]";
	}
	else
	{
		$toolbar = " 'Full' ";
	}
	if($toolbar!="None")
	{
			$str .= "<script type=\"text/javascript\">
					//<![CDATA[
		
						// This call can be placed at any point after the
						// <textarea>, or inside a <head><script> in a
						// window.onload event handler.
		
						// Replace the <textarea id='editor'> with an CKEditor
						// instance, using default configurations.
			CKEDITOR.replace( 'ckeditor_$name',
			{
				toolbar: $toolbar,
				filebrowserBrowseUrl : '".SITE_URL."lib/ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '".SITE_URL."lib/ckfinder/ckfinder.html?Type=Images',
				filebrowserFlashBrowseUrl : '".SITE_URL."lib/ckfinder/ckfinder.html?Type=Flash',
				filebrowserUploadUrl : '".SITE_URL."lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '".SITE_URL."lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '".SITE_URL."lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});

			//]]>
			</script>";
	}
				return $str;
}



?>
