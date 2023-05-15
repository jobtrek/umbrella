<?php require "./header.php";
?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style type="text/css">
            .text-9xl{
                font-size: 14rem;
            }
            @media(max-width: 645px){
                .text-9xl{
                    font-size: 5.75rem;
                }
                .text-6xl{
                    font-size: 1.75rem;
                }
                .text-2xl {
                    font-size: 1rem;
                    line-height: 1.2rem;
                }
                .py-8 {
                    padding-top: 1rem;
                    padding-bottom: 1rem;
                }
                .px-6 {
                    padding-left: 1.2rem;
                    padding-right: 1.2rem;
                }
                .mr-6{
                    margin-right: 0.5rem;
                }
                .px-12 {
                    padding-left: 1rem;
                    padding-right: 1rem;
                }
            }
        </style>
    </head>
    <body>
    <div class="bg-gradient-to-r from-primary to-secondary">
        <div class="w-9/12 m-auto py-16 min-h-screen flex items-center justify-center">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg pb-8">
                <div class="border-t border-gray-200 text-center pt-8">
                    <h1 class="text-9xl font-bold text-primary">404</h1>
                    <h1 class="text-6xl font-medium py-8">oops! Page not found</h1>
                    <p class="text-2xl pb-8 px-12 font-medium">Oops! The page you are looking for does not exist. It might have been moved or deleted.</p>
                    <button class="bg-gradient-to-r from-purple-400 to-blue-500 hover:from-pink-500 hover:to-orange-500 text-white font-semibold px-6 py-3 rounded-md mr-6">
                        <a href="index.php">HOME</a>
                    </button>

                </div>
            </div>
        </div>
    </div>
    </body>
    </html>

<?php require "./footer.php";
?>