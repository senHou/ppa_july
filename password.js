function checkPassword()
{
   var newPassword = document.getElementById("password").value;
   var retry = document.getElementById("retry").value;

   
   if (newPassword == "")
   {
      alert("Please enter a new password.");
      return false;
   }

   if (retry == "")
   {
      alert("Please enter password again.");
      return false;
   }

   if (newPassword != retry)
   {
      alert("The password enterd do not match. re-try");
      return false;
   }

   return true;
}
