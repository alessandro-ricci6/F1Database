<!-- Div with database info (Number of driver, team, season, races...) -->
<main class="float-end d-flex flex-column justify-content-center align-items-center">
    <div class="infoDivHome">
        <div class="container d-flex justify-content-center text-center">
                <img src="./svg/f1.svg" alt="F1 logo">
                <h1>Database informations</h1>
            <div class="statContainer row column-gap-3 mx-2 mt-4">
                <div class="border border-2  border-dark-subtle rounded col">
                    <h2 class="pt-2">Driver</h2>
                    <img class="py-3" src="./svg/helmet.svg" alt="Driver helmet icon">
                    <p class="fs-3"><?php echo $db->getNumberOfDriver() ?></p>
                </div>
                <div class="border border-2  border-dark-subtle rounded col">
                    <h2 class="pt-2">Team</h2>
                    <img class="py-3" src="./svg/formula-1.svg" alt="F1 car icon">
                    <p class="fs-3"><?php echo $db->getNumberOfTeam() ?></p>
                </div>
                <div class="border border-2  border-dark-subtle rounded col">
                    <h2 class="pt-2">Races</h2>
                    <img class="py-3" src="./svg/two-motor-flags.svg" alt="Checkered flags icon">
                    <p class="fs-3"><?php echo $db->getNumberOfRaces() ?></p>
                </div>
                <div class="border border-2  border-dark-subtle rounded col">
                    <h2 class="pt-2">Season</h2>
                    <img class="py-3" src="./svg/trophy.svg" alt="Trophy icon">
                    <p class="fs-3"><?php echo $db->getNumberOfChampionship() ?></p>
                </div>
            </div>
        </div>
    </div>
</main>