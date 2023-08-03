<<<<<<< HEAD
const toast = function ({
=======
function toast({
>>>>>>> sub_main2
    title = '',
    message = '',
    type = 'warning',
    timesliderLeft = 3000,
    timefadeOut = 2000,
    duration = 3000
}){
    const main=document.getElementById('toast')
    if(main){
        const toast = document.createElement('div')
        const icons={
            succsec:'fa-circle-check',
            warning:'fa-circle-exclamation',
            error:'fa-circle-exclamation'
        }
        //Auto removeChild
        const autoremove = setTimeout(function(){
            main.removeChild(toast)
        },duration + timesliderLeft + timefadeOut)
        
        //click close removeChild
        toast.onclick=function(e){
            if(e.target.closest('.toast__close')){
                main.removeChild(toast)
                clearTimeout(autoremove);
            }
        }
        const icon = icons[type]
        toast.classList.add('toast',`toast--${type}`)
        const delay = (duration/1000).toFixed(2)//lấy 2 số thập phân
        const timeleft = (timesliderLeft/1000).toFixed(2)//lấy 2 số thập phân
        const timefadeout = (timefadeOut/1000).toFixed(2)//lấy 2 số thập phân
        toast.style.animation = `slideInLeft ${timeleft}s ease-in-out forwards,fadeOut ${timefadeout}s ${delay}s linear forwards`;
        toast.innerHTML =
        `
                <div class="toast__icon">
                    <i class="fa-solid ${icon}"></i>
                </div>
                <div class="toast__body">
                    <div class="toast__title">
                        ${title}
                    </div>
                    <p class="toast__msg">
                    ${message}
                    </p>
                </div>
                <div class="toast__close">
                    <i class="fa-sharp fa-solid fa-circle-xmark"></i>
                </div>
        
        `
        main.appendChild(toast);
    }

}
<<<<<<< HEAD
function showSuccsecToast(){
=======
    function showSuccsecToast(){
>>>>>>> sub_main2
        toast({
        title:'succsec',
        message:'Sản Phẩm đã được thêm giỏ hàng thành công.',
        type:'succsec',
        timesliderLeft:3000,
        timefadeOut:2000,
        duration: 5000,
    })
}
<<<<<<< HEAD
 function ShowError() {
    toast({
      title:'error',
      message:'Đăng Nhập để sử dụng chức năng này',
      type:'error',
      timesliderLeft: 3000,
      timefadeOut: 2000,
      duration: 3000
    });
  }
const test = 10;
export {test}

=======
>>>>>>> sub_main2

