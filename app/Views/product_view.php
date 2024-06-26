<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Lists</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h3>Product Lists</h3>
    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add New</button>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">
                <input type="checkbox" id="checkbox-all">
            </th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach($product as $row):
                ?>
            <tr>
                <td><input type="checkbox" name="checkList" value=""></td>
                <td><?= $row->product_name;?></td>
                <td><?= $row->product_price;?></td>
                <td><?= $row->category_name;?></td>
                <td>
                    <a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $row->product_id;?>" data-name="<?= $row->product_name;?>" data-price="<?= $row->product_price;?>" data-category_id="<?= $row->product_category_id;?>">Edit</a>
                    <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->product_id;?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


<!-- Modal Add Product-->
<form action="/product/save" method="post">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="product_price" placeholder="Product Price">
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select name="product_category" class="form-control">
                            <option value="">-Select-</option>
                            <?php foreach($category as $row):?>
                                <option value="<?= $row->category_id;?>"><?= $row->category_name;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Add Product-->

<!-- Modal update Product-->
<form action="/product/update" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control product_name" name="product_name" placeholder="Product Name">
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control product_price" name="product_price" placeholder="Product Price">
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select name="product_category" class="form-control product_category">
                            <option value="">-Select-</option>
                            <?php foreach($category as $row):?>
                                <option value="<?= $row->category_id;?>"><?= $row->category_name;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="product_id" class="product_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal Delete Product-->
<form action="/product/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h4>Are you sure want to delete this product?</h4>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="product_id" class="productID">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Delete Product-->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){

        // get Edit Product
        $('.btn-edit').on('click',function(){

            // get data from button edit
            const id        = $(this).data('id');
            const name      = $(this).data('name');
            const price     = $(this).data('price');
            const category  = $(this).data('category_id');

            // Set data to form Edit
            $('.product_id').val(id);
            $('.product_name').val(name);
            $('.product_price').val(price);
            $('.product_category').val(category).trigger('change');
            // Call Modal Edit
            $('#editModal').modal('show');

        });

        // get Delete Product
        $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.productID').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });
    });

    $(document).ready(function(){

        // 전체 체크박스 클릭 했을때
        $("#checkbox-all").click(function(){
            $("input[name='checkList']").prop("checked",this.checked);
        });
        
        // 개별 체크박스 클릭 이벤트
        $("input[name='checkList']").click(function () {

            // 전체 체크박스 길이
            let total = $("input[name='checkList']").length;

            // 체크된 체크박스 길이
            let checked = $("input[name='checkList']:checked").length;

            // total === checked이면 전체 체크박스는 checked됨
            $("#checkbox-all").prop("checked",total === checked);

        });
        
        // '삭제' 버튼을 클릭했을 때 실행되는 함수
        $("#delete-selected").click(function() {
            
            // 체크된 'checkList' 체크박스의 값을 배열로 가져옴
            let checkedValues = $("input[name='checkList']:checked")
                .map(function(){
                    return this.value;
                }).get();

            //  하나 이상의 체크박스가 선택 되었는지 확인
            if(checkedValues.length > 0){


            }
        });

    });
</script>
</body>
</html>