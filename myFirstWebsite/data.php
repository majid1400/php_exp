<?php
define("SITE_TITLE", 'اولین وبسایت من');
define("ENCODING", "UTF-8");

define("PAGE_SIZE", 3);


$style_and_scripts = '
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/milligram-rtl.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
';

$posts = [
	["پست اول" , "محتوای پست  محتوای پست  محتوای پست  محتوای پست  "],
	["پست دوم" , "محتوای پست  محتوای پست  محتوای پست  محتوای پست دوم "],
	["پست ۳" , "محتوای پست  محتوای پست  محتوای پست  محتوای پست سوم "],
	["پست ۴" , "محتوای پست  محتوای پست  محتوای پست  محتوای پست چهارم "],
	["پست ۵" , "محتوای پست  محتوای پست  محتوای پست  محتوای پست پنجم "],
	["پست ۶" , "محتوای پست  محتوای پست  محتوای پست  محتوای پست ششم "],
	["پست ۷" , "محتوای پست  محتوای پست  محتوای پست  محتوای پست هفتم "],
	["پست ۸" , "محتوای پست  محتوای پست  محتوای پست  محتوای پست هشتم "],
	["پست ۹" , "محتوای پست  محتوای پست  محتوای پست  محتوای پست هشتم "],
	["پست ۱۰" , "محتوای پست  محتوای پست  محتوای پست  محتوای پست هشتم "],
];
$pageCount = ceil(sizeof($posts) / PAGE_SIZE);
if(empty($_GET['page'])){
	$startIndex = 0;
}else{
	$startIndex = ($_GET['page']-1) * PAGE_SIZE ;
}

$widgets = [
	["جستجو","<input >"],
	["آرشیو","۱<br>2<br>3<br>4<br>5"],
	["دسته بندی","not found"]
];