let thisPage = 1;
let limit = 4;
let list = document.querySelectorAll('.list .product_item');

function loadItem(){
    let beginGet = limit * (thisPage - 1);
    let endGet = limit * thisPage - 1;
    list.forEach((item, key)=>{
        if(key >= beginGet && key <= endGet){
            item.style.display = 'block';
        }else{
            item.style.display = 'none';
        }
    })
    listPage();
}
loadItem();

function listPage(){
    let count = Math.ceil(list.length / limit);
    document.querySelector('.container__page-list').innerHTML = '';

    if(thisPage != 1){
        let prev = document.createElement('li');
        prev.innerHTML = '<i class="container__page-icon fa-solid fa-chevron-left"></i>';
        prev.setAttribute('onclick', "changePage(" + (thisPage - 1) + ")");
        document.querySelector('.container__page-list').appendChild(prev);
    }

    for( i = 1; i <= count; i++){
        let newPage = document.createElement('li'); 
        newPage.innerHTML = i;
        if(i == thisPage){
            newPage.classList.add('active');
        }
        newPage.setAttribute('onclick', "changePage(" + i + ")");
        document.querySelector('.container__page-list').appendChild(newPage);
    }

    if(thisPage != count){
        let next = document.createElement('li');
        next.innerHTML = '<i class="container__page-icon fa-solid fa-chevron-right"></i>';
        next.setAttribute('onclick', "changePage("  + (thisPage + 1) + ")");
        document.querySelector('.container__page-list').appendChild(next);
    }
}
function changePage(i){
    thisPage = i;
    loadItem();
}