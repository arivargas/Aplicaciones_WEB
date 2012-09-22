<?php
if (!isset($channel)) {
	$channel = array();
}
if (!isset($channel['title'])) {
	$channel['title'] = $title_for_layout;
}

echo $this->Rss->document(
	$this->Rss->channel(
		array(), $channel, $this->fetch('content')
	)
);


    echo $rss->header();
//http://book.cakephp.org/2.0/en/core-libraries/helpers/rss.html#creating-an-rss-feed-with-the-rsshelper
//$documentData $channelData not set:  due to: views can pass variables back to the layout
	if (!isset($documentData)) {
	    $documentData = array();
	}
	if (!isset($channelData)) {
	    $channelData = array();
	}
	if (!isset($channelData['title'])) {
	    $channelData['title'] = $title_for_layout;
	}
	$channel = $this->Rss->channel(array(), $channelData, $content_for_layout);
	echo $this->Rss->document($documentData, $channel);

?>
