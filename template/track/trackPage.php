<main class="float-end d-flex align-items-center flex-column overflow-auto px-4">
    <?php $track = $templateParams['track'];
    $races = $db->getRacesOnTrack($track['idTrack']);
    $trackConfigs = $db->getTrackConfigs($track['idTrack']);

    $driverTenQuali = $db->getTopTenQualiTime($track['idTrack']);
    $driverTenRace = $db->getTopTenRaceTime($track['idTrack']); ?>
    <div class="p-4 text-center my-1">
        <h3 class="p-2" id="trackNameTitle"><?php echo $track['trackName']; ?></h3>
        <ul class="list-group list-group-horizontal col-10 mx-3">
            <li class="list-group-item">
                <h6>Location:</h6>
                <p id="locationPar"><?php echo $track['city'] . ', ' . $track['country']; ?></p>
            </li>
            <?php if ($db->getMostWinningDriverInTrack($track['idTrack']) != null):
                $mostWinDriver = $db->getMostWinningDriverInTrack($track['idTrack'])[0]; ?>
                <li class="list-group-item">
                    <h6>Most winning driver:</h6>
                    <a
                        href="driver.php?page=detail&driverId=<?php echo $mostWinDriver['idDriver']; ?>"><?php echo $mostWinDriver['driverName'] . ' ' . $mostWinDriver['driverSurname']; ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </div>

    <div class="border-top w-75 text-center" style="height: 50%;">

        <h4>Configurations</h4>
        <div class="tableDiv my-4 mx-4">
            <table class="table">
                <thead class="sticky-top">
                    <tr>
                        <th scope="col">Track length</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($trackConfigs as $config): ?>
                        <tr>
                            <td><?php echo $config['trackLength']; ?> m</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <button type="button" class="btn btn-dark w-50 mb-3" data-bs-toggle="modal" data-bs-target="#configModal">Add
            configuration</button>

        <h4 class="mt-2">Races:</h4>
        <div class="tableDiv my-4 mx-4">
            <table class="table">
                <thead class="sticky-top">
                    <tr>
                        <th scope="col">Season</th>
                        <th scope="col">Round</th>
                        <th scope="col">Laps</th>
                        <th scope="col">Lap length</th>
                        <th scope="col">Race type</th>
                        <th scope="col">Race information</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($races as $race):
                        ?>
                        <tr>
                            <td><?php echo $race['championshipYear']; ?></td>
                            <td><?php echo $race['round']; ?></td>
                            <td><?php echo $race['laps']; ?></td>
                            <td><?php echo $race['trackLength'] . ' m'; ?></td>
                            <td><?php echo $race['raceType']; ?></td>
                            <td>
                                <a class="btn btn-dark"
                                    href="race.php?page=detail&raceId=<?php echo $race['idRace'] ?>">Info</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h4>Top 10 Time in Quali</h4>
        <div class="tableDiv my-4 mx-4">
            <table class="table">
                <thead class="sticky-top">
                    <tr>
                        <th scope="col">Driver</th>
                        <th scope="col">Time</th>
                        <th scope="col">Season</th>
                        <th scope="col">Round</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($driverTenQuali as $driver):
                        ?>
                        <tr>
                            <td><a
                                    href="driver.php?page=detail&driverId=<?php echo $driver['idDriver'] ?>"><?php echo $driver['driverName'] . ' ' . $driver['driverSurname']; ?></a>
                            </td>
                            <td><?php echo $driver['qualifyingTime']; ?></td>
                            <td><?php echo $driver['championshipYear']; ?></td>
                            <td><?php echo $driver['round']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h4>Top 10 Time in Race</h4>
        <div class="tableDiv my-4 mx-4">
            <table class="table">
                <thead class="sticky-top">
                    <tr>
                        <th scope="col">Driver</th>
                        <th scope="col">Time</th>
                        <th scope="col">Season</th>
                        <th scope="col">Round</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($driverTenRace as $driver):
                        ?>
                        <tr>
                            <td><a
                                    href="driver.php?page=detail&driverId=<?php echo $driver['idDriver'] ?>"><?php echo $driver['driverName'] . ' ' . $driver['driverSurname']; ?></a>
                            </td>
                            <td><?php echo $driver['bestLapTime']; ?></td>
                            <td><?php echo $driver['championshipYear']; ?></td>
                            <td><?php echo $driver['round']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Configuration modal -->
    <div class="modal fade" id="configModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add a configuration for
                        <?php echo $track['trackName']; ?>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="lengthInput">Length:</label>
                    <input type="number" name="lengthInput" id="lengthInput" class="form-control border rounded">
                </div>
                <div class="modal-footer">
                    <button id="newLengthBtn" type="button" class="btn btn-secondary" onclick="addConfiguration()"
                        data-bs-trackid="<?php echo $track['idTrack'] ?>">Add
                        configuration</button>
                </div>
            </div>
        </div>
    </div>


</main>

<script src="./script/tracks.js"></script>