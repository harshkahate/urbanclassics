<?php
// creating a connection
$serverName = "localhost";
$userName = "root";
$password = "";
$conn = mysqli_connect($serverName,$userName,$password);

// select database 
$database = "miniproject";
mysqli_select_db($conn,$database);

// fetch data by executing query 
$query = "SELECT * FROM PRODUCTS ORDER BY SOLD_QUANTITY DESC LIMIT 6";
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Sellers</title>
    <link rel="stylesheet" href="css/best-sellers.css">
    <script src="https://use.fontawesome.com/0f0cf0207a.js"></script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body>
    <script type="text/javascript">
    window.onload = function () {
        $('form.custom-add2cart').each(function () {
            var form = $(this).get(0);
            if (form) {
                form.commonController.enableBackgroundSubmit()
            }
        })
    };
    function bought() {
        alert("Product bought");
    }
    </script>


    <header>
        <h1>Urban Classics</h1>
        <nav>
            <ul>
                <li><a href="./index.html">Home</a></li>
                <li><a href="./index.html#about-us">About Us</a></li>
                <li><a href="./index.html#products">Our Products</a></li>
                <li><a href="./index.html#faq">FAQ</a></li>
                <li><a href="./index.html#contact">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <div class="header">
        <div class="small-container">
            <div class="row row-2">
                <center>
                    <h2 class="heading"> Best Sellers </h2>
                </center>
            </div>
        </div>

        <div class="small-container">
            <div class="row">
                <div class="col-4">
                    <?php
                    $product_count = 1;

                    // displaying fetched data 
                    while ($row = mysqli_fetch_array($result)) {
                        $product_name = $row[1];
                        $product_price = $row[2];
                        $product_img_location = $row[4];
                        echo "<img src='$product_img_location'>";
                        echo "<p>$product_name</p>";
                        echo "<div class='rating'>";
                        echo "<i class='fa fa-star'> </i>";
                        echo "<i class='fa fa-star'> </i>";
                        echo "<i class='fa fa-star'> </i>";
                        echo "<i class='fa fa-star'> </i>";
                        echo "<i class='fa fa-star-o'> </i>";
                        echo "</div>";
                        echo "<p>$product_price Rs.</p>";
                        echo "<form action='cart.php' method='post' class='custom-add2cart'>";
                        echo "<input type='hidden' name='target' value='cart' />";
                        echo "<input type='hidden' name='action' value='add' />";
                        echo "<input type='hidden' name='product_id' value='$product_count' />";
                        $product_count=$product_count+1;
                        echo "<div class='add-button-wrapper widget-fingerprint-product-add-button'>";
                        echo "<button type='submit' class='btn regular-button regular-main-button add2cart submit' name='submit' onclick='bought()'>";
                        echo "<span>Buy Now</span>";
                        echo "</button>";
                        echo "</div>";
                        echo "</form>";
                    }

                    // closing the open connections 
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class = "footer-body"> 
        <footer class="footer">
            <div class="inner-footer">
                <div class="social-media">
                    <ul>
                        <li class = "social-items"><a href="#"> <i class="fab fa-facebook"></i></a></li>
                        <li class="social-items"> <a href="#"><i class="fab fa-whatsapp"></i></i></a></li>
                        <li class="social-items"> <a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li class="social-items"> <a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
    
                <div class="quick-links">
                    <ul>
                        <li class="quick-items"> <a href = "./index.html#home">Home</a></li>
                        <li class="quick-items"> <a href = "#about-us">About Us</a></li>
                        <li class="quick-items"> <a href = "#products">Products</a></li>
                        <li class="quick-items"> <a href = "faq.html">FAQ</a></li>
                        <li class="quick-items"> <a href = "#contact">Contact Us</a></li>
                    </ul>
                </div>
            </div>
    
            <div class="outer-footer">
                Copyright &copy; Urban Classics. All Rights Reserved 
            </div>
        </footer>
    </div>
</body>

</html>