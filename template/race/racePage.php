<main class="float-end d-flex align-items-center flex-column overflow-auto">
    <?php $race = $templateParams['race'][0];
    $results = $db->getParticipationByRaceId($race['idRace']) ?>
    <div class="p-4 text-center my-1">
        <h3 class="p-2"><?php echo $race['raceName']; ?></h3>
        <ul class="list-group list-group-horizontal col-10 mx-3">
            <li class="list-group-item">
                <h6>Location:</h6>
                <p><?php echo $race['city'] . ', ' . $race['country']; ?></p>
            </li>
            <li class="list-group-item">
                <h6>Season:</h6>
                <p><?php echo $race['championshipYear']; ?></p>
            </li>
            <li class="list-group-item">
                <h6>Round:</h6>
                <p><?php echo $race['round'] ?></p>
            </li>
            <li class="list-group-item">
                <h6>Date:</h6>
                <p><?php echo $race['raceDate'] ?></p>
            </li>
            <li class="list-group-item">
                <h6>Race Type:</h6>
                <p><?php echo $race['raceType'] ?></p>
            </li>
            <li class="list-group-item">
                <h6>Track:</h6><a class="btn border"
                    href="./track.php?page=detail&trackId=<?php echo $race['idTrack'] ?>"><?php echo $race['trackName'] ?></a>
            </li>
        </ul>
    </div>

    <div class="border-top" style="height: 50%;">

        <?php
        if (count($results) > 0):
            $fastestLap = $db->getFastestLapOfRace($race['idRace'])[0];
            ?>
            <p class="fs-5 my-3"><span class="fs-5 fw-bold">Fastest Lap of race: </span> <?php echo $fastestLap['driverName'] . ' ' . $fastestLap['driverSurname']
                . ' in ' . $fastestLap['bestLapTime'] . ' in ' . $fastestLap['championshipYear'] ?></p>
            <h4>Race results</h4>
            <div class="tableDiv my-4 mx-4">
                <table class="table">
                    <thead class="sticky-top">
                        <tr>
                            <th scope="col">End Position</th>
                            <th scope="col">Driver</th>
                            <th scope="col">Fastest Lap</th>
                            <th scope="col">Status</th>
                            <th scope="col">Points</th>
                            <th scope="col">Team</th>
                            <th scope="col">Qualification Time</th>
                            <th scope="col">Starting position</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($results as $result):
                            ?>
                            <tr>
                                <td><?php echo $result['finishingPosition']; ?></td>
                                <td><a
                                        href="driver.php?page=detail&driverId=<?php echo $result['idDriver'] ?>"><?php echo $result['driverName'] . ' ' . $result['driverSurname']; ?></a>
                                </td>
                                <td><?php echo $result['bestLapTime']; ?></td>
                                <td><?php echo $result['endingStatus']; ?></td>
                                <td><?php echo $result['points']; ?></td>
                                <td><a
                                        href="team.php?page=detail&teamId=<?php echo $result['idTeam'] ?>"><?php echo $result['teamName']; ?></a>
                                </td>
                                <td><?php echo $result['qualifyingTime']; ?></td>
                                <td><?php echo $result['startingPosition'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <a href="./race.php?page=addParticipation&raceId=<?php echo $race['idRace'] ?>" class="btn btn-dark">Add Race
                Result</a>
        <?php endif; ?>

    </div>
</main>