<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

	switch ($_GET['action']){
		case "register":
			register($_POST['email'],$_POST['password1'],$_POST['displayName']);
			break;
		case "login":

			break;
	}

}