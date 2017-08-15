<?php
#error_reporting(1);
define("SECTION", "");
include("config/config.php");
include("config/common.php");
include("config/adodb.php");
include("config/smarty.php");
include("lib/Thumbnail/Thumbnail.class.php");
include("config/base.class.php");
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

#$oDb->query("UPDATE news SET is_active = 0");

/*$oDb->query("TRUNCATE TABLE `news`");
die();*/

/*//set anh no-image
$path = 'upload/news/no-image.jpg';
$thumb = 'upload/news/thumb/no-image.jpg';
$thumb2 = 'upload/news/thumb2/no-image.jpg';

$image = new SimpleImage();
$image->load($path);

$image->resize(690, 378, 'y');
$image->save($path);
$image->resize(250, 163, 'y');
$image->save($thumb);
$image->resize(70, 45, 'y');
$image->save($thumb2);
die();*/

$xml = simplexml_load_file("import_post/data.xml") or die("Unable to load XML file.");
$news_exits = $oDb->getCol("SELECT id FROM news");

foreach ($xml->channel->item as $item)
{
	$namespaces = $item->getNameSpaces(true);
	$wp = $item->children($namespaces['wp']);
	$ct = $item->children($namespaces['content']); 
	
	/*if ($wp->status == 'publish')
	{
		$src = getSrcImg((string) $ct->encoded);
		
		if ($src != '')
		{
			$photo = (string) $wp->post_name . '.' . getExt(getLast($src));
			$path = 'upload/news/' . $photo;
			$thumb = 'upload/news/thumb/'  . $photo;
			$thumb2 = 'upload/news/thumb2/'  . $photo;
			
			file_put_contents ($path, file_get_contents($src));
			
			$image_info = getimagesize($path);
			if ($image_info[2] != IMAGETYPE_GIF)
			{
				$image = new SimpleImage();
				$image->load($path);
				$image->resize(690, 450, 'y');
				$image->save($path);
				$image->resize(250, 163, 'y');
				$image->save($thumb);
				$image->resize(70, 45, 'y');
				$image->save($thumb2);
			}
			
			echo '<img src="' . $src . '"/>';
			echo '<img src="' . $path . '"/>';
			echo '<br><hr/>';
		}
	}*/
	
	if (!in_array((int) $wp->post_id, $news_exits))
	{
		if ($wp->status == 'publish')
		{
			$photo = '';
			$src = getSrcImg((string) $ct->encoded);
			
			if ((int) $wp->post_id == 137)
				$src = 'http://study-japan.edu.vn/news/wp-content/uploads/2014/10/ky-thi-nang-luc-tieng-nhat-topj-j-test-va-nat-test1.jpg';
			if ((int) $wp->post_id == 55)
				$src = 'http://study-japan.vn/news/wp-content/uploads/2014/08/DSC01242.jpg';
			
			if ($src != '')
			{
				$photo = (string) $wp->post_name . '.' . getExt(getLast($src));
				$path = 'upload/news/' . $photo;
				$thumb = 'upload/news/thumb/'  . $photo;
				$thumb2 = 'upload/news/thumb2/'  . $photo;
				
				file_put_contents ($path, file_get_contents($src));
				
				$image_info = getimagesize($path);
				if ($image_info[2] != IMAGETYPE_GIF)
				{
					$image = new SimpleImage();
					$image->load($path);
					$image->resize(690, 450, 'y');
					$image->save($path);
					$image->resize(250, 163, 'y');
					$image->save($thumb);
					$image->resize(70, 45, 'y');
					$image->save($thumb2);
				}
			}
			echo '<a href="'.str_replace('http://study-japan.edu.vn/', 'http://study-japan.edu.vn/', $item->link).'">'.str_replace('http://study-japan.edu.vn/', 'http://study-japan.edu.vn/', $item->link).'</a>'; echo '<br>';
			$row = array(
				"id" 				=> (string) $wp->post_id,
				"menu_type" 		=> "du-hoc-nhat-ban",
				"news_category_id" 	=> 27,
				"title" 			=> (string) $item->title,
				"link"				=> (string) $wp->post_name,
				"content"			=> (string) $ct->encoded,
				"description"		=> get_description((string) $ct->encoded),
				"photo"				=> $photo,
				"z_index"			=> 9999,
				"create_date"		=> (string) $wp->post_date,
				"is_active"			=> 1,
				"user_id"			=> 99,
				"lang"				=> 'vi',
				"seo_title"			=> '',
				"seo_description"	=> '',
				"seo_keyword"		=> '',
				"luotview"		=> '',
			);
			#echo "<pre>";print_r($row);echo "</pre>";
			$oDb->autoExecute("news", $row, DB_AUTOQUERY_INSERT);
		}
	}
}

function get_description($content)
{
	$content = strip_tags($content);
	$return = mb_substr($content, 0, 600, "utf-8");
	return $return;
}

function getSrcImg($content)
{
	$dom = new DOMDocument();	
	@$dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
	// get src of IMG tag first <img src="" />
	$tags = $dom->getElementsByTagName('img');
	foreach ($tags as $tag)	{
		return $tag->getAttribute('src');
		break;
	}
	return "";
}

function getLast($str)
{
	$ex = @explode("/", $str);
	return $ex[count($ex)-1];
}

function getExt($str)
{
	$ex = @explode(".", $str);
	return $ex[count($ex)-1];
}


class SimpleImage
{ 
	var $image;
	var $image_type;
	
	function load($filename) {
	
	  $image_info = getimagesize($filename);
	  $this->image_type = $image_info[2];
	  if( $this->image_type == IMAGETYPE_JPEG ) {
	
		 $this->image = imagecreatefromjpeg($filename);
	  } elseif( $this->image_type == IMAGETYPE_GIF ) {
	
		 $this->image = imagecreatefromgif($filename);
	  } elseif( $this->image_type == IMAGETYPE_PNG ) {
	
		 $this->image = imagecreatefrompng($filename);
	  }
	}
	
	function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
   // do this or they'll all go to jpeg
   $image_type=$this->image_type;
  if( $image_type == IMAGETYPE_JPEG ) {
     imagejpeg($this->image,$filename,$compression);
  } elseif( $image_type == IMAGETYPE_GIF ) {
     imagegif($this->image,$filename);  
  } elseif( $image_type == IMAGETYPE_PNG ) {
    // need this for transparent png to work          
    imagealphablending($this->image, false);
    imagesavealpha($this->image,true);
    imagepng($this->image,$filename);
  }   
  if( $permissions != null) {
     chmod($filename,$permissions);
  }
	}
	
	function output($image_type=IMAGETYPE_JPEG) {
	
	  if( $image_type == IMAGETYPE_JPEG ) {
		 imagejpeg($this->image);
	  } elseif( $image_type == IMAGETYPE_GIF ) {
	
		 imagegif($this->image);
	  } elseif( $image_type == IMAGETYPE_PNG ) {
	
		 imagepng($this->image);
	  }
	}
	function getWidth() {
	
	  return imagesx($this->image);
	}
	function getHeight() {
	
	  return imagesy($this->image);
	}
	function resizeToHeight($height) {
	
	  $ratio = $height / $this->getHeight();
	  $width = $this->getWidth() * $ratio;
	  $this->resize($width,$height);
	}
	
	function resizeToWidth($width) {
	  $ratio = $width / $this->getWidth();
	  $height = $this->getheight() * $ratio;
	  $this->resize($width,$height);
	}
	
	function scale($scale) {
	  $width = $this->getWidth() * $scale/100;
	  $height = $this->getheight() * $scale/100;
	  $this->resize($width,$height);
	}
	
	
	function resize($width,$height,$forcesize='n') {
	  /* optional. if file is smaller, do not resize. */
	  if ($forcesize == 'n') {
		  if ($width > $this->getWidth() && $height > $this->getHeight()){
			  $width = $this->getWidth();
			  $height = $this->getHeight();
		  }
	  }
	
	  $new_image = imagecreatetruecolor($width, $height);
	  /* Check if this image is PNG or GIF, then set if Transparent*/  
	  if(($this->image_type == IMAGETYPE_GIF) || ($this->image_type==IMAGETYPE_PNG)){
		  imagealphablending($new_image, false);
		  imagesavealpha($new_image,true);
		  $transparent = imagecolorallocatealpha($new_image, 255, 255, 255, 127);
		  imagefilledrectangle($new_image, 0, 0, $width, $height, $transparent);
	  }
	  imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
	
	  $this->image = $new_image;  
		}
}

die();
