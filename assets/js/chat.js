const messBtn = document.querySelector('.chat__box-icon');
const messBox = document.querySelector('.box__chat-message');
const btnToppics = document.querySelectorAll('.box__chat-toppic-detail button');
messBtn.onclick = function () {
    messBox.classList.toggle('box__chat-message--active');
}
function hideItem(idSender) {
    document.querySelector('.box__chat-toppic').style.display = 'none';
    document.querySelector('.box__chat-info').style.display = 'flex';
    document.querySelector('.box__chat-toppic-detail').style.display = 'none'
    document.querySelector('.box__chat-chat').style.display = 'none';
    document.querySelector('.box__chat-detail').style.display = 'block';
    document.querySelector('.box__chat-send').style.display = 'flex';
    const idToppics = document.querySelector('.box__chat-toppic-detail--active').dataset.id;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         const AdminInfo = JSON.parse(this.responseText);
         const AdminAvt =document.querySelector('.info__avatar .info__avatar-img');
         const AdminName =document.querySelector('.info__contact-name');
         const AdminStatus =document.querySelector('.info__contact-status');
         const AdminToppicc =document.querySelector('.info__contact-toppic');

         if(AdminInfo['images'] !== null){
            AdminAvt.src =`../../../../assets/images/users/${AdminInfo['images']}`;
        }else{
            AdminAvt.src =`../../../../assets/images/users/th (1).jpg`;
        }
         AdminName.innerHTML = AdminInfo['full_name'];
         AdminStatus.innerHTML= AdminInfo['active'] == 1 ? 'Online Now' : 'Offline Now';
         AdminToppicc.innerHTML = AdminInfo['chat_toppic_name'] ;
         const sendBtn = document.querySelector('.chat__send-btn');
         sendBtn.addEventListener('click',function(){
            console.log("người gửi:"+idSender+"người nhận"+AdminInfo['id'] +"nội dunng"+inputSendText);
            if(inputSendText !== ''){
             var currentTime = new Date();
             var hours = currentTime.getHours();
             var minutes = currentTime.getMinutes();
             var seconds = currentTime.getSeconds();
             var day = currentTime.getDate();
             var month = currentTime.getMonth() + 1; // Tháng bắt đầu từ 0, nên cần cộng thêm 1
             var year = currentTime.getFullYear();
         
            
         }
 
        })
         
      
      }
    };
    xmlhttp.open("GET", "../../../models/DAO/admin_toppic.php?id_toppics=" + idToppics, true);
    xmlhttp.send();
    const inputSend =document.querySelector('.chat__send-input input');
    const btnSend =document.querySelector('.chat__send-btn i');
    let inputSendText ='';
    inputSend.addEventListener('keyup',function(){
        var input = inputSend.value;
        if(input !== ''){
            inputSendText = input;
            btnSend.style.opacity = '1';
            btnSend.style.color ='#0A7CFF';
            btnSend.style.cursor ='pointer';
        }else{
            btnSend.style.opacity ='0.2';
            btnSend.style.color ='#9b9b9b';
            btnSend.style.cursor ='default';

        }
    })
    
     
    
}
btnToppics.forEach(function (btn) {
    btn.addEventListener('click', function (e) {
        const isActive = btn.classList.contains('box__chat-toppic-detail--active');
        const btnChatTitle = document.querySelector('.box__chat-chat button');
        if (isActive) {
            btn.classList.remove('box__chat-toppic-detail--active');
            btnChatTitle.style.opacity = 0.2;
            btnChatTitle.style.cursor = 'default';
            btnChatTitle.classList.remove('chatTitle-active');
        } else {
            btnToppics.forEach(btn => btn.classList.remove('box__chat-toppic-detail--active'));
            btn.classList.add('box__chat-toppic-detail--active');
            btnChatTitle.style.opacity = 1;
            btnChatTitle.style.cursor = 'pointer';
            btnChatTitle.classList.add('chatTitle-active');
        }
        if (btnChatTitle.classList.contains('chatTitle-active')) {
            btnChatTitle.onclick = function () {
                const btnChatAId = btnChatTitle.getAttribute('data-id');
                if (btnChatAId !== '') {
                    hideItem(btnChatAId);
                } else {
                    function toast({
                        title = '',
                        message = '',
                        type = 'warning',
                        timesliderLeft = 3000,
                        timefadeOut = 2000,
                        duration = 3000
                    }) {
                        const main = document.getElementById('toast')
                        if (main) {
                            const toast = document.createElement('div')
                            const icons = {
                                succsec: 'fa-circle-check',
                                warning: 'fa-circle-exclamation',
                                error: 'fa-circle-exclamation'
                            }
                            //Auto removeChild
                            const autoremove = setTimeout(function () {
                                main.removeChild(toast)
                            }, duration + timesliderLeft + timefadeOut)

                            //click close removeChild
                            toast.onclick = function (e) {
                                if (e.target.closest('.toast__close')) {
                                    main.removeChild(toast)
                                    clearTimeout(autoremove);
                                }
                            }
                            const icon = icons[type]
                            toast.classList.add('toast', `toast--${type}`)
                            const delay = (duration / 1000).toFixed(2)//lấy 2 số thập phân
                            const timeleft = (timesliderLeft / 1000).toFixed(2)//lấy 2 số thập phân
                            const timefadeout = (timefadeOut / 1000).toFixed(2)//lấy 2 số thập phân
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
                    toast({
                        title: 'error',
                        message: 'Đăng Nhập để sử dụng chức năng này',
                        type: 'error',
                        timesliderLeft: 2000,
                        timefadeOut: 3000,
                        duration: 4000
                    });
                }
            }
        }
    })
})


