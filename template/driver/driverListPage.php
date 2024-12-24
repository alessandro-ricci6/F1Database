<main class="float-end d-flex align-items-center flex-column overflow-auto text-center px-4">
    <?php
    $nationalities = $db->getDriverNationalities();
    $drivers = $db->getAllDriver();
    $winsDriver = $db->getAllDriverWins();
    $partDriver = $db->getDriverRaceParticipation();
    $poleDriver = $db->getDriverWithMostPole();
    $teamDriver = $db->getDriverDiffTeamWin();
    ?>
        <div class="col-3 text-center mt-4">
            <h2>Search driver:</h2>
            <div class="d-flex justify-content-center mb-3">
                <div class="driverSearchDiv align-items-center">
                    <label for="searchDriver" class="">
                        <input type="text" name="searchDriver" class="form-control w-100" id="searchDriver">
                    </label>
                    <div class="z-2 position-absolute bg-light" id="searchPopup" style="width: 220px">
                    </div>
                </div>
            </div>
        </div>

        <h3 class="mt-3 pt-3 w-75 border-top border-dark-subtle">List of all drivers:</h3>
        <label for="filterSelect">Select nationality to filter drivers: </label>
        <select class="form-select my-2 col-3 w-25" name="filterSelect" id="nationalitySelect">
            <option selected>No filter</option>
            <?php foreach($nationalities as $nationality): ?>
                <option value="<?php echo $nationality['driverNationality']; ?>"><?php echo $nationality['driverNationality']; ?></option>
            <?php endforeach; ?>    
        </select>

        <div class="tableDiv col-7 mt-4">
            <table class="table text-center table-striped" id="allDriverTable">
                <thead class="sticky-top z-0">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Date of birth</th>
                        <th scope="col">Nationality</th>
                        <th scope="col">Number</th>
                    </tr>
                </thead>

                <tbody id="driverTableBody">
                    <?php foreach($drivers as $driver): ?>

                    <tr>
                        <td><a href="./driver.php?page=detail&driverId=<?php echo $driver['idDriver']; ?>"><?php echo $driver['driverName'] . ' ' . $driver['driverSurname']; ?></a></td>
                        <td><?php echo $driver['driverBirth']; ?></td>
                        <td><?php echo $driver['driverNationality']; ?></td>
                        <td><?php echo $driver['raceNumber']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h4 class="mt-5 pt-3 w-75 border-top border-dark-subtle">Driver with most wins:</h4>
        <p>Normal and Sprint races</p>
        <div class="tableDiv col-7 mt-4">
            <table class="table text-center table-striped" id="victoryDriverTable">
                <thead class="sticky-top">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Number of victory</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($winsDriver as $driver): ?>

                    <tr>
                        <td><a href="./driver.php?page=detail&driverId=<?php echo $driver['idDriver']; ?>"><?php echo $driver['driverName'] . ' ' . $driver['driverSurname']; ?></a></td>
                        <td><?php echo $driver['winsNumber']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h4 class="mt-5 pt-3 w-75 border-top border-dark-subtle">Driver with most pole position:</h4>
        <p>Normal and Sprint races</p>
        <div class="tableDiv col-7 mt-4">
            <table class="table text-center table-striped" id="victoryDriverTable">
                <thead class="sticky-top">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Number of pole position</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($poleDriver as $driver): ?>

                    <tr>
                        <td><a href="./driver.php?page=detail&driverId=<?php echo $driver['idDriver']; ?>"><?php echo $driver['driverName'] . ' ' . $driver['driverSurname']; ?></a></td>
                        <td><?php echo $driver['poleNumber']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h4 class="mt-5 pt-3 w-75 border-top border-dark-subtle">Driver with most race partecipations:</h4>
        <p>Normal and Sprint races</p>
        <div class="tableDiv col-7 mt-4">
            <table class="table text-center table-striped" id="victoryDriverTable">
                <thead class="sticky-top">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Number of race partecipations</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($partDriver as $driver): ?>

                    <tr>
                        <td><a href="./driver.php?page=detail&driverId=<?php echo $driver['idDriver']; ?>"><?php echo $driver['driverName'] . ' ' . $driver['driverSurname']; ?></a></td>
                        <td><?php echo $driver['raceParticipation']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h4 class="mt-5 pt-3 w-75 border-top border-dark-subtle">Search driver with at least total amount points scored:</h4>
        <p>Normal and Sprint races</p>
        <label for="pointInput">Points:</label>
        <div>
            <input class="border border-dark rounded" type="number" name="pointInput" id="pointInput">
            <button class="btn btn-dark" id="pointBtn"><i class="fa-solid fa-arrow-right"></i></button></div>
        <div class="tableDiv col-7 mt-4">
            <table class="table text-center table-striped" id="victoryDriverTable">
                <thead class="sticky-top">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Number of points</th>
                    </tr>
                </thead>

                <tbody id="pointsTableBody">
                    <?php foreach($db->getDriverWithTotPoints(0) as $driver): ?>

                    <tr>
                        <td><a href="./driver.php?page=detail&driverId=<?php echo $driver['idDriver']; ?>"><?php echo $driver['driverName'] . ' ' . $driver['driverSurname']; ?></a></td>
                        <td><?php echo $driver['pointsSum']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h4 class="mt-5 pt-3 w-75 border-top border-dark-subtle">Driver with at least 1 win for season:</h4>
        <p>Normal and Sprint races</p>
        <div class="tableDiv col-7 mt-4">
            <table class="table text-center table-striped">
                <thead class="sticky-top">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Number of season</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($db->getDriverWithOneWinInSeason() as $driver): ?>

                    <tr>
                        <td><a href="./driver.php?page=detail&driverId=<?php echo $driver['idDriver']; ?>"><?php echo $driver['driverName'] . ' ' . $driver['driverSurname']; ?></a></td>
                        <td><?php echo $driver['seasonCount']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h4 class="mt-5 pt-3 w-75 border-top border-dark-subtle">Driver with at least 1 win in distinct team:</h4>
        <p>Normal and Sprint races</p>
        <div class="tableDiv col-7 mt-4 mb-2">
            <table class="table text-center table-striped" id="victoryDriverTable">
                <thead class="sticky-top">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Number of team</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($teamDriver as $driver): ?>

                    <tr>
                        <td><a href="./driver.php?page=detail&driverId=<?php echo $driver['idDriver']; ?>"><?php echo $driver['driverName'] . ' ' . $driver['driverSurname']; ?></a></td>
                        <td><?php echo $driver['teamCount']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </main>
    <script src="./script/driverList.js"></script>