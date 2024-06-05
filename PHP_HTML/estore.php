<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="//localhost/hw1/JS/index.js" defer></script>
      <script src="//localhost/hw1/JS/shopGenericsJS.js" defer></script>
      <script src="//localhost/hw1/JS/Abbigliamento.js" defer></script>
      <script src="//localhost/hw1/JS/Calcio.js" defer></script>
      <script src="//localhost/hw1/JS/Strozzatori.js" defer></script>
      <script src="//localhost/hw1/JS/Caccia.js" defer></script>
      <script src="//localhost/hw1/JS/AccessoriTiro.js" defer></script>

      <script>
         <?php
            if(isset($_SESSION["email"])) {
               echo 'const login ="'.$_SESSION["email"].'"';
            } else {
               echo 'const login = 0';
            }
         ?>
      </script>

      <link rel="stylesheet" href="//localhost/hw1/CSS/estore.css">
      <link rel="stylesheet" href="//localhost/hw1/CSS/style.css">

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
      <link rel="icon" href="//localhost/hw1/Immagini/Icon/Beretta_logo.svg.png">      
      <title>Beretta eStore</title>
   </head>
<body>
   <article>
      <header>      
         <div id="DivSuperiore" class="spaceBetween">
            <a id="PuntoVendita" class="underline scomparsa" href="https://my.beretta.com/ciam/s/dealerlocator?language=it">
               <img src="//localhost/hw1/Immagini/Icon/LocationPoint.svg" alt="">
               Punti Vendita
            </a>
      
            <a class='uppercase' href="https://eu.beretta.com/catalogo-armi-beretta">Spedizione Gratuita per ordini superiori a 99€</a>

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
                     <div data-dot='1' class="dot"></div></div>
                  <div class='navElement'>
                     <a data-link='2' class="navElement" href="estore.php">BERETTA STORE</a>
                     <div data-dot='2' class="dot littleDot"></div></div>
               </div>

               <a class="navElement widthAssigned" href="sitoCompleto.html">
                  <img id="Logo" src="//localhost/hw1/Immagini/Icon/BerettaSimbolo.svg" alt="">
               </a>

               <div class="endColumn widthAssigned">
                    <div class="center navElement">
                        <img id="Search" src="//localhost/hw1/Immagini/Icon/Search.svg" alt="">
                        Ricerca
                    </div>

                    <?php
                        if(isset($_SESSION['email'])) {
                            echo '<button id="ButtonUserCircle">';
                            echo '<img id="UserCircle" class="navElement" src="//localhost/hw1/Immagini/Icon/iconsLogin.png" alt="">';
                            // echo 'Benvenuto'; 
                            // echo $_SESSION['username'];
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
                  <a data-elem="1" class="navElement" href="https://www.beretta.com/it-it/azienda/fabbrica-d-armi-pietro-beretta/storia">Accessori Arma</a>
                  <a data-elem="2" class="navElement" href="https://www.beretta.com/it-it/armi">Ricambi</a>
                  <a data-elem="3" class="navElement" href="Login.php">Equipaggiamento</a>
                  <a data-elem="4" class="navElement" href="https://www.beretta.com/it-it/tecnologia/prodotti">abbigliamento</a>
                  <a data-elem="5" class="navElement" href="https://www.beretta.com/it-it/attivita/caccia">Merchandise</a>
                  <a data-elem="6" class="navElement" href="https://www.pietroberetta.com/?utm_source=bcom&utm_medium=cta_nav&utm_campaign=pb_selection">Outlet</a>
               </div>
               <div data-div="1" class="hidden divLinkHeader">
                  <div class="flex column">
                     <h3>Fucili</h3>
                     <a href="">Calci E Astine</a>
                     <a href="">Strozzatori</a>
                     <a href="">Calcioli</a>
                     <a href="">Kit Pulizia</a>
                     <a href="">Beretta By TSK</a>
                     <a href="">Mirini</a>
                     <a href="">Altro</a>

                  </div>
                  <div class="flex column">
                     <h3>Pistole</h3>
                     <a href="">Caricatori</a>
                     <a href="">Guancette E Impugnature</a>
                     <a href="">Miri E Mirini</a>
                     <a href="">Kit Pulizia</a>
                     <a href="">Fondine</a>
                     <a href="">Altro</a>

                  </div>
                  <div class="flex column">
                     <h3>Carabine</h3>
                     <a href="">Bipiedi</a>
                     <a href="">Caricatori</a>
                     <a href="">Basi E Anelli</a>
                     <a href="">Slitte</a>
                     <a href="">Kit Pulizia</a>
                     <a href="">Ottiche</a>
                     <a href="">Calcioli E Calciature</a>
                     <a href="">Altro</a>
                  </div>
                  <div class="flex column">
                     <h3>Per modello Arma</h3>
                     <a href="">Serie 92/98</a>
                     <a href="">92x Performance</a>
                     <a href="">PX4</a>
                     <a href="">APX</a>
                     <a href="">APX A1</a>
                     <a href="">DT11</a>
                     <a href="">Serie 690 Tiro</a>
                     <a href="">Serie 690 Caccia</a>
                     <a href="">692</a>
                     <a href="">694</a>
                     <a href="">Ultraleggero</a>
                     <a href="">A400 Xcel</a>
                     <a href="">A400 Caccia</a>
                     <a href="">Serie 686 Tiro</a>
                     <a href="">Serie 686 Caccia</a>
                     <a href="">A300</a>
                     <a href="">BRX1</a>
                     <a href="">Serie 1301</a>
                     <a href="">PMXs</a>
                     <a href="">Sako S20</a>
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
                     <h2 class="uppercase">Collezione competition 2024</h2>
                     <p>Capi studiati per massimizzare comfort e perfomance:<br>esplora la nostra Collezione dedicata a Tiro al Piattello e Tiro Dinamico. </p>
                     <a class="linkButton linkOrange uppercase" href="https://www.beretta.com/it-it/armi/famiglia-armi/ultraleggero">Scopri ora ></a>
                  </div>
               </div>

               <div data-show="2" class="hidden showDiv">
                  <div id="Catalogo2" class="catalogo"></div>
                  <div class="superior">
                     <h2 class="uppercase">Esplosi interattivi</h2>
                     <p>Trova le parti di ricambio di cui hai bisogno con facilità,  cercando direttamente dal progetto dell'arma.</p>
                     <a class="linkButton linkBlue uppercase" href="https://www.beretta.com/it-it/armi/famiglia-armi/ultraleggero">Prova ora</a>
                  </div>
               </div>
            </div> 


            <div id="ButtonShow" class="center superior">
               <button id="Prev"><img src="//localhost/hw1/Immagini/Icon/prev.png" alt=""></button>
               <button><img class="dash" data-show="1" src="//localhost/hw1/Immagini/Icon/dash_orange.png" alt=""></button>
               <button><img class="dash" data-show="2" src="//localhost/hw1/Immagini/Icon/dash_white.png" alt=""></button>
               <button id="Next"><img src="//localhost/hw1/Immagini/Icon/next.png" alt=""></button>
            </div>
            
         </div>

         <div class="overlay"></div>
      </header>
      
      <section id="AbbigliamentoTiro">
         <div class="spaceAround column">
            <div class="spaceBetween centerAI">
               <h2 class="testoShop">Nuovo abbigliamento da tiro 🎯</h2>

               <div class = "flex endColumn">
                  <button><img src="//localhost/hw1/Immagini/Icon/frecciaSinistra.png" alt=""></button>
                  <button class='arrow'><img src="//localhost/hw1/Immagini/Icon/frecciaDestra.png" alt=""></button>
               </div>
            </div>

            <div class="divImgShop flex centerJC">
            </div>
         </div>

         <div class="dashDiv flex center">
         </div>
      </section>

      <section id="CalciTiroBerettaTSK" class="column endColumn banner">
         <p>Calci Da Tiro Beretta By TSK</p>
         <a class="linkButton linkBlue" href="">Scopri ora</a>
      </section>

      <section id="Calcio">
         <div class = "flex endColumn">
            <button><img src="//localhost/hw1/Immagini/Icon/frecciaSinistra.png" alt=""></button>
            <button class='arrow'><img src="//localhost/hw1/Immagini/Icon/frecciaDestra.png" alt=""></button>
         </div>

         <div class="spaceAround mediaColumn">
            <div class="scrittaShop">
               <h2 class="titolo uppercase">Un calcio su misura per ogni stile di tiro</h2>
               <p class="testo">
                  Scopri i calci completamente regolabili Beretta by TSK: 
                  preparati a sperimentare e ottenere un adattamento reversibile senza precedenti 
                  in un'unica sessione di allenamento.
               </p>
            </div>

            <div class="divImgShop spaceBetween"></div>
         </div>


         <div class="dashDiv flex endColumn">
         </div>
      </section>
      
      <section id="EquipaggiamentoTiro" class="column spaceBetween">
         <div>
            <h4 class="uppercase">Equipaggiamento da tiro</h4>
            <p>
               Cartuccere affidabili, zaini ergonomici, foderi per fucili protettivi, occhiali<br>
               da tiro e auricolari isolanti: scegli Beretta per un tiro senza compromessi.            
            </p>
         </div>

         <a class="linkButton linkOrange" href="https://www.beretta.com/it-it/attivita/tattico">Esplora ora ></a>
      </section>

      <section id="AccessoriTiro">
         <div class="spaceAround column">
            <div class="spaceBetween centerAI">
               <h2 class="testoShop">Accessori da tiro</h2>

               <div class = "flex endColumn">
                  <button><img src="//localhost/hw1/Immagini/Icon/frecciaSinistra.png" alt=""></button>
                  <button class='arrow'><img src="//localhost/hw1/Immagini/Icon/frecciaDestra.png" alt=""></button> 
               </div>
            </div>

            <div class="divImgShop flex centerJC">
            </div>
         </div>

         <div class="dashDiv flex endColumn">
         </div>
      </section>

      <section id="AbbigliamentoCaccia" class="column endColumn banner">
         <p>Abbigliamento Da Caccia</p>
         <a class="linkButton linkBlue" href="">Scopri ora ></a>
      </section>

      <section id="Caccia">
         <div class = "flex endColumn">
            <button><img src="//localhost/hw1/Immagini/Icon/frecciaSinistra.png" alt=""></button>
            <button class='arrow'><img src="//localhost/hw1/Immagini/Icon/frecciaDestra.png" alt=""></button>
         </div>

         <div class="spaceAround mediaColumn">
            <div class="scrittaShop">
               <h2 class="titolo uppercase">Vesti l'eccellenza: Abbigliamento Beretta per la caccia</h2>
               <p class="testo">
                  Vivi l'avventura con l'abbigliamento da caccia 
                  Beretta: uno stile senza paragoni e prestazioni 
                  all'altezza delle tue sfide nel mondo selvaggio. 
                  Esplora la natura con il massimo comfort e stile 
                  distintivo Beretta.
               </p>
            </div>

            <div class="divImgShop spaceBetween"></div>
         </div>

         <div class="dashDiv flex endColumn">
         </div>
      </section>

      <section id="StrozzatoriBerettaPromo" class="flex mediaColumn">
         <div class="">
            <img class="" src="//localhost/hw1/Immagini/Strozzatori.webp" alt="">
         </div>

         <div class="promo center column">
            <h4 class="uppercase">
               Precisione ed efficienza
            </h4>
            <h2 class="titolo">Strozzatori Beretta per tiri dritti al punto</h2>
            <p>
               Gli strozzatori sono un accessorio di grande importanza per 
               i tiratori che desiderano migliorare le prestazioni dei loro 
               fucili.
            </p>
            <p>
               I nostri strozzatori sono disponibili in una varietà di stili e 
               modelli diversi per soddisfare le molteplici esigenze di 
               tiratori e cacciatori. I modelli vanno dal Full al Light 
               Modified, e le famiglie di strozzatori comprese sono 
               Optimachoke HP, Optimachoke, Optimachoke Plus, 
               Mobilchoke e Mobilchoke HP.
            </p>

            <p>
               Scegli tra la nostra gamma di strozzatori per trovare la 
               soluzione perfetta per il tuo fucile.
            </p>

            <a class="linkButton linkBlue" href="https://www.beretta.com/it-it/armi/famiglia-armi/serie-90">Scopri di più ></a>
         </div>
      </section>

      <section id="Strozzatori">
         <div class="spaceAround column">
            <div class="spaceBetween centerAI">
               <h2 class="testoShop">Strozzatori in primo piano</h2>

               <div class = "flex endColumn">
                  <button><img src="//localhost/hw1/Immagini/Icon/frecciaSinistra.png" alt=""></button>
                  <button class='arrow'><img src="//localhost/hw1/Immagini/Icon/frecciaDestra.png" alt=""></button>  
               </div>
            </div>

            <div class="divImgShop flex centerJC">
            </div>
         </div>

         <div class="dashDiv flex endColumn">
         </div>
      </section>   

      <section id="MerchandiseUfficiale" class="column endColumn banner">
         <p>Merchandise Ufficiale</p>
         <a class="linkButton linkBlue" href="">acquista ora ></a>
      </section>
   
      <section id="CacciaTiroTattico" class='center column'>
         <h2 class="titolo">Accessori arma</h2>

         <div class="flex">
            <div>
               <img src="//localhost/hw1/Immagini/fucili2.jpg" alt="">
               <a href="">Fucili</a>
            </div>
            <div class="scomparsa">
               <img src="//localhost/hw1/Immagini/pistola3.jpg" alt="">
               <a href="">Pistole</a>
            </div>
            <div class="scomparsa">
               <img src="//localhost/hw1/Immagini/carabine.jpg" alt="">
               <a href="">Carabine</a>
            </div>
         </div>
      </section>
   
      <section id="CatalogoManualiArmi" class="start sezioneDoppia mediaColumn">
         <div>
            <p>Configuratore</p>
            <a href="https://www.beretta.com/it-it/servizi/servizi-beretta/cataloghi-arma">
               Scopri di più ></a>
         </div>

         <div>
            <p>Garanzia</p>
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
