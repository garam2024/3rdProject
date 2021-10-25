package ce.yildiz.edu.tr.calendar.views;

import com.android.volley.AuthFailureError;
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class LoginRequest extends StringRequest {

    // 서버 URL 설정 ( PHP 파일 연동 )
    final static private String URL = "http://legna228.dothome.co.kr/login01.php";
    private Map<String, String> map;


    public LoginRequest(String userID, String userPassword, Response.Listener<String> listener) {
        super(Method.POST, URL, listener, null);

        //System.out.println("로그인정보 전달전!");
        map = new HashMap<>();
        map.put("userID",userID);
        map.put("userPassword", userPassword);
		//map으로 전송할 데이터를 묶어서 보낸다. 이 때 지정한 변수명으로, php에서 불러와서 값을 꺼내 사용할 수 있다.
    }

    @Override
    protected Map<String, String> getParams() throws AuthFailureError {
        //System.out.println("로그인정보 전달후! :" + map); //실행과정 확인을 위한 중간출력문
        
        return map;
    }
}