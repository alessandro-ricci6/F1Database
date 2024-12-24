<main class="float-end d-flex align-items-center flex-column px-4">
    <?php $races = $templateParams['races'];
    $season = $db->getAllChampionship();
    ?>
        <div class="col-3 text-center mt-4">
			<h2>List of all races:</h2>
            <label for="filterSelect">Select season to filter races: </label>
            <select class="form-select my-2" name="filterSelect" id="seasonSelect">
                <option selected>No filter</option>
                <?php foreach($season as $s): ?>
                    <option value="<?php echo $s['championshipYear']; ?>"><?php echo $s['championshipYear']; ?></option>
                <?php endforeach; ?>    
            </select>
        </div>

        <div class="tableDiv col-7 mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Season</th>
                        <th scope="col">Round</th>
                        <th scope="col">Track</th>
                        <th scope="col">Location</th>
                        <th scope="col">Race type</th>
						<th scope="col">Information</th>
                    </tr>
                </thead>
                <tbody id="racesTableBody">
                    <?php foreach($races as $race):
                    ?>
                    <tr class="align-middle">
                        <td><?php echo $race['championshipYear'] ?></td>
                        <td><?php echo $race['round'] ?></td>
                        <td><a href="./track.php?page=detail&trackId=<?php echo $race['idTrack'];?>"><?php echo $race['trackName'] ?></a></td>
                        <td><?php echo $race['city'] . ', ' . $race['country'] ?></td>
                        <td><?php echo $race['raceType'] ?></td>
						<td>
							<a href="race.php?page=detail&raceId=<?php echo $race['idRace'] ?>" class="btn btn-dark">Information</a>
						</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </main>
    <script src="./script/racesList.js"></script>