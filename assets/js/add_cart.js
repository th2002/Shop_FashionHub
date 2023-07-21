// const btnAddCart =document.querySelectorAll('.product_btn-add_cart'),
// heading = document.querySelector('.nav_cart-heading');
// btnAddCart.forEach(btn => {
//     btn.addEventListener('click',function(e){
//         let xhr = new XMLHttpRequest();
//         xhr.open("POST","../../app/models/DAO/add_cart.php", true);
//         xhr.onload = ()=>{
//           if(xhr.readyState === XMLHttpRequest.DONE){
//               if(xhr.status === 200){
//                 heading.innerHTML = "ok chưa";
//               }
//           }
//         }
//         let data={
//             productId: 'ID_SẢN_PHẨM'
//         }
//         xhr.send(data);
//     })
// });