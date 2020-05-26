<html>
<head>
<style>

table, tr, th, td{
border-collapse:collapse;
border:1px solid #CCC;
}

</style>
</head>
<body>

<?php  
//export.php  
// $connect = mysqli_connect("localhost", "nnnsc_dst", "Poonamallee", "nnnsc_loginsystem");
session_start();
include'dbconnection.php';
if (strlen($_SESSION['id']==0)) 
{
    header('location:dilogout.php');
} 
$output = '';
if(isset($_POST["Sales"]))
{
 $trandate="{$_POST['date']}";
 $range = "{$_POST['RangeName']}";
 $diid = "{$_SESSION['id']}";
 if ($range === "9999") {
    $query = "Select M.TranDate, concat(U.PName, '\r\n', U.PAdd1, '\r\n', U.Padd2, '\r\n', U.PAdd3, '\r\n', U.PPin) as PN, U.PPhone, D.MDName, D.MDQty, M.DstMstNo, concat(M.PtName, '\r\n', M.PtAdd, '\r\n', M.PtPhone) as CN, M.DrName FROM users U, DstMst M, DstDtl D, ranges R, DIMaster DI, DIVsRange DV WHERE DV.DIId = DI.DIId AND DV.RangeId = R.RangeId AND U.RangeId = R.RangeId AND M.UserId = U.UserId AND D.DstMstNo = M.DstMstNo AND DI.DIId = $diid AND M.TranDate = '$trandate'";
 }
 else {
    $query = "Select M.TranDate, concat(U.PName, '\r\n', U.PAdd1, '\r\n', U.Padd2, '\r\n', U.PAdd3, '\r\n', U.PPin) as PN, U.PPhone, D.MDName, D.MDQty, M.DstMstNo, concat(M.PtName, '\r\n', M.PtAdd, '\r\n', M.PtPhone) as CN, M.DrName FROM users U, DstMst M, DstDtl D, ranges R, DIMaster DI, DIVsRange DV WHERE DV.DIId = DI.DIId AND DV.RangeId = R.RangeId AND U.RangeId = R.RangeId AND M.UserId = U.UserId AND D.DstMstNo = M.DstMstNo AND DI.DIId = $diid AND R.RangeId = $range AND M.TranDate = '$trandate'";
 }
// $query = "Select M.TranDate, U.PName, U.Padd1, U.PAdd2, U.PAdd3, U.PPin, U.PPhone, D.MDName, D.MDQty, M.DstMstNo, M.PtName, M.PtAdd, M.PtPhone, M.DrName FROM users U, DstMst M, DstDtl D, ranges R, DIMaster DI, DIVsRange DV WHERE DV.DIId = DI.DIId AND DV.RangeId = R.RangeId AND U.RangeId = R.RangeId AND M.UserId = U.UserId AND D.DstMstNo = M.DstMstNo AND DI.DIId = 1 AND M.TranDate = '$trandate'"; 

 $result = mysqli_query($con, $query);
    
 if(mysqli_num_rows($result) > 0)
 {
    $query = "Select * from DIVsDate WHERE DIId = $diid ";
    $res1 = mysqli_query($con, $query);
       
    if(mysqli_num_rows($res1) > 0)
    {
        // echo "Query1 True";
       $r1 = mysqli_fetch_array($res1);
       if ($r1['DateCompleted'] < $trandate)
       {
        //    echo "Query1 CONDITION True";
           $res2 = mysqli_query($con,"Update DIVsDate set DateCompleted = '$trandate'");
           $res4 = mysqli_query($con, "Update DstMst set Processed = 1 WHERE TranDate = '$trandate' AND UserId in (Select U.UserId from Users U, Ranges R, DIVsRange D WHERE U.RangeId = R.RangeId AND R.RangeId = D.RangeId AND D.DIId = $diid)");
       }
    }
    else
    {
    //    echo "Query1 False";
       $query = "Insert into DIVsDate(DIId, DateCompleted) values($diid, '$trandate')";
       echo $query;
        $res3 = mysqli_query($con, $query);
        $query = "Update DstMst set Processed = 1 WHERE TranDate = '$trandate' AND UserId in (Select U.UserId from Users U, Ranges R, DIVsRange D WHERE U.RangeId = R.RangeId AND R.RangeId = D.RangeId AND D.DIId = $diid)";
        echo $query;
        $res4 = mysqli_query($con, $query);
    }
    
  $output .= '

    <table>
        <tr style="font-size:30px">
        <td style="background-color:#c9d0d4" colspan = 7><b><center>TRACKING OF DRUG SALES</center></b></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>

        <tr style="font-size:20px">
        <td colspan="7"><b><center>Paracetamol, Cough and expectorant Formulations, HCQS and Azithromycin Formulations</center></b></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>

        <tr>  
        <th>S.No</th>
        <th>Date of Sale</th>  
        <th>Name and address of the medical shop</th>  
        <th>Name of the drug</th>  
        <th>Quantity issued</th>
        <th>Patient contact details with Mobile No</th>
        <th>Prescriber name and address</th>
        </tr>';
        $olddstno = 0;
        $curdstno = 0;
        $cnt=1;
        while($row = mysqli_fetch_array($result))
        {
            // echo $curdstno;
            $curdstno = $row['DstMstNo'];
            // echo "Inside while loop ";
            // echo $curdstno;
            if($olddstno === $curdstno)
            {
                $output .= '
                <tr>
                    <td></td>
                    <td></td>  
                    <td></td>  
                    <td>'.$row["MDName"].'</td>  
                    <td>'.$row["MDQty"].'</td>  
                    <td></td>
                    <td></td>
                </tr>';
            }
            else
            {
                $output .= '
                <tr></tr>
                <tr>  

                    <td>'.$cnt.'</td>
                    <td >'.$row["TranDate"].'</td>  
                    <td >'.$row["PN"].'</td>  
                    <td >'.$row["MDName"].'</td>  
                    <td >'.$row["MDQty"].'</td>  
                    <td >'.$row["CN"].'</td>
                    <td >'.$row["DrName"].'</td>
                </tr>
                ';
                $cnt=$cnt+1; 
            }
            $olddstno = $curdstno;
            
        }
  
    $olddstno = 0 ;
    $curdstno = 0 ;
    $output .= '</table>';
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=download.xls');
    echo $output;
 

 }
 else
 {
    echo "<center><font size = 25>**No Sales data for the selected date**</font></center>";

    echo"<br><br><center><font size = 30><a class='' href='javascript:history.back(1)'>Go Back</a></font></center>";
   
 }
}
?>
</body>
</html>
