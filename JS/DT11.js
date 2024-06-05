// Funzioni per shop DT11
let currentPositionDT11 = 1; 
let MAXCAROSELLODT11; 

function prevDT11() {
    const divShop = document.querySelectorAll('#DT11 .caroselloShop');
    const dash = document.querySelectorAll('#DT11 .dashDiv button');

    currentPositionDT11 = prevShopFunction(divShop, currentPositionDT11);

    dashOrder(dash, currentPositionDT11);
}

function nextDT11() {
    const divShop = document.querySelectorAll('#DT11 .caroselloShop');
    const dash = document.querySelectorAll('#DT11 .dashDiv button');

    currentPositionDT11 = nextShopFunction(divShop, currentPositionDT11, MAXCAROSELLODT11);

    dashOrder(dash, currentPositionDT11);
}

function dashDT11(event) {
    const dash = event.currentTarget;
    const divShop = document.querySelectorAll('#DT11 .caroselloShop');
    const dashList = document.querySelectorAll('#DT11 .dashDiv button');

    currentPositionDT11 = changeShopFunction(dash, divShop);

    dashOrder(dashList, currentPositionDT11);
}    

const nextShopDT11 = document.querySelectorAll('#DT11 button')[1];
nextShopDT11.addEventListener('click', nextDT11);

const prevShopDT11 = document.querySelectorAll('#DT11 button')[0];
prevShopDT11.addEventListener('click', prevDT11);

const dashShopDT11 = document.querySelectorAll('#DT11 .dashDiv button');
for (const item of dashShopDT11)   
    item.addEventListener('click', dashDT11);

function onJsonDT11(json) {
    const dashDiv = document.querySelector('#DT11 .dashDiv');
    const caroselloDiv = document.querySelector('#DT11 .divImgShop');

    MAXCAROSELLODT11 = showShop(json, caroselloDiv);

    for(let j = 1; j < MAXCAROSELLODT11-1; j++) {
        const dash = document.createElement('button');
        dash.dataset.dash = j;
        
        if(j === 1) dash.classList.add('orange');
        else dash.classList.add('gray');

        dashDiv.appendChild(dash);
        dash.addEventListener('click', dashDT11);
    }
}

const formDataDT11= new FormData();
formDataDT11.append('ricerca', 'DT11');
const dataShopDT11= {method: 'post', body: formDataDT11}
fetch('searchProductByCategory.php', dataShopDT11).then(onResponse).then(onJsonDT11);

