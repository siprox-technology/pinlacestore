<?php
session_start();
if(!isset($_SESSION['_token']))
{
    $_SESSION['_token'] = strval(random_int (666666, 999999999));
}
session_regenerate_id();




require_once('models/Product.php');

$prod = new Product();

$result = $prod->getProductDetails("181004");

for($i=0; $i<count($result[2]);$i++){
    echo $result[2][$i]."<br>";
}
?>


function getProductDetails() {
    $.ajax({
        url: 'process.php',
        type: 'post',
        data: {
            request_name: 'get product details',
            _token: $('#_token').val(),
            product_id: $('#product-id').val()
        },
        beforeSend: function () {},
        success: function (response) {

            if ((response == 'server error') || (response.length <1)) {
                document.location.href = 'products.php';
            } else {
                result = JSON.parse(response);
                var colors = [];
                var colorImg = [];
                var sizes = [];
                var images = result[2];

                //display brand and name
                $('#brand-name').append(
                    result[0][0].brand+
                     "<span class='divider-left'></span>"
                );
                $('#gallary-name').text(result[0][0].name);
                //find available colors and sizes
                for (i = 0; i < result[1].length; i++) {
                    if (($.inArray(result[1][i].color, colors) < 0)) {
                        colors.push(result[1][i].color);
                    }
                    if (($.inArray(result[1][i].size, sizes) < 0)) {
                        sizes.push(result[1][i].size);
                    }
                }
                //display colors 
                for (i = 0; i < colors.length; i++) {
                    $('#product-colors-list').append(
                        "<div class = 'position-relative'" +
                        "data-toggle = 'tooltip'" +
                        "data-placement = 'top'" +
                        "title ='" + colors[i] + "'>" +
                        "<img src = 'images/img-list/" + result[0][0].imgFolder +
                        "/" + result[0][0].id + "-" + colors[i] + "-1.jpg'" +
                        "id ='"+colors[i] +"'"+"class = 'rounded-circle shadow product-color-selector"+
                        ((i==0)?" selected":"")+"'>" +
                        "<i id='checked' class = 'fas fa-check"+ 
                        ((i==0)? "":" d-none")+"'></i> </div>");
                }
    
                //display sizes
                for (i = 0; i < sizes.length; i++) {
                    $('#product-sizes-list').append("<div class='product-size-selector position-relative'>"+
                    "<p value='"+sizes[i]+"'"+"id='"+(i+1)+"'"+
                     "class='pt-4 text-center"+((i==0)?" selected'":"'")+
                     "'>"+sizes[i]+"</p>"+
                    "<i id='checked' class='fas fa-check"+((i==0)?"'":" d-none'")+
                    "></i></div>");
                }
                //display images
                for (i = 0; i < (images.length); i++) {
                var imgSource = "images/img-list/" + result[0][0].imgFolder + "/" +images[i]+".jpg'";

                    $('#imgList').append(
                        "<div class = 'carousel-item" +((i==2)?" active":"")+"'>"+
                        "<img class = 'w-100'" +
                        "src = '" +imgSource+
                        "alt = ''></div>"
                    );
                    /* zoom gallary */
                    $('#imgListZoom').append(
                        "<div class = 'carousel-item" +((i==2)?" active":"")+"'>"+
                        "<img class = ''" +
                        "src = '" +imgSource+
                        "alt = ''></div>"
                    );
                }
                $('#product-colors-name').text(
                    ($('#product-colors-list img.selected').attr('id'))
                );
                //product description
                $("#product-description").text(
                    result[0][0].description
                );
                //product number
                $("#product-number").text(
                   "Product number : "+ result[0][0].id
                );
                // calculate and display price and discount// to be removed
                var pricePackage = calculatePrice(result[1],colors[0],sizes[0]);
                var price = pricePackage[0];
                var discount =parseFloat(((pricePackage[1])*(price))/100).toFixed(2);
                $('#price-discount-list').text("$"+discount).append(
                    "<del class='ml-3 text-danger'>"+"$"+price+"</del>"
                );

            }
        },
    });
}

