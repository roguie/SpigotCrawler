<?

	namespace Classes;

	/**
	* Message Handler
	*
	*/
	class Message{

		/**
		* Output a simple as JSON String
		*
		* @param string $message  The message string
		*
		* @param int $code  The status code
		*
		* @return void
		*/
		public function sendMessage($message, $code){

			$message = array('code'=>$code, 'message'=>$message);

			echo json_encode($message);

			exit();

		}

		/**
		* Output data
		* 
		* @param string $message  The message string
		* @param int    $code     The Status code
		* @param arry   $data     The data
		*
		* @return void
		*/
		public function sendData($message, $code, $data){

			$message = array('code'=>$code, 'message'=>$message, 'data'=>$data);

			echo json_encode($message);

			exit();

		}

	}

?>