<?php

require_once '../../vendor/autoload.php';

error_reporting(E_ERROR | E_PARSE);

$page = $_SESSION['page'] = 1;
$image_counter = $_SESSION['images'] = 0;

function get_db()
{

    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]);
    
    $db = $mongo->wai;

    return $db;
    
}

function paging(&$model) {

    $db = get_db();

    $pageSize = 2;
    global $page;

    $opts = [
        'skip' => ($page - 1) * $pageSize,
        'limit' => $pageSize,
    ];
    
    $zdjc = $db->zdjecia->find([], $opts);
    // $zdjc = $db->zdjecia->deleteMany([], $opts);

    
    $model['zdjecia'] = $zdjc;

}

function save_to_db(&$model, &$rand_imie) {

    $db = get_db();

    $fileName = $rand_imie.$_FILES['zdjecie']['name'];
    $fileType = $_FILES['zdjecie']['type'];
    $fileTitle = $_POST['tytul'];
    $fileAuthor = $_POST['autor'];

    $zdj = [
        'name'   => $fileName,
        'type'   => $fileType,
        'title'  => $fileTitle,
        'author' => $fileAuthor,
    ];

    $db->zdjecia->insertOne($zdj);
    
    // $deleteResult = $db->zdjecia->deleteMany([]);

    
    paging($model);

}

function znakWodny(&$typ_zdjecia, &$rand_imie) {

    if($typ_zdjecia == 'image/jpeg') {

        $fotka = imagecreatefromjpeg('views/images'.'/'.$rand_imie.$_FILES["zdjecie"]['name']);
        $kolor = imagecolorallocate($fotka, 255, 255, 255);
        $czcionka = 'views/static/czcionki/RobotoCondensed-Regular.ttf';
        $znak = $_POST['label'];
        $rozmiar = 50;
        imagettftext($fotka, $rozmiar, 0, 100, 1000, $kolor, $czcionka, $znak);
        
        $path = 'views/images'.'/'.'ZW_'.$rand_imie.$_FILES['zdjecie']['name'];
        imagejpeg($fotka, $path);
    
        imagedestroy($fotka);

    }
    else if($typ_zdjecia == 'image/png') {

        $image = imagecreatefrompng('views/images/'.$rand_imie.$_FILES['zdjecie']['name']);
        $textcolor = imagecolorallocate($image, 255, 255, 255);
        $czcionka = 'views/static/czcionki/RobotoCondensed-Regular.ttf';
        $znak = $_POST['label'];
        imagettftext($image, 14, 0, imagesx($image)-125, imagesy($image)-20, $textcolor, $czcionka, $znak);
        $path = $path = 'views/images'.'/'.'ZW_'.$rand_imie.$_FILES['zdjecie']['name'];
        imagepng($image, $path);
        imagedestroy($image);

    }

}

function miniaturka(&$typ_zdjecia, &$rand_imie) {

    if($typ_zdjecia == 'image/jpeg') {

        $fotka = imagecreatefromjpeg('views/images'.'/'.$rand_imie.$_FILES["zdjecie"]['name']);
        $szerokosc = imagesx($fotka);
        $wysokosc = imagesy($fotka);
        $szerokosc_mini = 200;
        $wysokosc_mini = 125;
        $fotka_mini = imagecreatetruecolor($szerokosc_mini, $wysokosc_mini);
        imagecopyresampled($fotka_mini, $fotka, 0, 0, 0, 0, $szerokosc_mini, $wysokosc_mini, $szerokosc, $wysokosc);
        $path = 'views/images'.'/'.'MINI_'.$rand_imie.$_FILES['zdjecie']['name'];
        imagejpeg($fotka_mini, $path, 100);
        imagedestroy($fotka);
        imagedestroy($fotka_mini);

    }
    else if($typ_zdjecia == 'image/png') {

        $fotka = imagecreatefrompng('views/images'.'/'.$rand_imie.$_FILES["zdjecie"]['name']);
        $szerokosc = imagesx($fotka);
        $wysokosc = imagesy($fotka);
        $szerokosc_mini = 200;
        $wysokosc_mini = 125;
        $fotka_mini = imagecreatetruecolor($szerokosc_mini, $wysokosc_mini);
        imagecopyresampled($fotka_mini, $fotka, 0, 0, 0, 0, $szerokosc_mini, $wysokosc_mini, $szerokosc, $wysokosc);
        $path = 'views/images'.'/'.'MINI_'.$rand_imie.$_FILES['zdjecie']['name'];
        imagepng($fotka_mini, $path);
        imagedestroy($fotka);
        imagedestroy($fotka_mini);

    }

}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function sprawdzStanWyslania($zdj, &$model) {
    
    $nowy = true;
    $sciezka = 'views/images/';

    $zdjecie = finfo_open(FILEINFO_MIME_TYPE);
    $tmp_name = $_FILES['zdjecie']['tmp_name'];
    $typ_zdjecia = finfo_file($zdjecie, $tmp_name);
    $typ_check = 0;

    $dalej = $_POST['dalej'];
    $wstecz = $_POST['wstecz'];
    $tryb = $_POST['tryb'];

    if($tryb == 'pub') {
        $_SESSION['tryb'] = 'pub';
    } else if($tryb == 'pry') {
        $_SESSION['tryb'] = 'pry';
    }

    if(isset($dalej)) {

        global $page;
        $page = $_SESSION['page'] += 1;    
        paging($model);
        
    } 
    else if(isset($wstecz)) {

        global $page;
        $page = $_SESSION['page'] -= 1;

        if($page != 0) {
            paging($model);
        } 
        else {
            global $page;
            $page = $_SESSION['page'] = 1;
            paging($model);
        }

    } 

    $rand_imie = generateRandomString();

    $doklejona_sciezka = $sciezka . $rand_imie . $_FILES['zdjecie']['name'];

    switch ($typ_zdjecia) {
        case 'image/jpeg':
            global $typ_check;
            $typ_check = 1;
            break;
        case 'image/png':
            global $typ_check; 
            $typ_check = 1;
            break;
    }

    if(is_uploaded_file($tmp_name)) {

        if ($typ_check === 1 && $_FILES['zdjecie']['size'] <= 1048576) {

            if(move_uploaded_file($tmp_name, $doklejona_sciezka)) {

                znakWodny($typ_zdjecia, $rand_imie);
                miniaturka($typ_zdjecia, $rand_imie);

                global $page;
                $page = $_SESSION['page'] = 1;
                global $image_counter;
                $image_counter = $_SESSION['images'] += 1;
                $model['nav'] = true;
                save_to_db($model, $rand_imie);

            } else {
                
                $model['errors'] = 'Oj! Coś się złamało! Spróbuj wysłać plik ponownie';

            }
    
        } elseif ($typ_check === 1 && $_FILES['zdjecie']['size'] > 1048576) {
    
            $model['errors'] = 'Zbyt duży plik. Proszę wysłać coś mniejszego';
    
        } elseif ($typ_check !== 1 && $_FILES['zdjecie']['size'] > 1048576) {
    
            $model['errors'] = 'Format oraz rozmiar pliku są błędne. Proszę przesłać plik o formacie PNG lub JPEG a także o rozmiarze mniejszym niż 1 MB';
    
        } elseif ($typ_check !== 1 && $_FILES['zdjecie']['size'] <= 1048576) {
    
            $model['errors'] = 'Format pliku jest błędny. Proszę przesłać pliki o formacie PNG lub JPEG';
    
        }

    } 

}

function rej(&$model) {

    if(isset($_POST['submit'])) {

        $db = get_db();

        $email = $_POST['email'];
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $repass = $_POST['repass'];

        if($pass !== $repass) {

            $model['errors'] = 'Hasła się nie zgadzają';

        } else {

            $hashPass = password_hash($pass, PASSWORD_DEFAULT);

            $db = get_db();

            $log = $db->uzytkownicy->findOne(['login' => $login]);

            if($log != null) {

                $model['errors'] = 'Użytkownik już istnieje';

            } else {

                $db->uzytkownicy->insertOne([
                    'login' => $login,
                    'pass'  => $hashPass,
                    'email' => $email,
                ]);

                $model['imie'] = $_POST['login'];

                $model['nav'] = 'login';

                $_SESSION['nav'] = 'login';

                return 'index_view';


            }

        }

    }
}

function login(&$model) {

    if(isset($_POST['submit'])) {

        $db = get_db();

        $login = $_POST['login'];
        $pass = $_POST['pass'];

        $uzytkownik = $db->uzytkownicy->findOne(['login' => $login]);

        if($uzytkownik != null && password_verify($pass, $uzytkownik['pass'])) {
            
            session_regenerate_id();
            $_SESSION['user_id'] = $uzytkownik['id'];

            $model['nav'] = 'login';

            $_SESSION['nav'] = 'login';
            $_SESSION['uz'] = $_POST['login'];

            $model['errors'] = 'Zalogowano jako <i>'.$_POST['login'].'</i>';
            
        } else {

            $model['errors'] = 'Login albo hasło nie jest poprawne';

        }

    }

}

function logout(&$model) {

    session_destroy();
    session_unset();
    $_SESSION = [];

}

?>
