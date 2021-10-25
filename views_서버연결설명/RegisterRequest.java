package ce.yildiz.edu.tr.calendar.views;

import com.android.volley.AuthFailureError;
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class RegisterRequest extends StringRequest {

    // 서버 URL 설정 ( PHP 파일 연동 )
    final static private String URL = "http://legna228.dothome.co.kr/Register.php";
    private Map<String, String> map;


    public RegisterRequest(String userID, String userPassword, String userName, int userAge, Response.Listener<String> listener) {
        super(Method.POST, URL, listener, null);
        //데이버 전송방식은 POST, 전송위치는 상단에서 지정한 URL

        map = new HashMap<>();
        map.put("userID",userID);
        map.put("userPassword", userPassword);
        map.put("userName", userName);
        map.put("userAge", userAge + "");
        //map으로 전송할 데이터를 묶어서 보낸다. 이 때 지정한 변수명으로, php에서 불러와서 값을 꺼내 사용할 수 있다.
    }

    @Override
    protected Map<String, String> getParams() throws AuthFailureError {
        return map;
    }
}
