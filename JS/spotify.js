function show(episodio, library) {
    const title = episodio.name;
    const selected_image = episodio.images[1].url;

    const album = document.createElement('div');
    album.classList.add('episodi');

    const img = document.createElement('img');
    img.src = selected_image;

    const caption = document.createElement('a');
    caption.textContent = title;
    caption.href = episodio.external_urls.spotify;
    caption.target = '_blank';

    album.appendChild(img);
    album.appendChild(caption);

    library.appendChild(album);
}

function onJsonPodcast(json) {
    const library = document.querySelector('#EpisodesView');
    library.innerHTML = '';

    const results = json.items;

    let num_results = results.length;

    if(num_results > 5)
        num_results = 5;

    for(let i = 0; i < num_results; i++){
        const episodio = results[i]

        show(episodio, library);
    }
}

let currentPage = 1;

function onJsonAll(json) {
    const results = json.items;
    let num_results = results.length;

    const library = document.querySelector('#EpisodesView');

    for(let i=0; i < num_results; i++){
        const episodio = results[i]

        show(episodio, library);
    }

    if(json.next !== null) {
        currentPage++;
        search().then(onJsonAll);
    }

    const button = document.querySelector('#ButtonEpisodi');
    button.removeEventListener('click', mostraTutti);
    button.textContent = 'Mostra meno';
    button.addEventListener('click', mostraMeno);
}

function search() {
    const formData = new FormData();
    formData.append('page', currentPage);
    const data = {method: 'post', body: formData}
    return fetch('//localhost/hw1/PHP_HTML/spotify.php', data).then(onResponse);
}

function mostraMeno() {
    const button = document.querySelector('#ButtonEpisodi');
    button.removeEventListener('click', mostraMeno);
    button.textContent = 'Scopri tutti gli episodi';
    button.addEventListener('click', mostraTutti);
    
    currentPage = 1;
    search().then(onJson);

}

function mostraTutti() {
    const library = document.querySelector('#EpisodesView');
    library.innerHTML = '';    
    
    search().then(onJsonAll);
}

function onJson(json) {
    onJsonPodcast(json);
    document.querySelector('#ButtonEpisodi').addEventListener('click', mostraTutti);
}

function onResponse(response) {
    return response.json();
}

function noLogin() {
    document.querySelector('#ButtonEpisodi').classList.add('hidden');

    const text = document.createElement('p');
    const url = document.createElement('a');

    text.textContent = 'Effettua il Login per vedere gli episodi del podcast';
    url.href = 'Login.php';
    url.textContent = 'Login';
    url.classList.add('linkBlue');
    url.classList.add('linkButton');


    document.querySelector('#Podcast div').appendChild(text);
    document.querySelector('#Podcast div').appendChild(url);
}


if(login !== 0) {
    search().then(onJson);
} else {
    noLogin();
}