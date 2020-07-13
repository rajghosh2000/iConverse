<!-- Contact Page -->

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
    <?php include 'partials/_footer.php';?>




    <section class="text-gray-500 bg-gray-900 body-font relative">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Contact Me</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Our API will always be there with you for help</p>
            </div>
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <div class="flex flex-wrap -m-2">
                    <div class="p-2 w-1/2">
                        <input
                            class="w-full bg-gray-800 rounded border border-gray-700 text-white focus:outline-none focus:border-indigo-500 text-base px-4 py-2"
                            placeholder="Name" type="text">
                    </div>
                    <div class="p-2 w-1/2">
                        <input
                            class="w-full bg-gray-800 rounded border border-gray-700 text-white focus:outline-none focus:border-indigo-500 text-base px-4 py-2"
                            placeholder="Email" type="email">
                    </div>
                    <div class="p-2 w-full">
                        <textarea
                            class="w-full bg-gray-800 rounded border border-gray-700 text-white focus:outline-none h-48 focus:border-indigo-500 text-base px-4 py-2 resize-none block"
                            placeholder="Message"></textarea>
                    </div>
                    <div class="p-2 w-full">
                        <button
                            class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Send</button>
                    </div>
                    <div class="p-2 w-full pt-8 mt-8 border-t border-gray-800 text-center">
                        <a class="text-indigo-500">rajghosh2507@gmail.com</a>
                        <p class="leading-normal my-5">Rajdeep Ghosh
                            <br>NMH Tezpur University , Napaam, Tezpur
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>




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