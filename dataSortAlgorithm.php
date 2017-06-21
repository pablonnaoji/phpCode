<?php

	
		include_once($_SERVER["DOCUMENT_ROOT"]."/_resources/simplepie-1-3-1/autoloader.php");
$feed = new SimplePie();
		$feed->set_feed_url(array(
			'http://librarynews.pepperdine.edu/category/news/feed/',
            'http://librarynews.pepperdine.edu/category/resources-reviews/feed/',
            'http://librarynews.pepperdine.edu/category/news/feed/',
			));
		$feed->enable_cache(true);
		$feed->set_cache_location($_SERVER['DOCUMENT_ROOT'].'/_resources/cache');
		$feed->set_cache_duration(3600); //3600
		$feed->init();
	
	
	$arrFeedStack = array();

foreach ($feed->get_items() as $property):

 $rss_title = $property->get_title();
 $rss_url = $property->get_permalink();
 
 $arrFeedStack[$property->get_title()] = $property;


endforeach;
echo "<ul>";
foreach ($arrFeedStack as $item) {
	
			
echo "<li><a href=\"" . $item->get_permalink() . "\">" . $item->get_title() . "</a>";
//echo "<li>" . $item->get_title . "</li>";
}
 

echo "</ul>";
?>
