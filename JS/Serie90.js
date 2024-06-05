// Funzioni per shop Serie90
let currentPositionSerie90 = 1; 
let MAXCAROSELLOSERIE90; 

function prevSerie90() {
    const divShop = document.querySelectorAll('#Serie90 .caroselloShop');
    const dash = document.querySelectorAll('#Serie90 .dashDiv button');

    currentPositionSerie90 = prevShopFunction(divShop, currentPositionSerie90);

    dashOrder(dash, currentPositionSerie90);
}

function nextSerie90() {
    const divShop = document.querySelectorAll('#Serie90 .caroselloShop');
    const dash = document.querySelectorAll('#Serie90 .dashDiv button');

    currentPositionSerie90 = nextShopFunction(divShop, currentPositionSerie90, MAXCAROSELLOSERIE90);

    dashOrder(dash, currentPositionSerie90);
}

function dashSerie90(event) {
    const dash = event.currentTarget;
    const divShop = document.querySelectorAll('#Serie90 .caroselloShop');
    const dashList = document.querySelectorAll('#Serie90 .dashDiv button');

    currentPositionSerie90 = changeShopFunction(dash, divShop);

    dashOrder(dashList, currentPositionSerie90);
}    

const nextShopSerie90 = document.querySelectorAll('#Serie90 button')[1];
nextShopSerie90.addEventListener('click', nextSerie90);

const prevShopSerie90 = document.querySelectorAll('#Serie90 button')[0];
prevShopSerie90.addEventListener('click', prevSerie90);

const dashShopSerie90 = document.querySelectorAll('#Serie90 .dashDiv button');
for (const item of dashShopSerie90)   
    item.addEventListener('click', dashSerie90);


function onJsonSerie90(json) {
    const dashDiv = document.querySelector('#Serie90 .dashDiv');
    const caroselloDiv = document.querySelector('#Serie90 .divImgShop');

    MAXCAROSELLOSERIE90 = showShop(json, caroselloDiv);

    for(let j = 1; j < MAXCAROSELLOSERIE90-1; j++) {
        const dash = document.createElement('button');
        dash.dataset.dash = j;
        
        if(j === 1) dash.classList.add('orange');
        else dash.classList.add('gray');

        dashDiv.appendChild(dash);
        dash.addEventListener('click', dashSerie90);
    }
}

const formDataSerie90 = new FormData();
formDataSerie90.append('ricerca', 'serie90');
const dataShopSerie90 = {method: 'post', body: formDataSerie90}
fetch('searchProductByCategory.php', dataShopSerie90).then(onResponse).then(onJsonSerie90);
