<style>
body {
  margin: 0;
  padding:0;
  height:100%
  background-image:url("images/wall8.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position:center;
  font-family: cambria math;
}
.top-container {
  background-color: #f1f1f1;
  padding: 0px;
  text-align: center;
}

.header {
  padding: 10px 16px;
  color:black;
  background:lightgray;
  overflow:hidden;
}
.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 20px;  
  border: none;
  outline: none;
  color: white;
  padding: 10px 14px;
  background-color: inherit;
  font-family: cambria math;
  font-weight:bold;
  margin: 0;
}

.dropdown:hover .dropbtn {
  background-color: #A9A9A9;
}

.dropdown-content {
  font-size: 17px;  
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
.footer {
  padding: 10px 16px;
  color:black;
  background:lightgray;
}
.content {
  padding: 16px;
  color:white;
}

.signup {
  color: #DE0E23;
  display: inline-block;
  position: relative;
  text-decoration: none;
  transition: color .4s;
}
.signup:hover { color: #3b3b3b }
/*menu*/
ul {
    list-style-type: none;
    //margin: -3px;
	margin-top: 0px;
    margin-bottom: -10px;
    margin-right: -16px;
    margin-left: -16px;
    padding: 0px;
    overflow: hidden;
    background-color: #333;
	font-size:20px;
}

li {
    float: left;
}

li1 {
    float: right;
}
li2 {
    float: center;
}
li2 a {
    display: block;
    color: white;
    text-align: center;
    padding: 10px 16px;
    text-decoration: none;
}
li a {
    display: block;
    color: white;
    text-align: center;
    padding: 10px 16px;
    text-decoration: none;
}
li1 a {
    display: block;
    color: white;
    text-align: center;
    padding: 10px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #A9A9A9;
}
li1 a:hover {
    background-color: #A9A9A9;
}
//login

body, html {
    height: 100%;
    font-family: cambria math;
	font-size:20px;
}

* {
    box-sizing: border-box;
}

.bg-img {
    /* The image used */
    background-image: url("images/wall8.jpg");

    min-height: 450px;

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}
.bg {
    /* The image used */
    background-image: url("images/wall8.jpg");

    min-height: 450px;

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}
/* Add styles to the form container */
.container {
    position: absolute;
	width: 20%;
	margin-left: 40%;
	margin-right: 40%;
	margin-top: 20px;
    //left: 500px;
    //margin: 20px;
    //max-width: 300px;
    padding: 16px;
    background-color: white;

}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
	font-size: 17px;
    background: #D2CCCC;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #E6DEDE;
    outline: none;
	font-size: 17px;
}

/* Set a style for the submit button */
.btn {
    background-color: #22287C;
    color: white;
	font-size: 20px;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
	font-family:cambria math;
}

.btn:hover {
    opacity: 1;
}
.signup {
  color: #DE0E23;
  display: inline-block;
  position: relative;
  text-decoration: none;
  transition: color .4s;
}
.signup:hover { color: #3b3b3b }

/* Style the tab */
.tab {
    float: left;
    border: 1px solid #9fafc;
    /* background-color: #7198d6; */
    width: 15%;
    height: 100%;
}

/* Style the buttons inside the tab */
.tab button {
    display: block;
    background-color: #000;
    color: white;
    padding: 8px 6px;
	font-size:20px;
    width: 100%;
    height: 50px;
    border: 1px solid #9fafc;
    outline: none;
    text-align: left;
    cursor: pointer;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #5b82c1;
}

/* Create an active/current "tab button" class */
.tab button.active {
    background-color: #2b7dff;
}

/* Style the tab content */
.tabcontent {
    float: left;
    padding: 0px 50px;
    border: 1px solid #9fafc;
    width: 60%;
    border-left: none;
    //height: 1000px;
}


</style>