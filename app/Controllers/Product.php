<?php

namespace App\Controllers;

use App\Models\Product_model;
use CodeIgniter\Controller;

class Product extends Controller
{
    # product page
    public function getIndex()
    {
        # product_model 클래스를 인스턴스화 하여 $model 변수에 할당
        $model = new Product_model();


        # product_model 객체의 getProduct() 메서드 호출하여 제품 데이터를 가져오고,
        # 이를 배열 $data의 'product' 키에 할당함
        $data['product']  = $model->getProduct()->getResult();
        
        # product_model 객체의 getCategory() 메소드를 호출하여 제품 데이터를 가져오고,
        # 이를 배열 $data의 category 키에 할당함
        $data['category'] = $model->getCategory()->getResult();

//        $data = [
//                'pager' => $model->pager
//        ];

        # 'product_view' 뷰를 로드하고, $data 배열을 뷰에 전달하여 출력
        echo view('product_view',$data);


    }

    # 등록
    public function postSave()
    {
        # product_model 클래스를 인스턴스화 하여 $model 변수에 할당
        $model = new Product_model();

        # 데이터를 배열로 담기
        $data = array(
            'product_name'        => $this->request->getPost('product_name'),
            'product_price'       => $this->request->getPost('product_price'),
            'product_category_id' => $this->request->getPost('product_category'),
        );
        # model의 saveProduct에 data를 insert
        $model->saveProduct($data);
        # 저장 후 product 로 돌아옴
        return redirect()->to('/product');
    }

    # 게시글 수정
    public function postUpdate()
    {
        # model 객체
        $model = new Product_model();

        # 해당 게시물의 product_id를 가져옴
        $id = $this->request->getPost('product_id');

        # 게시글의 product_name , product_price, product_category 의 데이터 가져오기
        $data = array(
            'product_name'        => $this->request->getPost('product_name'),
            'product_price'       => $this->request->getPost('product_price'),
            'product_category_id' => $this->request->getPost('product_category'),
        );

        # 수정(update)하기
        $model->updateProduct($data,$id);

        # product로 reload 하기
        return redirect()->to('/product');
    }

    # 삭제하기
    public function postDelete()
    {
        # model 객체 가져오기
        $model = new Product_model();

        # 해당 product_id 가져오기
        $id = $this->request->getPost('product_id');

        # 삭제하기
        $model->deleteProduct($id);

        # product로 reload하기
        return redirect()->to('/product');
    }

}