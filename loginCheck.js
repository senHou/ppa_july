function checkLogin()
{
   username = document.getElementById("name").value;
   password = document.getElementById("password").value;
   
   if (username == "")
   {
      hideAllErrors();
      document.getElementById("nameError").style.display = "inline";
      document.getElementById("name").select();
      document.getElementById("name").focus();
      return false;
   }
   else if (password == "")
   {
      hideAllErrors();
      document.getElementById("passwordError").style.display = "inline";
      document.getElementById("password").select();
      document.getElementById("password").focus();
      return false;
   }
   return true;
}

function hideAllErrors()
{
   document.getElementById("nameError").style.display = "none"
   document.getElementById("passwordError").style.display = "none"
}
