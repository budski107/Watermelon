<?php
include "faqDAO.php";
//require_once '../db/faqDAO.php';
class faqService {
    public function selectCategory()
    {
        $objFaqDAO = new faqDAO();
        $faqCategoryArr = $objFaqDAO->getFaqByCat();
        return $faqCategoryArr;
    }
}

?>
