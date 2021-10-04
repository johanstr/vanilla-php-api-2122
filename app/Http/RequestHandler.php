<?php


namespace App\Http;


class RequestHandler
{
   private array $routes;
   private string $request_type;


   public function __construct(array $routes)
   {
      $this->routes = $routes;

      $this->request_type = strtoupper($_SERVER['REQUEST_METHOD']);

      $this->parseURI();
   }

   private function parseURI()
   {

   }

   public function handleRequest()
   {

   }
}