<?

	namespace Classes;

	require_once("Basic.php");

	use PDO;

	/**
	* Auth
	*
	*/
	class Crawl extends Basic{

		private $db;

		function __construct(){

			$this->db = static::getDB();

		}	

		function addPlugin($plugin){

			$authID = $plugin['author']['id'];
			$downloads = $plugin['downloads'];
			$pluginID = $plugin['id'];
			$name = $plugin['name'];

			try{

				$stmt = $this->db->prepare("INSERT INTO plugins (authorID, downloads, pluginID, name) VALUES (?, ?, ?, ?)");
				$stmt->bindParam(1, $authID);
				$stmt->bindParam(2, $downloads);
				$stmt->bindParam(3, $pluginID);
				$stmt->bindParam(4, $name);

				$stmt->execute();

			}catch(PDOException $e){

				error_log("Error adding to DB, Name: " . $name);

			}

		}

		function updatePlugins($offset){

			try{

				foreach($this->db->query("SELECT * FROM plugins LIMIT 200 OFFSET " . $offset) as $row){

					$id = $row['id'];

					$resID = $row['pluginID'];

					$name = $this->fetchAuthor($resID);

					$stm = $this->db->prepare("UPDATE plugins SET author = ? WHERE id = ?");
					$stm->bindParam(1, $name);
					$stm->bindParam(2, $id);

					$stm->execute();

				}

				return;
				

			}catch(PDOException $e){

				error_log("Error adding to DB");

			}

		}

		function fetchAuthor($authorID){

			$jsonurl = "https://api.spiget.org/v2/resources/" . $authorID . "/author";
	
			$data = file_get_contents($jsonurl);
			$test = array();
			$test = json_decode($data, true);

			$name = $test['name'];

			return $name;

		}

	}

?>