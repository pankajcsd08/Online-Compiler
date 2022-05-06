<?php
session_start();
?>
<html>
<head>
<title>Compile.Net</title>
            <meta name="keywords" content="SATI,Compile.Net,OffCampus,Vidisha,Compiler" />
			<link rel="shortcut icon" href="../styles/sati_logo.ico" />
			<link rel="stylesheet" type="text/css" href="../styles/style.css" />
			<script type="text/javascript" src="../js/jquery.js"></script>
			<script type="text/javascript" src="../js/compile.js"></script>
			<script type="text/javascript" src="../js/tab.js"></script>
			<script type="text/javascript" src="../js/jquery.form.js"></script>
</head>
<body>

<div class="myDiv">
<div class="inmyDiv">
<nav>
<span id="ic"><img src="../styles/moon.png" id="icon" class="invet" >
</span>
<h1>&nbsp;&nbsp;&nbsp;&nbsp;Compile.Net</h1>  </nav>
</div>
<div class="inmy">
<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
 </ul>
 </div>
<div class="imy">
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
					<textarea name="input" rows=7 cols=100 id="input"></textarea><br/><br/>
					<input class="button" type="submit" value="Run" id="submit">
					<input class="button" type="reset" value="Reset"><br/>
					<textarea name="code" spellcheck="false" onkeydown=insertTab(this,event) id="code" style="visibility:hidden;"></textarea>
				</form>
				</td>
			<tr>
			<td class="code"><strong>StdOut:</strong>
			<span id="output"></span><br/></td>
			</tr></table>
</div>
<div id="editor" ></div>

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