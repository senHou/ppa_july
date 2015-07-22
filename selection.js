function checkSelection(num)
{
   if (document.team.game0[0].checked == false && document.team.game0[1].checked == false )
   {
      alert("Please select all the games");
      return false;
   }
   if (document.team.game1[0].checked == false)
   {
      if (document.team.game1[1].checked == false)
      {
         alert("Please select all the games");
         return false;
      }
   }
   if (document.team.game2[0].checked == false)
   {
      if (document.team.game2[1].checked == false)
      {
         alert("Please select all the games");
         return false;
      }
   }
   if (document.team.game3[0].checked == false)
   {
      if (document.team.game3[1].checked == false)
      {
         alert("Please select all the games");
         return false;
      }
   }
   if (document.team.game4[0].checked == false)
   {
      if (document.team.game4[1].checked == false)
      {
         alert("Please select all the games");
         return false;
      }
   }
   if (document.team.game5[0].checked == false)
   {
      if (document.team.game5[1].checked == false)
      {
         alert("Please select all the games");
         return false;
      }
   }
   if (document.team.game6[0].checked == false)
   {
      if (document.team.game6[1].checked == false)
      {
         alert("Please select all the games");
         return false;
      }
   }
   if (document.team.game7[0].checked == false)
   {
      if (document.team.game7[1].checked == false)
      {
         alert("Please select all the gamses");
         return false;
      }
   }
   return true;
}
