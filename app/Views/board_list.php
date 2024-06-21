<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script  src="http://code.jquery.com/jquery-latest.min.js"></script>
    <title></title>
</head>
<body>
<div class="col-md-8" style="margin:auto;padding:20px;">
    <div class="wrap">
        <!-- Header -->

        <table class="table">
            <thead>
            <tr>
                <th scope="col">번호</th>
                <th scope="col">글쓴이</th>
                <th scope="col">제목</th>
                <th scope="col">등록일</th>
            </tr>
            </thead>
            <tbody id="board_list">
            <?php
                foreach($list as $ls){
            ?>
            <tr>
                <th scope="row"><?php echo $ls->bid; ?></th>
                <td><?php echo $ls->userid; ?></td>
                <td><a href="/boardView/<?php echo $ls->bid; ?>"><?php echo $ls->subject; ?></a></td>
                <td><?php echo $ls->regdate; ?> </td>
            </tr>
            <?php

                }
            ?>
            </tbody>
        </table>
        <p style="text-align:right;">
            <a href="/boardWrite" ><button type="button" class="btn btn-primary">등록</button></a>
        </p>
        <!-- Footer -->
    </div>
</div>

</body>
</html>