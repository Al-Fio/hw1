/*Shop Strozzatori */ 
let currentPositionStrozzatori = 1; 
let MAXCAROSELLOSTROZZATORI; 

function prevStrozzatori () {
    const divShop = document.querySelectorAll('#Strozzatori  .caroselloShop');
    const dash = document.querySelectorAll('#Strozzatori .dashDiv button');

    currentPositionStrozzatori = prevShopFunction(divShop, currentPositionStrozzatori);

    dashOrder(dash, currentPositionStrozzatori);
}

function nextStrozzatori() {
    const divShop = document.querySelectorAll('#Strozzatori .caroselloShop');
    const dash = document.querySelectorAll('#Strozzatori .dashDiv button');

    currentPositionStrozzatori = nextShopFunction(divShop, currentPositionStrozzatori, MAXCAROSELLOSTROZZATORI);

    dashOrder(dash, currentPositionStrozzatori);
}

function dashStrozzatori (event) {
    const dash = event.currentTarget;
    const divShop = document.querySelectorAll('#Strozzatori  .caroselloShop');
    const dashList = document.querySelectorAll('#Strozzatori  .dashDiv button');

    currentPositionStrozzatori  = changeShopFunction(dash, divShop);

    dashOrder(dashList, currentPositionStrozzatori );
}

const nextShopStrozzatori = document.querySelectorAll('#Strozzatori button')[1];
nextShopStrozzatori.addEventListener('click', nextStrozzatori);

const prevShopStrozzatori = document.querySelectorAll('#Strozzatori button')[0];
prevShopStrozzatori.addEventListener('click', prevStrozzatori);

const dashShopStrozzatori = document.querySelectorAll('#Strozzatori .dashDiv button');
for (const item of dashShopStrozzatori)   
    item.addEventListener('click', dashStrozzatori);

function onJsonStrozzatori(json) {
    const dashDiv = document.querySelector('#Strozzatori .dashDiv');
    const caroselloDiv = document.querySelector('#Strozzatori .divImgShop');
    
    MAXCAROSELLOSTROZZATORI = showShop(json, caroselloDiv);

    for(let j = 1; j < MAXCAROSELLOSTROZZATORI-1; j++) {
        const dash = document.createElement('button');
        dash.dataset.dash = j;
        
        if(j === 1) dash.classList.add('orange');
        else dash.classList.add('gray');

        dashDiv.appendChild(dash);
        dash.addEventListener('click', dashStrozzatori);
    }
}

const formDataStrozzatori = new FormData();
formDataStrozzatori.append('ricerca', 'strozzatori');
const dataShopStrozzatori = {method: 'post', body: formDataStrozzatori}
fetch('searchProductByCategory.php', dataShopStrozzatori).then(onResponse).then(onJsonStrozzatori);
/****************************************************/