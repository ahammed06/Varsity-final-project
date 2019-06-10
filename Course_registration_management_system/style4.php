<style>
body {
  margin: 0;
  padding:0;
  height:100%
  background-image:url("images/wall8.jpg");
  //background-size: cover; 
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
}
.content {
  padding: 16px;
  color:white;
}
table {
    border: 1px solid black;
    border-collapse: collapse;
	padding-left:440px;
    }
th{
    border: 2px solid #dddddd;
    padding: 15px;
    text-align: center;
    color:green;
    font-size: 12pt;

}
td {
    border: 2px solid #dddddd;
    padding: 15px;
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
.bg-img {
    /* The image used */
    background-image: url("images/wall8.jpg");

    min-height: 500px;

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
    //left: 500px;
    //margin: 20px;
    //max-width: 300px;
    padding: 10px;
   // background-color: white;
	font-size: 14px;
    height: 30px;	

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

#wrapper
{
 margin:0 auto;
 padding:0px;
 text-align:center;
 width:995px;
}
#wrapper h1
{
 margin-top:50px;
 font-size:45px;
 color:#4C3866;
}
#wrapper h1 p
{
 font-size:18px;
}
#signup_form
{
 background-color:white;
 margin: 10px;
 width:270px;
 margin-left:345px;
 box-shadow:0px 0px 15px 0px #4C3866;
 padding:15px;
}
#signup_form #signup_label
{
 color:#4C3866;
 margin:0px;
 padding-bottom:10px;
 margin-bottom:30px;
 font-size:25px;
 border-bottom:1px solid #E6E6E6;
}
#signup_form input[type="text"]
{
 width:230px;
 height:35px;
 padding-left:10px;
 font-size:16px;
 margin-bottom:15px;
 border:1px solid #D8D8D8;
 color:#585858;
}
#signup_form input[type="submit"]
{
 width:230px;
 margin-left:-4px;
 height:40px;
 font-size:16px;
 font-weight:bold;
 background-color:#775E9B;
 color:white;
 border:none;
 border-bottom:5px solid #4C3866;
 border-radius:3px;
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