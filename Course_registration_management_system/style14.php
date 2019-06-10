<style>
body {
  margin: 0;
  padding:0;
  height:100%
  background-image:url("images/wall8.jpg");
  background-size: cover;
  font-family: cambria math;
}
.bottom{
font-family:cambria math;
font-size:22px;
font-weight:bold;
text-align:center;
color:#520E73;
}
.top-container {
  background-color: #f1f1f1;
  padding: 0px;
  text-align: center;
}
.button {
  background-color: #520E73;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display:block;
  cursor: pointer;
  width: 200px;
  margin:auto;
  font-family:cambria math;
  font-weight:bold;
  font-size: 20px;
}
.button1 {
  background-color: #520E73;
  border: none;
  color: white;
  //padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display:block;
  cursor: pointer;
  //width: 200px;
  margin:auto;
  font-family:cambria math;
  font-weight:bold;
  font-size: 20px;
}
.header {
  padding: 10px 16px;
  color:black;
  background:lightgray;
  font-size: 18px;
}
.footer {
  padding: 10px 16px;
  color:black;
  background:lightgray;
  font-size:18px;
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
    //border: 1px solid black;
    border-collapse: collapse;
	padding-left:440px;
    }
th{
    border: 2px solid black;
    padding: 5px;
    text-align: center;
    color:green;
    font-size: 20px;

}
td {
    border: 2px solid black;
    padding: 02px;
    text-align: center;
	font-weight:bold;
    font-size: 13pt;
    opacity: 0.7;
}
/*menu*/
ul {
    list-style-type: none;
    margin-top: 0px;
    margin-bottom: -10px;
    margin-right: -16px;
    margin-left: -16px;
    padding: 0px;
    overflow: hidden;
    background-color: #333;
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
    font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
}

.bg-img {
    /* The image used */
    background-image: url("images/wall8.jpg");

    min-height: 300px;

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
    padding: 10px;
   // background-color: white;
	font-size: 18px;
    height: 0px;	

}

/* Full-width input fields */
input[type=text], input[type=password] {
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
	font-size: 18px;
    background: #D2CCCC;
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

.column1 {
  float: left;
  width: 30%;
  margin-left:20%;
  border-style: ridge;
  border-color: white;
  padding: 10px;
  height: 150px; /* Should be removed. Only for demonstration */
}

.column2 {
  float: left;
  width: 30%;
  margin-right:20%;
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