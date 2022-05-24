<?php 
require_once ('./../dao/dbhelper.php');
require_once ('./../shared/config.php');
session_start();

if(!isset($_SESSION[S_USERNAME])) {
    header('Location: ./../page_authentication/login.php');
}
else {
    $loginId = $_SESSION[S_USERNAME];
    $accountId = $_SESSION[S_ACCOUNT_ID];
    if(isset($loginId) && isset($accountId)) {
        $cartRow = getCart($loginId, $accountId);
        $cartId = $cartRow[0]['id'];
        print_r($cartRow[0]['id']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./cart.css">
</head>
<body>
    
    <!-- header -->
    <div id="header">
        <div class="header_name"><h2>Giỏ hàng</h2></div>
    </div>

    <!-- container -->
    <div id="container">
        <!-- list items -->
        <div id="list_items">
            <div id="content">
                <div class="content_title">
                    <h1>Sản phẩm</h1>
                </div>
                <!-- item1 -->
                <?php foreach(getProductsInCart($cartId) as $product) { ?>
                <div class="content_item">
                    <div class="content_image">
                        <img src="<?php echo $product['image']?>"/>
                    </div>
                    <div class="content_infor">
                        <div class="infor_name"><?php echo $product['name']?></div>
                        <div class="infor_button">
                            <button class="button" type="button">-</button>
                            <button class="button" type="button">1</button>
                            <button class="button" type="button">+</button>
                        </div>
                    </div>
                    <div class="menu_price">
                        <div class="price">
                            <div class="price_quantity"><?php echo $product['quantity']."x".$product['price']." VND" ?></div>
                            <i class="fa-solid fa-trash"></i>
                        </div>
                    </div>                    
                </div>
                <?php }?>
            </div>
        </div>

    <!-- menu -->
        <div id="menu_price">
            <div class="menu">
                <div class="menu_title"><p>TÓM TẮT ĐƠN HÀNG</p></div>
                <?php 
                    $totalPrice = 0;
                    foreach(getProductsInCart($cartId) as $product) {
                        $totalPrice += $product['price'];
                    }
                ?>
                <div class="menu_infor">
                    <div class="menu_infor_item">
                        <p>Tổng tiền hàng</p>
                        <p><?php echo $totalPrice?> VND</p>
                    </div>
                    <div class="menu_infor_item">
                        <p>Phí vận chuyển</p>
                        <p>Miễn phí</p>
                    </div>
                    <div class="menu_infor_item">
                        <p>Tạm Tính</p>
                        <p><?php echo $totalPrice?> VND</p>
                    </div>
                </div>
                <div class="menu_bill">
                    <div class="menu_infor_item">
                        <p>TỔNG CỘNG</p>
                        <p><?php echo $totalPrice?> VND</p>
                    </div>
                </div>
            </div>
        </div>
        
    <!-- button -->
        <div id="back">
            <button onclick="location.href='/webBook/index.php'">QUAY LẠI</button>
        </div>
        <div id="checkout">
            <button onclick="location.href='./../page_thanhtoan/payment.php'">THANH TOÁN</button>
        </div>
    </div>    
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    
</body>
</html>