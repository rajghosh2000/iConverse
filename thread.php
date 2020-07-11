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

    $id = $_GET['thread_id'];

     $sql = "SELECT * FROM `thread` WHERE thread_id=$id";
     $res = mysqli_query($con,$sql);
    
     // <!-- Use a for loop to iterate through the categories -->

     while($row = mysqli_fetch_assoc($res))
     {
          $th_name = $row['thread_title'];
          $th_desc = $row['thread_info'];
          $cat_th_id = $row['thread_cat_id'];
     }
    
    
    ?>


    <?php
        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method =='POST')
        {
            $ans = $_POST['cmt'];
            $sql2 = "INSERT INTO `answers` (`ans_info`, `ans_thread_id`, `ans_by`, `ans_time`) VALUES ('$ans', '$id', '0', current_timestamp());";
            $res2 = mysqli_query($con,$sql2);
            $showAlert = true;
            if($showAlert)
            {
                echo '<div class="flex items-center bg-green-500 text-blue-900 text-text-2xl font-bold px-4 py-16" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p ><strong>SUCCESS!!!!!  </strong>Reply added.</p>
              </div>'; 
            }
           
        }
    ?>


    <section class="text-gray-500 bg-gray-900 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                <div class="p-4 md:w-3/4 w-full">
                    <div class="h-full bg-gray-800 p-8 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="block w-5 h-5 text-gray-600 mb-4" viewBox="0 0 975.036 975.036">
                            <path
                                d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z">
                            </path>
                        </svg>
                        <a class="inline-flex items-center">
                            <?php echo'<img src="img/' .$cat_th_id. '.png" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">';?>
                            <span class="flex-grow flex flex-col pl-4">
                                <span class="title-font font-medium text-white"><?php echo $th_name;?></span>
                                <span class="text-gray-600 text-sm">UI DEVELOPER</span>
                            </span>
                        </a>
                        <p class="leading-relaxed mb-6 px-16 text-green-500"><?php echo $th_desc;?></p>

                    </div>
                </div>

            </div>
            <?php
            if(isset($_SESSION['signedIn']) && $_SESSION['signedIn']==true)
            {
                  echo'  <div class="lg:w-1/2 md:w-2/3 border-b pb-10 mb-10 border-gray-800 mx-auto">
                        <form action=" '.$_SERVER['REQUEST_URI'] .' " method="post">
                            <div class="flex flex-wrap -m-2">
                                <div class="flex flex-col px-1 p-4 w-full mb-15">
                                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-white">Add Your Reply</h1>
                                </div>
                                <div class="w-full">
                                    <textarea
                                        class="w-full bg-gray-800 rounded border border-gray-700 text-white focus:outline-none h-48 focus:border-indigo-500 text-base px-2 py-2 resize-none block"
                                        placeholder="Your Reply" name="cmt" id="cmt"></textarea>
                                </div>
                                <div class="p-2 w-full">
                                    <button type="submit"
                                        class="flex mx-auto text-blue-900 font-bold bg-green-500 border-0 py-3 px-10 focus:outline-none hover:bg-green-600 rounded text-lg">Post
                                        Your Comment</button>
                                </div>

                            </div>
                        </form>
                    </div>';
            }
            else{
                echo '<div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-2xl text-2xl font-medium title-font py-10 mb-4 text-green-400">Ask your Query</h1>
                <h3 class="sm:text-2xl text-2xl font-medium  py-2 mb-4 text-blue-500">USER NOT LOGGED IN PLEASE LOG IN !!!</h1>
            </div>';
            }
            ?>
            <div class="flex flex-col px-20 py-20 w-full mb-15">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-white">Discussions</h1>
            </div>

            <?php
              $sql1 = "SELECT * FROM `answers` WHERE ans_thread_id=$id";
              $res1 = mysqli_query($con,$sql1);
              $noAns = true;
              $cnt=0;
              // <!-- Use a for loop to iterate through the categories -->
         
              while($row = mysqli_fetch_assoc($res1))
              {
                   $noAns = false;
                   $ans_info = $row['ans_info'];
                   $ans_id = $row['ans_id'];
                   $ans_time = $row['ans_time'];
                   $cnt = $cnt + 1;
                   echo '<div class="flex relative pb-10 sm:items-center md:w-2/3 mx-auto">
                   <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
                       <div class="h-full w-1 bg-gray-800 pointer-events-none"></div>
                   </div>
                   <div
                       class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-indigo-500 text-white relative z-10 title-font font-medium text-sm">
                       '.$cnt.'</div>
                   <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
                       <div
                           class="flex-shrink-0 w-24 h-24 bg-gray-800 text-indigo-400 rounded-full inline-flex items-center justify-center">
                           <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                               stroke-width="2" class="w-12 h-12" viewBox="0 0 24 24">
                               <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                               <circle cx="12" cy="7" r="4"></circle>
                           </svg>
                       </div>
                       <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                           <h2 class="font-medium title-font text-white mb-1 text-xl">RAJ  <span class ="text-base text-green-500">at '.$ans_time.'</span></h2>
                           <p class="leading-relaxed">'.$ans_info.'</p>
                       </div>
                   </div>
               </div>';
              }

              if($noAns)
              {
                echo '<div class="flex relative pb-10 sm:items-center md:w-2/3 mx-auto">
                <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
                    <div class="h-full w-1 bg-gray-800 pointer-events-none"></div>
                </div>
                <div
                    class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-indigo-500 text-white relative z-10 title-font font-medium text-sm">
                    0</div>
                <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
                    <div
                        class="flex-shrink-0 w-24 h-24 bg-gray-800 text-indigo-400 rounded-full inline-flex items-center justify-center">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-12 h-12" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                        <p class="leading-relaxed">No answers yet. Go up and be the first to comment. </p>
                    </div>
                </div>
            </div>';
              }
              
          ?>


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

<!-- <div class="p-5 lg:w-1/2 md:w-full">
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
                        <h2 class="text-white text-lg title-font font-medium mb-3"><</h2>
                        <p class="leading-relaxed text-green-500 text-base"></p>
                        <p class="mt-3 text-indigo-500 inline-flex items-center"><b>Posted By ABC
                        </b>
                        </p>
                        
                    </div>
                </div>
                <p class="w-10 h-10"><hr/></p>
            </div>
          
            <div class="flex flex-col px-24 py-3 w-full mb-15">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-white">Discussions</h1>
            </div>
        </div> -->