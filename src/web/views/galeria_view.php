<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include 'static/styles/galeria/galeria.css'; ?></style>
    <title>Galeria</title>
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
                <a href="" class="header__link">Galeria zdjęć</a>
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
            </nav>
        </div> 
    </header>
    <main>
        <div class="main__wrap">
            <a id="gora"></a>
            <div class="main__row" style="display:flex">
              <?php 

                foreach($model['zdjecia'] as $zdjecie) {

                    $path = '/views/images/MINI_' . $zdjecie['name'];
                    $watermark_path = '/views/images/ZW_' . $zdjecie['name'];
                    $tytul = $zdjecie['title'];
                    $autor = $zdjecie['author'];

                    echo "
                        <a href='$watermark_path' style='display:flex;flex-direction:row;width:49%;border-radius:5px;background-color:#e2dfe8;text-decoration:none;'>
                            <img style='height:100%;width:70%;border-radius:5px 0 0 5px;' src='$path'>
                            <div style='width:30%;text-align:center;display:flex;flex-direction:column;justify-content:space-between;padding:5px;'>
                                <p style='color:#000;font-weight:bold;'>'$tytul'</p>
                                <p style='color:#000;font-style:italic;'>by: $autor</p>
                            </div>
                        </a>";

                }

              ?>  
            </div>
            <div class="main__row">
                <form method="post" action="" enctype="multipart/form-data">
                    <input type="submit" name="wstecz" value="Wstecz" class="main__galNav">
                    <input type="submit" name="dalej" value="Dalej" class="main__galNav">
                </form>
                <?php 
                
                    echo $model['errors'];

                ?>
            </div>
            <div class="main__row">
                <form class="main__form" method="post" action="" enctype="multipart/form-data">

                    <input type="file" name="zdjecie" class="main__file">

                    <div>
                        <label for="label">Znak wodny:</label>
                        <input type="text" name="label" required>

                        <label for="tytul">Tytuł:</label>
                        <input type="text" name="tytul" required>

                        <label for="autor">Autor:</label>
                        <?php 

                            if($_SESSION['nav'] == 'login') {
                                echo '<input type="text" name="autor" value='.$_SESSION['uz'].' required>';
                            } else {
                                echo '<input type="text" name="autor" required>';
                            }
                        ?>
                    </div>

                    <?php 
                    
                        if($_SESSION['nav'] == 'login') {
                            echo '<input type="radio" name="tryb" value="pub" id="pub"><label for="pub">publiczne</label>';
                            echo '<input type="radio" name="tryb" value="pry" id="pry"><label for="pry">prywatne</label>';
                        }

                    ?>

                    <input type="submit" name="wyslij" value="Wyślij zdjęcie" class="main__submit">

                </form>
            </div>
            <a href="#gora" class="main__link">Do góry</a>
        </div>
        <div class="main__blackOut"></div>
    </main>
    <div class="responsive">
        <nav class="responsive__nav">
            <a href="index" class="responsive__link">Strona Główna</a>
            <a href="galeria" class="responsive__link">Galeria Zdjęć</a>
            <a href="ceny" class="responsive__link">Ceny</a>
            <a href="kontakt" class="responsive__link">Kontakt</a>
        </nav>
    </div>
    <script src="../views/static/script/galeria.js"></script>
</body>
</html>