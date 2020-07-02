<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <title>iConverse</title>
</head>

<body>

    <?php include 'partials/_header.php';?>
    <?php include 'partials/_dbconnect.php'?>

    <!-- Slider Starts here -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>

        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/Forum-Web/img/144.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/Forum-Web/img/244.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/Forum-Web/img/344.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/Forum-Web/img/141.jpeg" class="d-block w-100" alt="...">
            </div> -->
            <div class="carousel-item">
                <img src="/Forum-Web/img/142.jpeg" class="d-block w-100" alt="...">
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <section class="text-gray-500 bg-gray-900 body-font">
        <div class="container px-5 py-0 mx-auto flex flex-wrap">
            <div class="flex flex-col text-center w-full mb-15" style="padding-top: 75px">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-white">CATELOGS</h1>
            </div>
    </section>

    <!-- Categories Container starts here-->

    <section class="text-gray-500 bg-gray-900 body-font">
        <div class="container-fluid px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">

                <!-- Fetch all the categories from database -->

                <?php 
                $sql = "SELECT * FROM `category`";
                $res = mysqli_query($con,$sql);
               
                // <!-- Use a for loop to iterate through the categories there -->

                while($row = mysqli_fetch_assoc($res))
                {
                  // echo $row['cat_name'];
                  $name = $row['cat_name'];
                  $info = $row['cat_info'];
                  $id = $row['cat_id'];
                  
                    echo' <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                            <a class="block relative h-48 rounded overflow-hidden">
                                <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                                    src="img/'.$id.'a.png">
                            </a>
                            <div class="mt-4">
                                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">'. $name .'</h3>
                                <h2 class="text-white title-font text-lg font-medium">' . substr($info, 0, 32) .'....</h2>
                              
                                <button type="button" class="btn btn-outline-success btn-sm my-2"><a href="threads_list.php?category_id='. $id .'">Let\'s Explore</button>
                            </div></a>
                          </div> ';
                }

                ?>








            </div>
        </div>
    </section>

    <hr>


    </div>

    <?php include 'partials/_footer.php';?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>