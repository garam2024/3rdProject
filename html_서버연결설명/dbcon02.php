<?php

//디비연결할 때 필요한 설정값을 따로 저장해둠
//디비연결이 필요한 경우에 include해서 사용한다.

	header('Content-Type: text/html; charset=utf-8');
	
    $host = 'localhost';
    $username = 'legna228'; # MySQL 계정 아이디
    $password = '3ndproject'; # MySQL 계정 패스워드
    $dbname = 'legna228';  # DATABASE 이름

	$con = mysqli_connect($host, $username, $password, $dbname);
	//$con 디비 연결문 선언, 조회삭제등 디비작업 할 때 이용한다.
	
	mysqli_query($con,'SET NAMES utf8');

    #session_start();
?>