/* Lab 5 JavaScript File 
   Place variables and functions in this file */

window.onload = function() { //when browser loads
	document.getElementById("firstName").focus(); //set focus to first field in form
	document.getElementById('comments').onfocus = function() { //when focused
    if (this.value == "Please enter your comments") { //checks if the text has been editted
      this.value = ""; //clear area
    }
	};
	document.getElementById('comments').onblur = function() { //when out of focus
		if (this.value == "") { //if there is no text
			this.value = "Please enter your comments"; //reset text
		}
	};
}

function validate(formObj) {
  // put your validation code here
  // it will be a series of if statements

  var check = true; //boolean for success
  var missingFields = ""; //string for all errors
  
  if (formObj.firstName.value == "") { //if field is empty
   	missingFields += "You must enter a first name \n"; //add error message to string
    formObj.firstName.focus(); //set focus
   	check = false; //check fails
  }

  if (formObj.lastName.value == "") { //if field is empty
   	missingFields += "You must enter a last name \n"; //add error message to string
    formObj.lastName.focus(); //set focus
   	check = false; //check fails
  }
  
  if (formObj.title.value == "") { //if field is empty
   	missingFields += "You must enter a title \n"; //add error message to string
    formObj.title.focus(); //set focus
   	check = false; //check fails
  }
  
  if (formObj.org.value == "") { //if field is empty
   	missingFields += "You must enter an organization \n"; //add error message to string
    formObj.org.focus(); //set focus
   	check = false; //check fails
  }
  
  if (formObj.pseudonym.value == "") { //if field is empty
   	missingFields += "You must enter a Nickname \n"; //add error message to string
    formObj.pseudonym.focus(); //set focus
   	check = false; //check fails
  }

  if (formObj.comments.value == "" || formObj.comments.value == "Please enter your comments") { //if field is empty
   	missingFields += "You must enter a comment \n"; //add error message to string
    formObj.comments.focus(); //set focus
   	check = false; //check fails
  }
  
  if (!check) { //if form did not validate
  	alert(missingFields); //alert string
  } else {
      alert("Your form has been successfully submited");
  }

  return check; //return status
}

function nickName(formObj) {

	if (validate(formObj)) { //if form validates
		alert(formObj.firstName.value + " " + formObj.lastName.value + " is " + formObj.pseudonym.value); //alert string
	}
}


