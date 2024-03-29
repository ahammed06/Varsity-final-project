<style>
#previewOverlay{
	width:100%;
	height:100%;
	position:fixed;
	top:0;
	left:0;
	background:url('ie.png');
	background: -moz-linear-gradient(rgba(11,11,11,0.1), rgba(11,11,11,0.6)) repeat-x rgba(11,11,11,0.2);
	background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(rgba(11,11,11,0.1)), to(rgba(11,11,11,0.6))) repeat-x rgba(11,11,11,0.2);
	z-index:100000;
}

#previewBox{
	background:url('body_bg.jpg') repeat-x left bottom #e5e5e5;
	width:460px;
	position:fixed;
	left:50%;
	top:50%;
	margin:-130px 0 0 -230px;
	border: 1px solid rgba(33, 33, 33, 0.6);
	
	-moz-box-shadow: 0 0 2px rgba(255, 255, 255, 0.6) inset;
	-webkit-box-shadow: 0 0 2px rgba(255, 255, 255, 0.6) inset;
	box-shadow: 0 0 2px rgba(255, 255, 255, 0.6) inset;
}

#previewBox h1,
#previewBox p{
	font:26px/1 'Cuprum','Lucida Sans Unicode', 'Lucida Grande', sans-serif;
	background:url('header_bg.jpg') repeat-x left bottom #f5f5f5;
	padding: 18px 25px;
	text-shadow: 1px 1px 0 rgba(255, 255, 255, 0.6);
	color:#666;
}

#previewBox h1{
	letter-spacing:0.3px;
	color:#888;
}

#previewBox p{
	background:none;
	font-size:16px;
	line-height:1.4;
	padding-top: 7px;
}

#previewButtons{
	padding:15px 0 25px;
	text-align:center;
}

#previewBox .button{
	display:inline-block;
	background:url('buttons.png') no-repeat;
	color:white;
	position:relative;
	height: 33px;
	
	font:17px/33px 'Cuprum','Lucida Sans Unicode', 'Lucida Grande', sans-serif;
	
	margin-right: 15px;
	padding: 0 35px 0 40px;
	text-decoration:none;
	border:none;
}

#previewBox .button:last-child{	margin-right:0;}

#previewBox .button span{
	position:absolute;
	top:0;
	right:-5px;
	background:url('buttons.png') no-repeat;
	width:5px;
	height:33px
}

#previewBox .form_yes{				background-position:left top;text-shadow:1px 1px 0 #5889a2;}
#previewBox .form_yes span{			background-position:-195px 0;}
#previewBox .form_yes:hover{		background-position:left bottom;}
#previewBox .form_yes:hover span{	background-position:-195px bottom;}

#previewBox .form_no{				background-position:-200px top;text-shadow:1px 1px 0 #707070;}
#previewBox .form_no span{			background-position:-395px 0;}
#previewBox .form_no:hover{		background-position:-200px bottom;}
#previewBox .form_no:hover span{	background-position:-395px bottom;}
</style>