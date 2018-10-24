
        <div id="big-search-container">
            <?php
require $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
function getTotalAds() {
    $conn = mysqli_init();
    if(mysqli_real_connect($conn , MY_HOST , MY_USER , MY_PASSWORD , MY_DB)) {
        $sql = "SELECT username FROM ads WHERE active != 0 AND active != 0 AND ad_id != 2";
        if($query = mysqli_query($conn , $sql)) {
        $num_ads = mysqli_num_rows($query);
        return $num_ads;
        }
    }
}
setlocale(LC_MONETARY, "en_US");
            ?>
                    <form action="/search" id="search-form" name="search-form" method="post"
                     accept-charset="utf-8" enctype="application/x-www-form-urlencoded" autocomplete="off">


            

            <select class ="search-boxes" id ="search-region" onchange="checkDropDown()">

               <option value="" selected="selected">State</option>
                                <option value="Abia">Abia state</option>
     <option value="Abuja">F.C.T Abuja</option>
                <option value="Adamawa" class="options">Adamawa state</option>
                <option value="Anambra" class="options">Anambra state</option>
                <option value="Akwa Ibom" class="options">Akwa Ibom state</option>
                <option value="Bauchi" class="options">Bauchi state</option>
                <option value="Bayelsa" class="options">Bayelsa state</option>
                <option value="Benue" class="options">Benue state</option>
                <option value="Borno" class="options">Borno state</option>
                <option value="Cross River" class="options">Cross River state</option>
                <option value="Delta" class="options">Delta state</option>
                <option value ="Ebonyi" class="options">Ebonyi state</option>
                <option value="Edo" class="options">Edo state</option>
                <option value="Ekiti" class="options">Ekiti state</option>
                <option value="Enugu" class="optionst">Enugu state</option>
                <option value="Gombe" class="options">Gombe state</option>
                <option value="Imo" class="options">Imo state</option>
                <option value="Jigawa" class="options">Jigawa state</option>
                 <option value="Kaduna" class="options">Kaduna state</option>
<option value="Kano" class="options">Kano state</option>
<option value="Katsina"  class="options">Katsina state</option>
<option value="Kebbi" class="options">Kebbi state</option>
<option value="Kogi" class="options">Kogi state</option>
<option value="Kwara" class="options">Kwara state</option>
<option value="Lagos" class="options">Lagos state</option>
<option value="Nassarawa" class="options">Nassarawa state</option>
<option value="Niger" class="options">Niger state</option>
<option value="Ogun" class="options">Ogun state</option>
<option value="Ondo" class="options">Ondo state</option>
<option value="Osun" class="options">Osun state</option>
<option value="Oyo" class="options">Oyo state</option>
<option value="Plateau" class="options">Plateau state</option>
<option value="Rivers" class="options">Rivers state</option>
<option value="Sokoto" class="options">Sokoto state</option>
<option value="Taraba" class="options">Taraba state</option>
<option value="Yobe" class="osptions">Yobe state</option>
<option value="Zamfara" class="options">Zamfara state</option>
            </select>
        <input type="text" class="search-boxes offable" name="search-text" id="search-text"
        placeholder= "<?php

$num_ads = number_format(getTotalAds());
echo $num_ads. " ads near you";
         ?>" disabled = "disabled"  /> <Button  type="button" id ="search-button" class =  "offable"><i class="fa fa-search"></i></Button>
         <div id = "search-drop-div"></div>
            
            <select id="universities"></select>


        </form>

            <div id="header-categories">
            <a href = "/category/Home_Furnitures" class="header-categories" id="header-catgory-home" title = "Home & Furniture"><i class="fa fa-home"></i><span class = "header-category-spans" id = "home-span">Home & Furnitures</span></a>
   <a href="/category/Electronics_Video" id="header-electronics-category" title = "Electronics & Videos" class="header-categories"><i class="fa fa-tv"></i><span class = "header-category-spans" id = "electronics-span">Electronics & Video</span></a>
   <a href="/category/Phones_Tablets" id="header-phones-category" class="header-categories" title = "Phones & Tablet"><i class="fa fa-tablet"></i><span class = "header-category-spans" id = "phones-span">Phones & Tablets</span></a>
                <a href="/category/laptops_computers" id="header-laptop-category" title="Laptops & Computers" class="header-categories"><i class="fa fa-desktop">
                    </i><span class = "header-category-spans" id = "laptops-span">Laptops / Computers</span></a>

                <a title= "Fashion & Clothing" href="/category/fashion_clothes" id="header-fashion-category" class="header-categories"><i class="fa fa-shopping-bag">
                    </i><span class = "header-category-spans" id = "fashion-span">Fashion & Clothes</span></a>
                <a href="/category/Books_Archive" title = "Books & archive" id="header-books-category" class="header-categories"><i class="fa fa-book"></i><span class = "header-category-spans" id = "books-span">Books & Archive</span></a>
                <a href="/category/Hostels_Lodges" title = "Accommodation" id="header-hostel-category" class="header-categories"><i class="fa fa-bed"></i><span class = "header-category-spans" id = "hostel-span">Hostels and lodges</span></a>



            </div>
        <div id = "header-display-image" style=""></div>

          </div>
