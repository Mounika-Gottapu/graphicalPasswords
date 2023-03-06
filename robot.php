<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.gstatic.com/firebasejs/9.15.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.15.0/firebase-firestore-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.15.0/firebase-auth-compat.js"></script>
    <script src="final1.js"></script>



    <title>Register | GPA</title>

</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Fredoka&family=Poppins:wght@300&family=Satisfy&display=swap');


    /* body {
        background-size: 100% 100%;
        background-attachment: fixed;
        background-image: url('1.jpg');
        background-repeat: no-repeat;
        margin: 0pc;
        padding: 0%;
        font-family: 'Poppins', sans-serif;
    } */

    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        /* background-image: url('1.jpg'); */
        background-attachment: fixed;
        background-size: 100% 100%;
        background-repeat: no-repeat;
        font-size: 16px;
        background-color: #959499;
    }

    nav {
        display: flex;
        justify-content: center;
        height: 55px;
        background: #7395AE;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
        border-bottom: 3px solid black;
    }

    ::-webkit-input-placeholder {
        color: #d9d9d9;
    }

    .info {
        color: rgba(4, 45, 83, 0.699);
        text-shadow: 0.5px 0.5px 1px black;
        text-align: center;
    }

    .instruct {
        padding: 0 150px;
        /* color: whitesmoke; */
        font-size: 22px;
        text-align: center;
    }

    .main_page {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .grid {
        display: flex;
        justify-content: center;
        margin: 12px 0 12px 0;
        /*background: rgba(107, 109, 110, 0.529);*/
        border-radius: 5px;
        /*margin-left: 36%;
        margin-right: 34.5%;*/
    }

    .but {
        margin: 6px;
        border-radius: 5px;
        background-color: white;
        padding: 3px;
    }

    .signin-form {
        display: flex;
        flex-direction: column;
        padding: 10px 30px;
        /*align-items: center;*/
        width: 30%;
        border: 3px solid rgba(4, 45, 83, 0.699);
        border-radius: 1px;
        box-shadow: 0px 0px 2px 1px white;
    }

    .rad {
        margin-top: 20px;
        font-size: 14px;
        text-align: left;
        display: flex;
        flex-direction: column;
    }


    label {
        display: flex;
        align-items: center;
    }

    img {
        border-radius: 8px;
        margin: 3px;
        border: 1px solid black;
    }

    button {
        margin-top: 3px;
        background-color: white;
        border: 1px solid white;
        border-radius: 10px;
        transition-duration: 0.4s;
    }

    button:hover {
        transform: scale(1.25);
        border-radius: 10px;
        cursor: pointer;
        transition-duration: 0.1s;
        background-color: #aaaaaa9c;
        border: 1px solid black;
        font-weight: bold;
    }

    button:active {
        content: "";
        position: relative;
        border-radius: 4em;
        opacity: 0;
        transition: 0s;
        background-color: black;
    }

    input {
        font-size: 17px;
        box-sizing: border-box;
        height: 40px;
        padding-left: 10px;
        padding-right: 10px;
        text-align: left;
        border: 2px solid rgba(4, 45, 83, 0.699);
        border-radius: 4px;
        background: white;
        outline: none;
        width: 300px;
    }

    .ch {
        height: 20px;
        width: 20px;
    }

    .controls {
        display: flex;
        justify-content: center;
    }

    .con {
        width: 150px;
        height: 40px;
        margin: 10px 30px;
        font-family: inherit;
        font-size: 22px;
        font-weight: bold;
        background: #7395AE;
    }

    html,
    body {
        height: 100%;
    }

    .captcha {
        background-color: #f9f9f9;
        border: 2px solid #d3d3d3;
        border-radius: 5px;
        color: #4c4a4b;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    @media screen and (max-width: 500px) {
        .captcha {
            flex-direction: column;
        }

        .text {
            margin: .5em !important;
            text-align: center;
        }

        .logo {
            align-self: center !important;
        }

        .spinner {
            margin: 2em .5em .5em .5em !important;
        }
    }

    .text {
        font-size: 1.75em;
        font-weight: 500;
        margin-right: 1em;
    }

    .spinner {
        position: relative;
        width: 2em;
        height: 2em;
        display: flex;
        margin: 2em 1em;
        align-items: center;
        justify-content: center;
    }

    input[type="checkbox"] {
        position: absolute;
        opacity: 0;
        z-index: -1;
    }

    input[type="checkbox"]+.checkmark {
        display: inline-block;
        width: 2em;
        height: 2em;
        background-color: #fcfcfc;
        border: 2.5px solid #c3c3c3;
        border-radius: 3px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    input[type="checkbox"]+.checkmark span {
        content: '';
        position: relative;
        /*
	position:absolute;
	border-bottom:3px solid;
	border-right:3px solid;
	border-color:#029f56;*/
        margin-top: -3px;
        transform: rotate(45deg);
        width: .75em;
        height: 1.2em;
        opacity: 0;
    }

    input[type="checkbox"]+.checkmark>span:after {
        content: '';
        position: absolute;
        display: block;
        height: 3px;
        bottom: 0;
        left: 0;
        background-color: #029f56;
    }

    input[type="checkbox"]+.checkmark>span:before {
        content: '';
        position: absolute;
        display: block;
        width: 3px;
        bottom: 0;
        right: 0;
        background-color: #029f56;
    }

    input[type="checkbox"]:checked+.checkmark {
        animation: 2s spin forwards;
    }

    input[type="checkbox"]:checked+.checkmark>span {
        animation: 1s fadein 1.9s forwards;
    }

    input[type="checkbox"]:checked+.checkmark>span:after {
        animation: .3s bottomslide 2s forwards;
    }

    input[type="checkbox"]:checked+.checkmark>span:before {
        animation: .5s rightslide 2.2s forwards;
    }

    @keyframes fadein {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    @keyframes bottomslide {
        0% {
            width: 0;
        }

        100% {
            width: 100%;
        }
    }

    @keyframes rightslide {
        0% {
            height: 0;
        }

        100% {
            height: 100%;
        }
    }

    .logo {
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100%;
        align-self: flex-end;
        margin: 0.5em 1em;
    }

    .logo img {
        height: 2em;
        width: 2em;
    }

    .logo p {
        color: #9d9ba7;
        margin: 0;
        font-size: 1em;
        font-weight: 700;
        margin: .4em 0 .2em 0;
    }

    .logo small {
        color: #9d9ba7;
        margin: 0;
        font-size: .8em;
    }

    @keyframes spin {
        10% {
            width: 0;
            height: 0;
            border-width: 6px;
        }

        30% {
            width: 0;
            height: 0;
            border-radius: 50%;
            border-width: 1em;
            transform: rotate(0deg);
            border-color: rgb(199, 218, 245);
        }

        50% {
            width: 2em;
            height: 2em;
            border-radius: 50%;
            border-width: 4px;
            border-color: rgb(199, 218, 245);
            border-right-color: rgb(89, 152, 239);
        }

        70% {
            border-width: 4px;
            border-color: rgb(199, 218, 245);
            border-right-color: rgb(89, 152, 239);
        }

        90% {
            border-width: 4px;
        }

        100% {
            width: 2em;
            height: 2em;
            border-radius: 50%;
            transform: rotate(720deg);
            border-color: transparent;
        }
    }

    ::selection {
        background-color: transparent;
        color: teal;
    }

    ::-moz-selection {
        background-color: transparent;
        color: teal;
    }
</style>

<body>
    <nav>
        <h1>Register</h1>

    </nav>
    <div class="ins" style="text-align: center;">Please enter your details and select a category</div>

    <div class="instruct">
        <h5>
            <marquee>Select atleast 6 images for password</marquee>
        </h5>
    </div>
    <div class="main_page">
        <div class="signin-form" autocomplete="off" ;">
            <label for="firstname"><b>First Name*</b></label>
            <input id="firstname" autocomplete="off" placeholder="Enter your first name" type="text"
                required="required" /></br>
            <label for="lastname"><b>Last Name*</b></label>
            <input id="lastname" autocomplete="off" placeholder="Enter your last name" type="text"
                required="required" /></br>
            <label for="email"><b>Username*</b></label>
            <input type="email" id="email" placeholder="Enter your email" required="required" autocomplete="off"
                style="margin-bottom: 10px;" /></br>
            <label for="password"><b>Password</b></label>
            <input id="password" autocomplete="off" placeholder="Select Images for password" readonly="readonly"
                type="password" /></br>
            <div class="rad">
                <h3>Please select a category for password formation:</h3>
                <label><input type="radio" name="option" value="sportperson" class="ch" checked="checked"
                        onclick="random()">Sports Person</label>
                <label><input type="radio" name="option" value="actor" class="ch" onclick="random()">Actor &
                    Actress</label>
                <label><input type="radio" name="option" value="car" class="ch" onclick="random()">Car Logos</label>
                <label><input type="radio" name="option" value="cartoon" class="ch" onclick="random()">Cartoons</label>
                <label><input type="radio" name="option" value="chocolate" class="ch"
                        onclick="random()">Chocolates</label>

                <button id='signup-btn'>Signup</button>
                <script>
                    document.getElementById('signup-btn').addEventListener('click', function (event) {
                        event.preventDefault();
                        checkUserFirstName();
                        checkUserLastName();
                        checkUserEmail();
                        var email = document.getElementById("email").value;
                        const pas = document.getElementById("password").value;

                        const promise = auth.createUserWithEmailAndPassword(email, pas);
                        promise.catch(e => alert(e.message));

                        var response = grecaptcha.getResponse();
                        if (response.length == 0) {
                            document.getElementById("g-recaptcha-error").innerHTML = '<span style="color:red;" > This field is required.</span > ';
                        }
                        else {
                            activeUser();
                        }

                    })
                    function verifyCaptcha() {
                        document.getElementById(" g-recaptcha-error").innerHTML = '';
                    }
                </script>
            </div>
            <div class="g-recaptcha" data-sitekey="6LdyCKkjAAAAAK_j6G_y_QoKugJpJ_iGkymTG8In"
                data-callback="verifyCaptcha">
            </div>
            <div id="g-recaptcha-error"></div>

            <script src='https://www.google.com/recaptcha/api.js' async defer></script>

            <script src="https://www.google.com/recaptcha/api.js?&render=explicit" async defer></script>
        </div>
        <div class="grid">
            <div class="grid1">
                <div id="a0" class="but"></div>
                <div id="a1" class="but"></div>
                <div id="a2" class="but"></div>
            </div>
            <div class="grid2">
                <div id="a3" class="but"></div>
                <div id="a4" class="but"></div>
                <div id="a5" class="but"></div>
            </div>
            <div class="grid3">
                <div id="a6" class="but"></div>
                <div id="a7" class="but"></div>
                <div id="a8" class="but"></div>
            </div>
        </div>
    </div>
    <center>
        <a href="login.html" class="info">
            Already have account? Sign In.
        </a>
        <br>
        <a href="home.html" class="info">
            Return to Home.
        </a>
    </center>
    <div class="controls">
        <button onclick="reset()" class="con">Reset</button>

        <!--<button name="signup" onclick="signUp()" class="con">Sign Up</button>-->
    </div>

</body>

</html>