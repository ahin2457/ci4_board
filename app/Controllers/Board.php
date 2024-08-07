<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\AlertError;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\BoardModel;

class Board extends BaseController
{
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger); // TODO: Change the autogenerated stub
        helper('alert');
    }

    public function list()
    {
//        $db = db_connect();
//        $query = "select * from board order by bid desc";
//        $rs = $db->query($query);
//        $data['list']=$rs->getResult(); // 결과값 저장
        $boardModel = new BoardModel();

        // findA
        $data['list'] = $boardModel->orderBy('bid','DESC')->findAll();

        return render('board_list',$data); // view에 리턴
    }

    public function write()
    {
        if(!isset($_SESSION['userid'])){
            echo "<script>alert('로그인하십시오.');location.href='/login'</script>";
            exit;
        }

        return render('board_write');
    }

    // $bid = null 파라미터 추가
    // 만약 라우트에서 보내주는 값이 없으면 null임
    // bid를 디비에 조회해서 값을 리턴해줌
    public function view($bid = null)
    {
        $db = db_connect();
        $query = "select * from board where bid=".$bid;
        $rs = $db->query($query);
        $data['view'] = $rs->getRow();


        return render('board_view',$data);

    }

    // 등록 버튼
    public function save()
    {
        if(!isset($_SESSION['userid'])) {
            echo "<script>alert('로그인 하십시오.');location.href='/login'</script>";
            exit;
        }

        $db = db_connect();

        // view의 변수를 받아 db에 저장 하고 다시 리스트로 돌아가는 로직
        $subject=$this->request->getVar('subject');
        $content=$this->request->getVar('content');

        $sql="insert into board (userid,subject,content) values ('test','".$subject."','".$content."')";
        $rs = $db->query($sql);
        return $this->response->redirect(site_url('/board'));
    }


//    public function getIndex()
//    {
//        return view('board_list');
//    }



    // url
//    public function reRoute()
//    {
//        $segments = $this->request->getUri()->getSegments();
//
//        $method =ucfirst($segments[1]);
//        if($method ==='Write')
//        {
//            if(isset($segments[2]) && is_numeric($segments[2]))
//            {
//                return $this->Delete($segments[2]);
//            }else{
//                return $this->write();
//            }
//        }
//
//        for($i=0; $i < 3; $i++ ){
//            array_shift($segments); //클레스 뻬고
//        }
//
//
//        if(is_array($segments) && count($segments) > 0){
//            $params = $segments;
//        }else{
//            $params =[];
//        }
//
//        if(method_exists($this,$method)){
//            return call_user_func_array([$this,$method],$params);
//        }else{
//            throw PageNotFoundException::forMethodNotFound($method);
//        }
//
//    }

    public function getWrite()
    {

        return view('welcome_message');
    }

    public function Modify()
    {
        $did = $this->request->getGet('did');
        if(!isset($did) || (int) $did === 0){
            return  Alert('필수 글번호가 없습니다.',true);
        }

        return view('board_write_v');
    }
    
    public function Delete($did)
    {

        echo '삭제('.$did.')';
    }
}
