<?php
$a[]="Andrea";
$a[]="Yazmin";
$a[]="Veronica";
$a[]="Karina";
$a[]="Mildred";
$a[]="Jissel";
$a[]="Etiope";
$a[]="Italia";
$a[]="Silvana";
$a[]="Luna";
$q=$_REQUEST["q"];
$hint="";
if($q!==""){
	$q=strtolower($q);
	$len=strlen($q);
	foreach($a as $name){
	if(stristr($q,substr($name,0,$len))){
		if($hint===""){
			$hint=$name;
		}else{
			$hint.=",$name";
		}
	}
	}
}
echo $hint===""?"no sugggestion":$hint;
?>