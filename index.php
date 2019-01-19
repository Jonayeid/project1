<?php
session_start();
//$user_type = NULL;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Surplsb2b</title>
        <link href="public/css/custom.css" rel="stylesheet"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet"/>
      
    </head>
    <body>
        <div id="header">
            <div id="logo">
                <h2>Logo</h2>
            </div>
            <div id="lang">
                <select id="lang_selector">
                    <option>English</option>
                    <option>Bangla</option>
                </select>
            </div>
            <div id="user_box">
                <?php
                if (isset($_SESSION['user_type']) != NULL) {
                    $user_type = $_SESSION['user_type'];
                    if ($user_type == 'Seller') {
                        ?>
                        <div class="dropdown">
                            <button class="dropbtn"> <i class="fa fa-user"></i> <?php  echo  $_SESSION['user_name']; ?></button>
                            <div class="dropdown-content">
                                <a href="my-profile.php">My Account</a>
                                <a href="logout-seller.php">Logout</a>

                            </div>
                        </div> 
                    <?php } else {
                        ?>
                        <div class="dropdown">
                            <button class="dropbtn"><i class="fa fa-user"></i> <?php  echo  $_SESSION['user_name']; ?></button>
                            <div class="dropdown-content">
                                <a href="buyer-profile.php">My Account</a>
                                <a href="logout-seller.php">Logout</a>

                            </div>
                        </div> 
                <?php }  } else { ?>
                        <a href="login.php" style="color:red;text-decoration: none;">Login</a>
                        <a  href="register.php" style="color:red;text-decoration: none;margin-left: 5px;">Register</a>
                    <?php
                    }
                
                ?>


            </div>
            <div id="search_bar">
                <form>
                    <input type="" name="">
                    <input type="submit" name="Search" value="Search" style="background-color: white;border:1px solid gray;">
                </form>

            </div>
            <div id="social_links">
                <a href="#"><img src="public/images/icons/facebook-icon.png" width="28px" height="28px"></a>
                <a href="#"><img src="public/images/icons/google.png" width="20px" height="20px"></a>
                <a href="#"><img src="public/images/icons/Linkedin_icon.png" width="20px" height="20px"></a>
                <a href="#"><img src="public/images/icons/twitter.png" width="25px" height="25px"></a>
            </div>
            <button style="margin-top: 10px;margin-left: 10px;background-color: white;border:1px solid gray;">FILTER</button>

        </div>

        <div id="menu_bar">
            <a href="" class="home_btn">HOME</a>
            <ul>
                <li><a href="#news">SUPPLIER</a></li>
                <li><a href="#contact">FACTORY</a></li>
                <li><a href="#about">BUYER</a></li>
                <li><a href="#news">BUYING LEADS</a></li>
                <li><a href="#contact">AD POSTING GUIDE</a></li>
                <li><a href="#about">SERVICES</a></li>
            </ul>

        </div>

        <div id="side_bar">

            <li class="side_bar_list"><a href="">Category-1</a></li>
            <li class="side_bar_list"><a href="">Category-2</a></li>
            <li class="side_bar_list"><a href="">Category-3</a></li>
            <li class="side_bar_list"><a href="">Category-4</a></li>
            <li class="side_bar_list"><a href="">Category-5</a></li>
            <li class="side_bar_list"><a href="">Category-6</a></li>
            <li class="side_bar_list"><a href="">Category-7</a></li>
            <li class="side_bar_list"><a href="">Category-8</a></li>
            <li class="side_bar_list"><a href="">Category-9</a></li>
            <li class="side_bar_list"><a href="">Category-10</a></li>
            <li class="side_bar_list"><a href="">Category-11</a></li>
            <li class="side_bar_list"><a href="">Category-12</a></li>
            <li class="side_bar_list"><a href="">Category-13</a></li>
            <li class="side_bar_list"><a href="">Category-14</a></li>
            <li class="side_bar_list"><a href="">Category-15</a></li>
            <li class="side_bar_list"><a href="">Category-16</a></li>
            <li class="side_bar_list"><a href="">Category-17</a></li>
            <li class="side_bar_list"><a href="">Category-18</a></li>
            <li class="side_bar_list"><a href="">Category-19</a></li>
            <li class="side_bar_list"><a href="">Category-20</a></li>
            <li class="side_bar_list"><a href="">Category-21</a></li>
            <li class="side_bar_list"><a href="">Category-22</a></li>
            <li class="side_bar_list"><a href="">Category-23</a></li>
            <li class="side_bar_list"><a href="">Category-24</a></li>
            <li class="side_bar_list"><a href="">Category-25</a></li>
            <li class="side_bar_list"><a href="">Category-26</a></li>

        </div>

        <div id="body_container">
            <div id="image_slider">
                <img class="image_slide" src="public/images/1.jpg" alt="Image-1" width="100%" height="100%">
                <img class="image_slide" src="public/images/2.jpg" alt="Image-2" width="100%" height="100%">
                <img class="image_slide" src="public/images/3.jpg" alt="Image-3" width="100%" height="100%">
            </div>
            <div id="post_requirement">
                <p><b>Post Requirement</b></p>
            </div>
            <div id="latest_buying_leads">
                <p><b>Latest Buying Leads</b></p>
            </div>
            <div id="all_buying_leads">
                <p><b>All Buying Leads</b></p>
            </div>

        </div>

        <div id="widget_container">
            <p><b>WIDGET LIST</b></p>
        </div>
        <div id="all_post_container">
            <p style="color:red"><b>ALL POST(NEWSTEST ON TOP)</b></p>


            <div id="product_details">
                <div id="product_image_box">
                    <p style="font-size: 11px;"><b>PRODUCT CODE:BD1222<b></p>
                                <div id="product_image">
                                    <img src="public/images/product-1.jpg" alt="product image" width="100%" height="100%">
                                </div>
                                </div>
                                <div id="product_description">
                                    <p style="font-size: 13px;">Supplier:Code Tree</p>
                                    <p style="font-size: 13px;">Item Description:</p>
                                    <p style="font-size: 13px;">Fabric:</p>
                                </div>

                                <div id="price_info">
                                    <p style="font-size: 10px;">star supplier</p>

                                    <div class="price_info_table">
                                        <table border="1" width="95%">
                                            <tr>
                                                <th style="font-size:12px;border-bottom: 1px solid black;">QUANTITY</th>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 10px;">50 Rupes</td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="price_info_table">
                                        <table border="1" width="95%">
                                            <tr>
                                                <th style="font-size:12px;border-bottom: 1px solid black;">PRICE</th>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 10px;">USS .70</td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="price_info_table">
                                        <table border="1" width="100%">
                                            <tr>
                                                <th style="font-size:12px;border-bottom: 1px solid black;">GROSS WEIGHT</th>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 10px;">12 KGS</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="price_info_table">
                                        <table border="1" width="95%">
                                            <tr>
                                                <th style="font-size:12px;border-bottom: 1px solid black;">VOLUME</th>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 10px;">0.2 CBM</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="price_info_table">
                                        <table border="1" width="95%">
                                            <tr>
                                                <th style="font-size:12px;border-bottom: 1px solid black;">VALUE</th>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 10px;">USS 38</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="price_info_table">
                                        <table border="1" width="100%">
                                            <tr>
                                                <th style="font-size:12px;border-bottom: 1px solid black;">VOLUME WEIGHT</th>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 10px;">10.5 KGS</td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                                <div id="submit_btn_container">
                                    <button id="submit_btn">Add to container</button>
                                    <button id="submit_btn">Save for later</button>
                                    <button id="submit_btn">Add Agent service</button>
                                </div>
                                </div>


                                <div id="product_details">
                                    <div id="product_image_box">
                                        <p style="font-size: 11px;"><b>PRODUCT CODE:BD1222<b></p>
                                                    <div id="product_image">
                                                        <img src="public/images/bag.jpeg" alt="product image" width="100%" height="100%">
                                                    </div>
                                                    </div>
                                                    <div id="product_description">
                                                        <p style="font-size: 13px;">Supplier:Code Tree</p>
                                                        <p style="font-size: 13px;">Item Description:</p>
                                                        <p style="font-size: 13px;">Fabric:</p>
                                                    </div>

                                                    <div id="price_info">
                                                        <p style="font-size: 10px;">star supplier</p>

                                                        <div class="price_info_table">
                                                            <table border="1" width="95%">
                                                                <tr>
                                                                    <th style="font-size:12px;border-bottom: 1px solid black;">QUANTITY</th>
                                                                </tr>
                                                                <tr>
                                                                    <td style="font-size: 10px;">50 Rupes</td>
                                                                </tr>
                                                            </table>
                                                        </div>

                                                        <div class="price_info_table">
                                                            <table border="1" width="95%">
                                                                <tr>
                                                                    <th style="font-size:12px;border-bottom: 1px solid black;">PRICE</th>
                                                                </tr>
                                                                <tr>
                                                                    <td style="font-size: 10px;">USS .70</td>
                                                                </tr>
                                                            </table>
                                                        </div>

                                                        <div class="price_info_table">
                                                            <table border="1" width="100%">
                                                                <tr>
                                                                    <th style="font-size:12px;border-bottom: 1px solid black;">GROSS WEIGHT</th>
                                                                </tr>
                                                                <tr>
                                                                    <td style="font-size: 10px;">12 KGS</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="price_info_table">
                                                            <table border="1" width="95%">
                                                                <tr>
                                                                    <th style="font-size:12px;border-bottom: 1px solid black;">VOLUME</th>
                                                                </tr>
                                                                <tr>
                                                                    <td style="font-size: 10px;">0.2 CBM</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="price_info_table">
                                                            <table border="1" width="95%">
                                                                <tr>
                                                                    <th style="font-size:12px;border-bottom: 1px solid black;">VALUE</th>
                                                                </tr>
                                                                <tr>
                                                                    <td style="font-size: 10px;">USS 38</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="price_info_table">
                                                            <table border="1" width="100%">
                                                                <tr>
                                                                    <th style="font-size:12px;border-bottom: 1px solid black;">VOLUME WEIGHT</th>
                                                                </tr>
                                                                <tr>
                                                                    <td style="font-size: 10px;">10.5 KGS</td>
                                                                </tr>
                                                            </table>
                                                        </div>

                                                    </div>
                                                    <div id="submit_btn_container">
                                                        <button id="submit_btn">Add to container</button>
                                                        <button id="submit_btn">Save for later</button>
                                                        <button id="submit_btn">Add Agent service</button>
                                                    </div>
                                                    </div>


                                                    </div>
                                                    <div id="featured_ad_container">
                                                        <p style="border-bottom:1px solid gray; "><b>FEATURED AD(SCROLING)</b></p>
                                                    </div>
                                                    </body>
                                                    </html>



                                                    <script>
                                                        var myIndex = 0;
                                                        carousel();

                                                        function carousel() {
                                                            var i;
                                                            var x = document.getElementsByClassName("image_slide");
                                                            for (i = 0; i < x.length; i++) {
                                                                x[i].style.display = "none";
                                                            }
                                                            myIndex++;
                                                            if (myIndex > x.length) {
                                                                myIndex = 1
                                                            }
                                                            x[myIndex - 1].style.display = "block";
                                                            setTimeout(carousel, 2000); // Change image every 2 seconds
                                                        }
                                                    </script>