<?php

namespace YandexDisk;

require_once($_SERVER['DOCUMENT_ROOT'] .'/systemFiles/constants.php');

/**
 * YandexDiskWorker
 * 
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
   
   /**
    * sendQueryYaDisk
    *
    * Метод для создания запроса
    *
    * @param  mixed $urlQuery
    * @param  mixed $methodQuery
    * @return array
    */
   public function sendQueryYaDisk (string $urlQuery, string $methodQuery = 'GET'): array {
    $ch = curl_init($urlQuery);
    switch ($methodQuery) {
        case 'PUT':
            curl_setopt($ch, CURLOPT_PUT, true);
            break;
        // case 'POST':
        //     curl_setopt($ch, CURLOPT_POST, 1);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($arrQuery));
        //     break;
        case 'DELETE':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            break;
    }
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: OAuth ' . ya_token]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $resultQuery = curl_exec($ch);
    curl_close($ch);

    return (!empty($resultQuery)) ? json_decode($resultQuery, true) : [];
   }
   
   /**
    * getDiskInfo
    * 
    * Метод возвращающий общую информацию о диске
    *
    * @return array
    */
   public function getDiskInfo() {
    return $this->sendQueryYaDisk('https://cloud-api.yandex.net/v1/disk/');
   }

   public function getDiskResources() {
    return $this->sendQueryYaDisk('https://cloud-api.yandex.net/v1/disk/resources/files?media_type=audio');
   }
   
}
