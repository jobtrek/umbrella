<?php

require "../vendor/autoload.php";
//phpinfo(INFO_MODULES);

//pour la key of API
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

require "../src/conn_api.php";
require "../src/conn_db.php";

require "./header.php";
?>

    <div class="bg-primary h-screen">
        <div class="flex flex-auto">

            <div class="form-control justify-center ml-72 mt-32">
                <h1 class="mb-10 font-bold leading-none tracking-tight lg:text-8xl text-white ">
                    Trouvez une <p>Activité avec </p>
                    <p class="text-secondary items-center justify-center">La Météo </p>
                </h1>

                <h2 class="mb-10 font-bold leading-none tracking-tight text-white lg:text-3xl">Dans la barre de
                    recherche, entrez le nom d’une ville pour voir <br> sa météo et ses activités
                    adéquates.</h2>

                <form action="index.php" method="GET">
                    <div class="input-group items-center">
                        <input type="text" name="city" id="city" placeholder="Recherche par lieu"
                               class="input input-bordered"
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
                <!--    <div class="">
                    <p class="text-white"><?php /*if ($city_name != null) {
                            echo 'nom de la ville invalide';
                        } */ ?></p>
                </div>-->
            </div>
        </div>
    </div>

<?php require "./footer.php" ?>