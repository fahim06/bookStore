<?php
include('config.php');
if(isset($_POST['email']) && isset($_POST['password']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql_login = 'SELECT `id`, `email`, `password` FROM `user` WHERE `email`="'.$email.'" and `password`=md5("'.$password.'")';
    $result = $conn->query($sql_login);
    if($result->num_rows > 0)
    {
        while($row = $result -> fetch_assoc())
        {
            $_SESSION['login'] = "yes";
            $_SESSION['email'] = $row['email'];
        }
    }
    else
    {
        $output = "Password or Email Wrong.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Story Keeper-Online Book Store</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <div class="header-1">

            <a href="#" class="logo"> <i class="fas fa-book"></i> The Story Keeper </a>

            <form action="" class="search-form">
                <input type="search" name="" placeholder="search here..." id="search-box">
                <label for="search-box" class="fas fa-search"></label>
            </form>

            <div class="icons">
                <div id="search-btn" class="fas fa-search"></div>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-shopping-cart"></a>
                <div id="login-btn" class="fas fa-user"></div>
            </div>

        </div>

        <div class="header-2">
            <nav class="navbar">
                <a href="#home">home</a>
                <a href="#featured">featured</a>
                <a href="#arrivals">arrivals</a>
                <a href="#reviews">reviews</a>
                <a href="#blogs">blogs</a>
            </nav>
        </div>

    </header>

    <!-- header section ends -->

    <!-- bottom navbar  -->

    <nav class="bottom-navbar">
        <a href="#home" class="fas fa-home"></a>
        <a href="#featured" class="fas fa-list"></a>
        <a href="#arrivals" class="fas fa-tags"></a>
        <a href="#reviews" class="fas fa-comments"></a>
        <a href="#blogs" class="fas fa-blog"></a>
    </nav>

    <!-- login form  -->

    <div class="login-form-container <?php if((isset($output)) ||((isset($_GET['login'])) && $_GET['login']=="true")){echo "active";}?>">

        <div id="close-login-btn" class="fas fa-times"></div>

        <form method="POST" action="index.php">
            <h3>sign in</h3>
            <?php
            if(isset($output))
            {
                echo "<h4>".$output."</h4>";
            }
            ?>
            <span>username</span>
            <input type="email" name="email" class="box" placeholder="enter your email">
            <span>password</span>
            <input type="password" name="password" class="box" placeholder="enter your password">
            <div class="checkbox">
                <input type="checkbox" name="" id="remember-me">
                <label for="remember-me"> remember me</label>
            </div>
            <input type="submit" value="sign in" class="btn">
            <p>forget password ? <a href="#">click here</a></p>
            <p>don't have an account ? <a href="signup.php">create one</a></p>
        </form>

    </div>

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="row">

            <div class="content">
                <h3>upto 75% off</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam deserunt nostrum accusamus. Nam alias
                    sit necessitatibus, aliquid ex minima at!</p>
                <a href="#" class="btn">shop now</a>
            </div>

            <div class="swiper books-slider">
                <div class="swiper-wrapper">
                    <a href="#" class="swiper-slide"><img src="image/book-1.png" alt="Sherlock Holmes"></a>
                    <a href="#" class="swiper-slide"><img src="image/book-2.png" alt="Harry Potter"></a>
                    <a href="#" class="swiper-slide"><img src="image/book-3.jpg" alt="Badhshai"></a>
                    <a href="#" class="swiper-slide"><img src="image/book-4.png" alt="Himu"></a>
                    <a href="#" class="swiper-slide"><img src="image/book-6.jpg" alt="byomkesh"></a>
                    <a href="#" class="swiper-slide"><img src="image/book-9.jpg" alt="feluda"></a>
                </div>
                <img src="image/stand.png" class="stand" alt="">
            </div>

        </div>

    </section>

    <!-- home section ense  -->

    <!-- icons section starts  -->

    <section class="icons-container">

        <div class="icons">
            <i class="fas fa-shipping-fast"></i>
            <div class="content">
                <h3>free shipping</h3>
                <p>order over BDT 2000</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-lock"></i>
            <div class="content">
                <h3>secure payment</h3>
                <p>100 secure payment</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-redo-alt"></i>
            <div class="content">
                <h3>easy returns</h3>
                <p>10 days returns</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-headset"></i>
            <div class="content">
                <h3>24/7 support</h3>
                <p>call us anytime</p>
            </div>
        </div>

    </section>

    <!-- icons section ends -->

    <!-- featured section starts  -->

    <section class="featured" id="featured">

        <h1 class="heading"> <span>featured books</span> </h1>

        <div class="swiper featured-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-1.png" alt="Collection of Sherlock Homes">
                    </div>
                    <div class="content">
                        <h3>Collection of Sherlock Homes</h3>
                        <div class="price">BDT 980 <span>BDT 1220</span></div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-2.png" alt="Collection of Harry Potter">
                    </div>
                    <div class="content">
                        <h3>Collection of Harry Potter</h3>
                        <div class="price">BDT 1100 <span>BDT 1400</span></div>
                        <a href="#" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-5.png" alt="Misir Ali Shomogro">
                    </div>
                    <div class="content">
                        <h3>Misir Ali Shomogro</h3>
                        <div class="price">BDT 750 <span>BDT 950</span></div>
                        <a href="#" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-4.png" alt="Himu Shomogro">
                    </div>
                    <div class="content">
                        <h3>Himu Shomogro</h3>
                        <div class="price">BDT 700 <span>BDT 950</span></div>
                        <a href="#" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-3.jpg" alt="Badhshai Namdar">
                    </div>
                    <div class="content">
                        <h3>Badhshai Namdar</h3>
                        <div class="price">BDT 180 <span>BDT 250</span></div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-6.jpg" alt="Byomkesh Bakshi Stories">
                    </div>
                    <div class="content">
                        <h3>Byomkesh Bakshi Stories</h3>
                        <div class="price">BDT 300 <span>BDT 425</span></div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-7.png" alt="Selected Stories of Rabindranah Tagore">
                    </div>
                    <div class="content">
                        <h3>Selected Stories of Rabindranah Tagore</h3>
                        <div class="price">BDT 320 <span>BDT 480</span></div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-8.png" alt="Maa">
                    </div>
                    <div class="content">
                        <h3>Maa</h3>
                        <div class="price">BDT 240 <span>BDT 300</span></div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-9.jpg" alt="The Complete Adventures of Feluda">
                    </div>
                    <div class="content">
                        <h3>The Complete Adventures of Feluda</h3>
                        <div class="price">BDT 550 <span>BDT 600</span></div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-10.png" alt="">
                    </div>
                    <div class="content">
                        <h3>The Great Gatsby</h3>
                        <div class="price">BDT 240 <span>BDT 310</span></div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
                </div>

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>

    <!-- featured section ends -->

    <!-- newsletter section starts -->

    <section class="newsletter">

        <form action="">
            <h3>subscribe for latest updates</h3>
            <input type="email" name="" placeholder="enter your email..." id="" class="box">
            <input type="submit" value="subscribe" class="btn">
        </form>

    </section>

    <!-- newsletter section ends -->

    <!-- arrivals section starts  -->

    <section class="arrivals" id="arrivals">

        <h1 class="heading"> <span>new arrivals</span> </h1>

        <div class="swiper arrivals-slider">

            <div class="swiper-wrapper">

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/new1.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Atonement</h3>
                        <div class="price">BDT 200 <span>BDT 240</span></div>
                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/new2.jpg" alt="Opekkha">
                    </div>
                    <div class="content">
                        <h3>Opekkha</h3>
                        <div class="price">BDT 250 <span>BDT 310</span></div>

                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/new3.jpg" alt="The Alchemist">
                    </div>
                    <div class="content">
                        <h3>The Alchemist</h3>
                        <div class="price">BDT 220 <span>BDT 280</span></div>

                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/new3.jpg" alt="The Kite Runner">
                    </div>
                    <div class="content">
                        <h3>The Kite Runner</h3>
                        <div class="price">BDT 150 <span>BDT 175</span></div>

                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/new5.jpg" alt="The God of Small Things">
                    </div>
                    <div class="content">
                        <h3>The God of Small Things</h3>
                        <div class="price">BDT 140 <span>BDT 160</span></div>

                    </div>
                </a>

            </div>

        </div>

        <div class="swiper arrivals-slider">

            <div class="swiper-wrapper">

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/new6.png" alt="Putul Nacher Itikotha">
                    </div>
                    <div class="content">
                        <h3>Putul Nacher Itikotha</h3>
                        <div class="price">BDT 100 <span>BDT 110</span></div>

                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/new7.png" alt="Gorbodharini">
                    </div>
                    <div class="content">
                        <h3>Gorbodharini</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>

                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/new8.png" alt="The 3 mistakes of My Life">
                    </div>
                    <div class="content">
                        <h3>The 3 mistakes of My Life</h3>
                        <div class="price">BDT 120 <span>BDT 140</span></div>

                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/new9.jpg" alt="Bishad Shindhu">
                    </div>
                    <div class="content">
                        <h3>Bishad Shindhu</h3>
                        <div class="price">BDT 150 <span>BDT 180</span></div>

                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/new10.png" alt="Sesh Bikeler Meye">
                    </div>
                    <div class="content">
                        <h3>Sesh Bikeler Meye</h3>
                        <div class="price">BDT 60 <span>BDT 75</span></div>

                    </div>
                </a>

            </div>

        </div>

    </section>

    <!-- arrivals section ends -->

    <!-- deal section starts  -->

    <section class="deal">

        <div class="content">
            <h3>deal of the day</h3>
            <h1>upto 50% off</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde perspiciatis in atque dolore tempora
                quaerat at fuga dolorum natus velit.</p>
            <a href="#" class="btn">shop now</a>
        </div>

        <div class="image">
            <img src="image/deal-img.jpg" alt="">
        </div>

    </section>

    <!-- deal section ends -->

    <!-- reviews section starts  -->

    <section class="reviews" id="reviews">

        <h1 class="heading"> <span>client's reviews</span> </h1>

        <div class="swiper reviews-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <img src="image/pic-1.png" alt="">
                    <h3>john deo</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam
                        at sint, eos ex similique facere hic.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/pic-2.png" alt="">
                    <h3>john deo</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam
                        at sint, eos ex similique facere hic.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/pic-3.png" alt="">
                    <h3>john deo</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam
                        at sint, eos ex similique facere hic.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
                <div class="swiper-slide box">
                    <img src="image/pic-4.png" alt="">
                    <h3>john deo</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam
                        at sint, eos ex similique facere hic.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/pic-5.png" alt="">
                    <h3>john deo</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam
                        at sint, eos ex similique facere hic.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/pic-6.png" alt="">
                    <h3>john deo</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam
                        at sint, eos ex similique facere hic.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!-- reviews section ends -->

    <!-- blogs section starts  -->

    <section class="blogs" id="blogs">

        <h1 class="heading"> <span>our blogs</span> </h1>

        <div class="swiper blogs-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="image/blog-1.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>blog title goes here</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                        <a href="#" class="btn">read more</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="image/blog-2.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>blog title goes here</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                        <a href="#" class="btn">read more</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="image/blog-3.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>blog title goes here</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                        <a href="#" class="btn">read more</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="image/blog-4.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>blog title goes here</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                        <a href="#" class="btn">read more</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="image/blog-5.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>blog title goes here</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                        <a href="#" class="btn">read more</a>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!-- blogs section ends -->

    <!-- footer section starts  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>our locations</h3>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> Dhaka </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> Chittagong </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> Rajshahi </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> Khulna </a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="#home"> <i class="fas fa-arrow-right"></i> home </a>
                <a href="#featured"> <i class="fas fa-arrow-right"></i> featured </a>
                <a href="#arrivals"> <i class="fas fa-arrow-right"></i> arrivals </a>
                <a href="#reviews"> <i class="fas fa-arrow-right"></i> reviews </a>
                <a href="#blogs"> <i class="fas fa-arrow-right"></i> blogs </a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href="#"> <i class="fas fa-arrow-right"></i> account info </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> ordered items </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> privacy policy </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> payment method </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> our serivces </a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"> <i class="fas fa-phone"></i> +880-173-1007005 </a>
                <a href="#"> <i class="fas fa-phone"></i> +880-152-1437606 </a>
                <a href="#"> <i class="fas fa-envelope"></i> toufiq11swoad@gmail.com </a>
            </div>

        </div>

        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
            <a href="#" class="fab fa-pinterest"></a>
        </div>

        <div class="credit"> created by <span>Team Alpha</span> | <span>&copy</span><span class="name"> The Story Keeper
                </>
        </div>

    </section>

    <!-- footer section ends -->

    <!-- loader  -->

    <div class="loader-container">
        <img src="image/loader-img.gif" alt="">
    </div>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>