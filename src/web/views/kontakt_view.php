<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php 
            include 'static/styles/kontakt/kontakt.css';
            //include 'C:\Users\Tarazjusz\dev-wai\src\web\views\static\jquery-ui-1.13.2.custom4\jquery-ui.min.css';
        ?>
    </style>
    <noscript><?php include 'noscript.css' ?></noscript>
    <title>Kontakt</title>
</head>
<body>
    <header>
        <div class="header__container">
            <div class="header__info">
                <svg width="40" height="40">
                    <rect width="40" height="40" class="header__logo" />
                </svg>
                <h1>Kontakt</h1>    
            </div>
            <nav class="header__nav">
                <a href="/" class="header__link">Strona Główna</a>
                <a href="/galeria/" class="header__link">Galeria zdjęć</a>
                <a href="/ceny/" class="header__link">Ceny</a>
                <a href="" class="header__link">Kontakt</a>
                <?php 
                
                    if($_SESSION['nav'] == 'login') {
                        
                        echo '<a href="/wylogowanie/" class="header__link">Wyloguj się</a>';
                        
                    } 
                    else {
                        
                        echo '<a href="/rejestracja/" class="header__link">Zarejestruj się</a>';

                    }
                    
                ?>
            </nav>
        </div> 
    </header>
    <main class="main">
        <div class="main__container">
            <form action="../views/static/script/odbierz.php" method="get" class="main__form">
                <div class="main__wrap">
                    <div class="main__data-1">
                        <label for="name">Imię</label>
                        <input name="name" type="text" id="name" required>
                        <label for="email">Mail</label>
                        <input type="email" name="email" id="email" required>
                        <p id="suggestion"></p>
                    </div>
                    <div class="main__data-2">
                        <label for="surname">Nazwisko</label>
                        <input name="surname" type="text" id="surname">
                        <label for="number">Telefon</label>
                        <input name="number" type="tel" id="number">
                    </div>
                </div>
                <div class="main__radio">
                    <div class="main__option">
                        <input type="radio" value="order" name="choose" id="order" onclick="choosePic()" required>
                        <label for="order">Chcę zamówić zdjęcie/a</label>    
                    </div>
                    <div class="main__option">
                        <input type="radio" value="partner" name="choose" id="coop" onclick="chooseCoop()" required>    
                        <label for="coop">Chcę zaoferować partnerstwo</label>    
                    </div>
                </div>
                <div class="main__spinner" id="numOfPics">
                    <p>Liczba zdjęć</p>
                    <input id="spinner">
                </div>
                <div class="main__select">
                    <select name="photos" id="main__list" multiple>
                        <option selected value="0" disabled >Wybierz zdjęcie/a</option>
                        <option value="i1">Roslinki w Nesebrze</option>
                        <option value="i2">Marina w Nesebrze</option>
                        <optgroup label="Miasto">
                            <option value="m1">Uczelnia w Czernowcach</option>
                            <option value="m2">Uliczka we Wrzeszczu</option>
                            <option value="m3">Uliczka w Nesebrze</option>
                            <option value="m4">Rower we Lwowie</option>
                        </optgroup>
                        <optgroup label="Krajobraz">
                            <option value="k1">Plaza w Nesebrze</option>
                            <option value="k2">Statek nad morzem</option>
                            <option value="k3">Kobieta w Nesebrze</option>
                        </optgroup>
                    </select>
                    <select name="version" id="main__version">
                        <option selected value="0" disabled>Rozmiar</option>
                        <option value="1">rozmiar 10x15 cm</option>
                        <option value="2">rozmiar 18x24 cm</option>
                        <option value="2">rozmiar 30x40 cm</option>
                    </select>
                </div>
                <div class="main__text">
                    <textarea placeholder="Twój Komentarz" name="comment" id="main__comment" cols="30" rows="10"></textarea>
                </div>
                <p>
                    <button id="dialog-link" class="ui-button ui-corner-all ui-widget" onclick="pokazCheck()">
                        Przeczytaj regulamin aby kontynuować
                    </button>
                </p>
                <div id="dialog" title="Regulamin">
                    <p>Niniejszym wyrażam zgodę na utrwalanie i przetwarzanie moich danych osobowych w zakresie niezbędnym dla realizacji umowy świadczenia usług i sprzedaży zgodnie z Rozporządzeniem Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. w sprawie ochrony osób fizycznych w związku z przetwarzaniem danych osobowych i w sprawie swobodnego przepływu takich danych oraz uchylenia dyrektywy 95/46/WE (ogólne rozporządzenie o ochronie danych) (dalej: RODO) oraz ustawy z dnia 10 maja 2018 r. wdrażającej RODO.</p>
                </div>
                <noscript class="regulamin-NS"><p>ヾ( ･`⌓´･)ﾉﾞ Oj!</p><p>Masz wyłączone skrypty JS! To znaczy ze automatycznie zgadzasz się z Regulaminem tej strony. Jeśli chcesz wiedzieć na co się zgadzasz, proszę <span>włączyć skrypty JS</span> w ustawieniach Twojej przeglądarki :D</p></noscript>
                <div class="main__checkbox">
                    <input type="checkbox" name="check" id="main__check">
                    <label for="main__check">Zapoznałem/łam się z regulaminem</label>    
                </div>            
                <div class="main__buttons">
                    <input type="submit" class="main__submit" value="Wyślij">
                    <input type="reset" class="main__reset" value="Zresetuj">
                </div>
            </form>
        </div>   
    </main>
    <div class="responsive">
        <nav class="responsive__nav">
            <a href="/" class="responsive__link">Strona Główna</a>
            <a href="/galeria/" class="responsive__link">Galeria Zdjęć</a>
            <a href="/ceny/" class="responsive__link">Ceny</a>
            <a href="" class="responsive__link">Kontakt</a>
        </nav>
    </div> 
    <script src="../views/static/script/kontakt.js"></script>        
    <script src="../views/static/jquery-ui-1.13.2.custom4/external/jquery/jquery.js"></script>
    <script src="../views/static/jquery-ui-1.13.2.custom4/jquery-ui.min.js"></script>
    <script>
        $( "#dialog" ).dialog({
	        autoOpen: false,
	        width: 400,
	        buttons: [
		    {
			text: "Gotowe",
			click: function() {
				$( this ).dialog( "close" );
			}
	        }
	        ]
        });

        $( "#dialog-link" ).click(function( event ) {
	        $( "#dialog" ).dialog( "open" );
	        event.preventDefault();
        });
    </script>
    <script>
        $( "#spinner" ).spinner();
    </script>
    <script>
        var domains = ['hotmail.com', 'gmail.com', 'aol.com'];
        var topLevelDomains = ["com", "net", "org"];
        
        $('#email').on('blur', function(event) {
          console.log("event ", event);
          console.log("this ", $(this));
          $(this).mailcheck({
            domains: domains,                       // optional
            topLevelDomains: topLevelDomains,       // optional
            suggested: function(element, suggestion) {
              // callback code
              console.log("suggestion ", suggestion.full);
              $('#suggestion').html("Czy masz na myśli <b><i>" + suggestion.full + "</b></i>?");
            },
            empty: function(element) {
              // callback code
              $('#suggestion').html('mail był poprawnie wpisany');
            }
          });
        });
    </script>
    <script src="../views/static/script/mailcheck.js"></script>
</body>
</html>