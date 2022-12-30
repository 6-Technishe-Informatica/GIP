<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/index.css">

    <title>Tech point</title>
</head>

<body>
    <header>
        <?php include 'siteParts/nav.php'; ?>
    </header>
    <main>
        <article class="hero">
            <h2>Tech Point</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil accusantium corporis quidem, aut cupiditate voluptatum, adipisci ea consequuntur officiis temporibus eveniet perferendis laborum sunt fuga placeat sequi pariatur non impedit!</p>
        </article>

        <h2 class="dealsText">Special deals</h2>
        <div class="deals">
            <?php
            //make a products array with 5 products

            $products = [
                [
                    'brand' => 'Apple',
                    'name' => 'iPhone 12',
                    'price' => '€ 799',
                    'priceNew' => '€ 699'
                ],
                [
                    'brand' => 'Apple',
                    'name' => 'MacBook Pro',
                    'price' => '€ 1.999',
                    'priceNew' => '€ 1.799'
                ],
                [
                    'brand' => 'Apple',
                    'name' => 'iPad Pro',
                    'price' => '€ 1.099',
                    'priceNew' => '€ 999'
                ],
                [
                    'brand' => 'Apple',
                    'name' => 'Apple Watch',
                    'price' => '€ 399',
                    'priceNew' => '€ 299'
                ],
                [
                    'brand' => 'Apple',
                    'name' => 'AirPods',
                    'price' => '€ 199',
                    'priceNew' => '€ 149'
                ]
            ];

            foreach ($products as $product) {
                echo '<a href="pages/product.php?productName=' . $product['name'] .'">';
                echo '<article>';
                echo '<img src="images/productPicture.webp" alt="productPicture">';
                echo '<p>' . $product['brand'] . '</p>';
                echo '<div class="gridNamePrice dealsPrice">';
                echo '<h3>' . $product['name'] . '</h3>';
                echo '<p class="ouldPrice">' . $product['price'] . '</p>';
                echo '<p>' . $product['priceNew'] . '</p>';
                echo '</div>';
                echo '</article>';
                echo '</a>';
            }
            ?>
        </div>

        <h2 class="dealsText">Ondek</h2>
        <div class="deals">
            <?php
            //make a products array with 5 products

            $products = [
                [
                    'brand' => 'Apple',
                    'name' => 'iPhone 12',
                    'price' => '€ 799'
                ],
                [
                    'brand' => 'Apple',
                    'name' => 'MacBook Pro',
                    'price' => '€ 1.999'
                ],
                [
                    'brand' => 'Apple',
                    'name' => 'iPad Pro',
                    'price' => '€ 1.099'
                ],
                [
                    'brand' => 'Apple',
                    'name' => 'Apple Watch',
                    'price' => '€ 399'
                ],
                [
                    'brand' => 'Apple',
                    'name' => 'AirPods',
                    'price' => '€ 199'
                ]
            ];

            foreach ($products as $product) {
                echo '<a href="pages/product.php?productName=' . $product['name'] .'">';
                echo '<article>';
                echo '<img src="images/productPicture.webp" alt="productPicture">';
                echo '<p>' . $product['brand'] . '</p>';
                echo '<div class="gridNamePrice">';
                echo '<h3>' . $product['name'] . '</h3>';
                echo '<p>' . $product['price'] . '</p>';
                echo '</div>';
                echo '</article>';
                echo '</a>';
            }
            ?>
        </div>

        <article class="overOns">
            <h2 class="dealsText">Meer dan enkel een Technologie winkel</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae obcaecati impedit aliquid quod, tempora quibusdam quidem excepturi labore cumque quas nostrum dolorem deserunt accusamus accusantium ipsam quisquam corrupti corporis. Excepturi!</p>
        </article>
    </main>
    <footer>
        <?php include 'siteParts/contact.php'; ?>
    </footer>
</body>

</html>