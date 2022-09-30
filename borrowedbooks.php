<?php
   require 'includes/snippet.php';
   require 'includes/db-inc.php';
   include "includes/header.php";
   include "includes/nav.php";
?>

<div class="container">
   <!-- navbar ends -->
   <!-- info alert -->
   <div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">
      <span class="glyphicon glyphicon-book"></span>
      <strong>Currently Issued books to students</strong>
   </div>
</div>
<div class="container">
   <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">
         <div class="row">
            <a href="lendbook.php"><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px"><span class="glyphicon glyphicon-plus-sign"></span> Lend Book</button></a>
         </div>
      </div>
      <table class="table table-bordered">
         <thead>
            <tr>
               <th>S.No</th>
               <th>Book Id</th>
               <th>Book Title</th>
               <th>Issue Date</th>
               <th>Student ID</th>
               <th>Actions</th>
               <!-- <th>Actions</th> -->
            </tr>
         </thead>
         <?php
            // $sql = "SELECT * FROM borrow"; 	
            $sql = "SELECT borrow.borrowDate, borrow.studentId,
            books.bookId ,books.bookTitle FROM borrow 
            LEFT JOIN books ON borrow.bookId = books.bookId"; 	
            
            $query = mysqli_query($conn, $sql);
            $counter =1;
            	while($row = mysqli_fetch_array($query)){
            		
         ?>
         <tbody>
            <tr>
               <td><?php echo $counter++; ?></td>
               <td><?php echo $row['bookId'];?></td>
               <td><?php echo $row['bookTitle'];?></td>
               <td><?php echo $row['borrowDate']; ?></td>
               <td><?php echo $row['studentId']; ?></td>
               <td>
                  <a href="delete_query.php?bookId=<?php echo $row['bookId']?>"> <button class="btn btn-info" data-toggle="modal" >Return</button></a>
               </td>
               <!-- <td><a href="lendbook.php"> <button class="btn btn-success ">Lend Now</button></a></td> -->
            </tr>
         </tbody>
         <?php }
            ?>
      </table>
      <br>	         
   </div>
</div>

<?php include 'includes/footer.php'; ?>
