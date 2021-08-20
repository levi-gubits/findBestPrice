<?php

include_once __DIR__ ."/../data_base.php";
include_once "productsClass.php";

class Filter{

    private $category;
    public $view;

    //check status of category
    public function checkStatus(){

        if(count($_GET) == 1 || isset($_GET['search'])){
            $this->allCategoryComponent();
            return;
        }

        $this->category = $_GET['category'];
        $this->view = $this->category.'view';
        $this->oneCategoryComponent();
    }

    //General filter
    private function allCategoryComponent(){

        $listOfCategory =  Database::query("SELECT DISTINCT `category` FROM `products`");

        echo '<li class="list category">
        <div class="list_title">Category</div>
        <ul class="accordion list_of_category">';
        foreach($listOfCategory as $category){
            echo '<li><a href="?page=products&category='.$category['category'].'">'.$category['category'].'</a></li>';
        }
        echo '</ul></li>';
    }

    //Filter for category
    //List of items from category
    private function itemsList(){
        $getitems = Database::query("SELECT * FROM `$this->view` LIMIT 7");

        $itemsList = '<li class="list items">
        <div class="list_title">Model</div>
        <ul class="accordion list_of_items">';
        foreach($getitems as $item){
            $itemsList .= '<li><a href="?page=itemPage&proid='.$item['proId'].'">'.$item['name'].'</a></li>';
        }
        $itemsList .= '</ul></li>';
        echo $itemsList;
    }

    
    private function companyList(){
        $getcompanys = Database::query("SELECT DISTINCT `company` FROM `$this->view`");
        
        $companyList = '<li class="list company">
        <div class="list_title"> company </div>
        <ul class="accordion list_of_company">';
        foreach ($getcompanys as $company){
            $companyList .= '<li><input type="checkbox" name="company[]" value="'.$company['company'].'" id="'.$company['company'].'"><label for="'.$company['company'].'">'.$company['company'].'</label></li>';
        }

        $companyList .= '</ul></li>';
        echo $companyList;
    }

    private function price(){
        $getHighestPrice = Database::query("SELECT DISTINCT Price FROM `$this->view` ORDER BY `$this->view`.`Price` DESC LIMIT 1");
        $getLowestPrice = Database::query("SELECT DISTINCT Price FROM `$this->view` ORDER BY `$this->view`.`Price` ASC LIMIT 1");
        $middlePrice = $getHighestPrice[0]['Price'] / 2;
        $price =  '<li class="price">
            <div class="list_title" style="font-size: 20px; margin-top: 20px;">Price</div>
            <div class="accordion range">
                <div class="slider_value">
                    <span class="val">'.$middlePrice.'</span>
                </div>
                <div class="field">
                    <div class="value left">'.$getLowestPrice[0]['Price'].'₪</div>
                    <input type="range" min="'.$getLowestPrice[0]['Price'].'" max="'.$getHighestPrice[0]['Price'].'" value="'.$middlePrice.'" steps="1" class="inputSlider">
                    <div class="value right">'.$getHighestPrice[0]['Price'].'₪</div>
                </div>
            </div>
        </li>';

        echo $price;
    }
    
    private function colorList(){
        $getcolors = Database::query("SELECT DISTINCT `color` FROM `$this->view`");

        $colorList =  '<li class="list" class="color_list">
        <div class="list_title color_name">Color</div>
        <div class="colors accordion"><ul>';
        foreach($getcolors as $color){
            $colorList .= '<li><label class="color_label" data-hook="color">
            <input aria-label="'.$color['color'].'" name="color[]" value="'.$color['color'].'"  tabindex="0" class="checkColor" type="checkbox"><span class="color_select" style="background-color: '.$color['color'].';"></span></label></li>';
        }
        $colorList .= '</ul></div><span class="colors_selcted" style="width: 200px;">Colors:</span></li>';
        echo $colorList;
    }

    //Filter for specific category
    private function oneCategoryComponent(){

        echo '<input type="hidden" name="page" value="'.htmlspecialchars($_GET['page']).'">';
        echo '<input type="hidden" name="category" value="'.htmlspecialchars($_GET['category']).'">';
        $this->itemsList();
        $this->companyList();

        $listOfCategory =  Database::query(
        "SELECT distinct COLUMN_NAME 
        FROM INFORMATION_SCHEMA.COLUMNS      
        WHERE TABLE_NAME = '$this->category'");

        $count = 0;
        foreach($listOfCategory as $category){
            $count++;
            $categoryName = $category['COLUMN_NAME'];
            if($count > 2){
                $fullList = '<li class="list '.$categoryName.'">
                <div class="list_title">'.$categoryName.'</div>
                <ul class="accordion list_of_'.$categoryName.'">';
                $getDetails = Database::query("SELECT DISTINCT `$categoryName` FROM `$this->view`");
                foreach ($getDetails as $details){
                    $fullList .= '<li><input type="checkbox" name="'.$categoryName.'[]" value="'.$details[$categoryName].'" id="'.$details[$categoryName].'"><label for="'.$details[$categoryName].'">'.$details[$categoryName].'</label></li>';
                }
                echo $fullList .= '</ul></li>';
            }
            if($categoryName == "color"){
                $this->colorList();
            }
        }
        $this->price();

    }

}

?>