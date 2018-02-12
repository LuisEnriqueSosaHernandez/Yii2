<?php
$this->title = 'BD';
foreach ($users as $user) {
	echo $user->username." ";
	echo $user->password."<br>";
}
?>