<main class="float-end d-flex align-items-center flex-column">
<?php $championship = $templateParams['championship'];
    $races = $db->getRacesOfChampionship($championship['championshipYear']);
    $driverStanding = $templateParams['driverStanding'];
    $teamStanding = $templateParams['teamStanding']; ?>
        <div class="p-4 text-center" style="margin-top:20px">
            <h3 class="p-2 mx-auto"><?php echo $championship['championshipYear'] ?></h3>
            <ul class="list-group list-group-horizontal col-10 mx-3">
                <li class="list-group-item"><h6>Number of races: </h6><p class="fs-4"><?php echo $championship['roundNumber'] ?></p></li>
            </ul>
        </div>

        <div class="row justify-content-evenly border-top" style="height: 80%;">
            <div class="tableDiv col my-4 px-4 text-center">
                <h4>Races</h4>
                <table class="table">
                    <thead class="sticky-top">
                        <tr>
                            <th scope="col">Round</th>
                            <th scope="col">Track</th>
                            <th scope="col">Race type</th>
                            <th scope="col">Race Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($races as $race):?>
                        <tr>
                            <td><?php echo $race['round'] ?></td>
                            <td><?php echo $race['trackName'] ?></td>
                            <td><?php echo $race['raceType'] ?></td>
                            <td><a class="btn btn-dark" href="race.php?page=detail&raceId=<?php echo $race['idRace']; ?>">Information</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="tableDiv col mt-4 mx-4 text-center">
                <h4>Team Standing</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Position</th>
                            <th scope="col">Team</th>
                            <th scope="col">Points</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $tPosition = 1;
                        foreach($teamStanding as $t):?>
                        <tr>
                        <tr>
                            <td><?php echo $tPosition ?></td>
                            <td><a href="team.php?page=detail&teamId=<?php echo $t['idTeam'] ?>"><?php echo $t['teamName'] ?></a></td>
                            <td><?php echo $t['points']; ?></td>
                        </tr>
                        <?php $tPosition += 1;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            
            <div class="tableDiv col my-4 mx-4 text-center">
                <h4>Driver Standing</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col">Position</th>
                            <th scope="col">Driver</th>
                            <th scope="col">Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $dPosition = 1;
                        foreach($driverStanding as $d): ?>
                        <tr>
                            <td><?php echo $dPosition ?></td>
                            <td><a href="driver.php?page=detail&driverId=<?php echo $d['idDriver'] ?>"><?php echo $d['driverName'] . ' ' . $d['driverSurname'];?></a></td>
                            <td><?php echo $d['points']?></td>
                        </tr>
                        <?php $dPosition += 1;
                    endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>