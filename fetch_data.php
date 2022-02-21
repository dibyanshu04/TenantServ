<?php
// session_start();
// error_reporting(0);
$connect = new PDO("mysql:host=localhost;dbname=remsdb", "root", "");
$output ="";
if (isset($_POST["action"])) {
    $query = "select tblproperty.*,tblcountry.CountryName,tblstate.StateName from tblproperty join tblcountry on tblcountry.ID=tblproperty.Country join tblstate on tblstate.ID=tblproperty.State where tblproperty.approve='1'";

    if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) {
        $query .= "AND RentorsalePrice BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "' ";
    }

    if (isset($_POST["Type"])) {
        $type_filter = implode("','", $_POST["Type"]);
        $query .= " AND Type IN('" . $type_filter . "') ";
    }

    if (isset($_POST["Status"])) {
        $status_filter = implode("','", $_POST["Status"]);
        $query .= " AND Status IN('" . $status_filter . "') ";
    }

    if (isset($_POST["Bhk"])) {
        $bhk_filter = implode("','", $_POST["Bhk"]);
        $query .= " AND Bedrooms IN('" . $bhk_filter . "') ";
    }
    if (isset($_POST["City"])) {
        $city_filter = implode("','", $_POST["City"]);
        $query .= " AND City IN('" . $city_filter . "') ";
    }
    if (isset($_POST["State"])) {
        $state_filter = implode("','", $_POST["State"]);
        $query .= " AND StateName IN('" . $state_filter . "') ";
    }
    

    $statement = $connect->prepare($query);
    $statement-> execute();
    $result = $statement->fetchAll();
    $total_row = $statement->rowCount();
    if ($total_row > 0) {
        foreach($result as $row){
            $output .= '
                                    <div class="col-xs-12 col-sm-6 col-md-6" width="300" height="300">
                                        <!-- .property-item #1 -->
                                        <div class="property-item">
                                            <div class="property--img">
                                                <a href="single-property-detail.php?proid='.$row['ID'].'">
                                                    <img src="propertyimages/'.$row['FeaturedImage'].'" alt="'.$row['PropertyTitle'].'" width="380" height="300">
                                                </a>
                                                <span class="property--status">'.$row['Status'].'</span>
                                            </div>
                                            <div class="property--content">
                                                <div class="property--info">
                                                    <h5 class="property--title">
                                                        <a href="single-property-detail.php?proid='.$row['ID'].'">
                                                            '.$row['PropertyTitle'].'</a>
                                                    </h5>
                                                    <p class="property--location">'.$row['Address'].'&nbsp;
                                                        '.$row['City'].'&nbsp;
                                                        '.$row['StateName'].'&nbsp;
                                                        '.$row['CountryName'].'</p>
                                                    <p class="property--price">₹ '.$row['RentorsalePrice'].'</p>
                                                </div>
                                                <!-- .property-info end -->
                                                <div class="property--features">
                                                    <ul class="list-unstyled mb-0">
                                                        <li><span class="feature">Beds:</span><span class="feature-num">'.$row['Bedrooms'].'</span></li>
                                                        <li><span class="feature">Baths:</span><span class="feature-num">'.$row['Bathrooms'].'</span></li>
                                                        <li><span class="feature">Area:</span><span class="feature-num">'.$row['Area'].'</span></li>
                                                    </ul>
                                                </div>
                                                <!-- .property-features end -->
                                            </div>
                                        </div>
                                    </div>
            ';
        }
    }
    
        
    } else {
        $output = '<td colspan="8"> No record found against this search</td>';
    }
    echo $output;

?>

<!-- Loader.gif -->
<style>
    #loading {
        text-align: center;
        background: url('assets/loader.gif') no-repeat center;
        height: 150px;

    }
</style>
<!-- filter data function -->
