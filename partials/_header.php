<?php

session_start();



echo' 
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
<a class="navbar-brand" href="/Forum-Web" >i<span style="color:#008000 ;font-weight: bold">Converse</span></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link" href="/Forum-Web">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

        $sql = "SELECT * FROM `category`";
        $res = mysqli_query($con,$sql);
       
        // <!-- Use a for loop to iterate through the categories -->
   
        while($row = mysqli_fetch_assoc($res))
        {
            $catid = $row['cat_id'];
            echo '<a class="dropdown-item" href="threads_list.php?category_id='.$catid.'">'.$row['cat_name'].'</a>';
        }
        echo '</div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact-Me</a>
    </li>
    </ul>
    <div class="row mx-2">';

    if(isset($_SESSION['signedIn']) && $_SESSION['signedIn']==true)
{
    echo '<form class="form-inline my-2 my-lg-0 method="get" action="search.php"">
    <input class="form-control mr-sm-2" name = "search" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

    <p class="text-white px-5 py-1"> Welcome '. $_SESSION['useremail'].'</p>
    <a href ="partials/_logout.php" type="button" class="btn btn-outline-success ml-2" >Logout</a>

    </form>';
}

    else{
        echo '<form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
                <button type="button" class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#singinModal">SIGN IN</button>
                <button type="button" class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#singupModal">SIGN UP</button>';

        }


    echo '</div>
    
</div>
</nav>';

include 'partials/_signinModal.php';
include 'partials/_signupModal.php';


if(isset($_GET['signUpSuccess']) && $_GET['signUpSuccess']=="true")
{
    
    echo '<div class="alert alert-success alert-dismissible fade show py-16 my-0" role="alert">
    <strong>Success!</strong> You can login now.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

?>