// The script that runs when a user changes the password -->

function checkPassword()
{

    // Element ID holding the original password
    var clientPassword = 'clientPassword';

    // Element ID holding the 2nd password
     var confirmationpasswordElement = 'passwordConfirmationInput';


    // Currently entered password
    var userPassword = document.getElementById(clientPassword).value;

    var secondPassword = document.getElementById(confirmationpasswordElement).value;

    // If the passwords don't match, display the text. If they match, hide the message
    if (userPassword != secondPassword) {
        document.getElementById('errorThing').innerHTML = '******** Passwords do not match';
        
        document.getElementById('errorThing').classList = 'display: inline';
        document.getElementById('errorThing').classList = 'text-danger';
    } else {
        document.getElementById('errorThing').classList = 'display: hidden';
    }

    
}  

function showUser(str) {
    if (str == "") {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET","getdetails.php?q="+str,true);
      xmlhttp.send();
    }
  }