const messBtn = document.querySelector('.box__chat');
const messBox = document.querySelector('.box__chat-message');
messBtn.onclick = function(){
    messBox.classList.toggle('box__chat-message--active');
}
