<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class MemberController extends BaseController
{
    // 로그인
    public function login()
    {
        echo render('login');
    }

    // 로그아웃
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/board');
    }
    
    // 로그인 등록
    public function loginok()
    {       
        // db 꺼내오기
        $db = db_connect();

        // 입력한 userid 가져오기
        $userid = $this->request->getVar('userid');
        // 입력한 passwd 가져오기
        $passwd = $this->request->getVar('passwd');
        // password 암호화하기
        $passwd = hash('sha512',$passwd);
        // 일치하는 아이디와 비밀번호 가져오기
        $query = "select * from members where userid='".$userid."'and passwd='".$passwd."'";
        // 로그 남기기
        error_log('['.__FILE__.']['.__FUNCTION__.']['.__LINE__.']['.date("YmdHis").']'.print_r($query,ture)."\n",3,'./php_log_'.date("Ymd").'log');
        // $rs에 db query 불러오기
        $rs=$db->query($query);

        // 일치하는 아이디와 비번일 경우(사용자가 맞을 경우) 해당 data를 $ses_data에 넣는다
        if($rs){
            $ses_data=[
                    'userid' => $rs->getRow()->userid,
                    'username' => $rs->getRow()->username,
                    'email' => $rs->getRow()->email
            ];
        // 현재 상황에서 해당 정보의 data를 배열에 담아서 session에 저장함
        $this->session->set($ses_data);
        // board로 이동
        return redirect()->to('/board');
        }else{
            // 아니면 login창으로 새로고침
            return redirect()->to('/login');
        }
    }

}