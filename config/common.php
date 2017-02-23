<?php

/**
 * truncateHtml can truncate a string up to a number of characters while preserving whole words and HTML tags
 *
 * @param string $text String to truncate.
 * @param integer $length Length of returned string, including ellipsis.
 * @param string $ending Ending to be appended to the trimmed string.
 * @param boolean $exact If false, $text will not be cut mid-word
 * @param boolean $considerHtml If true, HTML tags would be handled correctly
 *
 * @return string Trimmed string.
 */
function truncateHtml($text, $length = 100, $ending = '...', $exact = false, $considerHtml = true) {
	if ($considerHtml) {
		// if the plain text is shorter than the maximum length, return the whole text
		if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
			return $text;
		}
		// splits all html-tags to scanable lines
		preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
		$total_length = strlen($ending);
		$open_tags = array();
		$truncate = '';
		foreach ($lines as $line_matchings) {
			// if there is any html-tag in this line, handle it and add it (uncounted) to the output
			if (!empty($line_matchings[1])) {
				// if it's an "empty element" with or without xhtml-conform closing slash
				if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
					// do nothing
				// if tag is a closing tag
				} else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
					// delete tag from $open_tags list
					$pos = array_search($tag_matchings[1], $open_tags);
					if ($pos !== false) {
					unset($open_tags[$pos]);
					}
				// if tag is an opening tag
				} else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
					// add tag to the beginning of $open_tags list
					array_unshift($open_tags, strtolower($tag_matchings[1]));
				}
				// add html-tag to $truncate'd text
				$truncate .= $line_matchings[1];
			}
			// calculate the length of the plain text part of the line; handle entities as one character
			$content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
			if ($total_length+$content_length> $length) {
				// the number of characters which are left
				$left = $length - $total_length;
				$entities_length = 0;
				// search for html entities
				if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
					// calculate the real length of all entities in the legal range
					foreach ($entities[0] as $entity) {
						if ($entity[1]+1-$entities_length <= $left) {
							$left--;
							$entities_length += strlen($entity[0]);
						} else {
							// no more characters left
							break;
						}
					}
				}
				$truncate .= substr($line_matchings[2], 0, $left+$entities_length);
				// maximum lenght is reached, so get off the loop
				break;
			} else {
				$truncate .= $line_matchings[2];
				$total_length += $content_length;
			}
			// if the maximum length is reached, get off the loop
			if($total_length>= $length) {
				break;
			}
		}
	} else {
		if (strlen($text) <= $length) {
			return $text;
		} else {
			$truncate = substr($text, 0, $length - strlen($ending));
		}
	}
	// if the words shouldn't be cut in the middle...
	if (!$exact) {
		// ...search the last occurance of a space...
		$spacepos = strrpos($truncate, ' ');
		if (isset($spacepos)) {
			// ...and cut the text in this position
			$truncate = substr($truncate, 0, $spacepos);
		}
	}
	// add the defined ending to the text
	$truncate .= $ending;
	if($considerHtml) {
		// close all unclosed html-tags
		foreach ($open_tags as $tag) {
			$truncate .= '</' . $tag . '>';
		}
	}
	return $truncate;
}

function loadModule($mod, $task="", $param="")
{
	global $oSmarty;
	$oSmarty->compile_id= $mod;
	/*tem cu*/
	$oldTemplateDir= $oSmarty->getTemplateDir();
	
	$oSmarty->setTemplateDir(SECTION."modules/{$mod}/templates");	
	include_once(SECTION."modules/{$mod}/{$mod}.module.php");
	
	$obj= new $mod();
	$obj->run($task, $param);
	/*hoan tra*/
	$oSmarty->setTemplateDir($oldTemplateDir);	
}

function alert($text)
{
	echo '<script type="text/javascript">alert("'.$text.'")</script>';
}


function redirect($url, $second=0)
{
	echo '<meta http-equiv="refresh" content="'.$second.';url='.$url.'">';
}

function getLang($var)
{
	global $oSmarty;
	return $oSmarty->getConfigVariable($var);
}

function getPageinfo()
{
	global $oSmarty;

	$page= array(
		"title" => $oSmarty->getConfigVariable("default_title"),
		"description" => $oSmarty->getConfigVariable("default_description"),
		"keyword" => $oSmarty->getConfigVariable("default_keyword")
	);
		
	$mod = $_GET['mod'];
	if($mod!="")
	{ 
		if(file_exists("modules/$mod/$mod.module.php"))
		{
			include_once("modules/$mod/$mod.module.php");
			$mod = new $mod();			
			$task= $_GET['task'];
			
			if(method_exists($mod, "getPageinfo"))
			{	
				$page= $mod->getPageinfo($task);
				$aPageinfo["title"]= $page["title"];//." - ".$aPageinfo["title"];
				$aPageinfo["description"]= $page["description"];
				$aPageinfo["keyword"]= $page["keyword"];//.", ".$aPageinfo["keyword"];
			}
		}	
	}
	
	echo '
		<title>'.$page['title'].'</title>
		<meta name="description" content="'.$page['description'].'" />
		<meta name="keywords" content="'.$page['keyword'].'" />	
	';

}

function selfURL()
{
	$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : ""; $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s; $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); 
		
		return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
}
function strleft($s1, $s2) { return substr($s1, 0, strpos($s1, $s2)); }

function remove_marks($string)
{
	$string= trim($string);
	$string= str_replace('/', '-', $string);
	$string= StripExtraSpace($string);

	$trans = array ('Ầ'=>'', '.'=>'', '!'=>'', '&'=>'', '/'=>'', '+'=>'', '?'=>'', "#"=>"", "'"=> "", ':'=>'', "ế"=> "e", 'è'=>'e', 'é' => 'e', "'" => '', "'" => '', '"' => '', '"' => '', 'ẻ' => 'e', 'ẽ' => 'e', 'ằ' => 'a', 'ắ' => 'a', 'ọ' => 'o', 'ẽ' => 'e', 'ờ' => 'o', 'ẹ' => 'e', 'ặ' => 'a', 'ề' => 'e', 'ặ' => 'a', 'à' => 'a', 'á' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a', 'â' => 'a', 'ấ' => 'a', 'ẫ' => 'a', 'ẩ' => 'a', 'ậ' => 'a', 'ú' => 'a', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u', 'à' => 'a', 'á' => 'a', 'ô' => 'o', 'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o', 'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o', 'ê' => 'e', 'ề' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e', 'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i', 'ơ' => 'o', 'ớ' => 'o', 'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o', 'ư' => 'u', 'ừ' => 'u', 'ứ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u', 'đ' => 'd', 'À' => 'A', 'Á' => 'A', 'Ả' => 'A', 'Ã' => 'A', 'Ạ' => 'A', 'Â' => 'A', 'Ấ' => 'A', 'À' => 'A', 'Ẫ' => 'A', 'Ẩ' => 'A', 'Ậ' => 'A', 'Ú' => 'U', 'Ù' => 'U', 'Ủ' => 'U', 'Ũ' => 'U', 'Ụ' => 'U', 'Ô' => 'O', 'Ố' => 'O', 'Ồ' => 'O', 'Ổ' => 'O', 'Ỗ' => 'O', 'Ộ' => 'O', 'Ê' => 'E', 'Ế' => 'E', 'Ề' => 'E', 'Ể' => 'E', 'Ễ' => 'E', 'Ệ' => 'E', 'Í' => 'I', 'Ì' => 'I', 'Ỉ' => 'I', 'Ĩ' => 'I', 'Ị' => 'I', 'Ơ' => 'O', 'Ớ' => 'O', 'Ờ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O', 'Ợ' => 'O', 'Ư' => 'U', 'Ừ' => 'U', 'Ứ' => 'U', 'Ử' => 'U', 'Ữ' => 'U', 'Ự' => 'U', 'Đ' => 'D', 'Ý' => 'Y', 'Ỳ' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y', 'Ỵ' => 'Y', 'á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a', 'ă' => 'a', 'ắ' => 'a', 'ằ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a', 'â' => 'a', 'ấ' => 'a', 'ầ'=> 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a', 'ú' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u', 'ư' => 'u', 'ứ' => 'u', 'ừ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u', 'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i', 'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o', 'ô' => 'o', 'ố' => 'o', 'ồ' => 'ô', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o', 'ơ' => 'o', 'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o', 'đ' => 'd', 'Đ' => 'D', 'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y', 'Á' => 'A', 'À' => 'A', 'Ả' => 'A', 'Ã' => 'A', 'Ạ' => 'A', 'Ă' => 'A', 'Ắ' => 'A', 'Ẳ' => 'A', 'Ẵ' => 'A', 'Ặ' => 'A', 'Â' => 'A', 'Ấ' => 'A', 'Ẩ' => 'A', 'Ẫ' => 'A', 'Ậ' => 'A', 'É' => 'E', 'È' => 'E', 'Ẻ' => 'E', 'Ẽ' => 'E', 'Ẹ' => 'E', 'Ế' => 'E', 'Ề' => 'E', 'Ể' => 'E', 'Ễ' => 'E', 'Ệ' => 'E', 'Ú' => 'U', 'Ù' => 'U', 'Ủ' => 'U', 'Ũ' => 'U', 'Ụ' => 'U', 'Ư' => 'U', 'Ứ' => 'U', 'Ừ' => 'U', 'Ử' => 'U', 'Ữ' => 'U', 'Ự' => 'U', 'Í' => 'I', 'Ì' => 'I', 'Ỉ' => 'I', 'Ĩ' => 'I', 'Ị' => 'I', 'Ó' => 'O', 'Ò' => 'O', 'Ỏ' => 'O', 'Õ' => 'O', 'Ọ' => 'O', 'Ô' => 'O', 'Ố' => 'O', 'Ổ' => 'O', 'Ỗ' => 'O', 'Ộ' => 'O', 'Ơ' => 'O', 'Ớ' => 'O', 'Ờ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O', 'Ợ' => 'O', 'Ý' => 'Y', 'Ỳ' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y', 'Ỵ' => 'Y', ' ' => '-', 'ề' => 'e', 'ờ' => 'o', '('=>'', ')'=>'', ','=>'', '%'=>'-percent', 'ồ'=>'o', '–'=>'');
	
	$string= strtolower(strtr( trim($string), $trans ));
	$string = str_replace("---", "-", $string);
	$string = str_replace("--", "-", $string);
	$string = str_replace("amp;", "and", $string);
	$string = str_replace("-percent-", "-", $string); 
	
	return $string;
}

function StripExtraSpace($s)
{
	$newstr = "";


	for($i = 0; $i < strlen($s); $i++)
	{
		$newstr = $newstr . substr($s, $i, 1);
		if(substr($s, $i, 1) == ' ')
			while(substr($s, $i + 1, 1) == ' ')
			$i++;
	}
	$newstr= ltrim($newstr);
	$newstr= rtrim($newstr);

	return $newstr;
}

function getMetaTitle($content){
	
//	$pattern = "|<[\s]*title[\s]*>([^<]+)<[\s]*/[\s]*title[\s]*>|Ui";
//	if(preg_match($pattern, $content, $match))
//		return $match[1];
//	else
//		return false;


	$dom = new DOMDocument();

	// Parse the inputted HTML into a DOM
	@$dom->loadHTML($content);

	$metaTags = $dom->getElementsByTagName('title');

	// Check for a meta description and return it if it exists
	foreach ($metaTags as $metaTag) {
			return $metaTag->nodeValue;
	}
	
	return "";
}

function getMetaKeyword($content) {
	$dom = new DOMDocument();

	// Parse the inputted HTML into a DOM
	@$dom->loadHTML($content);

	$metaTags = $dom->getElementsByTagName('meta');

	// Check for a meta keyword and return it if it exists
	foreach ($metaTags as $metaTag) {
		if ($metaTag->getAttribute('name') === "keyword") {
			return $metaTag->getAttribute('content');
		}
	}
	
	// Check for a meta keywords and return it if it exists
	foreach ($metaTags as $metaTag) {
		if ($metaTag->getAttribute('name') === "keywords") {
			return $metaTag->getAttribute('content');
		}
	}
	
	// return the empty string
	return "";
}

function getMetaDescription($content) {
	$dom = new DOMDocument();

    // Parse the inputted HTML into a DOM
    @$dom->loadHTML($content);

    $metaTags = $dom->getElementsByTagName('meta');

    // Check for a meta description and return it if it exists
    foreach ($metaTags as $metaTag) {
        if ($metaTag->getAttribute('name') === "description") {
            return $metaTag->getAttribute('content');
        }
    }

	return "";            		
}
?>