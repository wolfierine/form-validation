// title validation
const title_input = document.getElementById('title');
const title_error_msg = document.getElementById('title-error-msg');
const red_border_title = document.getElementById('err-border-title');
title_input.addEventListener('input', evt => {
    let value = document.getElementById('title').value;
    const error_msg_after_submit = document.getElementById('title-error-msg-after-submit');
    const trimmed = value.trim().length;
    
    // remove backend errors
    if (typeof(error_msg_after_submit) != 'undefined' && error_msg_after_submit != null) {
        error_msg_after_submit.style.display = "none";
    }

    // check if title input is empty
    if (!value) {
        title_error_msg.innerHTML = "Please provide a name for your quiz";
        title_error_msg.style.display = "block";
        red_border_title.classList.add('error-border');
        return
    }

    // title input validation
    if (trimmed < 5) {
        title_error_msg.innerHTML = "The title can't be shorter than 5 chars";
        title_error_msg.style.display = "block";
        red_border_title.classList.add('error-border');
    } else if(trimmed > 50){
        title_error_msg.innerHTML = "The title can't be longer than 50 chars";
        title_error_msg.style.display = "block";
        red_border_title.classList.add('error-border');
    } else {
        title_error_msg.style.display = "none";
        red_border_title.classList.remove('error-border');
    }
});

//image validation
var file_input = document.getElementById('upload'); 
file_input.addEventListener("change", evt => {
    var file_name = file_input.files.item(0).name;
    var file_type = file_input.files.item(0).type;
    const logo_error_msg = document.getElementById('logo-error-msg');
    const logo_msg_after_submit = document.getElementById('logo-error-msg-after-submit');

    // remove backend errors
    if (typeof(logo_msg_after_submit) != 'undefined' && logo_msg_after_submit != null) {
        logo_msg_after_submit.style.display = "none";
    }

    // check image extension
    if(file_type !== "image/jpg" && file_type !== "image/jpeg" && file_type !== "image/png"){
        logo_error_msg.innerHTML = "Please provide .jpg or .png format only";
        logo_error_msg.style.display = "block";
    } else {
        logo_error_msg.style.display = "none";
        const error_msg_after_submit = document.getElementById('logo-error-msg-after-submit');
        if (typeof(error_msg_after_submit) != 'undefined' && error_msg_after_submit != null) {
            error_msg_after_submit.style.display = "none";
        }
    }

    // show name of uploaded image
    document.querySelector('#file-btn span').innerHTML = file_name;
})

//select validation
var category = document.getElementById("category");
const red_border_cat = document.getElementById('err-border-cat');
const cat_error_msg = document.getElementById('cat-error-msg');
category.addEventListener('click', evt => {
    const error_msg_after_submit = document.getElementById('cat-error-msg-after-submit');
    // remove backend errors
    if (typeof(error_msg_after_submit) != 'undefined' && error_msg_after_submit != null) {
        error_msg_after_submit.style.display = "none";
    }
    // if user didn't choose category
    if(category.selectedIndex == 0) {
        cat_error_msg.innerHTML = "Please select a category";
        cat_error_msg.style.display = "block";
        red_border_cat.classList.add('error-border');
    } else {
        cat_error_msg.style.display = "none";
        red_border_cat.classList.remove('error-border');
    }
})

//entry fee validation
const price_input = document.getElementById('price');
const price_error_msg = document.getElementById('price-error-msg');
const red_border_price = document.getElementById('err-border-price');
const pattern1 = /[a-zA-Z\s]/;  
const pattern2 = /^\xA3/;
price_input.addEventListener('input', evt => {  
    let price_value = price_input.value;

    const error_msg_after_submit = document.getElementById('price-error-msg-after-submit');
    // remove backend errors
        if (typeof(error_msg_after_submit) != 'undefined' && error_msg_after_submit != null) {
        error_msg_after_submit.style.display = "none"
    }

    if (!price_value) {
        price_error_msg.innerHTML = "Please provide a price";
        price_error_msg.style.display = "block"
        red_border_price.classList.add('error-border');
        return
    } else {
        price_error_msg.style.display = "none";
    }

    // check if user typed 0 or text
    if(price_value < 0 || pattern1.test(price_value) ) {
        document.getElementById('price').value = "£0.00";
        price_error_msg.innerHTML = "Please provide a correct price";
        price_error_msg.style.display = "block";
        red_border_price.classList.add('error-border');
    } else if(pattern2.test(price_value)){
        const only_value = price_value.split('£');;
        if(only_value[1] < 0){
            document.getElementById('price').value = "£0.00";
            console.log(only_value[1]);
            price_error_msg.innerHTML = "Please provide a correct price";
            price_error_msg.style.display = "block";
            red_border_price.classList.add('error-border');
        } else {
            red_border_price.classList.remove('error-border');
        }
    } else {
        // add pound symbol
        document.getElementById('price').value = "£" + price_value;
        red_border_price.classList.remove('error-border');
    }
});