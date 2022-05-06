<?php
session_start();
?>
<html>
<head>
 <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Compile.Net</title>
            <meta name="keywords" content="SATI,Compile.Net,OffCampus,Vidisha,Compiler" />
			<link rel="shortcut icon" href="../styles/sati_logo.ico" />
			<link rel="stylesheet" type="text/css" href="../styles/style.css" />
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href="https://fonts.googleeapis.com/css?family=Nunito&display=swap" rel="stylesheet" >
	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

			<script type="text/javascript" src="../js/jquery.js"></script>
			<script type="text/javascript" src="../js/compile.js"></script>
			<script type="text/javascript" src="../js/tab.js"></script>
			<script type="text/javascript" src="../js/jquery.form.js"></script>
</head>
<body style="background-color:white;">
<div class="container-fluid">
  <div class="header">
  <div class="menu-bar">
 <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" style="color:white" href="#"> Compile.Net</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fa fa-bars"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" style="color:white;" href="#"><i class="fa fa-code ispace"></i>&nbsp Compiler</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color:white;" href="#"><i class="fa fa-cogs ispace"></i>&nbsp Contests</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color:white;" href="#"><i class="fa fa-upload"></i>&nbsp Upload Code</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><img src="../styles/moon.png" id="icon" class="invet" ></a>
      </li>
    </ul>
  </div>
</nav>
  </div>
  </div>
  <div class="progress">
  <div class="progress-bar progress-bar-striped bg-dark" id="progress" role="progressbar"  style="width:100%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="row">
    <div class="col">
    <div id="editor" ></div>
    </div>
<div class="col" id="divborder">
<table class="code">
				<td class="code">	
				<form action="compile.php" method="post" id="form">
						<select name="language" id="language" onchange="Getm()" style="float:right">
							<option value="c">C</option>
							<option value="cpp">C++</option>
							<option value="java">Java</option>
							<option value="python2.7">Python</option>
							<option value="python3.2">Python3</option>
						</select>
					
					<span id="errorCode" class="error"></span><br/><br/>
					<strong>StdIn:<br/></strong>
					<textarea class="form-control" name="input" id="input"></textarea><br/><br/>
					<input class="button" type="submit" value="Run" id="submit">
					<input class="button" type="reset" value="Reset"><br/><br/>
					<strong>StdOut:</strong>
					<span id="output"></span><br/>
					<textarea name="code" rows=11 cols=100 spellcheck="false" onkeydown=insertTab(this,event) id="code" style="visibility:hidden;"></textarea>
				</form>
				</td>
			</table>
</div>
</div>
<div class="inmyDiv">
<div class="bottom">

<b>&nbsp;&nbsp;&nbsp;Beta Version-2021</b><br>
<b>&nbsp;&nbsp;&nbsp;Developed By <a href="https:">Pankaj Kumar Gautam</a></b>

</div>
<div class="time">
<?php
date_default_timezone_set("Asia/Calcutta");
 $t=date("H:i:s");
echo"<b>Server Time:  $t</b>";
?>&nbsp;&nbsp;&nbsp;
</div>
</div>
</div>
<script src="../ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
  var icon = document.getElementById("icon");
   icon.onclick = function(){
	   document.body.classList.toggle("dark");
	   
	   if(document.body.classList.contains("dark")){
		   icon.src = "../styles/sun.png";
	   }else{
		   icon.src = "../styles/moon.png";
	   }
	   
   }
   
   var textarea = $('#code');
   
   var editor = ace.edit("editor");
   editor.setTheme("ace/theme/tomorrow");
    editor.getSession().setMode("ace/mode/c_cpp");

   editor.getSession().on('change', function () {
       textarea.val(editor.getSession().getValue());
   });

   textarea.val(editor.getSession().getValue());
   
   function Getm()
  {
   var x = document.getElementById("language").value;
   var g = "ace/mode/";
   var mode;
  switch (x) {
  case 'c':
    mode = g +"c_cpp";
    break;
  case 'cpp':
    mode = g +"c_cpp";
    break;
  case 'java':
    mode = g +"java";
    break;
  case 'python2.7':
    mode = g +"python";
    break;
  case 'python3.2':
    mode = g +"python";
  }
  editor.getSession().setMode(mode);
 }  
</script>
</body>
</html>