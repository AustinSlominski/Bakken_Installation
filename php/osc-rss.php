<?php
include 'udp.php';

$DESTINATION = 'localhost';
$SENDPORT = '7400';
$RECVPORT = '7401';

	global $osc;
	global $kount;

	$osc = new OSCClient();
	$osc->set_destination($DESTINATION, $SENDPORT);

function sendItem($messages){

	global $osc;
	global $kount;

	foreach($messages as $message){
		$maxOut = "/rss ";
		foreach($message as $title=>$content){
			$maxOut .= $title.": ".$content."

			";
		}

		$osc->send(new OSCMessage($maxOut));
		sleep(5);
	}
}

class RSSFeed {
	public function __construct(){

	}

	public function getStream($url){
		$feed_url = $url;
		$messages = array();
		$xml = (array)simplexml_load_file($feed_url);

		$i = 0;
		foreach($xml['channel']->item as $val){
			foreach($val as $k=>$v){
				echo $k."
				".$v;
				$messages[$i][$k] = '';
				$messages[$i][$k] .= $v;
			}
			$i++;
		}

		print_r($messages);
		sendItem($messages);
	}

	private function processStream(){

	}
}

$rss = new RSSFeed;
$rss->getStream("http://www.bakkentoday.com/feed/");

?>