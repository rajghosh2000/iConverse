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

    <title>Welcome to iConverse</title>
</head>

<body>

    <?php include 'partials/_header.php';?>
    <?php include 'partials/_dbconnect.php'?>
    <?php

    $id = $_GET['thread_id'];

     $sql = "SELECT * FROM `thread` WHERE thread_id=$id";
     $res = mysqli_query($con,$sql);
    
     // <!-- Use a for loop to iterate through the categories -->

     while($row = mysqli_fetch_assoc($res))
     {
          $th_name = $row['thread_title'];
          $th_desc = $row['thread_info'];
     }
    
    
    ?>

    <section class="text-gray-400 bg-gray-900 body-font">
        <div class="container-fluid px-10 py-24 mx-auto flex flex-wrap">
            <div class="p-4 lg:w-1/2 md:w-full">
                <div class="flex border-2 rounded-lg border-gray-800 p-20 sm:flex-row flex-col">
                    <div
                        class="w-20 h-20 sm:mr-8 sm:mb-0 mb-10 inline-flex items-center justify-center rounded-full bg-gray-800 text-indigo-400 flex-shrink-0">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <div class="flex-grow">
                        <h2 class="text-white text-lg title-font font-medium mb-3">The Catalyzer</h2>
                        <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast
                            vegan taxidermy. Gastropub indxgo juice poutine.</p>
                        <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>




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