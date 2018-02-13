<?

	namespace Classes;

	require_once("Config.php");

	use PDO;
	use Classes\Config;

	/**
	* Basic Class
	*
	*/
	abstract class Basic{

		/**
		* Get the PDO database connections
		*
		* @return mixed
		*/
		protected static function getDB(){

			static $db = null;

			if($db === null){

				$db = new PDO("mysql:host=". Config::DB_HOST .";dbname=". Config::DB_NAME .";charset=utf8", Config::DB_USER, Config::DB_PASS);

				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				return $db;

			}

		}

	}

?>