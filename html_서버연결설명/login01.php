<?php
	include('dbcon02.php');
	// dbcon02안에 설정된 값들을 불러들여서 사용한다.
	
    $userID = $_POST["userID"];
    $userPassword = $_POST["userPassword"];
    //안드로이드에서 post 방식으로 전달된, 데이터묶음(map)에서 변수를 지정해 담고있는 값을 불러온다.
    

	$sql = "SELECT * FROM users WHERE userID= '$userID' AND userPassword= '$userPassword';";
	$result=mysqli_query($con,$sql);//쿼리문 대입
	//$con dbcon02.php에서 선언한 디비 연결문
	
	$response = array();
    $response["success"] = false;
    //response라는 이름으로 array 생성 후 "success"변수 안에 false을 넣어서 기본값으로 설정한다.
 
    while($array=mysqli_fetch_array($result)) {
    //디비조회한 결과를 response라는 array안에 반복문으로 집어넣는다. 결과값을 전부 넣기 위해 while 사용.
    
        $response["success"] = true;
        // 디비에서 조회되면 회원이 존재하기 때문에 "success"변수 안에 true을 넣어준다.
        $response["userID"] = $array['userID'];
        $response["userPassword"] = $array['userPassword'];
        $response["userName"] = $array['userName'];
        $response["userAge"] = $array['userAge'];
    }
 
    echo json_encode($response);
    //json 형식으로 처리결과를 담은 $response를 출력한다. 이 값은 안드로이드로 전달된다.
	
mysqli_close($con);
//디비연결을 끊어준다. 꼭 쓸 필요는 없다.
?>