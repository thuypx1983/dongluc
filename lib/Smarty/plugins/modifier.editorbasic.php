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
function smarty_modifier_editorbasic($name, $content="", $width=500, $height=200, $extraPlugins="bbcode", $skin="kama")
	{	
		$str="<textarea cols=\"200\" {$disabled} style=\"width:{$width}px; height:{$height}px\" id=\"$name\" name=\"$name\" rows=\"10\">$content</textarea>
			<script type=\"text/javascript\">
			CKEDITOR.replace( '$name',
			{
				extraPlugins : '{$extraPlugins}',
				skin : '$skin',
				width: '{$width}',
				height: '{$height}',
				
				toolbar :
				[
					['Source'],
					['Undo','Redo'],
					['Bold','Italic','Underline','-','Link', 'Unlink'], 
					['Blockquote', 'TextColor', 'Image'],
					['SelectAll', 'RemoveFormat']
				],
				
				filebrowserBrowseUrl : '".SITE_URL."lib/ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '".SITE_URL."lib/ckfinder/ckfinder.html?Type=Images',
				filebrowserFlashBrowseUrl : '".SITE_URL."lib/ckfinder/ckfinder.html?Type=Flash',
				filebrowserUploadUrl : '".SITE_URL."lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '".SITE_URL."lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '".SITE_URL."lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			</script> ";


		return $str;			
	}	

?>