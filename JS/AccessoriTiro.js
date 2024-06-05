/*Shop AccessoriTiro*/ 
let currentPositionAccessoriTiro = 1; 
let MAXCAROSELLOACCESSORITIRO; 

function prevAccessoriTiro() {
    const divShop = document.querySelectorAll('#AccessoriTiro.caroselloShop');
    const dash = document.querySelectorAll('#AccessoriTiro .dashDiv button');

    currentPositionAccessoriTiro = prevShopFunction(divShop, currentPositionAccessoriTiro);

    dashOrder(dash, currentPositionAccessoriTiro);
}

function nextAccessoriTiro() {
    const divShop = document.querySelectorAll('#AccessoriTiro .caroselloShop');
    const dash = document.querySelectorAll('#AccessoriTiro .dashDiv button');

    currentPositionAccessoriTiro = nextShopFunction(divShop, currentPositionAccessoriTiro, MAXCAROSELLOACCESSORITIRO);

    dashOrder(dash, currentPositionAccessoriTiro);
}

function dashAccessoriTiro (event) {
    const dash = event.currentTarget;
    const divShop = document.querySelectorAll('#AccessoriTiro  .caroselloShop');
    const dashList = document.querySelectorAll('#AccessoriTiro  .dashDiv button');

    currentPositionAccessoriTiro  = changeShopFunction(dash, divShop);

    dashOrder(dashList, currentPositionAccessoriTiro );
}

const nextShopAccessoriTiro = document.querySelectorAll('#AccessoriTiro button')[1];
nextShopAccessoriTiro.addEventListener('click', nextAccessoriTiro);

const prevShopAccessoriTiro = document.querySelectorAll('#AccessoriTiro button')[0];
prevShopAccessoriTiro.addEventListener('click', prevAccessoriTiro);

const dashShopAccessoriTiro = document.querySelectorAll('#AccessoriTiro .dashDiv button');
for (const item of dashShopAccessoriTiro)   
    item.addEventListener('click', dashAccessoriTiro);

function onJsonAccessoriTiro(json) {
    const dashDiv = document.querySelector('#AccessoriTiro .dashDiv');
    const caroselloDiv = document.querySelector('#AccessoriTiro .divImgShop');
    
    MAXCAROSELLOACCESSORITIRO = showShop(json, caroselloDiv);

    for(let j = 1; j < MAXCAROSELLOACCESSORITIRO-1; j++) {
        const dash = document.createElement('button');
        dash.dataset.dash = j;
        
        if(j === 1) dash.classList.add('orange');
        else dash.classList.add('gray');

        dashDiv.appendChild(dash);
        dash.addEventListener('click', dashAccessoriTiro);
    }
}

const formDataAccessoriTiro = new FormData();
formDataAccessoriTiro.append('ricerca', 'accessoriTiro');
const dataShopAccessoriTiro = {method: 'post', body: formDataAccessoriTiro}
fetch('searchProductByCategory.php', dataShopAccessoriTiro).then(onResponse).then(onJsonAccessoriTiro);
/****************************************************/