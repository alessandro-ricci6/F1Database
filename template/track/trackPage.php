<main class="float-end d-flex align-items-center flex-column overflow-auto">
<?php $track = $templateParams['track'];
        $races = $db->getRacesOnTrack($track['idTrack']);
        $mostWinDriver = $db->getMostWinningDriverInTrack($track['idTrack'])[0];
        $driverTenQuali = $db->getTopTenQualiTime($track['idTrack']);
        $driverTenRace = $db->getTopTenRaceTime($track['idTrack']);?>
    <div class="p-4 text-center my-1">
        <h3 class="p-2" id="trackNameTitle"><?php echo $track['trackName']; ?></h3>
        <ul class="list-group list-group-horizontal col-10 mx-3">
            <li class="list-group-item"><h6>Location:</h6><p id="locationPar"><?php echo $track['city'] . ', ' . $track['country']; ?></p></li>
            <li class="list-group-item"><h6>Most winning driver:</h6>
                <a href="driver.php?page=detail&driverId=<?php echo $mostWinDriver['idDriver']; ?>"><?php echo $mostWinDriver['driverName'] . ' ' . $mostWinDriver['driverSurname']; ?></a></li>
            <li class="list-group-item"><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#trackModal">Edit</button></li>
        </ul>
    </div>

		<div class="border-top w-75" style="height: 50%;">

            <h4>Races:</h4>
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
                        foreach($races as $race):
                        ?>
                        <tr>
							<td><?php echo $race['championshipYear']; ?></td>
                            <td><?php echo $race['round']; ?></td>
                            <td><?php echo $race['laps'];?></td>
                            <td><?php echo $race['trackLength'] . ' m'; ?></td>
                            <td><?php echo $race['raceType'];?></td>
                            <td>
                                <a class="btn btn-dark" href="race.php?page=detail&raceId=<?php echo $race['idRace']?>">Info</a>
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
                        foreach($driverTenQuali as $driver):
                        ?>
                        <tr>
							<td><a href="driver.php?page=detail&driverId=<?php echo $driver['idDriver'] ?>"><?php echo $driver['driverName'] . ' ' . $driver['driverSurname']; ?></a></td>
                            <td><?php echo $driver['qualifyingTime']; ?></td>
                            <td><?php echo $driver['championshipYear'];?></td>
                            <td><?php echo $driver['round'];?></td>
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
                        foreach($driverTenRace as $driver):
                        ?>
                        <tr>
							<td><a href="driver.php?page=detail&driverId=<?php echo $driver['idDriver'] ?>"><?php echo $driver['driverName'] . ' ' . $driver['driverSurname']; ?></a></td>
                            <td><?php echo $driver['fastestLap']; ?></td>
                            <td><?php echo $driver['season'];?></td>
                            <td><?php echo $driver['round'];?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

		</div>
    </main>

    <!-- Modal -->
<div class="modal fade" id="trackModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit track</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label class="my-1" for="trackNameInput">Track name:</label>
        <input class="form-control" type="text" name="trackNameInput" id="trackNameInput" value="<?php echo $track['trackName'] ?>">
        <label class="my-1" for="countryInput">Country:</label>
        <input class="form-control" type="text" name="countryInput" id="countryInput" value="<?php echo $track['country'] ?>">
        <label class="my-1" for="cityInput">City:</label>
        <input class="form-control" type="text" name="cityInput" id="cityInput" value="<?php echo $track['city'] ?>">
        <label class="my-1" for="lengthInput">Length (m):</label>
        <input class="form-control" type="number" name="lengthInput" id="lengthInput" value="<?php echo $track['trackLength'] ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="updateBtn" data-bs-track="<?php echo $track['idTrack'] ?>" onclick="updateTrack()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="./script/tracks.js"></script>