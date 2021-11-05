<?php
namespace App\Http;


class RequestHandler
{
   private array $routes;
   private string $request_type;
   private string $resource;
   private int $id = 0;


   /**
    * @param array $routes    Bevat alle routes naar de verschillende controllers en methods
    */
   public function __construct(array $routes)
   {
      $this->routes = $routes;

      $this->request_type = strtoupper($_SERVER['REQUEST_METHOD']);

      $this->parseURI();
   }

   /**
    *
    * @return void
    */
   private function parseURI() : void
   {
      // Analyseren URI en klaar zetten in de properties
      if(isset($_GET['resource'])) {
         $this->resource = strtolower($_GET['resource']);

         if (isset($_GET['id'])) {
            $this->id = intval($_GET['id']);
         }
      } else {
         $this->resource = '/';
      }
   }

   public function handleGetRequest()
   {
      $classname = $this->routes[$this->request_type][$this->resource][0]; // 'App\\Http\\Controllers\\' .
      $method_name = $this->routes[$this->request_type][$this->resource][1];

      $controller = new $classname;
      if($this->id !== 0)
         $return_value = $controller->$method_name($this->id);
      else
         $return_value = $controller->$method_name();

      ApiResponse::sendResponse($return_value);
      die();
   }

   private function handleOptionsRequest()
   {
      ApiResponse::sendCORSHeader();
   }



}