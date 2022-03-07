<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>


    <!-- Fonts
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CPoppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Stylesheets
    ============================================= -->
    <link href="assets/css/external.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Document Title
    ============================================= -->
    <title>Tenant Serv||Home Page</title>
    <style media="screen">

    main {
      text-align: center;
      justify-content: center;
      text-decoration: none;
      font-family: "Source Sans Pro", sans-serif;
      font-weight: 400;
    }
    hr{
	border-color: rgb(229, 231, 235);
}

p, hr{
	margin: 0;
}
section{
	padding: 3rem;
}

    .feature-grid {
    	display: grid;
    	gap: 1.5rem;
    	grid-template-columns: repeat(4, 1fr);
    }

    .feature-image {
    	transition: 0.2s;
    }

    .feature-image:hover {
    	transform: scale(1.3);
    }

    .feature-title {
    	font-size: 1.125rem;
    }

    .feature-description {
    	font-size: 0.875rem;
    }

    .title {
    	font-size: 2rem;
    	font-weight: 400;
    	color: rgb(120, 118, 118);
    }

    .enquiry {
    	background-color: rgb(244, 244, 244);
    	padding: 3rem 0;
    	color: rgb(120, 118, 118);
    }

    .enquiry-content {
    	display: flex;
    	align-items: center;
    	width: 100%;
    }

    .enquiry-image{
    	margin-left: auto;
    	margin-right: 4rem;
    }

    .enquiry-text{
    	margin-bottom: 2rem;
    	font-size: 1.3rem;
    }

    .enquiry-description {
    	width: fit-content;
    	height: fit-content;
    	text-align: left;
    	margin-right: auto;
    	margin-left: 4rem;
    	padding: 0;
    }

    .enquiry-description > p{
    	width: 100%;
    }

    .enquiry-btn{
    	margin: 0;
    	background-color: #64ddbb;
    	border-style: none;
    	color: white;
    	font-size: 1rem;
    }

    .flexbox {
    	display: flex;
    	align-items: center;
    	justify-content: center;
    }


    .stat{
    	margin:  auto;
    }

    .stat-count{
    	border: 4px solid #64ddbb;
    	border-radius: 50%;
    	width: 15rem;
    	height: 15rem;
    	color: #64ddbb;
    	font-size: 4rem;
    	display: flex;
    	align-items: center;
    	justify-content: center;
    	margin: auto;
    }

    .stat-text{
    	font-weight: 300;
    	display: block;
      padding: 30px 0 0 0;
    }
    </style>
</head>

<body>
    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="wrapper clearfix">
        <?php include_once('includes/header.php'); ?>
        <!-- Hero Search
============================================= -->
        <section id="heroSearch" class="hero-search mtop-100 pt-0 pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="slider--content">
                            <div class="text-center">
                                <h1>Find Your Favorite Property</h1>
                            </div>
                            <form class="mb-0" method="post" name="search" action="property-search.php">
                                <div class="form-box search-properties">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="city" id="city">
                                                        <option value="">Select City</option>
                                                        <?php
                                                        $query = mysqli_query($con, "select distinct City from  tblproperty");
                                                        while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                            <option value="<?php echo $row['City']; ?>"><?php echo $row['City']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="type" id="type" required="true">
                                                        <option value="">Select Property Type</option>
                                                        <?php $query1 = mysqli_query($con, "select * from tblpropertytype");
                                                        while ($row1 = mysqli_fetch_array($query1)) {
                                                        ?>
                                                            <option value="<?php echo $row1['PropertType']; ?>"><?php echo $row1['PropertType']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="status" id="status" required="true">
                                                        <option value="">Select Any Status</option>
                                                        <?php
                                                        $query2 = mysqli_query($con, "select distinct Status from  tblproperty");
                                                        while ($row2 = mysqli_fetch_array($query2)) {
                                                        ?>
                                                            <option value="<?php echo $row2['Status']; ?>"><?php echo $row2['Status']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <input type="submit" value="Search" name="search" class="btn btn--primary btn--block">
                                        </div>


                                    </div>
                                    <!-- .row end -->
                                </div>
                                <!-- .form-box end -->
                            </form>
                        </div>
                    </div>
                    <!-- .container  end -->
                </div>
                <!-- .slider-text end -->
            </div>
            <div class="carousel slider-navs" data-slide="1" data-slide-rs="1" data-autoplay="true" data-nav="true" data-dots="false" data-space="0" data-loop="true" data-speed="800">
                <!-- Slide #1 -->
                <div class="slide--item bg-overlay bg-overlay-dark3">
                    <div class="bg-section">
                        <img src="assets/images/slider/slide-bg/1.jpg" alt="background">
                    </div>
                </div>
                <!-- .slide-item end -->
                <!-- Slide #2 -->
                <div class="slide--item bg-overlay bg-overlay-dark3">
                    <div class="bg-section">
                        <img src="assets/images/slider/slide-bg/2.jpg" alt="background">
                    </div>
                </div>
                <!-- .slide-item end -->
                <!-- Slide #3 -->
                <div class="slide--item bg-overlay bg-overlay-dark3">
                    <div class="bg-section">
                        <img src="assets/images/slider/slide-bg/3.jpg" alt="background">
                    </div>
                </div>
                <!-- .slide-item end -->
                <!-- Slide #3 -->
                <div class="slide--item bg-overlay bg-overlay-dark3">
                    <div class="bg-section">
                        <img src="assets/images/slider/slide-bg/4.jpg" alt="background">
                    </div>
                </div>
                <!-- .slide-item end -->
                <!-- Slide #3 -->
                <div class="slide--item bg-overlay bg-overlay-dark3">
                    <div class="bg-section">
                        <img src="assets/images/slider/slide-bg/5.jpg" alt="background">
                    </div>
                </div>
                <!-- .slide-item end -->
            </div>
        </section>
        <!-- #property-single-slider end -->

        <!-- properties-carousel
============================================= -->
        <section id="properties-carousel" class="properties-carousel pt-90 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="heading heading-2 text-center mb-70">
                            <h2 class="heading--title">Latest Properties</h2>
                            <p class="heading--desc">Bellow are our latest properties</p>
                        </div>
                        <!-- .heading-title end -->
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="carousel carousel-dots" data-slide="3" data-slide-rs="2" data-autoplay="true" data-nav="false" data-dots="true" data-space="25" data-loop="true" data-speed="800">
                            <!-- .property-item #1 -->
                            <?php

                            $query = mysqli_query($con, "select * from tblproperty where approve='1' order by rand() limit 9");
                            while ($row = mysqli_fetch_array($query)) {

                            ?>
                                <div class="property-item">
                                    <div class="property--img">
                                        <a href="single-property-detail.php?proid=<?php echo $row['ID']; ?>">
                                            <img src="propertyimages/<?php echo $row['FeaturedImage']; ?>" alt="<?php echo $row['PropertyTitle']; ?>" width='380' height='300'>
                                            <?php
                                            if ($row['Status'] == "Sale") {
                                                echo '<span class="property--status sale" >Sale</span>';
                                            } else {
                                                echo '<span class="property--status rent" style="color: black; font-weight: 600; background-color: rgb(255, 174, 0);">Rent</span>';
                                            }

                                            ?>

                                        </a>
                                    </div>
                                    <div class="property--content">
                                        <div class="property--info">
                                            <h5 class="property--title"><a href="single-property-detail.php?proid=<?php echo $row['ID']; ?>">
                                                    <?php echo $row['PropertyTitle']; ?></a></h5>
                                            <p class="property--location"><?php echo $row['Address']; ?>&nbsp;
                                                <?php echo $row['City']; ?>&nbsp;
                                                <?php echo $row['State']; ?>&nbsp;
                                                <?php echo $row['Country']; ?></p>
                                            <p class="property--price">₹ <?php echo $row['RentorsalePrice']; ?></p>
                                        </div>
                                        <!-- .property-info end -->
                                        <div class="property--features">
                                            <ul class="list-unstyled mb-0">
                                                <li><span class="feature">Beds:</span><span class="feature-num"><?php echo $row['Bedrooms']; ?></span></li>
                                                <li><span class="feature">Baths:</span><span class="feature-num"><?php echo $row['Bathrooms']; ?></span></li>
                                                <li><span class="feature">Area:</span><span class="feature-num"><?php echo $row['Area']; ?></span></li>
                                            </ul>
                                        </div>
                                        <!-- .property-features end -->
                                    </div>
                                </div>
                            <?php

                            }
                            ?>


                        </div>
                        <!-- .carousel end -->
                    </div>
                    <!-- .col-md-12 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- #properties-carousel  end  -->

        <main>

        <section class="features" style="padding: 3rem 0;">
        				<h1 class="title">Why TenantServ</h1>
        				<div class="feature-grid">
        					<div class="feature" style="padding: 3rem 0;">
        						<img class="feature-image" src="assets/images/indeximage/feature1.png" />
        						<p class="feature-title">Avoid Brokers</p>
        						<p class="feature-description">
        							Save brokerage fees by connecting directly to owners
        						</p>
        					</div>
        					<div class="feature" style="padding: 3rem 0;">
        						<img class="feature-image" src="assets/images/indeximage/feature2.png" />
        						<p class="feature-title">Free Listing</p>
        						<p class="feature-description">
        							Easily list your business
        						</p>
        					</div>
        					<div class="feature" style="padding: 3rem 0;">
        						<img class="feature-image" src="assets/images/indeximage/feature3.png" />
        						<p class="feature-title">Shortlist Without Visit</p>
        						<p class="feature-description">
        							Information is readily available, making the process easier
        						</p>
        					</div>
        					<div class="feature" style="padding: 3rem 0;">
        						<img class="feature-image" src="assets/images/indeximage/feature4.png" />
        						<p class="feature-title">Rental Agreement</p>
        						<p class="feature-description">
        							Providing assistance with the creation of a rental agreement and related paperwork
        						</p>
        					</div>
        				</div>
        	</section>

      <section class="enquiry">
				<h1 class="title">
					Plan for builders offered by TenantServ
				</h1>
				<div class="enquiry-content">
					<div class="enquiry-image">
						<img
							src="assets/images/indeximage/enquiryimg.png"
						/>
					</div>

					<div class="enquiry-description">
						<p class="enquiry-text block">
							We can help you sell or rent your projects
						</p>
						<button class="btn enquiry-btn block">Enquiry Now</button>
						<hr />
						<p class="enquiry-contact block">
							For Builder Enquiries: +91 00
						</p>
					</div>
				</div>
			</section>

      <section class="stats">
				<h1 class="title">
					We Make A Difference
				</h1>
				<div class="flexbox">
					<div class="savings stat">
						<div class="stat-count">000</div>
						<h5 class="stat-text">Brokerage saved monthly</h5>
					</div>
					<div class="customers stat">
						<div class="stat-count">000</div>
						<h5 class="stat-text">Customers Connected Monthly</h5>
					</div>
					<div class="listings stat">
						<div class="stat-count">000</div>
						<h5 class="stat-text">New Listings Monthly</h5>
					</div>
				</div>
			</section>
  </main>
        <!-- Feature



============================================= -->
        <section id="cta" class="cta cta-1 text-center bg-overlay bg-overlay-dark pt-90">
            <div class="bg-section"><img src="assets/images/cta/bg-1.jpg" alt="Background"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <h3>Join our professional team & agents to start selling your house</h3>
                        <a href="contact.php" class="btn btn--primary">Contact</a>
                    </div>
                    <!-- .col-md-6 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- #cta1 end -->

        <!-- Footer #1
============================================= -->
        <?php include_once('includes/footer.php'); ?>
    </div>
    <!-- #wrapper end -->

    <!-- Footer Scripts
============================================= -->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/functions.js"></script>
</body>

</html>
