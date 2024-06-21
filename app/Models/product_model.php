<?php
namespace App\Models;

use CodeIgniter\Model;

class Product_model extends Model
{
    # db에서 category 테이블 가져옴
    public function getCategory()
    {
        $builder = $this->db->table('category');
        return $builder->get();
    }

    # db에서 product 테이블 가져옴
    public function getProduct()
    {
        # product table 가져옴
        $builder = $this->db->table('product');

        # product table에서 모두 가져오기
        $builder->select('*');

        # 쿼리 join하기
        $builder->join('category','category_id = product_category_id','left');


        return $builder->get();
    }

    # product 테이블에 받아온 데이터를 넣는다
    public function saveProduct($data){
        $query = $this->db->table('product')->insert($data);
        return $query;
    }

    # product 수정
    public function updateProduct($data,$id)
    {
        $query = $this->db->table('product')->update($data,array('product_id' => $id));
        return $query;
    }

    # id를 갖고 와서 삭제
    public function deleteProduct($id)
    {
        $query= $this->db->table('product')->delete(array('product_id'=>$id));
        return $query;
    }

    # 페이징 처리를 위해 제품 테이블에 있는 총 제품 수를 가져오는 메서드
    public function getProductCount()
    {
        # 'product' 테이블의 빌더 객체를 생성
        $builder = $this->db->table('product');

        # 'product' 테이블의 모든 행 수를 반환
        return $builder->countAllResults();
    }

    
}