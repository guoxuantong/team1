<?php
/**
 * Created by PhpStorm.
 * User: FEI
 * Date: 2019-05-10
 * Time: 19:27
 */
header("Content-Type:text/html;charset=utf-8");
require('database.php');
session_start();
if(isset($_SESSION['User']) && $_SESSION['User'] != null){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Userhome</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/user.css">
    <script type="text/javascript" src="../js/manager.js"></script>
    <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.ssd-vertical-navigation.min.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>

</head>
<body>
<header>
    <div class="logo">
        <a href="https://www.teamdurham.com/"><img src="../images/teamdurham.png" height="77" width="78" /></a>
    </div><!-- end logo -->
    <div id="menu_icon"></div>
    <nav>
        <ul>
          <?php  if($_SESSION ['User']['role'] == '0'){
           echo" <li><a href='user.php'>Personal Profile</a></li>";
            echo"  <li><a href='BookingList.php'>Booking List</a></li>";
          }else{
              echo"  <li><a href='adminBookingManagement.php'>Admin Dashboard</a></li>";
         echo"     <li><a href='user.php'>Personal Profile</a></li>";
            echo"  <li><a href='adminFacilityManagement.php'>Facility Management</a></li>";
            echo"   <li><a href='adminEditFacility.php'>Facility Edit</a></li>";
           echo"   <li><a href='adminBookingManagement.php'>Booking Management</a></li>";
              echo"  <li><a href='pages-booking.php'>Add Booking</a></li>";
              echo"  <li><a href='block_booking.php'>Block Booking</a></li>";
          }?>
        </ul>
    </nav><!-- end navigation menu -->
</header><!-- end header -->
<section class="main clearfix">
    <div id="loginsection">
        <p class="logincs"><button class="logoutbtn"><a href="index.php?operate=logout">logout</a></button></p>
        <?php }else{
        header('location:index.php');} ?>
    </div>
    <section class="top">
        <div class="wrapper content_header clearfix">
            <div class="duslogan">
                <p>DURHAM UNIVERSITY SPORT</p>
            </div>
            <div class="logoDU">
                <a href="https://www.teamdurham.com"><img src="../images/dulogowhite.png"  /></a>
            </div>
            <p class="title">
                <a href="userhome.php">Facilities</a> |||| <a href="calendar.php">Calendar</a> |||| <a href="contactpage.php">Contact us</a> |||| <a href="howtouse.php">How to use</a></p>
        </div>
    </section><!-- end top -->



    <!-- ----------------------Start your content from here-------------------------------------------------- -->

            <section class="wrapper">
                <div class="content">
                    <p class="title">Welcome, user <?php echo $_SESSION['User']['username']; ?> </p>
                    <div align="right">
                        <h4>Search the facility</h4>
                        <form name="search" method="post" action="userhome.php">
                            <button type="button">
                                <input type="text" name="searchname" placeholder="input facility name"/>
                                <input type="submit" name="searchbtn" VALUE="Search">
                            </button>
                        </form>
                    </div>

                    <center><h1> Our Facilities </h1></center>

                    <?php
                    $facilityname = filter_input(INPUT_POST, 'searchname', FILTER_SANITIZE_STRING);
                    if (isset($_POST["searchbtn"]) && $_POST["searchbtn"] == "Search" && $facilityname!="") {
                        $pdo = make_database_connection();
                        $sql = "SELECT * FROM facility WHERE facilityName LIKE '%$facilityname%'";
                        $statement = $pdo->query($sql);
                        $row = $statement->fetchAll(PDO::FETCH_ASSOC);
                        if ($row) {
                            foreach ($row as $r) {
                                echo '<div class="cell">';
                                echo '<div class="image"><a href="pages-booking.php"><img src="../images/' . $r['facilityName'] . '.jpg"></a></div>';
                                echo '<div align="center"><table style="width: 220px;text-align: center"><tr>
                    <th style="font-size: 1.8em">' . $r['facilityName'] . '</th>
                    </tr>
                    <tr>
                    <td style="font-size: 1.2em">' . $r['info'] . '</td>
                    </tr></table></div>';
                                echo '</div>';
                            }
                        } else {
                            echo 'This facility is no exist!';
                        }
                    }else{ ?>
                    <div id="showinfo">
                        <div class="show">
                            <p> <?php showfacilities() ?></p>
                            <div class="cell">
                                <div class="image"><img src="../images/other facility.jpg" width="200" height="200"></div>
                                <div align="center">
                                    <table style="width: 220px;text-align: center"><tr>
                                            <th style="font-size: 1.8em">Other facility</th>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 1.2em">We have more other facility</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <?php  } ?>

                    </div>

                </div>

        </div><!-- end content -->
    </section>



    <!-- ----------------------End your content to here-------------------------------------------------- -->



</section><!-- end main -->
<script type="text/javascript">
    $(function() {
        $('#leftNavigation').ssdVerticalNavigation();
    });
</script>


</body>
</html>