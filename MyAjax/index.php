<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax Example</title>
	<script type="text/javascript">
	
		function showHint(str){
			if(str.length==0){
				document.getElementById("txtHint").innerHTML="";
				return;
			}else{
				var xmlhttp=new XMLHttpRequest();
				xmlhttp.onreadystatechange=function(){
					if(this.readyState==4&&this.status==200){
						document.getElementById("txtHint").innerHTML=this.responseText;
					}
				};
				xmlhttp.open("GET","gethint.php?q="+str,true);
				xmlhttp.send();
			}
		}
	</script>
</head>
<body>
	<h1>Start typing a name in the input field below:</h1>
	<p>An Ajax practical example</p>
	<form>
		First name = <input type="text" onkeyup="showHint(this.value)">
	</form>
	<p>Suggestions: <span id="txtHint"></span></p>
</body>
</html>