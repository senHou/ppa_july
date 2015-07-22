<?php
Class Game
{  
   private $id;
   private $team1;
   private $team2;
   private $weekNo;


   public function __construct($id,$team1,$team2,$weekNo)
   {
      $this->id = $id;
      $this->team1 = $team1;
      $this->team2 = $team2;
      $this->weekNo = $weekNo;
   }


   public function getTeam1()
   {
      return $this->team1;
   }  

   public function getTeam2()
   {
      return $this->team2;
   }

   public function getGameId()
   {
      return $this->id;
   }

   public function getWeekNo()
   {
      return $this->weekNo;
   }
}
?>
