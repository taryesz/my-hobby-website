<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include 'static/styles/ceny/ceny.css'; ?></style>
    <title>Ceny</title>
</head>
<body>
    <header>
        <div class="header__container">
            <div class="header__info">
                <svg width="40" height="40">
                    <rect width="40" height="40" class="header__logo" />
                </svg>
                <h1>Ceny</h1>    
            </div>
            <nav class="header__nav">
                <a href="/" class="header__link">Strona Główna</a>
                <a href="/galeria/" class="header__link">Galeria zdjęć</a>
                <a href="" class="header__link">Ceny</a>
                <a href="/kontakt/" class="header__link">Kontakt</a>
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
    <main>
        <div class="main__container">
            <table>
                <tr>
                    <th>Osobne zdjęcie</th>
                    <th>Komplet zdjęć (3 szt. i więcej)</th>
                    <th>Format</th>
                </tr>
                <tr>
                    <td>&#8364;2</td>
                    <td>&#8364;5</td>
                    <td>10x15 cm</td>
                </tr>
                <tr>
                    <td>&#8364;3</td>
                    <td>&#8364;6</td>
                    <td>18x24 cm</td>
                </tr>
                <tr>
                    <td>&#8364;4</td>
                    <td>&#8364;7</td>
                    <td>30x40 cm</td>
                </tr>
            </table>
        </div>
    </main>
    <div class="responsive">
        <nav class="responsive__nav">
            <a href="index" class="responsive__link">Strona Główna</a>
            <a href="galeria" class="responsive__link">Galeria Zdjęć</a>
            <a href="ceny" class="responsive__link">Ceny</a>
            <a href="kontakt" class="responsive__link">Kontakt</a>
        </nav>
    </div>
    <script src="../views/static/script/ceny.js"></script>
</body>
</html>