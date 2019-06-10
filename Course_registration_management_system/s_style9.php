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
.button {
  background-color: #333; /* Green */
  border: solid;
  border-color: black;
  color: white;
  padding: 8px 32px;
  text-align: center;
  font-family:cambria math;
  text-decoration: none;
  display: inline-block;
  font-size: 17px;
  font-weight: bold;
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
.footer {
  padding: 10px 16px;
  color:black;
  background:lightgray;
}
/* Popup box BEGIN */
.hover_bkgr_fricc{
    background:rgba(0,0,0,.4);
    cursor:pointer;
    display:none;
    height:100%;
    position:fixed;
    text-align:center;
    top:0;
    width:100%;
    z-index:10000;
}
.hover_bkgr_fricc .helper{
    display:inline-block;
    height:100%;
    vertical-align:middle;
}
.hover_bkgr_fricc > div {
    background-color: #fff;
    box-shadow: 10px 10px 60px #555;
    display: inline-block;
    height: auto;
    max-width: 551px;
    min-height: 100px;
    vertical-align: middle;
    width: 60%;
    position: relative;
    border-radius: 8px;
    padding: 15px 5%;
}
</style>