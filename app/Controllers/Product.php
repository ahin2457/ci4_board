<?php

namespace App\Controllers;

use App\Models\Product_model;
use CodeIgniter\Controller;

class Product extends Controller
{
    # product page
    public function getIndex()
    {
        $model = new Product_model();
        $data['product']  = $model->getProduct()->getResult();
        $data['category'] = $model->getCategory()->getResult();
        echo view('product_view',$data);
    }

    # 등록
    public function postSave()
    {
        # model객체
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