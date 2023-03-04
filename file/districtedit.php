<?php
include('../layout/all.php');
include('../layout/header.php');

?>
<?php

$Statenumber = $_POST['Statenumber'];
 $takeplace = "select long_district from nrcs where state_number_en='$Statenumber'";
$query2 = mysqli_query($con, $takeplace);
echo $id = $_POST['RegisterID'];

 $query3 = "select * from register where RegisterID='$id'";
 $query4 = mysqli_query($con, $query3);
$query5=mysqli_fetch_array($query4);
if (mysqli_num_rows($query2) > 0) {
    while ($short_district = mysqli_fetch_assoc($query2)) {
        $selected="";
        if ($query5['long_district']==$short_district['long_district']) {
            $selected="selected";
        }
        $output .= '<option value="' . $short_district['long_district'] . '"' . $selected. '>' . $short_district['long_district'] . '</option>';
    }
}
echo $output;
?>
