<?php
    include_once('itemTable.php');

    function show (){
        if  (isset ($_POST['send']))
        {
        $arrFilter = createFilter($_POST['author'], $_POST['name'], $_POST['year']);
        if  (!empty ($_POST['author']))
        {
            $listBook = selectBookAuthor($arrFilter);
        } else {
            $listBook = selectBook($arrFilter);
        }
        } else {
        $listBook = selectBookAll();
        }
        require 'headerTable.html';
        foreach ($listBook as $row)
        {
            showStrTable($row);
        }
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
