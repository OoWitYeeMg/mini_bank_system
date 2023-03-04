<?php
include('../layout/all.php');
include('../layout/header.php');
?>
<?php
  $Statenumber = $_POST['statenumber'];
 $takeplace = "select long_district from nrcs where state_number_en='$Statenumber'";
 $query2 = mysqli_query($con, $takeplace);
 $id=$_POST['RegisterID'];
 $query3="select * from register";
 
 while ( $dis=mysqli_fetch_assoc($query2)
  ) {
    $output .='<option value="' . $dis['long_district'] . '">' . $dis['long_district'] . '</option>' ;
} 
echo $output;
?>