<?php  #css:   ?>

<!-- BOOTSTRAP Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- BOOTSTRAP Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<!-- jQuery CSS -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<!--font-awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">	

<!--Dropzone CSS -->
<link rel="stylesheet" href="css/dropzone.css">

<!-- <link type="text/css" rel="stylesheet" href="https://www.blogger.com/static/v1/widgets/2973171168-css_bundle_v2.css"> -->

<style>

	html,
	body {
		height: auto !important;
	   width:100%;
	   background-image:url(../images/background/back2.jpg);/*your background image*/  
	   background-repeat:no-repeat;/*we want to have one single image not a repeated one*/  
	   background-size:cover;/*this sets the image to fullscreen covering the whole screen*/  
	   /*css hack for ie*/     
	   filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='.image.jpg',sizingMethod='scale');
	   -ms-filter:"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='image.jpg',sizingMethod='scale')";
		background-color: #8BC1D1;
	}

	#login {
		 padding-top: 40px; 
		 padding-bottom: 40px; 
		 background-color: #eee;
	}
	
	#wrap {
		min-height: 100%;
		height: auto;
		margin: 0 auto -60px;
		padding: 0 0 60px;
	}
	
	#footer {
		height: 70px;
		/*background-color: #E7E4E4;*/
		background-color: #999999;
	}

	#console-debug {
		position: absolute;
		top: 50px;
		left: 0px;
		width: 30%;
		height: 700px;
		overflow-y: scroll;
		background-color: #FFFFFF;
		box-shadow: 2px 2px 5px #CCCCCC;
	}

/*Avatar*/
	.avatar-container{
		width: 100px;
		height: 100px;
		border-radius: 3px;
		background-size: cover;
		background-position: center center;
	}

	.avatar{
		width: 100px;
		height: 100px;
		background-position: center center;
		background-size: cover;
	}

	.avatar_profile{
		width: 150px;
		height: 150px;
		background-size: cover;
		background-position: center center;
	}

	.avatar_nav{
		width: 40px;
		height: 40px;
		background-size: cover;
		background-position: center center;
	}

	.icon{
		width: 30px;
		height: 30px;
		background-size: cover;
		background-position: center center;
	}

/*Message*/

	.unread {
	    background-color: #F3F3F3;
	    font-weight: bold;
	}

	.read {
	    background-color: #E2E2E2;
	}

	.clickable-row{
	    color: #555;
	}

	.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
	    padding: 10px;
	}

	.mail-sender {
	    width: 100%;
	    display: inline-block;
	    margin: 20px 0;
	    border-top: 1px solid #EFF2F7;
	    border-bottom: 1px solid #EFF2F7;
	    padding: 10px 0;
	    color: #797979;
	    font-size: 13px;
	}

	.date{
	    text-align: right;
	}

	.mail-option {
	    margin-bottom: 10px;
	}

	.mail-option .chk-all, .mail-option .btn-group a.btn {
	    border: 1px solid #e7e7e7;
	    padding: 5px 10px;
	    display: inline-block;
	    background: #fcfcfc;
	    color: #555;
	    border-radius: 3px !important;
	    -webkit-border-radius: 3px !important;
	}

	.clickable-row{
    	color: #555;
	}

	#btn-debug { 
		/*
		position: absolute;
		right: 5px; */
	}
	#console-debug pre {

	}

</style>