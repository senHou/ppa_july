<?php

Class Record
{
   private $gameId;
   private $peopleName;
   private $teamName;
   private $weekNo;

   public function __construct($gameId,$peopleName,$teamName,$weekNo)
   {
      $this->gameId = $gameId;
      $this->peopleName = $peopleName;
      $this->teamName = $teamName;
      $this->weekNo = $weekNo;
   }  

   public function getGameId()
   {
      return $this->gameId;
   }
   
   public function getPeopleName()
   {
      return $this->peopleName;
   }
   
   public function getTeamName()
   {
      return $this->teamName;
   }
   
   public function getWeekNo()
   {
      return $this->weekNo;
   }
}
?>
