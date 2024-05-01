<img class="premium-quantity-img" src="/resources/img/premium/background.png">

<?php
$pricePerTwo = isset($_GET['price']) ? $_GET['price'] : 0;
?>

<div class="quantity-screen-wrapper">
    <h1 class="quantity-heading">Number of Photos</h1>

    <div class="quantity-box-wrapper">
        <div class="quantity-selector">
            <button id="decrease" class="change-value">-</button>
            <span class="quantity"><p class="quantity-value" id="quantity-value">2</p></span>
            <button id="increase" class="change-value">+</button>
        </div>
        <div class="price"><p id="price-value"><?php echo $pricePerTwo; ?></p></div>

    </div>
    <button class="next-button">NEXT</button>  
</div>

