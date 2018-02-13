<?

	set_time_limit(600);

	require_once("Classes/Crawl.php");

	use Classes\Crawl;

	$crawl = new Crawl;

	/* THIS PART IS PRETTY QUICK */

	$jsonurl = "https://api.spiget.org/v2/resources/free?size=8000&fields=id%2Cname%2Cdownloads%2Cauthor";
	
	$data = file_get_contents($jsonurl);
	$test = array();
	$test = json_decode($data, true);

	foreach($test as $plugin){

		$crawl->addPlugin($plugin);

	}

	// then

	/* THIS PART TAKES A LONG ASS TIME */

	// param is the offset for the SQL query
	$crawl->updatePlugins(7800);


?>