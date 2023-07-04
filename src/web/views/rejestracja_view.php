<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include 'static/styles/rejestracja/rejestracja.css'; ?></style>
    <title>Zarejstruj się</title>
</head>
<body>
    <header>
        <div class="header__container">
            <div class="header__info">
                <svg width="40" height="40">
                    <rect width="40" height="40" class="header__logo" />
                </svg>
                <h1>Galeria</h1>    
            </div>
            <nav class="header__nav">
                <a href="/" class="header__link">Strona Główna</a>
                <a href="/galeria/" class="header__link">Galeria zdjęć</a>
                <a href="/ceny/" class="header__link">Ceny</a>
                <a href="/kontakt/" class="header__link">Kontakt</a>
                <a href="" class="header__link">Zarejestruj się</a>
            </nav>
        </div> 
    </header>
    <main>
        <div class="main__wrap">
            <a id="gora"></a>
            <div class="main__row">
              
                <form method="post" action="" enctype="multipart/form-data" style="display:flex;flex-direction:column;width:20%;">

                    <label for="email">e-mail:</label>
                    <input type="email" name="email" required>

                    <label for="login">login:</label>
                    <input type="text" name="login" required>

                    <label for="pass">hasło:</label>
                    <input type="password" name="pass" required>

                    <label for="repass">powtórz hasło:</label>
                    <input type="password" name="repass" required>

                    <input type="submit" name="submit" value="Zarejestruj się" class="main__submit">
                    <a href="/logowanie/" class="main_redirect">Lub zaloguj się</a>

                </form>
            
            </div>
            <div class="main__row">
                <p>
                    <?php 
            
                        echo $model['errors'];
                
                    ?>
                </p>
            </div>
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










</body>
</html>