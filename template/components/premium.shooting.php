<?php
$collageFormat = $_GET['collage'] ?? '2x3'; // Default to '2x3' if 'collageFormat' is not set
?>

<h1 class="heading">Choose Your Photos</h1>
<div class="shooting-container">
    <div class="image-container"></div>
    <?php if ($collageFormat == '1x4'): ?>
        <div class="collage-container-1x4">
            <div class="placeholder-1x4"></div> 
            <div class="placeholder-1x4"></div> 
            <div class="placeholder-1x4"></div> 
            <div class="placeholder-1x4"></div> 
        </div>
    <?php else: ?>
        <div class="collage-container-2x3">
            <div class="placeholder-2x-3"></div> 
            <div class="placeholder-2x-3"></div> 
            <div class="placeholder-2x-3"></div> 
            <div class="placeholder-2x-3"></div> 
            <div class="placeholder-2x-3"></div> 
            <div class="placeholder-2x-3"></div> 
        </div>
    <?php endif; ?>
</div>

<button class="next-button">Next</button>