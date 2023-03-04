<?php
include('../layout/all.php');
include('../layout/header.php');
?>
<?php
  $RegisterID = $_POST['RegisterID'];
  $takeplace = "SELECT * from register inner join account on register.RegisterID=account.RegisterID
   where account.AccountID='$RegisterID'";
//  $takeplace = "select Name from register where RegisterID='$RegisterID'";

 $query2 = mysqli_query($con, $takeplace);
//  $id=$_POST['RegisterID'];
//  $query3="select * from register";
 
 while ( $dis=mysqli_fetch_assoc($query2)
  ) {
    $output .='<option value="' . $dis['AccountType'] . '">' . $dis['AccountType'] . '</option>' ;
} 
echo $output;
?>