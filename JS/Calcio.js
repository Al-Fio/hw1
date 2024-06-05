/*Shop Calcio*/ 
let currentPositionCalcio = 1; 
let MAXCAROSELLOCALCIO; 

function prevCalcio() {
    const divShop = document.querySelectorAll('#Calcio .caroselloShop');
    const dash = document.querySelectorAll('#Calcio .dashDiv button');

    currentPositionCalcio = prevShopFunction(divShop, currentPositionCalcio);

    dashOrder(dash, currentPositionCalcio);
}

function nextCalcio() {
    const divShop = document.querySelectorAll('#Calcio .caroselloShop');
    const dash = document.querySelectorAll('#Calcio .dashDiv button');

    currentPositionCalcio = nextShopFunction(divShop, currentPositionCalcio, MAXCAROSELLOCALCIO);

    dashOrder(dash, currentPositionCalcio);
}

function dashCalcio (event) {
    const dash = event.currentTarget;
    const divShop = document.querySelectorAll('#Calcio  .caroselloShop');
    const dashList = document.querySelectorAll('#Calcio  .dashDiv button');

    currentPositionCalcio  = changeShopFunction(dash, divShop);

    dashOrder(dashList, currentPositionCalcio );
}

const nextShopCalcio = document.querySelectorAll('#Calcio button')[1];
nextShopCalcio.addEventListener('click', nextCalcio);

const prevShopCalcio = document.querySelectorAll('#Calcio button')[0];
prevShopCalcio.addEventListener('click', prevCalcio);

const dashShopCalcio = document.querySelectorAll('#Calcio .dashDiv button');
for (const item of dashShopCalcio)   
    item.addEventListener('click', dashCalcio);

function onJsonCalcio(json) {
    const dashDiv = document.querySelector('#Calcio .dashDiv');
    const caroselloDiv = document.querySelector('#Calcio .divImgShop');
    
    MAXCAROSELLOCALCIO = showShop(json, caroselloDiv);

    for(let j = 1; j < MAXCAROSELLOCALCIO-1; j++) {
        const dash = document.createElement('button');
        dash.dataset.dash = j;
        
        if(j === 1) dash.classList.add('orange');
        else dash.classList.add('gray');

        dashDiv.appendChild(dash);
        dash.addEventListener('click', dashCalcio);
    }
}

const formDataCalcio = new FormData();
formDataCalcio.append('ricerca', 'calcio');
const dataShopCalcio = {method: 'post', body: formDataCalcio}
fetch('searchProductByCategory.php', dataShopCalcio).then(onResponse).then(onJsonCalcio);
/****************************************************/