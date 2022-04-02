<?php

    function showHeader (){
        $curStr = '<div class="row align-items-center">';
        $curStr = $curStr .   '<div class="col-1">';
        $curStr = $curStr .    '<div class="listBook">';
        $curStr = $curStr .           '<p> Id </p>';
        $curStr = $curStr .       '</div>';
        $curStr = $curStr .   '</div>';

        $curStr = $curStr .   '<div class="col-5">';
        $curStr = $curStr .    '<div class="listBook">';
        $curStr = $curStr .          '<p> Наименование </p>';
        $curStr = $curStr .       '</div>';
        $curStr = $curStr .   '</div>';

        $curStr = $curStr .   '<div class="col-3">';
        $curStr = $curStr .     '<div class="listBook">';
        $curStr = $curStr .          '<p> Авторы </p>';
        $curStr = $curStr .    '</div>';
        $curStr = $curStr .   '</div>';

        $curStr = $curStr .    '<div class="col-2">';
        $curStr = $curStr .       '<div class="listBook">';
        $curStr = $curStr .           '<p> кол-во стр. </p>';
        $curStr = $curStr .    '</div>';
        $curStr = $curStr .   '</div>';

        $curStr = $curStr .   '<div class="col-1">';
        $curStr = $curStr .    '<div class="listBook">';
        $curStr = $curStr .           '<p> Год </p>';
        $curStr = $curStr .    '</div>';
        $curStr = $curStr .   '</div>';
        $curStr = $curStr . '</div>';

        return $curStr;
    }

    function showBook ($showOneBook){
        $curStr = '<div class="row align-items-center">';
        $curStr = $curStr .   '<div class="col-1">';
        $curStr = $curStr .    '<div class="listBook">';
        $curStr = $curStr .           '<p>' . $showOneBook['idbook'] . '</p>';
        $curStr = $curStr .       '</div>';
        $curStr = $curStr .   '</div>';

        $curStr = $curStr .   '<div class="col-5">';
        $curStr = $curStr .    '<div class="listBook">';
        $curStr = $curStr .          '<p>' . $showOneBook['name'] . '</p>';
        $curStr = $curStr .       '</div>';
        $curStr = $curStr .   '</div>';

        $curStr = $curStr .   '<div class="col-3">';
        $curStr = $curStr .     '<div class="listBook">';
        $curStr = $curStr .          '<p>' . selectAuthor($showOneBook['idbook']) . '</p>';
        $curStr = $curStr .    '</div>';
        $curStr = $curStr .   '</div>';

        $curStr = $curStr .    '<div class="col-2">';
        $curStr = $curStr .       '<div class="listBook">';
        $curStr = $curStr .           '<p>' . $showOneBook['pages'] . '</p>';
        $curStr = $curStr .    '</div>';
        $curStr = $curStr .   '</div>';

        $curStr = $curStr .   '<div class="col-1">';
        $curStr = $curStr .    '<div class="listBook">';
        $curStr = $curStr .           '<p>' . $showOneBook['year'] . '</p>';
        $curStr = $curStr .    '</div>';
        $curStr = $curStr .   '</div>';
        $curStr = $curStr . '</div>';

        return $curStr;
    }

    function createFilter (string $author, string $name, $year){
        $arrFilter = array();
        $strFilter = "";
        if  (!empty ($author)){
            $arrFilter[] = '%' . mb_strtoupper($author) . '%';
            $strFilter = $strFilter . (empty($strFilter) ? " Where " : " and ") . " upper(a.name) like ? ";
        };
        if  (!empty ($name)){
            $arrFilter[] = '%' . mb_strtoupper($name) . '%';
            $strFilter = $strFilter . (empty($strFilter) ? " Where " : " and ") . " upper(b.name) like ? ";
        };
        if  (!empty ($year)){
            $arrFilter[] = $year;
            $strFilter = $strFilter . (empty($strFilter) ? " Where " : " and ") . " b.year = ? ";
        };
        return [$strFilter, $arrFilter];
    }

?>




