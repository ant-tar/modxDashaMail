<?php namespace DMP;

/**
* @author 
* @copyright (c) 
*/
class DashaMailPHP {

	//dashamail api key
	private $apiKey;

	//dashamail api url
	private $apiUrl = 'https://api.dashamail.com/';
	
	//check email
	private $checkUrl = 'http://labs.dashamail.com/email.fix/check.php';

	/** 
	* Create a new instance
	* @param string $apiKey - Optional
	*/
	public function __construct($apiKey = false) {
		if($apiKey){ 
			$this->apiKey = $apiKey;
			
		}
	}
	
	/** 
	* Method to Set Api Key
	* @param string $apiKey
	*/
	public function setApiKey($apiKey)
	{
		$this->apiKey = $apiKey;
	}

	//get error codes
	private function getError($key) {
		$errors = array(
			'2' => 'Ошибка при добавлении в базу',
			'3' => 'Заданы не все необходимые параметры',
			'4' => 'Нет данных при выводе',
			'5' => 'У пользователя нет адресной базы с таким id',
			'6' => 'Некорректный email-адрес',
			'7' => 'Такой пользователь уже есть в этой адресной базе',
			'8' => 'Лимит по количеству активных подписчиков на тарифном плане клиента',
			'9' => 'Нет такого подписчика у клиента',
			'10' => 'Пользователь уже отписан',
			'11' => 'Нет данных для обновления подписчика',
			'12' => 'Не заданы элементы списка',
			'13' => 'Не задано время рассылки',
			'14' => 'Не задан заголовок письма',
			'15' => 'Не задано поле От Кого?',
			'16' => 'Не задан обратный адрес',
			'17' => 'Не задана ни html ни plain_text версия письма',
			'18' => 'Нет ссылки отписаться в тексте рассылки. Пример ссылки: отписаться',
			'19' => 'Нет ссылки отписаться в тексте рассылки',
			'20' => 'Задан недопустимый статус рассылки',
			'21' => 'Рассылка уже отправляется',
			'22' => 'У вас нет кампании с таким campaign_id',
			'23' => 'Нет такого поля для сортировки',
			'24' => 'Заданы недопустимые события для авторассылки',
			'25' => 'Загружаемый файл уже существует',
			'26' => 'Загружаемый файл больше 5 Мб',
			'27' => 'Файл не найден',
			'28' => 'Указанный шаблон не существует',
			'100' => 'Неверные данные для подключения API',
			'101' => 'Несуществующий метод API или указан некорректный метод API',
		);
		return $errors[$key];
	}

	//get data by method
	public function getData($method = null, $params = array()) {
		if (!is_string($method))
			return $this->getError('101');
		//$user = array('username' => $this->username, 'password' => $this->password);
		$auth = array('api_key' => $this->apiKey);
		
		$params = array_merge($auth, $params);
		$params = http_build_query($params);
		$url = $this->apiUrl.'?method='.$method.'&'.$params.'&format=json';
		$options = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => 0,
		);
		$ch = curl_init();
		curl_setopt_array($ch, $options);
		$result = curl_exec($ch);
		if ($result == false)
			throw new Exception(curl_error($ch));
		curl_close($ch);
		//$xml = simplexml_load_string($result);
		//$json = json_encode($xml);
		//$final = json_decode($json, TRUE);
		$final = json_decode($result, TRUE);
		//echo print_r($final);
		if (!$final)
			throw new Exception('Получены неверные данные, пожалуйста, убедитесь, что запрашиваемый метод API существует');
		return $final;
		/*
		if ($final['response']['msg']['err_code'] == '0') {
			return $final['response']['data'];
		} else {
			return $this->getError($final['response']['msg']['err_code']);
		}
		*/
	}

	//send post data
	private function sendData($method = null, $params) {

		if (!is_string($method))
			return $this->getError('101');
		$auth = array('api_key' => $this->apiKey,'format' => 'json');
		$params = array_merge($auth, $params);

		$options = array(
			CURLOPT_URL => $this->apiUrl.'?method='.$method,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $params,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => 0,
			);

		$ch = curl_init();
		curl_setopt_array($ch, $options);
		$result = curl_exec($ch);
		if ($result == false)
			throw new Exception(curl_error($ch));
		curl_close($ch);
		//$xml = simplexml_load_string($result);
		//$json = json_encode($xml);
		//$final = json_decode($json, TRUE);
		$final = json_decode($result, TRUE);
		if (!$final)
			throw new Exception('Получены неверные данные, пожалуйста, убедитесь, что запрашиваемый метод API существует');
		return $final;
		/*if ($final['response']['msg']['err_code'] == '0') {
			return $final['response']['data'];
		} else {
			return $this->getError($final['response']['msg']['err_code']);
		}*/
	}

	//check email address
	public function checkEmail($email) {
		$checking = $this->checkUrl.'?email='.$email.'&format=xml';
		$result = file_get_contents($checking);
		$xml = simplexml_load_string($result);
		$json = json_encode($xml);
		$final = json_decode($json, TRUE);
		if (!$final)
			throw new Exception('При проверке email получены неверные данные');
			
			
		$err = $final['err_code'];
		if ($err == '0' || $err == '1') {
			return $final['text'];
		} else {
			return false;
		}
	}


	/*****************************************************************
	**************** Работа с Адресными Базами ***********************
	******************************************************************/
	//lists.get - Получаем список баз пользователя
	/*
	optional: list_id
	*/
	public function lists_get($list_id = '') {
	    echo "GET LISTS";
		if (!empty($list_id))
			$params = array('list_id' => $list_id);
		else
			$params = array();
		return $this->getData('lists.get', $params);
	}

	//lists.add_member - Добавляем подписчика в базу
	/*
	required: list_id, email
	optional: merge_1, merge_2..., update...
	see: http://dashamail.ru/api_details.php?method=lists.add_member
	*/
	public function lists_add_member($list_id = null, $email = null, $params = array()) {
		if (is_null($list_id) || is_null($email))
			return $this->getError('3');
		$email = $this->checkEmail($email);
		if ($email !== false)
			$required = array('list_id' => $list_id, 'email' => $email);
		else
			return $this->getError('6');
		$params = array_merge($required, $params);
		return $this->sendData('lists.add_member', $params);
	}

	

}
