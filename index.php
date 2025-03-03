<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section id="best-sellers">
        <h2>BEST SELLERS</h2>
        <p>Top 4 sản phẩm nhà LANEIGE được yêu thích và bán chạy nhất!</p>
        <div class="product-list" id="best-sellers-list">
        <?php
        $servername = "metro.proxy.rlwy.net:56645";
        $username = "root";
        $password = "RjenWTGdWbiruuOkvxffsAdSPdhCBUSc";
        $dbname = "Laneige";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">
                <a style="text-decoration: none" href="indexdetails.html?name='.urlencode($row["name"]).'&img='.urlencode($row["imgSrc"]).'&price='.urlencode($row["newPrice"]).'&rating='.$row["rating"].'&reviews='.$row["reviews"].'&discount='.urlencode($row["discount"]).'&oldPrice='.urlencode($row["oldPrice"]).'">
                        <img src="'.$row["imgSrc"].'" alt="'.$row["name"].'">
                        <h3>'.$row["name"].'</h3>
                        <div class="price-container">
                            <div class="discount-price">
                                <span class="discount">'.$row["discount"].'</span>
                                <span class="old-price">'.$row["oldPrice"].'</span>
                            </div>
                            <span class="new-price">'.$row["newPrice"].'</span>
                        </div>
                        <div class="rating">
                            <span>'.$row["rating"].' ⭐</span>
                            <span>'.$row["reviews"].' đánh giá</span>
                        </div>
                        <div class="product-actions">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </a></div>';
            }
        } else {
            echo "<p>Không có sản phẩm nào.</p>";
        }

        $conn->close();
        ?>
        </div>
    </section>
</body>
</html>
