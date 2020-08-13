<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style-form.css">
    <title>Create a quiz!</title>
</head>
<body>
    
    <form class="form-container" action="results.php" method="post" enctype="multipart/form-data">

        <div class="col">
            <h1 class="small-header">Your quiz details:</h1>
            <div class="input-box">
                <label for="title">Quiz title</label>
                <input type="text" name="title" id="title" placeholder="Enter quiz title" >
                <div id="err-border-title" class="hover-animation <?php echo isset($title_error)? "error-border" : "" ?>"></div>
                <p class="note">The title can't be longer than 50 chars</p>
                <p class="error-msg" id="title-error-msg"></p>
                <p class="error-msg" id="title-error-msg-after-submit"><?php if(isset($title_error)) { echo $title_error; }?></p>
            </div>
            <div class="input-box">
                <label for="logo">Quiz logo</label>
                <div class="img-upload-box">
                    <label class="new-button" for="upload" id="file-btn"> <span>Upload a custom logo</span>
                    <input type="file" name="file" id="upload" accept="image/png,image/jpeg" />
                </div>
                <p class="note">.JPG, .PNG only</p>
                <p class="error-msg" id="logo-error-msg"></p>
                <p class="error-msg" id="logo-error-msg-after-submit"><?php if(isset($logo_error)) { echo $logo_error; }?></p>
            </div>
        </div>
        <div class="col">
            <h1 class="small-header">Select your quiz topic:</h1>
            <div class="input-box">
                <label for="category">Category</label>
                <div class="select">
                    <select name="category" id="category">
                        <option value="" disabled selected hidden>Choose category</option>
                        <option name="category" value="General Knowledge">General Knowledge</option>
                        <option name="category" value="Animals">Animals</option>
                        <option name="category" value="Math">Math</option>
                        <option name="category" value="Technologies">Technologies</option>
                        <option name="category" value="Lifestyle">Lifestyle</option>
                        <option name="category" value="Sport">Sport</option>
                    </select>
                    <div id="err-border-cat" class="hover-animation <?php echo isset($cat_error)? "error-border" : "" ?>"></div>
                </div>
                <p class="error-msg" id="cat-error-msg"></p>
                <p class="error-msg" id="cat-error-msg-after-submit"><?php if(isset($cat_error)) { echo $cat_error; }?></p>
            </div>
            <div class="input-box">
                <label for="price">Quiz entry fee</label>
                <input type="text" name="price" id="price" placeholder="Enter entry fee" <?php echo (isset($price_value)) ? "value='".$price."'" : null ?> >
                <div id="err-border-price" class="hover-animation <?php echo isset($price_error)? "error-border" : "" ?>"></div>
                <p class="note">Min.entry fee is &pound;5.00.</p>
                <p class="error-msg" id="price-error-msg"></p>
                <p class="error-msg" id="price-error-msg-after-submit"><?php if(isset($price_error)) { echo $price_error; }?></p>
            </div>
        </div>
        <input type="submit" name="submit" value="Proceed" class="button form-btn">
</form>

<script src="./js/validation.js"></script>

</body>
</html>