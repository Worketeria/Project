
  function validation()
  {
    var user = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var contact = document.getElementById('contact').value;
    var prog = document.getElementById('program').value;

    if (user == "") {
      document.getElementById('username').innerHTML  =" **Must required";
      return false;
    }
    if(user.length < 2)
    {
      document.getElementById('username').innerHTML =" *your username must be more than one character";
      return false;
    }
    if(!isNaN(user))
    {
      document.getElementById('username').innerHTML =" *your username must be in character";
      return false;
    }
 if (email == "") {
      document.getElementById('mail').innerHTML  =" **Email-id is required";
      return false;
    }
    if(email.indexOf('@') <= 0)
    {
      document.getElementById('mail').innerHTML  =" **Invalid position of Email-id";
      return false;
    }
    if ((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.'))
    {
      document.getElementById('mail').innerHTML  =" **Invalid Email-id";
      return false;
    }
if (contact == "") {
      document.getElementById('contactNo').innerHTML  =" **required";
      return false;
    }
 if(isNaN(contact))
    {
      document.getElementById('contactNo').innerHTML  =" **only digits are allowed";
      return false;
    }
    if(contact.length!=10)
    {
      document.getElementById('contactNo').innerHTML  =" **enter 10 digits number";
      return false;
    }
 }
