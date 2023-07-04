<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include 'static/styles/index/style.css'; ?></style>
    <noscript><link rel="stylesheet" href="static/styles/index/noscript.css"></noscript>
    <title>Główna</title>
</head>
<body>
    <a id="gora"></a>
    <header>
        <div class="header__container">
            <svg width="40" height="40">
                <rect width="40" height="40" class="header__logo" />
            </svg>
            <nav class="header__nav">
                <div class="header__link">
                    <p class="header__droplink">Strona Główna</p>
                    <div class="header__sublinks">
                        <a href="#autor-link">O autorze</a>
                        <a href="#hobby-link">Info o hobby</a>
                        <a href="#insp-link">Inspiracje</a>
                    </div>
                </div>
                <a href="/galeria/" class="header__link">Galeria Zdjęć</a>
                <a href="/ceny/" class="header__link">Ceny</a>
                <a href="/kontakt/" class="header__link">Kontakt</a>
                <?php 

                    if($_SESSION['nav'] == 'login') {
                        
                        echo '<a href="/wylogowanie/" class="header__link">Wyloguj się</a>';
                        
                    } 
                    else {
                        
                        echo '<a href="/rejestracja/" class="header__link">Zarejestruj się</a>';

                    }
                    
                ?>
                <button id="open-menu">...</button>
                <div class="header__sidebar">
                    <button id="close-menu">zamknij menu</button>
                    <a href="">Strona Główna</a>
                    <a href="/galeria/">Galeria Zdjęć</a>
                    <a href="/ceny">Ceny</a>
                    <a href="/kontakt/">Kontakt</a>
                </div>        
            </nav>
        </div>
        <div class="header__name">
            <h1 class="header__title">Witaj na Projekcie<?php if($_SESSION['uz'] != null) {echo ', '.$_SESSION['uz'];}?></h1>
            <p class="header__subtitle">by Taras Shuliakevych.</p>
            <button onclick="zmienTryb()">&#9789;</button>
        </div>
    </header>
    <main class="main">
        <article class="main__autor" id="autor-link">
            <h2>Kim jestem i czym się interesuję?</h2>
            <p>Witam serdecznie na mojej stronie! Nazywam się Taras Shuliakevych, mam 17 lat, jestem z Ukrainy i studiuję informatykę na Politechnice Gdańskiej. Mimo tego ze studiuję naukę ścisłą, uwielbiam fotografować i wyrazać swoją kreatywną stronę. Fotografia to to, co zbudowało moją osobowość: nauczyło mnie widzieć piękno we wszystkim, obserwować detale, myśleć w bardziej kreatywny sposób. Oprócz umiejętności, fotografia dała mi mozliwość poznać niesamowitych ludzi z którymi mieliśmy sporo "quality time" i co dało nawet więcej motywacji i inspiracji, niz było wcześniej!</p>
            <img src="../views/static/img/autor.jpg" alt="Autor strony - Taras Shuliakevych">
        </article>
        <article class="main__hobby" id="hobby-link">
            <img src="../views/static/img/wieza.jpg" alt="Wieza w Elblagu">
            <p>Zajmuję się fotografią juz około 3 lat i próbowałem rózne style: minimalizm, przyroda, lifestyle, itd. więc mam trochę doświadczenia :) Wygrawałem konkursy z fotografii minimalistycznej na specjalnych online platformach, moje zdjęcia były wyświtlone na popularnych kontach-grupach na Instagramie oraz miały ogromną popularność na Unsplashu z setkami tysięcy pobraniami je stamtąd. Kooperowałem z moimi przyjaciółmi, chodziliśmy razem po Łucku (to miasto skąd jesteśmy) jeździliśmy do Lwowa i innych fascynujących miejsc tylko po to by łapać momenty z zycia na obiektyw aparatu bądź smartfonu. Aczkolwiek, na razie fotografuję na mój smartfon - to ciekawe doświadczenie bawić się z telefonem i otrzymywać zdjęcia które czasami wyglądają tak niby były zrobione przez aparat! Jeśli jesteś ciekawy/a co tam nafotografowałem, zapraszam do Galerii Zdjęć i, gdy chciał(a)byś dostać fizyczne wersje mych zdjęć, idź do Ceny by zapoznać się właśnie z cenami oraz do Kontakt by zamówić to co Ci się spodobało.
            </p>
            <h2>Historia mego hobby</h2>
        </article>
        <article class="main__inspiration" id="insp-link">
            <h2>Moje inspiracje</h2>
            <ul>
                <li><a target="_blank" href="https://www.instagram.com/mr.phabyo/" onmouseover="let pic = document.getElementById('main__photographer');pic.src = '../../../views/static/img/phabyo.jpg';">@mr.phabyo</a>
                    <br>
                    <p>Pan Fabio od długich lat był dla mnie przykładem fotografii ulicznej, stylu black&white i towarzyszyliśmy kiedyś :) Skoro on jest Portugalczykiem, czasami mi pomagał w nauce języka portugalskiego.</p>
                </li>
                <li><a target="_blank" href="https://www.instagram.com/sweetbabylinus/" onmouseover="let pic = document.getElementById('main__photographer');pic.src = '../../../views/static/img/linus.jpg';">@sweetbabylinus</a>
                    <br>
                    <p>Bardzo pozytywna osoba ze Stanów, uwielbiam oglądać jego Stories i skrollować jego galerię na Instagramie. Oprócz fascynujących zdjęć miasta, on tez fotografuje ludzi, jednym z których jest sam Khalid!</p>
                </li>
                <li><a target="_blank" href="https://www.instagram.com/janecalens/" onmouseover="let pic = document.getElementById('main__photographer');pic.src = '../../../views/static/img/jane.jpg';">@janecalens</a>
                    <br>
                    <p>Mało znam tego męzczyzny, ale zdjęcia ma niesamowite!</p>
                </li>
                <li><a target="_blank" href="https://www.instagram.com/negativesbytom/" onmouseover="let pic = document.getElementById('main__photographer');pic.src = '../../../views/static/img/tom.jpg';">@negativesbytom</a>
                    <br>
                    <p>Kolejny przykład street fotografii.. za kazdym razem gdy widzę jego zdjęcia, rysują się w głowie jak by to zdjęcie wyglądało w zyciu...</p>
                </li>
                <li><a target="_blank" href="https://www.instagram.com/baljarek/" onmouseover="let pic = document.getElementById('main__photographer');pic.src = '../../../views/static/img/jarek.jpg';">@baljarek</a>
                    <br>
                    <p>Polski bohater fotografii minimalistycznej! Miałem z nim kontakt, bardzo przyjemny człowiek. Kiedy zajmowałem się minimalizmem, to był jeden z moich "nauczycieli" :)</p>
                </li>
                <li><a target="_blank" href="https://www.instagram.com/linearcurvature/" onmouseover="let pic = document.getElementById('main__photographer');pic.src = '../../../views/static/img/lina.jpg';">@linearcurvature</a>
                    <br>
                    <p>Moja starozytnia kolezanka ze Stanów, kiedyś byliśmy razem z nią początkującymi w dziele minimalizmu, lecz teraz ona ma 70tys.+ folowerów! Minimalizm ma w krwi i to widać od razu!</p>
                </li>
            </ul>
            <img src="../views/static/img/phabyo.jpg" alt="Profil jednego z fotografów" id="main__photographer">
        </article>
        <article class="main__summary">
            <div class="main__wrap">
                <p>Teraz, kiedy jesteśmy znajomi, możesz zajrzeć do mojej galerii i zapoznać się z moimi zdjęciami, zobaczyć ceny moich usług bądź skontaktować ze mną!</p>
                <h2>Dokąd dalej?</h2>    
            </div>
            <div class="main__cards">
                <a href="/galeria" class="main__card"></a>
                <a href="/ceny/" class="main__card main__card2"></a>
                <a href="/kontakt/" class="main__card main__card3"></a>
            </div>
        </article>
    </main>
    <footer class="footer">
        <p>Copyright Portfolio by Taras Shuliakevych. Wszystkie prawa zastrzezono.</p>
        <div class="footer__links">
            <a href="https://instagram.com/taryesz" target="_blank">Mój instagram</a>
            <a href="https://unsplash.com" target="_blank">Moje konto na Unsplash'u</a>    
        </div>
    </footer>
    <a href="#gora" id="powrotDoGory">do góry</a>
    <script src="../views/static/script/main.js"></script>
</body>
</html>