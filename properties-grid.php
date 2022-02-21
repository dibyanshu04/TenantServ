<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Document Meta
    ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CPoppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="assets/css/external.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <title>Tenant Serv | Properties Grid</title>

    <!-- Jquery for price filter -->
    <script src="assets/js/jquery-1.10.2.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <link rel="stylesheet" href="assets/css/jquery-ui.css">

</head>

<body>
    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="wrapper clearfix">
        <header id="navbar-spy" class="header header-1 header-light header-fixed">
            <?php include_once('includes/header.php'); ?>

        </header>
        <!-- map
============================================ -->
        <?php include_once('includes/header-search.php'); ?>
        <!-- #map end -->

        <!-- properties-grid
============================================= -->
        <section id="properties-grid" style="margin-top:-10%">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <!-- widget property price range
=============================-->

                        <div class="widget widget-property">

                            <div class="widget--title">
                                <h5>Price Range</h5>
                            </div>

                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <input type="hidden" id="hidden_minimum_price" value="2000">
                                    <input type="hidden" id="hidden_maximum_price" value="6800000">
                                    <p id="price_show">2000-6800000</p>
                                    <div id="price_range"></div>
                                </ul>
                            </div>
                        </div>

                        <!-- . widget property price range end -->
                        <!-- widget property type
=============================-->

                        <div class="widget widget-property">

                            <div class="widget--title">
                                <h5>Property Type</h5>
                            </div>

                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <?php
                                    $query3 = mysqli_query($con, "select distinct Type from  tblproperty");
                                    while ($row3 = mysqli_fetch_array($query3)) {
                                    ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="common_selector Type" value="<?php echo $row3['Type']; ?>"><?php echo $row3['Type']; ?>
                                            </label>
                                        </div>

                                    <?php } ?>

                                </ul>
                            </div>
                        </div>

                        <!-- . widget property type end -->

                        <!-- widget property status
=============================-->
                        <div class="widget widget-property">
                            <div class="widget--title">
                                <h5>Property Status</h5>
                            </div>
                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <?php
                                    $query4 = mysqli_query($con, "select distinct Status from  tblproperty");
                                    while ($row4 = mysqli_fetch_array($query4)) {
                                    ?>


                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="common_selector Status" value="<?php echo $row4['Status']; ?>"><?php echo $row4['Status']; ?>
                                            </label>

                                        </div>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                        <!-- . widget property status end -->


                        <!-- widget property city
=============================-->
                        <div class="widget widget-property">
                            <div class="widget--title">
                                <h5>Property By City</h5>
                            </div>
                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <?php
                                    $query5 = mysqli_query($con, "select distinct City from  tblproperty");
                                    while ($row5 = mysqli_fetch_array($query5)) {
                                    ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="common_selector Cities" value="<?php echo $row5['City']; ?>"><?php echo $row5['City']; ?>
                                            </label>
                                        </div>

                                    <?php } ?>

                                </ul>
                            </div>
                        </div>



                        <!-- widget property bedrooms
=============================-->
                        <div class="widget widget-property">
                            <div class="widget--title">
                                <h5>Number of BHK</h5>
                            </div>
                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <?php
                                    $query6 = mysqli_query($con, "select distinct Bedrooms from  tblproperty ORDER BY Bedrooms ASC");
                                    while ($row6 = mysqli_fetch_array($query6)) {
                                    ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="common_selector BHK" value="<?php echo $row6['Bedrooms']; ?>"><?php echo $row6['Bedrooms']; ?>
                                            </label>
                                        </div>

                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                        <!-- . widget property bedrooms end -->

                        <!-- widget property State
=============================-->
                        <div class="widget widget-property">
                            <div class="widget--title">
                                <h5>Property By State</h5>
                            </div>
                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <?php
                                    $query7 = mysqli_query($con, "select distinct tblstate.StateName from  tblproperty join tblstate on tblstate.ID=tblproperty.State ");
                                    while ($row7 = mysqli_fetch_array($query7)) {
                                    ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="common_selector State" value="<?php echo $row7['StateName']; ?>"><?php echo $row7['StateName']; ?>
                                            </label>
                                        </div>

                                    <?php } ?>

                                </ul>
                            </div>
                        </div>



                    </div>
                    <!-- .col-md-4 end -->
                    <div class="col-xs-12 col-sm-12 col-md-8">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="properties-filter clearfix">

                                    <!-- .select-box -->
                                    <div class="view--type pull-right">
                                        <a id="switch-list" href="#" class=""><i class="fa fa-th-list"></i></a>
                                        <a id="switch-grid" href="#" class="active"><i class="fa fa-th-large"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="properties properties-grid">
                                <!-- .col-md-12 end -->

                                <?php
                                //Getting default page number
                                if (isset($_GET['pageno'])) {
                                    $pageno = $_GET['pageno'];
                                } else {
                                    $pageno = 1;
                                }
                                // Formula for pagination
                                $no_of_records_per_page = 8;
                                $offset = ($pageno - 1) * $no_of_records_per_page;
                                // Getting total number of pages
                                $total_pages_sql = "SELECT COUNT(*) FROM tblproperty";
                                $result = mysqli_query($con, $total_pages_sql);
                                $total_rows = mysqli_fetch_array($result)[0];
                                $total_pages = ceil($total_rows / $no_of_records_per_page);

                                ?>


                                <div class="row filter_data">

                                </div>



                                <!-- .property item end -->


                                <!-- .property item end -->
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-50">
                                <ul class="pagination">
                                    <li class="active"><a href="?pageno=1">First</a></li>
                                    <li class="<?php if ($pageno <= 1) {
                                                    echo 'disabled';
                                                } ?>">
                                        <a href="<?php if ($pageno <= 1) {
                                                        echo '#';
                                                    } else {
                                                        echo "?pageno=" . ($pageno - 1);
                                                    } ?>">Prev</a>
                                    </li>
                                    <li class="<?php if ($pageno >= $total_pages) {
                                                    echo 'disabled';
                                                } ?>">
                                        <a href="<?php if ($pageno >= $total_pages) {
                                                        echo '#';
                                                    } else {
                                                        echo "?pageno=" . ($pageno + 1);
                                                    } ?>">Next</a>
                                    </li>
                                    <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                                </ul>
                            </div>
                            <!-- .col-md-12 end -->
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .col-md-8 end -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- #properties-grid  end  -->

        <!-- cta #1
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

    <!-- Filteration -->
    <style>
        #loading {
            text-align: center;
            background: url('assets/loader.gif') no-repeat center;
            height: 150px;
        }
    </style>


    <script>
        $(document).ready(function() {
            filter_data();

            function filter_data() {
                $('.filter_data').html('<div id="loading"></div>');
                var action = 'fetch_data';
                var minimum_price = $('#hidden_minimum_price').val();
                var maximum_price = $('#hidden_maximum_price').val();
                var Type = get_filter('Type');
                var Status = get_filter('Status');
                var City = get_filter('Cities');
                var Bhk = get_filter('BHK');
                var State = get_filter('State');
                $.ajax({
                    url: "fetch_data.php",
                    method: "POST",
                    data: {
                        action: action,
                        minimum_price: minimum_price,
                        maximum_price: maximum_price,
                        Type: Type,
                        Status: Status,
                        City: City,
                        Bhk: Bhk,
                        State: State
                    },
                    success: function(data) {
                        $('.filter_data').html(data);
                    }
                })
            }

            function get_filter(class_name) {
                var filter = [];
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.common_selector').click(function() {
                filter_data();
            });

            $('#price_range').slider({
                range: true,
                min: 2000,
                max: 6800000,
                values: [2000, 6800000],
                step: 100000,
                stop: function(event, ui) {
                    $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                    $('#hidden_minimum_price').val(ui.values[0]);
                    $('#hidden_maximum_price').val(ui.values[1]);
                    filter_data();
                }
            });
        })
    </script>

    <!-- Footer Scripts
============================================= -->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/functions.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true&amp;key=AIzaSyCiRALrXFl5vovX0hAkccXXBFh7zP8AOW8"></script>
    <script src="assets/js/plugins/jquery.gmap.min.js"></script>
    <script src="assets/js/map-addresses.js"></script>
    <script src="assets/js/map-custom.js"></script>



</body>

</html>