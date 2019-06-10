<style>
body {
  margin: 0;
  padding:0;
  height:100%
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
    //color:green;
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
	font-size: 14px;
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
 
 $baseColor: #398B93;
$borderRadius: 10px;
$imageBig: 100px;
$imageSmall: 60px;
$padding: 10px;

img {
   border-radius: 50%;
   height: $imageSmall;
   width: $imageSmall;
}

.table-users {
   border: 1px solid darken($baseColor, 5%);
   border-radius: $borderRadius;
   box-shadow: 3px 3px 0 rgba(0,0,0,0.1);
   max-width: calc(100% - 2em);
   margin: 1em auto;
   overflow: hidden;
   width: 800px;
}

table {
   width: 100%;
   
   td, th { 
      color: darken($baseColor, 10%);
      padding: $padding; 
   }
   
   td {
      text-align: center;
      vertical-align: middle;
      
      &:last-child {
         font-size: 0.95em;
         line-height: 1.4;
         text-align: left;
      }
   }
   
   th { 
      background-color: lighten($baseColor, 50%);
      font-weight: 300;
   }
   
   tr {     
      &:nth-child(2n) { background-color: white; }
      &:nth-child(2n+1) { background-color: lighten($baseColor, 55%) }
   }
}

@media screen and (max-width: 700px) {   
   table, tr, td { display: block; }
   
   td {
      &:first-child {
         position: absolute;
         top: 50%;
         transform: translateY(-50%);
         width: $imageBig;
      }

      &:not(:first-child) {
         clear: both;
         margin-left: $imageBig;
         padding: 4px 20px 4px 90px;
         position: relative;
         text-align: left;

         &:before {
            color: lighten($baseColor, 30%);
            content: '';
            display: block;
            left: 0;
            position: absolute;
         }
      }

      &:nth-child(2):before { content: 'Name:'; }
      &:nth-child(3):before { content: 'Email:'; }
      &:nth-child(4):before { content: 'Phone:'; }
      &:nth-child(5):before { content: 'Comments:'; }
   }
   
   tr {
      padding: $padding 0;
      position: relative;
      &:first-child { display: none; }
   }
}

@media screen and (max-width: 500px) {
   .header {
      background-color: transparent;
      color: lighten($baseColor, 60%);
      font-size: 2em;
      font-weight: 700;
      padding: 0;
      text-shadow: 2px 2px 0 rgba(0,0,0,0.1);
   }
   
   img {
      border: 3px solid;
      border-color: lighten($baseColor, 50%);
      height: $imageBig;
      margin: 0.5rem 0;
      width: $imageBig;
   }
   
   td {
      &:first-child { 
         background-color: lighten($baseColor, 45%); 
         border-bottom: 1px solid lighten($baseColor, 30%);
         border-radius: $borderRadius $borderRadius 0 0;
         position: relative;   
         top: 0;
         transform: translateY(0);
         width: 100%;
      }
      
      &:not(:first-child) {
         margin: 0;
         padding: 5px 1em;
         width: 100%;
         
         &:before {
            font-size: .8em;
            padding-top: 0.3em;
            position: relative;
         }
      }
      
      &:last-child  { padding-bottom: 1rem !important; }
   }
   
   tr {
      background-color: white !important;
      border: 1px solid lighten($baseColor, 20%);
      border-radius: $borderRadius;
      box-shadow: 2px 2px 0 rgba(0,0,0,0.1);
      margin: 0.5rem 0;
      padding: 0;
   }
   
   .table-users { 
      border: none; 
      box-shadow: none;
      overflow: visible;
   }
}
</style>