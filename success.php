<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style-form.css">
    <title>Thank you!</title>
</head>
<body>

    <div class="success-container">
        <div class="success-container-inner">
            <h1 class="big-header">Quiz created, thank you!</h1>
            <div class="success-form-content">
                <div class="success-form-content-group">
                    <div class="success-form-content-logo" style="background-image: url('<?php echo $sImage; ?>');">
                        <!-- <img src="<?php echo $sImage; ?>" alt="Your Logo" /> -->
                    </div>
                    <div class="success-form-content-title-and-price">
                        <h2><?php echo $title; ?></h2>
                        <p>Entry Fee: <span class="price">&pound;<?php echo $price; ?></span></p>
                    </div>
                </div>
                <div class="success-form-content-category">
                    <p>Quiz category: <span class="cat"><?php echo $category; ?></span></p>
                </div>
            </div>
            <a href="index.php" class="button success-btn">Create another one!</a>
        </div>
    </div>

</body>
</html>