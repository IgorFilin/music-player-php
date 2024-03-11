<?php
namespace YandexDisk;
/**
 * YandexDiskWorker
 * 
 * Класс для работы с api yandex диска
 */
class YandexDiskWorker {
  /**
   * Method sendQueryYaDisk
   *   
   * @param string $urlQuery URL для отправки запросов
   * @param string $methodQuery метод отправки
   * 
   * @return array
   * 
   * */  

   public function __construct() {
   }

   public function sendQueryYaDisk (string $urlQuery, string $methodQuery = 'GET'):void {
     $arrayRequest = [
      'GET'    => 'CURLOPT_URL',
      'POST'   => 'CURLOPT_POST',
      'PUT'    => 'CURLOPT_PUT',
      'DELETE' => 'CURLOPT_CUSTOMREQUEST',
     ];
     $curl = curl_init($urlQuery);

     curl_setopt($curl,$arrayRequest[$methodQuery],true);
     $resultQuery = curl_exec($curl);
     var_dump($resultQuery);
   }
}
