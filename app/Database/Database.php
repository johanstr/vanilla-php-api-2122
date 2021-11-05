<?php
namespace App\Database;


use PDO;
use PDOException;
use PDOStatement;

class Database
{
   private static string $dbHost = '127.0.0.1';
   private static string $dbName = 'forum_klas1_2021';
   private static string $dbUser = 'root';
   private static string $dbPass = 'root';

   private static PDO|null $dbConnection = null;
   private static PDOStatement|null $dbStatement = null;

   private static function connect()
   {
      if(is_null(self::$dbConnection)) {
         try {
            self::$dbConnection = new PDO(
               'mysql:host=' . self::$dbHost . ';dbname=' . self::$dbName,
               self::$dbUser, self::$dbPass
            );
         } catch (PDOException $error) {

         }
      }
   }

   public static function query(string $sql, array $placeholders = []): void
   {
      self::connect();

      self::$dbStatement = self::$dbConnection->prepare($sql);
      self::$dbStatement->execute($placeholders);
   }

   public static function get(): array
   {
      if(!is_null(self::$dbStatement)) {
         return self::$dbStatement->fetch(PDO::FETCH_ASSOC);
      }

      return [];
   }

   public static function getAll(): array
   {
      if(!is_null(self::$dbStatement)) {
         return self::$dbStatement->fetchAll(PDO::FETCH_ASSOC);
      }

      return [];
   }

   public static function insert(): void
   {

   }
}
