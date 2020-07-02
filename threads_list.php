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
<style>
hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(65, 131, 215, 1);
}
}
</style>

<body>

    <?php include 'partials/_header.php';?>
    <?php include 'partials/_dbconnect.php'?>
    <?php

    $id = $_GET['category_id'];

     $sql = "SELECT * FROM `category` WHERE cat_id=$id";
     $res = mysqli_query($con,$sql);
    
     // <!-- Use a for loop to iterate through the categories -->

     while($row = mysqli_fetch_assoc($res))
     {
          $catname = $row['cat_name'];
          $catinfo = $row['cat_info'];
     }
    
    
    ?>

    <section class="text-gray-500 bg-gray-900 body-font overflow-hidden">
        <div class="container px-2 py-20 mx-auto">
            <div class="lg:w-4/5 py-10 mx-auto flex flex-wrap">
                <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
                    src="https://source.unsplash.com/1200x400/?catname,programming">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h2 class="text-sm title-font text-gray-600 tracking-widest">Category</h2>
                    <h1 class="text-white text-3xl title-font font-medium mb-1"><?php echo $catname;?></h1>

                    <p class="leading-relaxed"><?php echo $catinfo;?></p>
                    <button class="btn btn-outline-success ml-0 my-3">Learn More</button>

                </div>
            </div>

            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-2xl text-2xl font-medium title-font mb-4 text-white">Ask your Query</h1>
            </div>
            <div class="lg:w-1/2 md:w-2/3 border-b pb-10 mb-10 border-gray-800 mx-auto">
                <div class="flex flex-wrap -m-2">
                    <div class="p-2 w-full">
                        <input
                            class="w-full bg-gray-800 rounded border border-gray-700 text-white focus:outline-none focus:border-indigo-500 text-base px-2 py-2"
                            placeholder="Name" name="nam" id="nam" type="text">
                    </div>
                    <div class="p-2 w-full">
                        <input
                            class="w-full bg-gray-800 rounded border border-gray-700 text-white focus:outline-none focus:border-indigo-500 text-base px-2 py-2"
                            placeholder="Enter a brief title for your query" name="title" id="title" type="text">
                    </div>
                    <div class="p-2 w-full">
                        <textarea
                            class="w-full bg-gray-800 rounded border border-gray-700 text-white focus:outline-none h-48 focus:border-indigo-500 text-base px-2 py-2 resize-none block"
                            placeholder="Enter your desc" name="desc" id="desc"></textarea>
                    </div>
                    <div class="p-2 w-full">
                        <button
                            class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-10 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
                    </div>
                </div>
            </div>
             
                <?php

                $id = $_GET['category_id'];

                $sql = "SELECT * FROM `thread` WHERE thread_cat_id = $id";
                $res = mysqli_query($con,$sql);
                $noData = true;
                // <!-- Use a for loop to iterate through the categories -->

                while($row = mysqli_fetch_assoc($res))
                {
                    $noData = false;
                    $th_title = $row['thread_title'];
                    $th_info = $row['thread_info'];
                    $th_id = $row['thread_id'];
                   
                   echo' <div class="flex items-center py-10 lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-800 sm:flex-row flex-col">
                <div
                    class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full text-indigo-400 bg-gray-800 flex-shrink-0">

                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="sm:w-16 sm:h-16 w-10 h-10" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-5 mt-6 lg:mt-0">
                    <h2 class="text-white text-lg title-font font-medium mb-0"><a href="thread.php?thread_id='.$th_id.'">'.$th_title.'</a></h2>
                    <p class="leading-relaxed text-base py-3">'.$th_info.'</p>
                </div>
            </div>';
                }
                if($noData)
                {
                   echo '<p class="lg:w-2/3 mx-auto leading-relaxed text-base">No questions yet be the first one to ask</p>
                   '; 
                }
            ?>

                <!-- <div class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-800 sm:flex-row flex-col">
                <div
                    class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full text-indigo-400 bg-gray-800 flex-shrink-0">

                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="sm:w-16 sm:h-16 w-10 h-10" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h2 class="text-white text-lg title-font font-medium mb-0">Shooting Stars</h2>
                    <p class="leading-relaxed text-base py-3">Blue bottle crucifix vinyl post-ironic four dollar toast
                        vegan
                        taxidermy. Gastropub indxgo juice poutine.</p>
                </div>
            </div> -->
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