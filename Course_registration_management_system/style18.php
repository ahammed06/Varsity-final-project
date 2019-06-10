<style>
body {
  margin: 0;
  padding:0;
  height:100%;
  background-image:url("images/wall8.jpg");
  background-size: cover; 
  //background-repeat: no-repeat;
  //background-attachment: fixed;
  //background-position:center;
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
  font-size:18px;
}
/* Fixed sidenav, full height */
.sidenav {
  height: 325px;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 190px; 
  margin: 0;
  background-color: #111;
  overflow-x: hidden;
}

/* Style the sidenav links and the dropdown button */
.sidenav a{
  padding: 10px 8px 16px 16px;
  text-decoration: none;
  font-size: 17px;
  font-weight: bold;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: inset;
}

/* On mouse-over */
.sidenav a:hover{
  color: #f1f1f1;
}

/* Main content */
.main {
  margin-left: 0px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}
.content {
  padding: 16px;
  color:white;
}
.welcome{
	text-align:center;
	color: black;
	font-size: 30px;
}
table {
    border: 1px solid black;
    border-collapse: collapse;
	padding-left:440px;
    }
th{
    border: 2px solid #dddddd;
    padding: 5px;
    text-align: center;
    color:green;
    font-size: 10pt;

}
td {
    border: 2px solid #dddddd;
    padding: 02px;
    text-align: center;
	font-weight:bold;
    color:green;
    font-size: 10pt;
    opacity: 0.7;
}
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
}
label{
	font-family:cambria math;
	font-weight: bold;
	font-size:17px;
}

li {
    float: left;
}

li1 {
    float: right;
}
li3 {
    float: center;
}
li3 a {
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

//menu2
ul2 {
  list-style-type: none;
  margin: 50;
  padding: 0;
  width: 25%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li2 a {
	width: 30%;
	margin-left: 35%;
	margin-right: 35%;
	text-align: center;
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li2 a.active {
  background-color: #4CAF50;
  color: white;
}

li2 a:hover:not(.active) {
  background-color: #555;
  color: white;
}

ul2 hr {
	width: 30%;
}

//login

body, html {
    height: 100%;
    font-family: cambria math;
}

* {
    box-sizing: border-box;
}

.bg-img {
    /* The image used */
    background-image: url("images/wall8.jpg");
height:100%;
    //min-height: 600px;

    /* Center and scale the image nicely */
    //background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}
.bg {
  max-width: 1000px;
  position: relative;
  margin: auto;
  background-image:url("images/wall8.jpg");
}
.footer {
  padding: 10px 16px;
  color:black;
  background:lightgray;
  font-size:18px;
}
/* Add styles to the form container */
.container {
    position: absolute;
	height:100%;
	width: 20%;
	margin-left: 40%;
	margin-right: 40%;
	margin-top: 20px;
	font-size:17px;
    //left: 500px;
    //margin: 20px;
    //max-width: 300px;
    padding: 10px;
   // background-color: white;
	font-size: 14px;
    height: 0px;	

}

/* Full-width input fields */
input[type=text], input[type=password], input[type=email], input[type=number], input[type=tel] {
    width: 100%;
    padding: 06px;
    margin: 3px 0 15px 0;
    border: none;
	font-size: 14px;
    background: #D2CCCC;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #E6DEDE;
    outline: none;
	font-size: 14px;
}
.form-control{width: 100%;
    padding: 06px;
    margin: 3px 0 15px 0;
    border: none;
	font-size: 14px;
    background: #D2CCCC;
	}
}
/* Set a style for the submit button */
.btn {
    background-color: #22287C;
    color: white;
	font-size: 14px;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
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
	font-size:15px;
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

.column {
  float: left;
  width: 33.33%;
  border-style: ridge;
  border-color: white;
  padding: 10px;
  height: 150px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
 }

</style>