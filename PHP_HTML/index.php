<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="//localhost/hw1/JS/index.js" defer></script>
      <script src="//localhost/hw1/JS/spotify.js" defer></script>
      <script src="//localhost/hw1/JS/shopGenericsJS.js" defer></script>
      <script src="//localhost/hw1/JS/Serie90.js" defer></script>
      <script src="//localhost/hw1/JS/DT11.js" defer></script>
      <script src="//localhost/hw1/JS/Abbigliamento.js" defer></script>
      <script src="//localhost/hw1/JS/news.js" defer></script>
      <script>
         <?php
            if(isset($_SESSION["email"])) {
               echo 'const login ="'.$_SESSION["email"].'"';
            } else {
               echo 'const login = 0';
            }
         ?>
      </script>

      <link rel="stylesheet" href="//localhost/hw1/CSS/index.css">
      <link rel="stylesheet" href="//localhost/hw1/CSS/style.css">

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
      <link rel="icon" href="//localhost/hw1/Immagini/Icon/Beretta_logo.svg.png">      
      <title>Fabbrica d'armi Pietro Beretta</title>
   </head>
<body>
   <article>
      <header>      
         <div id="DivSuperiore" class="spaceBetween">
            <a id="PuntoVendita" class="underline scomparsa" href="https://my.beretta.com/ciam/s/dealerlocator?language=it">
               <img src="//localhost/hw1/Immagini/Icon/LocationPoint.svg" alt="">
               Punti Vendita
            </a>
      
            <a href="https://eu.beretta.com/catalogo-armi-beretta">NUOVO CATALOGO ARMI 2024</a>

            <div class="center scomparsa flex column">
               <button>
                  <img src="//localhost/hw1/Immagini/Icon/it.svg" alt="">
                  Italy-IT
               </button>

            </div>
         </div>


         <div>
            <nav id="SuperiorNav" class="spaceAround superior" >
               <div class="spaceAround widthAssigned">
                  <div class='navElement'>
                     <a data-link='1' class="navElement" href="index.php">BERETTA WORLD</a>
                     <div data-dot='1' class="dot littleDot"></div></div>
                  <div class='navElement'>
                     <a data-link='2' class="navElement" href="estore.php">BERETTA STORE</a>
                     <div data-dot='2' class="dot"></div></div>
               </div>

               <a class="navElement widthAssigned" href="sitoCompleto.html">
                  <img id="Logo" src="//localhost/hw1/Immagini/Icon/BerettaSimbolo.svg" alt="">
               </a>

               <div class="endColumn widthAssigned">
                    <!-- <div class="center navElement">
                        <img id="Search" src="//localhost/hw1/Immagini/Icon/Search.svg" alt="">
                        Ricerca
                    </div> -->

                    <?php
                        if(isset($_SESSION['email'])) {
                            echo '<button id="ButtonUserCircle">';
                            echo '<img id="UserCircle" class="navElement" src="//localhost/hw1/Immagini/Icon/iconsLogin.png" alt="">';
                            echo '</button>';
                        } else {
                            echo '<button id="ButtonUserCircle">';
                            echo '<img id="UserCircle" class="navElement" src="//localhost/hw1/Immagini/Icon/UserCircle.svg" alt="">';
                            echo '</button>';
                        }
                    ?>

                     <?php
                        if(isset($_SESSION['email'])) {
                           echo '<a href="Carrello.php" target="_blank"><img id="ShoppingCart" class="navElement scomparsa" src="//localhost/hw1/Immagini/Icon/ShoppingCart.svg" alt=""></a>';
                        } 
                    ?>
               </div>
               
               <?php
               if(!isset($_SESSION['email'])) {
                  echo   '<div id="AccediRegistrati" class="hidden">';
                  echo      '<img src="//localhost/hw1/Immagini/Icon/triangle.png" alt="">';
                  echo      '<a href="Login.php">Accedi</a>';
                  echo      '<a href="registrazione.php">Registrati</a>';
                  echo   '</div>';
               } else {
                  echo   '<div id="Logout" class="hidden">';
                  echo      '<img src="//localhost/hw1/Immagini/Icon/triangle.png" alt="">';
                  echo      '<a href="Logout.php">Esci</a>';
                  echo   '</div>';
               }
               ?>
            </nav>

            <nav id="NavBar" class="superior">
               <div id="DivLink">
                  <a data-elem="1" class="navElement" href="https://www.beretta.com/it-it/azienda/fabbrica-d-armi-pietro-beretta/storia">Azienda</a>
                  <a data-elem="2" class="navElement" href="https://www.beretta.com/it-it/armi">Armi</a>
                  <a data-elem="3" class="navElement" href="Login.php">MyBeretta</a>
                  <a data-elem="4" class="navElement" href="https://www.beretta.com/it-it/tecnologia/prodotti">Tecnologia</a>
                  <a data-elem="5" class="navElement" href="https://www.beretta.com/it-it/attivita/caccia">Attività</a>
                  <a data-elem="6" class="navElement" href="https://www.pietroberetta.com/?utm_source=bcom&utm_medium=cta_nav&utm_campaign=pb_selection">Pietro Beretta Selection</a>
                  <a data-elem="7" class="navElement" href="https://www.berettadefense.com/">Difesa</a>
               </div>
               <div data-div="1" class="hidden divLinkHeader">
                  <div class="flex column">
                     <h3>Fabbrica d'Armi Pietro Beretta</h3>
                     <a href="">Storia</a>
                     <a href="">Azienda</a>
                     <a href="">Filiera E Territorio</a>
                  </div>
                  <div class="flex column">
                     <h3>Sostenibilità</h3>
                     <a href="">Persone</a>
                     <a href="">Sviluppo</a>
                     <a href="">Ambiente</a>
                  </div>
                  <div class="flex column">
                     <h3>News</h3>
                     <a href="">Novità</a>
                  </div>
               </div>

               <div data-div="2" class="hidden divLinkHeader">
                  <div class="flex column">
                     <h3>Fucili</h3>
                     <a href="">Sovrapposti</a>
                     <a href="">Fucili Paralleli</a>
                     <a href="">Semiautomatici</a>
                  </div>

                  <div class="flex column">
                     <h3>Pistole</h3>
                     <a href="">Singola/Doppia Azione</a>
                     <a href="">Striker</a>
                  </div>

                  <div class="flex column">
                     <h3>Carabine</h3>
                     <a href="">semiautomatiche</a>
                     <a href="">Caricamento Lineare</a>
                  </div>

                  <div class="flex column">
                     <h3>Famiglia Armi</h3>
                     <a href="">APX A1</a>
                     <a href="">BRX1</a>
                     <a href="">Ultraleggero</a>
                     <a href="">92X Performance</a>
                     <a href="">Serie 90</a>
                     <a href="">A300</a>
                     <a href="">A400</a>
                     <a href="">A400 Xtreme Plus</a>
                     <a href="">A400 Xcel</a>
                     <a href="">DT11</a>
                     <a href="">Silver Pigeon</a>
                     <a href="">PX4</a>
                     <a href="">690</a>
                     <a href="">694</a>
                     <a href="">1301 Tactical</a>
                     <a href="">1301 Comp</a>
                     <a href="">PMXs</a>
                     <a href="">486</a>
                     <a href="">687 EELL</a>
                     <a href="">Serie 80</a>
                  </div>

                  <div class="flex column">
                     <h3>Attività</h3>
                     <a href="">Fucili Da Caccia</a>
                     <a href="">Tiro A Volo</a>
                     <a href="">Tiro Dinamico E Difensivo</a>
                     <a href="">Tiro Tattico</a>
                  </div>
               </div>

               <div data-div="3" class="hidden divLinkHeader">
                  <div class="flex column">
                     <h3>Servizi Beretta</h3>
                     <a href="">Beretta Service System</a>
                     <a href="">Estensione Gratuita Di Garanzia</a>
                     <a href="">Certificato Di Precisione BRX1</a>
                     <a href="">Cataloghi Arma</a>
                     <a href="">Cartelle Laterali Per Ultraleggero</a>
                     <a href="">Gun Pod 2</a>
                     <a href="">Manuali D'uso</a>
                     <a href="">Video Manuali A400</a>
                     <a href="">Video Manuali BRX1</a>
                  </div> 
               </div>

               <div data-div="4" class="hidden divLinkHeader">
                  <div class="flex column">
                     <h3>Fabbrica</h3>
                  </div>

                  <div class="flex column">
                     <h3>Prodotti</h3>
                     <a href="">Steelium</a>
                     <a href="">Optimabore HP</a>
                     <a href="">Optimachoke HP</a>
                     <a href="">Kick-Off</a>
                     <a href="">B-Steady</a>
                     <a href="">B-Link</a>
                     <a href="">B-Lok</a>
                     <a href="">Aqua Tech Shield</a>
                     <a href="">DLC</a>
                     <a href="">Microcore</a>
                     <a href="">Extralight</a>
                     <a href="">B-Fast</a>
                     <a href="">Triblock</a>
                     <a href="">Beretta By TSK</a>
                     <a href="">Xtreme-S</a>
                  </div>
               </div>

               <div data-div="5" class="hidden divLinkHeader">
                  <div class="flex column">
                     <h3>Caccia</h3>
                     <a href="">Piccola Selvaggina</a>
                     <a href="">Caccia Grossa</a>
                     <a href="">Acquatici</a>
                     <a href="">#Berettatribe Stories</a>
                  </div>

                  <div class="flex column">
                     <h3>Tiro</h3>
                     <a href="">Trap E Skeet</a>
                     <a href="">Sporting E Discipline Non Olimpiche</a>
                     <a href="">Tiro Dinamico</a>
                     <a href="">Tiro Difensivo</a>
                     <a href="">Beretta Excellence</a>
                     <a href="">Compak Sporting</a>
                  </div>

                  <div class="flex column">
                     <h3>Tattico</h3>
                     <a href="">Difesa Personale</a>
                     <a href="">Porto Occulto</a>
                     <a href="">Tiro Operativo Istituzionale E Di Sicurezza</a>
                     <a href="">Pratica Di Tiro Al Poligono</a>
                  </div>
               </div>

               <div data-div="6" class="hidden divLinkHeader">
               </div>

               <div data-div="7" class="hidden divLinkHeader">
               </div>

            </nav>

            <div id="UltraleggeroShowDiv">
               <div data-show="1" class="showDiv">
                  <div id="Catalogo1" class="catalogo"></div>
                  <div class="superior">
                     <h5 class="uppercase">Nuovo</h5>
                     <h2 class="uppercase">Catalogo Armi 2024</h2>
                     <p>Scarica ora il nuovo catalogo armi 2024 ed esplora la gamma completa di prodotti e servizi che Beretta ti mette a disposizione</p>
                     <a class="linkButton linkOrange uppercase" href="https://www.beretta.com/it-it/armi/famiglia-armi/ultraleggero">Scarica ora</a>
                  </div>
               </div>

               <div data-show="2" class="hidden showDiv">
                  <div id="Catalogo2" class="catalogo"></div>
                  <div class="superior">
                     <h2 class="uppercase">DT11 Black DLC</h2>
                     <p>Veloce come un piattello, più forte del tempo</p>
                     <a class="linkButton linkBlue uppercase" href="https://www.beretta.com/it-it/armi/famiglia-armi/ultraleggero">Scopri di più</a>
                  </div>
               </div>
               <div data-show="3" class="hidden showDiv">
                  <div id="Catalogo3" class="catalogo"></div>
                  <div class="superior">
                     <h5 class="uppercase">La massima evoluzione della leggenda</h5>
                     <h2 class="uppercase">Silver Pigeon Sporting</h2>
                     <p>Rinnovata estetica unita a una classe di legno superiore</p>
                     <a class="linkButton linkBlue uppercase" href="https://www.beretta.com/it-it/armi/famiglia-armi/ultraleggero">Scopri di più</a>
                  </div>
               </div>

               <div data-show="4" class="hidden showDiv">
                  <div id="Catalogo4" class="catalogo"></div>
                  <div class="superior">
                     <h5 class="uppercase">Il fucile d'acciaio più leggero al mondo</h5>
                     <h2 class="uppercase">Ultraleggero</h2>
                     <p>Tutta la solidià ed affidabilità della bascula in acciaio con un peso estremamente contenuto</p>
                     <a class="linkButton linkWhite" href="https://www.beretta.com/it-it/armi/famiglia-armi/ultraleggero">SCOPRI ORA</a>
                  </div>
               </div>
            </div> 


            <div id="ButtonShow" class="center superior">
               <button id="Prev"><img src="//localhost/hw1/Immagini/Icon/prev.png" alt=""></button>
               <button><img class="dash" data-show="1" src="//localhost/hw1/Immagini/Icon/dash_orange.png" alt=""></button>
               <button><img class="dash" data-show="2" src="//localhost/hw1/Immagini/Icon/dash_white.png" alt=""></button>
               <button><img class="dash" data-show="3" src="//localhost/hw1/Immagini/Icon/dash_white.png" alt=""></button>
               <button><img class="dash" data-show="4" src="//localhost/hw1/Immagini/Icon/dash_white.png" alt=""></button>
               <button id="Next"><img src="//localhost/hw1/Immagini/Icon/next.png" alt=""></button>
            </div>
            
         </div>

         <div class="overlay"></div>
      </header>
      
      <section id="AbbigliamentoTiro">
      
         <div class = "flex endColumn">
            <button><img src="//localhost/hw1/Immagini/Icon/frecciaSinistra.png" alt=""></button>
            <button class='arrow'><img src="//localhost/hw1/Immagini/Icon/frecciaDestra.png" alt=""></button>
         </div>

         <div class="spaceAround mediaColumn">
            <div class="scrittaShop">
               <h2 class="titolo">Nuovo abbigliamento da tiro 🎯</h2>
               <p class="testo">
                  Esplora la <b>nuova collezione Competition di Beretta:</b> 
                  dedicata agli appassionati di tiro al piattello e tiro dinamico, 
                  questa linea comprende una vasta gamma di capi progettati appositamente 
                  per soddisfare le esigenze degli atleti di tiro più esigenti.
               </p>
            </div>

            <div class="divImgShop spaceBetween"></div>
         </div>

         <div class="dashDiv flex endColumn">
         </div>
      </section>

      <section id="PromoDigitale" class="spaceBetween mediaColumn">
         <div class="promo center column">
            <h2 class="titolo uppercase">Nuova promo digitale</h2>
            <h4 class="uppercase">
               scegli la tua nuova arma beretta
            </h4>
            <h4>Dal 26 febbraio al 31 Marzo 2024</h4>
            <p>Prendi appuntamento in armeria e richiedi l'attivazione del tuo cashback</p>
            <a class="linkButton linkOrange" href="https://www.beretta.com/it-it/armi/famiglia-armi/serie-90">Scopri di più</a>
         </div>

         <div class="promo">
            <img class="promo" src="//localhost/hw1/Immagini/promodigitale.jpg" alt="">
         </div>
      </section>

      <section id="WinFight" class="column endColumn banner">
         <p>#winthefight</p>
         <a class="linkButton linkBlue" href="https://www.beretta.com/it-it/attivita/tattico">Scopri di più</a>
      </section>
   
      <section id="Serie90">
         <div class = "flex endColumn">
            <button><img src="//localhost/hw1/Immagini/Icon/frecciaSinistra.png" alt=""></button>
            <button class='arrow'><img src="//localhost/hw1/Immagini/Icon/frecciaDestra.png" alt=""></button>
         </div>

         <div class="spaceAround mediaColumn">
            <div class="scrittaShop">
               <h2 class="titolo uppercase">Serie 90</h2>
               <p class="testo">
                  Per chi ha bisogno di essere sempre pronto all'azione, 
                  le armi semiautomatiche Beretta sono ideali per ogni necessità.
               </p>
               <a class="linkButton linkBlue" href="https://www.beretta.com/it-it/armi/famiglia-armi/serie-90">Scopri la gamma</a>
            </div>

            <div class="divImgShop spaceBetween"></div>
         </div>


         <div class="dashDiv flex endColumn">
         </div>
      </section>
   
      <section id="Performance92X">
         <h2 class="titolo uppercase">92X performance</h2>
         <div class="center mediaColumn">
            <img class="itemVariantShop" src="//localhost/hw1/Immagini/92xperformance.webp" alt="">
            <div class="center column">
               <p>
                  La <strong>pistola da competizione di Beretta</strong> 
                  non accetta compromessi e punta alle massime prestazioni, 
                  offrendo sui campi di tiro dinamico sportivo uno dei sistemi 
                  di chiusura più affidabili e famosi al mondo, unito al 
                  <strong>fusto in acciaio</strong>, al 
                  <strong>carrello</strong>appesantito 
                  <strong>Brigadier</strong> e allo 
                  <strong>scatto Extreme-S</strong>.
               </p>
               <a class="linkButton linkOrange" href="https://www.beretta.com/it-it/armi/famiglia-armi/serie-90">Scopri di più</a>
               <div class="spaceBetween">
                  <img class="itemVariantShop" src="//localhost/hw1/Immagini/92xperformancedet-001.webp" alt="">
                  <img class="itemVariantShop" src="//localhost/hw1/Immagini/92xperformancedet-002.webp" alt="">
               </div>
            </div>
         </div>
      </section>
   
      <section id="Steelium" class="column endColumn banner">
         <a class="linkButton linkWhite" href="https://www.beretta.com/it-it/tecnologia/prodotti/steelium">Scopri di più</a>
      </section>
   
      <section id="DT11">
        
         <div class = "flex endColumn">
            <button><img src="//localhost/hw1/Immagini/Icon/frecciaSinistra.png" alt=""></button>
            <button class='arrow'><img src="//localhost/hw1/Immagini/Icon/frecciaDestra.png" alt=""></button>
         </div>

         <div class="spaceAround mediaColumn">
            <div class="scrittaShop">
               <h2 class="titolo uppercase">Scopri tutti i DT11</h2>
               <p class="testo">
                  Le canne Steelium dei fucili da tiro DT11 garantiscono 
                  le migliori rosate e minore rinculo e impennamento.
               </p>
               <a class="linkButton linkBlue" href="https://www.beretta.com/it-it/armi/famiglia-armi/dt11">Scopri la gamma</a>
            </div>

            <div class="divImgShop spaceBetween">
            </div>
         </div>

         <div class="dashDiv flex endColumn">
         </div>
      </section>
   
      <section id="ConfigAccount" class="start sezioneDoppia mediaColumn">
         <div>
            <p>configuratore</p>
            <a href="https://configurator.beretta.com/it_IT/?utm_source=bcom&utm_medium=cta&utm_campaign=configurator">Crea e salva la tua configurazione ></a>
         </div>

         <div>
            <p>My beretta</p>
            <a href="https://configurator.beretta.com/it_IT/?utm_source=bcom&utm_medium=cta&utm_campaign=configurator">Accedi alla tua area personale ></a>
         </div>
      </section>
   
      <section id="ServiceSystem" class="column spaceBetween">
         <div>
            <h4 class="uppercase">Beretta Service System</h4>
            <p class="uppercase">programma di manutenzione ordinaria e straordinaria</p>
            <p>
               Garantisci alla tua arma le migliori condizioni estitiche e funzionali durante tutto il ciclo di vita.
            </p>

            <p>
               Non smettiamo mai di prenderci cura dei nostri prodotti, e nessuno lo fa meglio di noi. Esplora i pacchetti di manutenzione per la tua arma e lascia che Beretta la rimetta a nuovo.
            </p>
         </div>

         <a class="linkButton linkOrange" href="https://www.beretta.com/it-it/attivita/tattico"><img src="//localhost/hw1/Immagini/Icon/Search.svg" alt="">Scopri ora</a>
      </section>
   
      <section id="UltimeNotizie">
         <div>
            <div id="Promozioni">Promozioni</div>
            <h2 class="titolo uppercase">ultime notizie beretta</h2>
            <img src="//localhost/hw1/Immagini/promodigitale2.jpg" alt="">
            <h4>Nuova Promo digitale Beretta: <br>50€ ti aspettano in armeria</h4>
         </div>
         
         <div id="News" class="wrap">

         </div>
      </section>
   
      <section id = 'Podcast'>
         <div>
            <h2 class="titolo uppercase">Podcast</h2>
            <h4>Ascolta gli ultimi episodi del podcast sulla caccia e il tiro</h4>
         </div>
    
            
         <div id="EpisodesView" class="wrap"></div>

        <button id="ButtonEpisodi" class="scomparsa">
            Scopri tutti gli episodi
        </button>
      </section>

      <section id="CacciaTiroTattico" class="flex">
         <div>
            <img src="//localhost/hw1/Immagini/Caccia2.jpg" alt="">
            <a href="">Caccia</a>
         </div>
         <div class="scomparsa">
            <img src="//localhost/hw1/Immagini/tiro5.jpg" alt="">
            <a href="">Tiro</a>
         </div>
         <div class="scomparsa">
            <img src="//localhost/hw1/Immagini/Tattico2.jpg" alt="">
            <a href="">Tattico</a>
         </div>
      </section>
   
      <section id="CatalogoManualiArmi" class="start sezioneDoppia mediaColumn">
         <div>
            <p>Catalogo armi</p>
            <a href="https://www.beretta.com/it-it/servizi/servizi-beretta/cataloghi-arma">
               Scaricalo ora ></a>
         </div>

         <div>
            <p>Manuali arma</p>
            <a href="https://www.beretta.com/it-it/servizi/servizi-beretta/manuali-d-uso">
               Scopri di più ></a>
         </div>
      </section>

      <footer>
         <div id="FooterUp" class="spaceBetween mediaColumn">
            <div id="Newsletter" class="flex">
               <a><img src="//localhost/hw1/Immagini/Icon/Round__White.svg" alt=""></a>
               <div class="flex column">
                  <h5 class="uppercase testo">Iscriviti alla newsletter</h5>
                  <p>Registrati alla nostra newsletter e ricevi tutti gli aggiornamenti sul Mondo Beretta</p>
                  <a class="linkButton linkWhite" href="">Iscriviti</a>
               </div>
            </div>
            <div class="column textAlignRight">
               <h5 class="uppercase testo">I nostri servizi</h5>
               <a class="testo" href="">Registrazione della garanzia</a>
               <a class="testo" href="">Manuali</a>
               <a class="testo" href="">Configuratore</a>
               <a class="testo" href="">Catalogo</a>
            </div>
         </div>

         <div id="FooterMiddle" class="spaceBetween mediaColumn">
            <div class="flex mediaColumn">
               <div class="column">
                  <h5 class="uppercase testo">mondo beretta</h5>
                  <a class="testo" href="">Società</a>
                  <a class="testo" href="">Difesa</a>
                  <a class="testo" href="">Gallery</a>
                  <a class="testo" href="">PB</a>
               </div>
               <div class="column">
                  <h5 class="uppercase testo">Assistenza</h5>
                  <a class="testo" href="">Politiche</a>
               </div>
               <div class="column">
                  <h5 class="uppercase testo">Beretta Experience</h5>
                  <a class="testo" href="">Caccia</a>
                  <a class="testo" href="">Competizione</a>
                  <a class="testo" href="">Tattico</a>
               </div>
            </div>

            <div class="spaceBetween column">
               <div class="center mediaColumn">
                  <a class="uppercase center underline" href=""><img src="//localhost/hw1/Immagini/Icon/LocationPoint.svg" alt="">Negozi</a>                 
                  <a class="uppercase center underline" href=""><img src="//localhost/hw1/Immagini/Icon/holding_16x16.svg" alt="">Beretta Holding</a>   
               </div>
               <div class="center">
                  <h5>Follow us</h5>
                  <a href=""><img src="//localhost/hw1/Immagini/Icon/Instagram.svg" alt=""></a>
                  <a href=""><img src="//localhost/hw1/Immagini/Icon/Facebook.svg" alt=""></a>
                  <a href=""><img src="//localhost/hw1/Immagini/Icon/YouTube.svg" alt=""></a>
                  <a href=""><img src="//localhost/hw1/Immagini/Icon/Twitter.png" alt=""></a>
               </div>
            </div>
         </div>

         <div id="FooterBottom" class="spaceBetween mediaColumn">
            <p>Fabbrica d'Armi Pietro Beretta S.p.A. VAT 01541040174</p>
            <span class="textAlignRight ">
               <a href="">Mappa del sito</a>
               <a href="">Informazioni sulla privacy</a>
               <a href="">Termini e condizioni</a>
               <a href="">Cookies</a>
               <a href="">Impostazioni Cookies</a>
               <a href="">La nostra etica</a>
               <a href="">Whistleblowing</a>
            </span>
         </div>
      </footer>
   </article>
 </body>
</html>