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
            <img class="" src="../images/productPicture.webp" alt="<?php echo $_GET['productName']; ?>">
            <p class="price"><?php echo $productPrice; ?></p>
        </article>
        <div>
            <button>Productomschrijving</button>
            

            <p class="discription"><?php echo $productDiscription; ?></p>
            <p class="details">
                <?php
                foreach ($details as $key => $value) {
                    echo "<strong>" . $key . "</strong><p>" . $value . "</p>";
                }
                ?>
            </p>
        </div>
    </main>

    <script src="product.js"></script>
</body>

</html>