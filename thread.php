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

<section class="text-gray-500 bg-gray-900 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap -m-4">
      <div class="p-4 md:w-3/4 w-full">
        <div class="h-full bg-gray-800 p-8 rounded">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-600 mb-4" viewBox="0 0 975.036 975.036">
            <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
          </svg>
          <a class="inline-flex items-center">
            <?php echo'<img src="img/' .$cat_th_id. '.png" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">';?>
            <span class="flex-grow flex flex-col pl-4">
              <span class="title-font font-medium text-white"><?php echo $th_name;?></span>
              <span class="text-gray-600 text-sm">UI DEVELOPER</span>
            </span>
          </a>
          <p class="leading-relaxed mb-6 px-6 text-green-500"><?php echo $th_desc;?></p>
          
        </div>
      </div>
      
    </div>
    <div class="flex flex-col px-20 py-20 w-full mb-15">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-white">Discussions</h1>
    </div>
    <div class="flex relative pb-10 sm:items-center md:w-2/3 mx-auto">
      <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
        <div class="h-full w-1 bg-gray-800 pointer-events-none"></div>
      </div>
      <div class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-indigo-500 text-white relative z-10 title-font font-medium text-sm">1</div>
      <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
        <div class="flex-shrink-0 w-24 h-24 bg-gray-800 text-indigo-400 rounded-full inline-flex items-center justify-center">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-12 h-12" viewBox="0 0 24 24">
            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
        </div>
        <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
          <h2 class="font-medium title-font text-white mb-1 text-xl">Neptune</h2>
          <p class="leading-relaxed">VHS cornhole pop-up, try-hard 8-bit iceland helvetica. Kinfolk bespoke try-hard .</p>
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