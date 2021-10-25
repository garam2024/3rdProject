	<?php
	include('dbcon02.php');
	//dbcon02안에 설정된 값들을 불러들여서 사용한다.
	
    //$con = mysqli_connect("localhost", "root", "비밀번호", "user");
    //mysqli_query($con,'SET NAMES utf8'); // 각 문서마다 디비접속문을 설정할 수도 있다. 
 
    $userID = $_POST["userID"];
    $userPassword = $_POST["userPassword"];
    $userName = $_POST["userName"];
    $userAge = $_POST["userAge"];
	//안드로이드에서 post 방식으로 전달된, 데이터묶음(map)에서 변수를 지정해 담고있는 값을 불러온다.
	
    $statement = mysqli_prepare($con, "INSERT INTO users VALUES (?,?,?,?)");
    //$con dbcon02.php에서 선언한 디비 연결문
    
    mysqli_stmt_bind_param($statement, "sssi", $userID, $userPassword, $userName, $userAge);
    //$statement,"sssi"가 의미 하는것은 s는 String, i는 int로 뒤에 붙는 변수의 유형선언. $userID(s), $userPassword(s), $userName(s), $userAge(i)
	//본인에 맞게 수정하시려면 데이터베이스에 create문을 쓰실 때 컬럼유형이 VARCHAR, INTEGER에 따라서 php문도 똑같이 맞춰야함.
	
    mysqli_stmt_execute($statement);
  
    $response = array();
    $response["success"] = true;
  
    echo json_encode($response);
	//json 형식으로 처리결과를 담은 $response를 출력한다. 이 값은 안드로이드로 전달된다.
	
	//mysqli_close($con); //디비연결을 끊어준다. 꼭 쓸 필요는 없다.
?>