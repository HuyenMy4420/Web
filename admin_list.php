<?php 
include_once('db_conn.php');	
$category = mysqli_query($conn,"SELECT *FROM category");
if(isset($_POST["Save"])){
  $NameCate = $_POST['NameCate'];

 $sql = "INSERT INTO category(NameCate) VALUES('$NameCate')";
 $query = mysqli_query($conn,$sql);
 if(query){
   header('location: admin_list.php');
 }
 else{echo"Errrors";}
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="admin_style.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="logo.jpg" style="height:70px"></div>
    </div>
</nav>
  
<div class="container-fluid text-left">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
        <ul class ="nav nav-pills nav-stacked " style="padding-left:20px">
            <p><a href = "http://localhost/xampp/new/admin_home.php""><i class = "glyphicon glyphicon-list-alt"></i>Quản lý mặt hàng</a></p>
            <p><a href = "http://localhost/xampp/new/admin_add.php"><i class = "glyphicon glyphicon-plus"></i>Thêm sản phẩm</a></p>
            <p><a href = "http://localhost/xampp/new/admin_list.php"><i class = "glyphicon glyphicon-comment"></i>Danh mục sản phẩm</a></p>
            <p><a href = "#"><i class = "glyphicon glyphicon-comment"></i>Chat</a></p>
            <p><a href = "#"><i class = "glyphicon glyphicon-log-out"></i>Đăng xuất</a></p>
        </ul>
    </div>
    <div class="col-sm-10 text-left" action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data"> 
        <h3><strong style="margin-left:450px;">Danh mục sản phẩm</strong></h3>
        <form class="form-inline">
  
    
  <div class="form-group mx-sm-3 mb-2>
    <label for="text" class="sr-only"></label>
    <input type="text" id ="NameCate" name ="NameCate" class="form-control" placeholder="">
  
  <button  class="btn btn-primary mb-2" id ="Save" name="Save" method="post" enctype="multipart/form-data">Thêm</button></div>
<br>
    <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên danh mục</th>
                                    <th>Trạng thái</th>
                                    
                                </tr>
                            </thead>
                        <!-- <tbody>
                        <?php foreach ($category as $key => $value){ ?>
                            <tr>
                                <td><?php echo $value['ID'] ?></td>
                                <td><?php echo $value['Name_Cate'] ?></td>
                                <td><a href=""><span class="glyphicon glyphicon-pencil"></span></td>
                                <!-- <td><img src="uploads/<?php echo $value['image'] ?>" alt="" width="100"></td> -->
                            </tr>
                        <?php } ?>
                        </tbody> -->
                        </table>
    </div>

  </div>
</div>

<!-- Chân trang -->
<hr>
<footer class="container-fluid ">
<div class="row">
        <div class = "col-sm-2">
            <img src="im1.PNG" style="height:70px;width:150px; margin-left:40px">
        </div>
    <div class = "col-sm-5 bg-white">
        <strong>CÔNG TY CỔ PHẦN THƯƠNG MẠI DỊCH VỤ MÊ KÔNG COM</strong><br>
        <p>Địa chỉ: 52/2 Thoại Ngọc Hầu, Phường Hòa Thạnh, Quận Tân Phú, Hồ Chí Minh<br>
        MST: 0303615027 do Sở Kế Hoạch Và Đầu Tư Tp.HCM cấp ngày 10/03/2011<br>
        Tel: 028.73008182 - Fax: 028.39733234 - Email: hotro@vinabook.com</p>
    </div>
    <div class="col-sm-2 " style="margin-top:0px">
        <table cellpadding="2" cellspacing="5">
            <tbody>
                <tr>
                    <td colspan ="2"><strong>Chấp nhận thanh toán</td><strong></tr>
                    <tr><td><img src ="payoo.jpg" style = "width:60px;height:40px; padding-top:10px"></td>
                    <td><img src ="visa.png" style = "width:50px;height:30px;padding-top:10px"></td> </tr>
            </tbody>
        </table>
    </div>
    <div class = "col-sm-3 bg-white margin-right" >
        <table >
            <tbody>
                <tr>
                    <td colspan ="2"><strong>Đối tác bán hàng</td><strong></tr>
                    <tr><td><img src ="lazada.jpg" style = "width:60px;height:40px; padding-top:10px; "></td>
                    <td><img src ="amazon.png" style = "width:70px;height:40px; padding-top:10px; padding-left:10px"></td>
                    <td><img src ="shopee.png" style = "width:70px;height:50px;padding-top:10px;padding-left:10px; margin-right:10px"></td> </tr>
            </tbody>
        </table>
    </div>
    </div>
  
</footer>

</body>
</html>
