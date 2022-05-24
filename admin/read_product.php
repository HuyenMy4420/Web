<?php
include_once('dbhelper1.php');	
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT *FROM product WHERE id=$id";
    $product = mysqli_query($conn, $sql);
    $cate = mysqli_fetch_assoc($product);

}
$category = mysqli_query($conn,"SELECT *FROM  categories");
if(isset($_POST["saveproduct"])){
  $name = $_POST['name'];
  $id = $_POST['id'];
  $price = $_POST['price'];
  $supplier = $_POST['supplier'];
  $category_int = $_POST['category_int'];
  $description = $_POST['description'];
  if(isset($_FILES['image'])){
    $file = $_FILES['image'];
    $file_name = $file['name'];
    move_uploaded_file($file['tmp_name'],'uploads/'.$file_name);
  }
 $sql = "UPDATE product SET  category_int='$category_int',id='$id',name='$name', description='$description', price = '$price', supplier='$supplier',image='$file_name' WHERE id=$id";
 $query = mysqli_query($conn,$sql);
 if(query){
   header('location: admin_home.php');
 }
 else{ 
     echo"Loi";}
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
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="" style="height:70px"></div>
    </div>
</nav>
  
<div class="container-fluid text-left">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
        <ul class ="nav nav-pills nav-stacked " style="padding-left:20px">
            <p><a href = "admin_home.php""><i class = "glyphicon glyphicon-list-alt"></i>Quản lý mặt hàng</a></p>
            <p><a href = "admin_add.php"><i class = "glyphicon glyphicon-plus"></i>Thêm sản phẩm</a></p>
            <p><a href = "#"><i class = "glyphicon glyphicon-comment"></i>Chat</a></p>
            <p><a href = "index.php"><i class = "glyphicon glyphicon-log-out"></i>Đăng xuất</a></p>
        </ul>
    </div>
    <div class="col-sm-10 "> 
    <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <h3><strong style="margin-left:450px;">Xem sản phẩm</strong></h3>
              <br>
              <label class="control-label col-sm-2" for="email" style="text-align:left">Tên sản phẩm</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm" value= "<?php echo $cate['name'] ?> ">
                </div>
    
              <label class="control-label col-sm-2" for="pl" style="text-align:left">Nhà cung cấp</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="supplier" id="supplier" placeholder="Nhập nhà cung cấp"value= "<?php echo $cate['supplier'] ?> ">
                </div>
    
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="msp" style="text-align:left">Mã sản phẩm</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="id" id="id" placeholder="Nhập mã sản phẩm" value= "<?php echo $cate['id'] ?> ">
                  </div>
                  <label class="control-label col-sm-2" for="mt" style="text-align:left">Mô tả:</label>
                <div class="col-sm-3">
                  <textarea class="form-control" rows="2" name="description" id="description" placeholder="Mô tả sản phẩm" ><?php echo $cate['description'] ?></textarea>
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="gia" style="text-align:left">Giá bán</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="price" id="price" placeholder="Nhập giá bán" value= "<?php echo $cate['price'] ?> ">
                </div>
                <label class="control-label col-sm-2" for="gia" style="text-align:left">Danh mục</label>
                <div class="col-sm-3">
                  <select name ="category_int" id="input" class="form-control" required ="required">
                      <option value="">_________Tên danh mục_________</option>
                      <?php foreach($category as $key => $value){?>
                        <option value ="<?php echo $value['id'] ?>" <?php echo (($value['id'] == $cate['category_int']) ? 'selected' : '')?> ><?php echo $value['name'] ?></option>
                      </option>
                    <?php } ?>
                    </select>
                </div>
                
            </div>
            <div class="form-group">
            <label class="control-label col-sm-2" for="anh" style="text-align:left">Ảnh sản phẩm</label>
                <div class="col-sm-3">
                  <input type="file" accept="image/png, image/jpg,image/jpeg" name="image" id="image" class ="box">
                  <img src="uploads\<?php echo $cate['image'] ?>" alt ="" style="max-height:200px">
                </div> 
                <label class="control-label col-sm-2" for="" style="text-align:left"></label>
                <div class="col-sm-3">
                  <button class="btn btn-danger" id="huy" >Hủy</button>
                  <button class="btn btn-success" name="saveproduct" style="margin-left:100px; background-color:#AF3FCB">Cập nhật</button>
                </div> 
            </div>
          </form>
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
<style>
    .navbar {
    margin-bottom: 0;
    border-radius: 0;
    background-color: #FFFFFF;
    color: black;
  }
  .row.content {height: auto}
  .sidenav {
    padding-top: 20px;
    background-color:#AF3FCB;
    height: 500px;
  }
  .sidenav ul a{
      text-align: left;
      display: block;
      line-height: 65px;
      color: white;
      height: 100%;
      width: 100%;
      box-sizing: border-box;
      transition: .4s;
  }
  ul p:hover a{
      padding-left: 5px;
  }
  .sidenav ul a i{
      margin-right: 10px;
  }
  .sidenav ul li{
      list-style-type: none;
  }
  
  footer {
    background-color: #FFFFFF;
    color: black;
    padding: 15px;
  }
  @media screen and (max-width: 767px) {
    .sidenav {
      height: auto;
      padding: 5px;
    }
    .row.content {height:auto;} 
  }
    </style>
