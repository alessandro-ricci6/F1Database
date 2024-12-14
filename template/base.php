<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title><?php echo $templateParams['title']; ?></title>
</head>

<body>

    <!-- Menu -->
    <aside class="float-start">
        <div class="flex-shrink-0 p-3 bg-dark" style=" height: 100%;">
            <a href="./index.php"
                class="d-flex align-items-center pb-3 mb-3 link-light text-decoration-none border-bottom">
                <span class="fs-5 fw-semibold">F1Data</span>
            </a>
            <ul class="list-unstyled ps-0">
                <li class="listEl mb-1">
                    <a href="./index.php" class="btn btn-dark d-inline-flex align-items-center rounded border-0"
                        aria-expanded="true">
                        Home
                    </a>
                </li>
                <li class="listEl mb-1">
                    <button class="btn btn-dark btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                        data-bs-toggle="collapse" data-bs-target="#driver-collapse" aria-expanded="false">
                        Driver
                    </button>
                    <div class="collapse px-3" id="driver-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="./driver.php?page=add"
                                    class="link-light d-inline-flex text-decoration-none rounded">Add</a></li>
                            <li><a href="./driver.php?page=list"
                                    class="link-light d-inline-flex text-decoration-none rounded">List</a></li>
                        </ul>
                    </div>
                </li>
                <li class="listEl mb-1">
                    <button class="btn btn-dark btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                        data-bs-toggle="collapse" data-bs-target="#team-collapse" aria-expanded="false">
                        Team
                    </button>
                    <div class="collapse px-3" id="team-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="./team.php?page=add"
                                    class="link-light d-inline-flex text-decoration-none rounded">Add</a></li>
                            <li><a href="./team.php?page=list"
                                    class="link-light d-inline-flex text-decoration-none rounded">List</a></li>
                        </ul>
                    </div>
                </li>
                <li class="listEl mb-1">
                    <button class="btn btn-dark btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                        data-bs-toggle="collapse" data-bs-target="#contract-collapse" aria-expanded="false">
                        Tracks
                    </button>
                    <div class="collapse px-3" id="contract-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="./track.php?page=add"
                                    class="link-light d-inline-flex text-decoration-none rounded">Add</a></li>
                            <li><a href="./track.php?page=list"
                                    class="link-light d-inline-flex text-decoration-none rounded">List</a></li>
                        </ul>
                    </div>
                </li>
                <li class="listEl mb-1">
                    <button class="btn btn-dark btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                        data-bs-toggle="collapse" data-bs-target="#race-collapse" aria-expanded="false">
                        Races
                    </button>
                    <div class="collapse px-3" id="race-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="./race.php?page=add"
                                    class="link-light d-inline-flex text-decoration-none rounded">Add</a></li>
                            <li><a href="./race.php?page=list"
                                    class="link-light d-inline-flex text-decoration-none rounded">List</a></li>
                        </ul>
                    </div>
                </li>
                <li class="listEl mb-1">
                    <button class="btn btn-dark btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                        data-bs-toggle="collapse" data-bs-target="#season-collapse" aria-expanded="false">
                        Season
                    </button>
                    <div class="collapse px-3" id="season-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="./season.php?page=add"
                                    class="link-light d-inline-flex text-decoration-none rounded">Add</a></li>
                            <li><a href="./season.php?page=list"
                                    class="link-light d-inline-flex text-decoration-none rounded">List</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </aside>

    <?php
    if (isset($templateParams['name'])) {
        require $templateParams['name'];
    }
    ?>

</body>

</html>