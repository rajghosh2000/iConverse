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
    <?php include 'partials/_dbconnect.php'?>
    <?php include 'partials/_header.php';?>




    <!--Search Results here-->
    <section class="text-gray-500 bg-gray-900 body-font">
        <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-20 py-12">
                <h2 class="text-xs text-orange-500 tracking-widest font-medium title-font mb-1">Search Results for :
                </h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-green-400"><?php echo $_GET['search'] ?>
                </h1>
        </div>
            <?php
                 $que = $_GET['search'];
                 $sql = "SELECT * FROM `thread` WHERE MATCH (thread_title,thread_info) against ('$que')";
                $res = mysqli_query($con,$sql);
                $noData = true;
        // <!-- Use a while loop to iterate through the searches -->
        while($row = mysqli_fetch_assoc($res))
        {
            $noData = false;
            $th_title = $row['thread_title'];
            $th_info = $row['thread_info'];
            $th_id = $row['thread_id'] ;         
           
            echo '<div class="flex items-center lg:w-3/5 mx-auto sm:flex-row flex-col border-b pb-10 mb-10 border-gray-800">
                <div
                    class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full text-orange-400 bg-gray-800 flex-shrink-0">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="sm:w-16 sm:h-16 w-10 h-10" viewBox="0 0 24 24">
                        <circle cx="6" cy="6" r="3"></circle>
                        <circle cx="6" cy="18" r="3"></circle>
                        <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                    </svg>
                </div>
                <div class="flex-grow sm:text-left text-justify mt-6 sm:mt-0">
                    <h2 class="text-white text-lg title-font font-medium mb-2"> ' . $th_title . ' </h2>
                    <p class="leading-relaxed text-base ">' . $th_info . ' </p>
                    <a class="mt-3 text-green-500 inline-flex items-center" href="thread.php?thread_id=' . $th_id .'">Learn More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>';
        }

        if($noData)
        {
            echo '<div class="flex items-center lg:w-3/5 mx-auto sm:flex-row flex-col border-b pb-10 mb-10 border-gray-800">
            <div
                class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full text-orange-400 bg-gray-800 flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" class="sm:w-16 sm:h-16 w-10 h-10" viewBox="0 0 24 24">
                    <circle cx="6" cy="6" r="3"></circle>
                    <circle cx="6" cy="18" r="3"></circle>
                    <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                </svg>
            </div>
            <div class="flex-grow sm:text-left text-justify mt-6 sm:mt-0">
                <h2 class="text-white text-lg title-font font-medium mb-2">Error 404</h2>
                <p class="leading-relaxed text-xl ">No Results Found !!!!!!</p>
            </div>
        </div>'; 
        }
    ?>
            
            <div class="flex flex-wrap -m-4 py-10">
                <div class="p-4 lg:w-1/4 sm:w-1/2 w-full">
                    <h2 class="font-medium title-font tracking-widest text-white mb-4 text-sm text-center sm:text-left">
                        Other Also Search for :</h2>
                    <nav class="flex flex-col sm:items-start sm:text-left text-center items-center -mb-1">

                </div>
                <div class="p-4 lg:w-1/4 sm:w-1/2 w-full">

                    <nav class="flex flex-col sm:items-start sm:text-left text-center items-center -mb-1">

                    <?php

                        
                        $sql = "SELECT * FROM `category`order by RAND() limit 5";
                        $res = mysqli_query($con,$sql);
                        $alrt = true;
                    
                        // <!-- Use a for loop to iterate through the categories -->
                
                        while($row = mysqli_fetch_assoc($res))
                        {
                            $catid = $row['cat_id'];
                            $title = $row['cat_name']; 
                            echo '<a class="mb-2" href="threads_list.php?category_id='.$catid.'">
                            <span
                                class="bg-gray-800 text-orange-400 w-4 h-4 mr-2 rounded-full inline-flex items-center justify-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </span> '. $title .'
                            </a>';
                        }
                    ?>
                    </nav>
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