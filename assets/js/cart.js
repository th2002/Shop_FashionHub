
$(document).ready(function() {
    // Xử lý sự kiện click vào nút button
   const btnAddCart =document.querySelectorAll('.product_btn-add_cart'),
         ulListCart = document.querySelector('.nav_cart-list');
   btnAddCart.forEach(btn=>{
    btn.addEventListener('click',function(e){
      btn.classList.add("button-click-animation");
      setTimeout(function() {
        btn.classList.remove("button-click-animation");
      }, 500);
      e.preventDefault();
      var parentId = this.parentElement.parentElement.parentElement.dataset.id;
      var productItem = document.querySelector(`.product_item[data-id="${parentId}"]`);
      var product_img =productItem.querySelector('.product_img-item').getAttribute("src");
      var imgName = product_img.substring(product_img.lastIndexOf('/') + 1);
      var product_name = productItem.querySelector('.product_name').innerText;
      var product_price = productItem.querySelector('.product_price-new').innerText;
      
      var intValue = parseInt(product_price.replace(/,/g, ""), 10);
  
      var id_price =parentId+'_'+intValue;
      var productJson ={
              id:parentId,
              imgName:imgName,
              name:product_name,
              price:product_price,
              quantity:1,
              id_price:id_price,
      }
      $.ajax({
            url: '../../../models/DAO/add_cart.php', // Đường dẫn đến tập tin PHP xử lý dữ liệu
            type: 'POST', // Phương thức gửi dữ liệu (POST hoặc GET)
            data: JSON.stringify(productJson),  //một đối tượng JSON
            contentType: 'application/json',//định dạng kiểu json
            dataType: 'json',
            success: function(response) {
              // Xử lý phản hồi từ máy chủ (nếu cần)
              if(response){ 
                if(response[0].length > 20 ){
                  ulListCart.innerHTML += response[0];
                }else{
                  const quantityItem = document.querySelector(`.nav_cart-item-quantity[data-id_price="${response[0]}"]`);
                  var intquan =parseInt(quantityItem.innerHTML);
                  quantityItem.innerHTML = intquan + 1;
                }
                document.querySelector('.nav__cart-quantity span').innerHTML = response[1];
             
              }
            },
            error: function(xhr, status, error) {
              // Xử lý lỗi (nếu có)
              console.log(error);
            }
          });
    })
  })
  });

  
$(document).ready(function() {
  // Xử lý sự kiện click vào nút button
 const btnBuyCarts = document.querySelectorAll('.product_btn-buy');
 btnBuyCarts.forEach(btn=>{
  btn.addEventListener('click',function(e){
    btn.classList.add("button-click-animation");
      setTimeout(function() {
        btn.classList.remove("button-click-animation");
      }, 500);
    e.preventDefault();
    var parentId = this.parentElement.parentElement.parentElement.dataset.id;
    var productItem = document.querySelector(`.product_item[data-id="${parentId}"]`);
    var product_img =productItem.querySelector('.product_img-item').getAttribute("src");
    var imgName = product_img.substring(product_img.lastIndexOf('/') + 1);
    var product_name = productItem.querySelector('.product_name').innerText;
    var product_price = productItem.querySelector('.product_price-new').innerText;
    var intValue = parseInt(product_price.replace(/,/g, ""), 10);
    var id_price =parentId+'_'+intValue;
    var productJson ={
            id:parentId,
            imgName:imgName,
            name:product_name,
            price:product_price,
            quantity:1,
            id_price:id_price,
    }
    $.ajax({
          url: '../../../models/DAO/add_cart.php', // Đường dẫn đến tập tin PHP xử lý dữ liệu
          type: 'POST', // Phương thức gửi dữ liệu (POST hoặc GET)
          data: JSON.stringify(productJson),  //một đối tượng JSON
          contentType: 'application/json',//định dạng kiểu json
          dataType: 'json',
          success: function(response) {
            // Xử lý phản hồi từ máy chủ (nếu cần)
            if(response){ 
              console.log(response);

            }
          },
          error: function(xhr, status, error) {
            // Xử lý lỗi (nếu có)
            console.log(error);
          }
        });
        window.location.href ="../layout/cart.php";
  })
})
});
  