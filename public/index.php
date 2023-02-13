<?php
require "../vendor/autoload.php";

//pour la key of API
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

require "../src/conn_api.php";
require "../src/conn_db.php";

require "./header.php";
?>

    <div class="form-control">
        <h1 class="mb-10 mt-10 ml-10 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-10xl lg:text-6xl">
            Trouvez une <p>Activité avec </p>
            <p class="text-secondary">La Météo</p></h1>

        <form action="index.php" method="GET">
            <div class="input-group ml-10">
                <input type="text" name="city" id="city" placeholder="Recherche par lieu" class="input input-bordered"
                />
                <label for="city"></label>
                <button type="submit" name="submit" class="btn btn-square bg-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </div>

        </form>
        <video class="w-96 loop autoplay src=" .
        /images/video%20(2).mp4"></video>
    </div>

<?php require "./footer.php" ?>