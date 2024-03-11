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
    //  $curl = curl_init($urlQuery);
     var_dump((string)$urlQuery);
   }
}
