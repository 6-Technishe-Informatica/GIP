<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/product.css">

    <title><?php echo $_GET['productName'] ?></title>
</head>

<body>
    <header>
        <?php include '../siteParts/nav.php'; ?>
    </header>
    <main>
        <article>
            <?php
            $productDiscription = "lore ipsum dolor sit amet consectetur adipisicing elit. Nihil accusantium corporis quidem, aut cupiditate voluptatum, adipisci ea consequuntur officiis temporibus eveniet perferendis laborum sunt fuga placeat sequi pariatur non impedit!";
            $productPrice = "€ 799";
            $details = array(
                "Brand" => "Apple",
                "Model" => "iPhone 12",
                "Color" => "Black",
                "Storage" => "128GB",
                "Weight" => "164g",
                "Dimensions" => "146.7 x 71.5 x 7.4 mm",
                "Display" => "6.1 inch",
                "Resolution" => "2532 x 1170 pixels",
                "Battery" => "2815 mAh",
                "Processor" => "A14 Bionic",
                "RAM" => "4GB",
                "Camera" => "12MP",
                "OS" => "iOS 14"
            );
            ?>

            <h2 class="productName"><?php echo $_GET['productName']; ?></h2>

            <div class="images">
                <!-- Slideshow container -->
                <div class="slideshow-container">

                    <!-- Full-width images with number and caption text -->
                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="../images/productPicture.webp" style="width:100%">
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="../images/productPicture.webp" style="width:100%">
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="../images/productPicture.webp" style="width:100%">
                    </div>

                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>

                <!-- The dots/circles -->
                <div style="text-align:center;">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </div>

            <div class="shop">
                <p class="price"><?php echo $productPrice; ?></p>

                <?php
                    $stock = 1;

                    if ($stock > 0) {
                        echo "<p class='stock'>Op vooraad</p>";
                    } else {
                        echo "<p class='stock out'>Niet op vooraad</p>";
                    }
                ?>

                <button class="winkelMand"><img src="../images/winkelwagen.svg" alt="winkelwagen"> WinkelMandje</button>
            </div>
        </article>
        <div class="detailsDiscription">
            <div class="buttons">
                <a id="discription-button" class="active">Productomschrijving</a>
                <a id="details-button">Details</a>
            </div>


            <p id="discription" class="discription active"><?php echo $productDiscription; ?></p>
            <div id="details" class="details">
                <?php
                foreach ($details as $key => $value) {
                    echo "<strong>" . $key . "</strong><p>" . $value . "</p>";
                }
                ?>
            </div>
        </div>
    </main>
    
    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>

    <script src="product.js"></script>
</body>

</html>