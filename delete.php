<?php
include 'conn.php';


if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];
    $query1="SELECT * from employeemaster where Id='$id'";
    $data=mysqli_query($conn,$query1);
    $data1=mysqli_fetch_assoc($data);
    if($data1==true){
        $ecc=$data1['EmpCode'];
        $fn=$data1['FirstName'];
        $ln=$data1['LastName'];
        $dep=$data1['Department'];
        $des=$data1['Designation'];
        $ph=$data1['Phone'];
        $st=$data1['Status'];
        $query2 = "INSERT INTO `ondeleteemployeemaster`( `EmpId`, `EmpCode`, `FirstName`, `LastName`, `Department`, `Designation`, `Phone`, `Status`) VALUES ('$id','$ecc','$fn','$ln','$dep','$des','$ph','$st')";
        $data2 = mysqli_query($conn,$query2);

        if($data2==true){
            $query = "DELETE  FROM employeemaster WHERE Id='$id'";
            $query_run = mysqli_query($conn, $query);
        }
    }


    if($query_run)
    {
        echo '<script> alert("Employee sent to trash successfully"); </script>';
     
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>