// Your web app's Firebase configuration
/*const firebaseConfig = {
    apiKey: "AIzaSyBSTRG-BXOc9X0ZLMcGe3Lb1HiLm_97XPY",
    authDomain: "password-9dd66.firebaseapp.com",
    projectId: "password-9dd66",
    storageBucket: "password-9dd66.appspot.com",
    messagingSenderId: "212638729425",
    appId: "1:212638729425:web:50f8e1838564dd114cb1f0",
  };

// initialize firebase
firebase.initializeApp(firebaseConfig);*/

  // Import the functions you need from the SDKs you need
  //import { initializeApp } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js";

    // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyDcsiZMXWkC8JWHWW8ntJ4h4nX5as5tMKA",
    authDomain: "passwords-c34e7.firebaseapp.com",
    databaseURL: "https://passwords-c34e7-default-rtdb.firebaseio.com",
    projectId: "passwords-c34e7",
    storageBucket: "passwords-c34e7.appspot.com",
    messagingSenderId: "898538968928",
    appId: "1:898538968928:web:7afe4558fd0b3cd57af005"
  };

  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);


// loginForm
const auth = firebase.auth();
var array = [1, 2, 3, 4, 5, 6, 7, 8, 9];            

function random() {
    //shuffle images
    for(let i=array.length-1; i>0; i--) {
    const j = Math.floor(Math.random() * (i+1));
    const temp = array[i];
    array[i] = array[j];
    array[j] = temp;
    }

    const radioButtons = document.querySelectorAll('input[name="option"]');
    let selected;
    for(const radioButton of radioButtons) {
        if(radioButton.checked) {
            selected = radioButton.value;
                break;
        }
    }
    for(let i=0; i<9; i++) {
        document.getElementById(`a${i}`).innerHTML=`
        <button onclick="fill()"><img src="${selected}/${array[i]}.jpg" id="${array[i]}" style="height: 100px; width: 100px;"></button>
    `;
    }
}
            
function fill(e) {
    var cur = document.getElementById('password').value;
    e = e || window.event;
    e = e.target || e.srcElement;
    cur += e.id;
    document.querySelector("#password").value=cur;
}

function checkUserFirstName(){
    var firstName = document.getElementById("firstname").value;
    var flag = false;
    if(firstName === ""){
        flag = true;
    }
    if(flag){
        alert("First Name Can't be Empty!");
    }
}

function checkUserLastName(){
    var lastName = document.getElementById("lastname").value;
    var flag = false;
    if(lastName === ""){
        flag = true;
    }
    if(flag){
        alert("Last Name Can't be Empty!");
    }

}

function checkUserEmail(){
    var userEmail = document.getElementById("email");
    var userEmailFormate = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var flag;
    if(userEmail.value.match(userEmailFormate)){
        flag = false;
    }else{
        flag = true;
    }
    if(flag){
        alert("Invalid Email Entered!");
    }
}

function reset() {
    const pass=document.getElementById("password");
    pass.value = "";
    random();
}

//signup function
function signUp() {
   
    checkUserFirstName();
  checkUserLastName();
  checkUserEmail();
  var email = document.getElementById("email").value;
  const pas=document.getElementById("password").value;

  const promise = auth.createUserWithEmailAndPassword(email, pas);
  promise.catch(e => alert(e.message));
  
 
   
}

function submitUserForm() {
    checkUserFirstName();
  checkUserLastName();
  checkUserEmail();
  var email = document.getElementById("email").value;
  const pas=document.getElementById("password").value;

  const promise = auth.createUserWithEmailAndPassword(email, pas);
  promise.catch(e => alert(e.message));
  
    var response = grecaptcha.getResponse();
    if (response.length == 0) {
        document.getElementById("g-recaptcha-error").innerHTML = '<span style="color:red;" > This field is required.</span > ';
    }
    else
    {
        activeUser();
    }
   
}
function verifyCaptcha() {
    document.getElementById(" g-recaptcha-error").innerHTML = '';
} 
//signIN function
function signIn() {
    checkUserEmail();
    var email = document.getElementById("email");
    const pas=document.getElementById("password").value;

    const promise = auth.signInWithEmailAndPassword(email.value, pas);
    promise.catch(e => alert(e.message));
    const usr_input = document
		.getElementById("submit").value;
	
	// Check whether the input is equal
	// to generated captcha or not
	if (usr_input == captcha.innerHTML) {
		var s = document.getElementById("key")
			.innerHTML = "Matched";
		generate();
        activeUser();
	}
	else {
   
		var s = document.getElementById("key")
			.innerHTML = "not Matched";
		generate();
        alert(" Capcha Not matched");
    }
   
    reset();

  
}

//sing out
function signOut() {
    auth.signOut();
    window.location.href = "home.html";
}

// active user to homepage
function activeUser() {
   
     firebase.auth().onAuthStateChanged((user) => {
         if (user) {
             var email = user.email;
            alert("Active user " + email);
             window.location.href="detail.html";
        }
    // else {
    //      alert("No Active user Found");
    //  }
    })
}

//call random() while reload page
window.onload = random;
var captcha;
function generate() {

	// Clear old input
	document.getElementById("submit").value = "";

	// Access the element to store
	// the generated captcha
	captcha = document.getElementById("image");
	var uniquechar = "";

	const randomchar =
"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

	// Generate captcha for length of
	// 5 with random character
	for (let i = 1; i < 5; i++) {
		uniquechar += randomchar.charAt(
			Math.random() * randomchar.length)
	}

	// Store generated input
	captcha.innerHTML = uniquechar;
}

function printmsg() {
	const usr_input = document
		.getElementById("submit").value;
	
	// Check whether the input is equal
	// to generated captcha or not
	if (usr_input == captcha.innerHTML) {
		var s = document.getElementById("key")
			.innerHTML = "Matched";
		generate();
		activeUser();
	}
	else {
		var s = document.getElementById("key")
			.innerHTML = "not Matched";
		generate();
	}
}


//recaptcha

    
