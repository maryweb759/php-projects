
  var fname = document.getElementById("f-name");
   var email = document.getElementById("email"); 
   var message = document.getElementById("message"); 
   var nameErr = document.getElementsByClassName("nameerr")[0];
   var emailErr = document.getElementsByClassName("emailerr")[0];
   var messageErr = document.getElementsByClassName("msgerr")[0]; 
   var submit = document.getElementById("submit"); 
   console.log( fname, email);
   var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
   nameformat =  /[(A-Za-z)]{6}/ ;
   email.addEventListener('blur', email_v);
   fname.addEventListener('blur', name_v);
   message.addEventListener('blur', message_v);
  
   // email validation /^[(A-Za-z){6}]+$/ ;
   function email_v() { 
    if(!email.value.match(mailformat)) { 
        emailErr.style.display = "block";
    } else { 
        emailErr.style.display= "none";
    }
}  
// name validation 
function name_v() { 
    if(!fname.value.match(nameformat)) { 
        nameErr.style.display = "block";
    } else { 
        nameErr.style.display= "none";
    }
} 
// email validation 
function message_v() { 
    if(message.value.length < 18) { 
        messageErr.style.display = "block";
    } else { 
        messageErr.style.display= "none";
    }
}  
// e.prevantDefault() 
submit.addEventListener('click', function(e) { 
    if( !email.value.match(mailformat) ) { 
        e.preventDefault(); 
      } else if (message.value.length < 18) {
        e.preventDefault(); 
      } else { 
          
      }
} ,false) 