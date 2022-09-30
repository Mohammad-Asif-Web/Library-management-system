<?php 
session_start();
if (!(isset($_SESSION['auth']) && $_SESSION['auth'] == true)) {
	header("Location: admin.php");
	exit();
}

if (isset($_SESSION['admin'])) {
     $admin = $_SESSION['admin'];
}

// dynamic menu without SQL
$menu = array(
    'admin.php' => 'Home',
    'bookstable.php' => 'Books',
    'users.php' => 'Admins',
    'viewstudents.php' => 'Students',
    'borrowedbooks.php' => 'Issued books',
) ;

$currentPage = basename($_SERVER['REQUEST_URI']) ;

?>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example">
                <span class="sr-only">:</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="admin.php">Library Management System</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example">
            <ul class="nav navbar-nav navbar-right">
                <!-- dynamic menu without sql -->
                <?php 
                if(isset($admin)) { 
                    foreach($menu as $url => $pageText){
                        if($currentPage == $url){
                            $active = "active";
                            echo '<li class='.$active.'><a href='.$url.'>'.$pageText.'</a></li>';
                        } else {
                            $active = "";
                            echo '<li class='.$active.'><a href='.$url.'>'.$pageText.'</a></li>';
                        }
                    }
        
                } ?>
               
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- <li class="active"><a href="admin.php">Home</a></li>
<li class="active"><a href="bookstable.php">Books</a></li>
<li><a href="users.php">Admins</a></li>
<li><a href="viewstudents.php">Students</a></li>
<li><a href="borrowedbooks.php">Issued books</a></li> -->
