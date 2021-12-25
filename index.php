<!-- PHP INCLUDES -->

<?php

include "connect.php";
include "Includes/templates/header.php";
include "Includes/templates/navbar.php";

?>

<!-- HOME SECTION -->

<section class="home-section" id="home-section">
    <div class="home-section-content">
        <div id="home-section-carousel" class="carousel slide">


            <div class="carousel-inner">

               
                <div class="carousel-item active">

                    <img class="d-block w-100" src="Design/images/background00.png" alt="First slide">
                    <img src="Design/images/logo_big.png" alt="" style="position: absolute;top:40px;left:35%" width="30%" height="30%" align="center">
                    <div class="carousel-caption d-md-block">
                        <h3 style="font-size:6vw;COLOR:#ffffff;font-family: Goudy Old Style;">The Barber Shop</h3>
                        <p style="font-size:2vw;COLOR:#ffffff;font-family: Century Gothic;" align="center">
                            GOOD TIMES GREAT HAIRCUT
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>


<!--Timings -->

<section class="services_section" id="Timings" style="height: 90vh;background:#d4d4d4">
<div class="section_heading" >
        
        <h2>Timing</h2>
        <div class="heading-line"></div>
    </div>
<?php





date_default_timezone_set('asia/kolkata');
// echo "Today is " . date('w') . "<br>";
//echo "The time is " . date("h:i")."<br>";
if(date('w')=="0")
{
    $stmt = $con->prepare("Select * from timing where day='sunday'");
$stmt->execute();
$categori = $stmt->fetchAll();
foreach($categori as $category)
{
}

}
elseif(date('w')=="1")
{
    $stmt = $con->prepare("Select * from timing where day='monday'");
$stmt->execute();
$categori = $stmt->fetchAll();
foreach($categori as $category)
{
}

}
elseif(date('w')=="2")
{
    $stmt = $con->prepare("Select * from timing where day='tuesday'");
$stmt->execute();
$categori = $stmt->fetchAll();
foreach($categori as $category)
{}

}
elseif(date('w')=="3")
{
    $stmt = $con->prepare("Select * from timing where day='wednesday'");
$stmt->execute();
$categori = $stmt->fetchAll();
foreach($categori as $category)
{
    
}

}
elseif(date('w')=="4")
{
    $stmt = $con->prepare("Select * from timing where day='thursday'");
$stmt->execute();
$categori = $stmt->fetchAll();
foreach($categori as $category)
{
}

}
elseif(date('w')=="5")
{
    $stmt = $con->prepare("Select * from timing where day='friday'");
$stmt->execute();
$categori = $stmt->fetchAll();
foreach($categori as $category)
{
}

}
elseif(date('w')=="6")
{
    $stmt = $con->prepare("Select * from timing where day='saturday'");
$stmt->execute();
$categori = $stmt->fetchAll();
foreach($categori as $category)
{
}


}

// echo "Day in database: " . $category["open_time"]."<br>";

?>
<div class="container" style="padding-left: 29%;">
        <div class="row" >
        <h4>
            <?php 
        $opentime =$category["open_time"];
        $opentime = substr($opentime, 0, 8);
        $closetime = $category["close_time"];
        $closetime = substr($closetime, 0, 8);
       
        
        if(date('H')>=substr($opentime, 0, 2)and date('H')<=substr($closetime, 0, 2)){
            if(date('H')!=substr($opentime,0,2)and date('H')!=substr($closetime,0,2))
            {
                echo"The shop is currently OPEN"."<br>"."<br>";
            }
            elseif(date('H')==substr($closetime,0,2))
            {
                if(date('i')>substr($closetime,3,2)){
                    echo"The shop is currently CLOSED"."<br>"."<br>";
                }
                else{
                    echo"The shop is currently OPEN"."<br>"."<br>";
                }
            }

            
        }
       
        else{
            echo"The shop is currently CLOSED"."<br>"."<br>";
        }
        echo "Shop opening time: " . $opentime." AM"."<br>"."<br>"; 
        echo "Shop closing time: " . $closetime." PM"."<br>";
        ?></h4>
        </div>
</div>

</section>
<!-- ABOUT SECTION -->

<section id="about" class="about_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about_content" style="text-align: center;">
                    <h3 style="font-size:2vw;">Introducing</h3>
                    <br>
                    <h2 style="font-family: Goudy Old Style;font-size:5vw;">The Barber Shop </h2>
                    <img src="Design/images/logo_black.png" alt="logo">
                    <br><br>
                    <p style="color: #777">
                        Welcome to the Unisex Salon of The LNM Institute of Information Technology.
                        <br>
                        Haircuts, Shaving, Trimming, and hair spa, everthing near you, for you, avaivable in best
                        prices.
                    </p>
                    <!-- <a href="#" class="default_btn" style="opacity: 1;">More about us</a> -->
                </div>
            </div>
            <div class="col-md-6  d-none d-md-block">
                <div class="about_img" style="overflow:hidden">
                    <img class="about_img_1" src="Design/images/about-1.jpg" alt="about-1">
                    <img class="about_img_2" src="Design/images/portfolio-2.jpg" alt="about-2">
                    <img class="about_img_3" src="Design/images/background01.png" alt="about-3">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SERVICES SECTION -->


<section class="services_section" id="services">
    <div class="container">
        <div class="section_heading" >
            <!-- <h3>Trendy Salon & Spa</h3> -->
            <h2>Our Services</h2>
            <div class="heading-line"></div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 padd_col_res">
                <div class="service_box">
                    <i class="bs bs-scissors-1"></i>
                    <h3>Haircut Styles</h3>
                    <!-- <p>Barber is a person whose occupation is mainly to cut dress style.</p> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 padd_col_res">
                <div class="service_box">
                    <i class="bs bs-razor-2"></i>
                    <h3>Beard Triming</h3>
                    <!-- <p>Barber is a person whose occupation is mainly to cut dress style.</p> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 padd_col_res">
                <div class="service_box">
                    <i class="bs bs-brush"></i>
                    <h3>Smooth Shave</h3>
                    <!-- <p>Barber is a person whose occupation is mainly to cut dress style.</p> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 padd_col_res">
                <div class="service_box">
                    <i class="bs bs-hairbrush-1"></i>
                    <h3>Face Masking</h3>
                    <!-- <p>Barber is a person whose occupation is mainly to cut dress style.</p> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 padd_col_res"style="padding-top:20px;">
                <div class="service_box" >
                    <i class="bs bs-gel"></i>
                    <h3>Waxing</h3>
                    <!-- <p>Barber is a person whose occupation is mainly to cut dress style.</p> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 padd_col_res"style="padding-top:20px;">
                <div class="service_box" >
                    <i class="bs bs-hair-dryer"></i>
                    <h3>Hair Dyi</h3>
                    <!-- <p>Barber is a person whose occupation is mainly to cut dress style.</p> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 padd_col_res"style="padding-top:20px;">
                <div class="service_box" >
                    <i class="bs bs-oil-bottle"></i>
                    <h3>Massage</h3>
                    <!-- <p>Barber is a person whose occupation is mainly to cut dress style.</p> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 padd_col_res"style="padding-top:20px;">
                <div class="service_box" >
                    <i class="bs bs-girl"></i>
                    <h3>Skin Care</h3>
                    <!-- <p>Barber is a person whose occupation is mainly to cut dress style.</p> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BOOKING SECTION -->

<section class="book_section" id="booking">
    
    <div class="container">
        <div class="row">
            <div class=" offset-md-2">
                <form action="appointment.php" method="post" id="appointment_form" class="form-horizontal appointment_form">
                    <div class="book_content">
                        <h1 style="color: white;">Book an appointment</h1>
                        <p style="color: #999;">
                            Barber is a person whose occupation is mainly to cut dress groom <br>style and shave men's and boys hair.
                        </p>
                    </div>
                   

                    <button id="app_submit" class="default_btn" type="submit" style="background-color: #EEB365;font-size:16px">
                        Book Appointment
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>














<!-- PRICING SECTION  -->

<section class="pricing_section" id="pricing">

<!-- START GET CATEGORIES  PRICES FROM DATABASE -->

    <?php

        $stmt = $con->prepare("Select * from service_categories");
        $stmt->execute();
        $categories = $stmt->fetchAll();

    ?>

<!-- END -->

<div class="container">
    <div class="section_heading">
        
        <h2>Our Pricing</h2>
        <div class="heading-line"></div>
    </div>
    <div class="row">
        <?php

            foreach($categories as $category)
            {
                $stmt = $con->prepare("Select * from services where category_id = ?");
                $stmt->execute(array($category['category_id']));
                $totalServices =  $stmt->rowCount();
                $services = $stmt->fetchAll();

                if($totalServices > 0)
                {
                ?>

                    <div class="col-lg-4 col-md-6 sm-padding">
                        <div class="price_wrap">
                            <h3 style="background-color: #EEB365;"><?php echo $category['category_name'] ?></h3>
                            <ul class="price_list">
                                <?php

                                    foreach($services as $service)
                                    {
                                        ?>

                                            <li>
                                                <h4><?php echo $service['service_name'] ?></h4>
                                                <p><?php echo $service['service_description'] ?></p>
                                                <span class="price"style="color: #EEB365;">₹<?php echo $service['service_price'] ?></span>
                                            </li>

                                        <?php
                                    }

                                ?>
                                
                            </ul>
                        </div>
                    </div>

                <?php
                }
            }

        ?>
        
    </div>
</div>
</section>


<!-- CONTACT SECTION -->

<section class="contact-section" id="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 sm-padding">
                <div class="contact-info">
                    <h2>
                    CONTACT US
                        
                       
                    </h2>
                    <p>
                    We'd Like to hear from you!
                    </p>
                    <h3>
                    The LNM Institute if Information Technology.
                        <br>
                        <br>
                        Jaipur&nbsp;-&nbsp;308031
                    </h3>
                    <h4>
                        <span style="font-weight: bold">Email:</span>
                        barbers@lnmiit.ac.in
                        <br>
                        <span style="font-weight: bold">Phone:</span>
                        +91 1234567891
                        <br>
                       
                    </h4>
                </div>
            </div>

        </div>
    </div>
</section>



<?php include "Includes/templates/footer.php"; ?>