<style>
body {
  margin: 0;
  padding:0;
  height:100%;
  background-image:url("images/wall8.jpg");
  background-size: cover; 
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
  font-size: 21px;
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
  margin-left: 240px; /* Same as the width of the sidenav */
  font-size: 21px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: green;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 21px;}
}

//student profile menu 
ul3{
	position: absolute;
	top:50%;
	left:50%; 
	transform:translate(-50%,-50%);
	margin:0;
	padding:20px 0;
	background:#fff;
	display: flex;
	border-radius:10px;
	box-shadow:0 10px 30px rga(0,0,0,.3);
}
ul3 li{
	list-style:none;
	text-align:center;
	display:block;
	border-right:1px solid rgba(0,0,0,0.2);
}
ul3 li:last-child{
	border-right:none;
}
ul3 li a{
	text-decoration:none;
	padding:0 50px;
	display:block;
}
ul3 li a .icon{
	width:40px;
	height:40px;
	text-align:center;
	overflow:hidden;
	margin:0 auto 10px;
}
ul3 li a .icon .fa{
	width:100%;
	height:100%;
	line-height:40px;
	font-size:34px;
	transition:0.5s;
	color:#000;
}
</style>