//cách 1 ---------------------
// const btnAddCart =document.querySelectorAll('.product_btn-add_cart'),
// heading = document.querySelector('.nav_cart-heading');
// btnAddCart.forEach(btn => {
//     btn.addEventListener('click',function(e){
//         let xhr = new XMLHttpRequest();
//         xhr.open("GET","../../models/DAO/add_cart.php?productId=1", true);
//         xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//         xhr.onload = ()=>{
//           if(xhr.readyState === XMLHttpRequest.DONE){
//               if(xhr.status === 200){
//                 console.log("thành công");
//                 console.log(xhr.responseText);
//               }
//           }
//         }
//         xhr.send();   
//     })
// });


//cách 2 ---------------------

$(document).ready(function() {
  // Xử lý sự kiện click vào nút button
 const btnAddCart =document.querySelectorAll('.product_btn-add_cart'),
       ulListCart = document.querySelector('.nav_cart-list');
 btnAddCart.forEach(btn=>{
  btn.addEventListener('click',function(e){
    btn.classList.add("button-click-animation");

    // Xoá class sau khi animation kết thúc (0.5s)
    setTimeout(function() {
      btn.classList.remove("button-click-animation");
    }, 500);
    e.preventDefault();
    //lấy id của item cha
    var parentId = this.parentElement.parentElement.parentElement.dataset.id;
    // Lấy phần tử đầu tiên có lớp "element" và có thuộc tính "data-attribute"
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
          url: '../../models/DAO/add_cart.php', // Đường dẫn đến tập tin PHP xử lý dữ liệu
          type: 'POST', // Phương thức gửi dữ liệu (POST hoặc GET)
          data: JSON.stringify(productJson),  //một đối tượng JSON
          contentType: 'application/json',//định dạng kiểu json
          dataType: 'json',
          success: function(response) {
            // Xử lý phản hồi từ máy chủ (nếu cần)
            if(response){ 
              if(response[0].length>10){
                ulListCart.innerHTML += response[0];
              }else{
                console.log(response[0]);
                var quantityCart = document.querySelector(`.nav_cart-item-quantity[data-id_price="${response[0]}"]`);
                var intquan =parseInt(quantityCart.textContent);
                quantityCart.innerHTML = intquan + 1;
              }
              if(response[1]){
                var quantity_Cart = document.querySelector('.nav__cart-quantity span');
                quantity_Cart.innerHTML = response[1];
              }
              
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
