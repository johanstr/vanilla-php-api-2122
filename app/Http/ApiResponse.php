<?php
namespace App\Http;

class ApiResponse
{
   // NON CODE
   public const HTTP_NO_STATUS = 0;

   // SUCCESS CODES
   public const HTTP_STATUS_OK = 200;
   public const HTTP_STATUS_CREATED = 201;
   public const HTTP_STATUS_NO_CONTENT = 204;

   // NOT OFFICIAL SUCCESS CODES
   public const HTTP_STATUS_UPDATED = 210;
   public const HTTP_STATUS_DELETED = 211;

   // ERROR CODES
   public const HTTP_STATUS_BAD_REQUEST = 400;
   public const HTTP_STATUS_UNAUTHORIZED = 401;
   public const HTTP_STATUS_FORBIDDEN = 403;
   public const HTTP_STATUS_NOT_FOUND = 404;
   public const HTTP_STATUS_METHOD_NOT_ALLOWED = 405;

   // SERVER ERROR CODES
   public const HTTP_STATUS_SERVER_ERROR = 500;
   public const HTTP_STATUS_NOT_IMPLEMENTED = 501;
   public const HTTP_STATUS_SERVICE_NOT_AVAIL = 503;

   /**
    * sendCORSHeader
    * --------------
    * Sends default CORS response to client
    *
    * @param bool $stop_execution   Stops execution if true
    *
    * @return void
    */
   public static function sendCORSHeader(bool $stop_execution = true): void
   {
      if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
         header('Access-Control-Allow-Origin: *');
         header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
         header('Access-Control-Allow-Headers: token, Content-Type, Accept, Access-Control-Allow-Origin');
         header('Access-Control-Max-Age: 1728000');
         header('Content-Length: 0');
         header('Content-Type: text/plain');
         if($stop_execution)
            die();
      }
   }


   /**
    * sendDefaultHeaders
    * ------------------
    * Sends the default headers for each request-response
    *
    * @return void
    */
   public static function sendDefaultHeaders(): void
   {
      header('Access-Control-Allow-Origin: *');
      header('Content-Type: application/json');
   }

   /**
    * sendStatusCode
    * --------------
    * Sends the status code of the request-response
    *
    * @param int $code
    * @param string $msg
    *
    * @return void
    */
   public static function sendStatusCode(int $code = self::HTTP_STATUS_OK, string $msg = 'OK'): void
   {
      header("HTTP/1.1 $code $msg");
   }


}
