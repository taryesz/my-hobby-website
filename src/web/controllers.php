<?php

require_once 'business.php';

function index(&$model) {

    $model['index'] = $index;

    return 'index_view';
}

function galeria(&$model) {

    $zdj = $_GET['zdjecie'];

    $galeria = sprawdzStanWyslania($zdj, $model);

    paging($model);
    
    $model['galeria'] = $galeria;

    return 'galeria_view';
    
}

function ceny(&$model) {

    $model['ceny'] = $ceny;

    return 'ceny_view';
}

function kontakt(&$model) {

    $model['kontakt'] = $kontakt;

    return 'kontakt_view';
}

function rejestracja(&$model) {

    $rejestracja = rej($model);

    if($rejestracja == 'index_view') {
        return 'index_view';
    } else {
        return 'rejestracja_view';
    }

}

function logowanie(&$model) {

    $logowanie = login($model);

    // if($logowanie == 'index_view') {
    //     return 'index_view';
    // } else {
    //     return 'logowanie_view';
    // }

    return 'logowanie_view';

}

function wylogowanie(&$model) {

    $wylogowanie = logout($model);

    return 'index_view';

}

?>
