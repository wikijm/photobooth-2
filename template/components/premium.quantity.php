<?php
$pricePerTwo = isset($_GET['price']) ? $_GET['price'] : 0;
?>

<h1 class="heading">Number of Prints</h1>


<div>
    <div class="quantity-selector">
        <button class="decrease">-</button>
        <span class="quantity">2</span>
        <button class="increase">+</button>
    </div>

    <p class="price">Price: $<?php echo $pricePerTwo; ?></p>
</div>

<button class="next-button">Next</button>