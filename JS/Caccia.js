/*Shop Caccia*/ 
let currentPositionCaccia = 1; 
let MAXCAROSELLOCACCIA; 

function prevCaccia() {
    const divShop = document.querySelectorAll('#Caccia .caroselloShop');
    const dash = document.querySelectorAll('#Caccia .dashDiv button');

    currentPositionCaccia = prevShopFunction(divShop, currentPositionCaccia);

    dashOrder(dash, currentPositionCaccia);
}

function nextCaccia() {
    const divShop = document.querySelectorAll('#Caccia .caroselloShop');
    const dash = document.querySelectorAll('#Caccia .dashDiv button');

    currentPositionCaccia = nextShopFunction(divShop, currentPositionCaccia, MAXCAROSELLOCACCIA);

    dashOrder(dash, currentPositionCaccia);
}

function dashCaccia (event) {
    const dash = event.currentTarget;
    const divShop = document.querySelectorAll('#Caccia  .caroselloShop');
    const dashList = document.querySelectorAll('#Caccia  .dashDiv button');

    currentPositionCaccia  = changeShopFunction(dash, divShop);

    dashOrder(dashList, currentPositionCaccia );
}

const nextShopCaccia = document.querySelectorAll('#Caccia button')[1];
nextShopCaccia.addEventListener('click', nextCaccia);

const prevShopCaccia = document.querySelectorAll('#Caccia button')[0];
prevShopCaccia.addEventListener('click', prevCaccia);

const dashShopCaccia = document.querySelectorAll('#Caccia .dashDiv button');
for (const item of dashShopCaccia)   
    item.addEventListener('click', dashCaccia);

function onJsonCaccia(json) {
    const dashDiv = document.querySelector('#Caccia .dashDiv');
    const caroselloDiv = document.querySelector('#Caccia .divImgShop');
    
    MAXCAROSELLOCACCIA = showShop(json, caroselloDiv);

    for(let j = 1; j < MAXCAROSELLOCACCIA-1; j++) {
        const dash = document.createElement('button');
        dash.dataset.dash = j;
        
        if(j === 1) dash.classList.add('orange');
        else dash.classList.add('gray');

        dashDiv.appendChild(dash);
        dash.addEventListener('click', dashCaccia);
    }
}

const formDataCaccia = new FormData();
formDataCaccia.append('ricerca', 'caccia');
const dataShopCaccia = {method: 'post', body: formDataCaccia}
fetch('searchProductByCategory.php', dataShopCaccia).then(onResponse).then(onJsonCaccia);
/****************************************************/