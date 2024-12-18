<main class="float-end d-flex align-items-center flex-column overflow-auto">
    <?php $driver = $templateParams['driver'];
    $participation = $db->getDriverResultById($driver['idDriver']);
    $contracts = $db->getDriverContract($driver['idDriver']);
    $seasons = $db->getSeasonOfDriver($driver['idDriver']) ?>
    <div class="p-4 text-center my-1">
        <h3 class="p-2"><?php echo $driver['driverName'] . ' ' . $driver['driverSurname']; ?></h3>
        <ul class="list-group list-group-horizontal col-10 mx-3">
            <li class="list-group-item">
                <h6>Nationality:</h6>
                <p><?php echo $driver['driverNationality']; ?></p>
            </li>
            <li class="list-group-item">
                <h6>Date of birth:</h6>
                <p><?php echo $driver['driverBirth']; ?></p>
            </li>
            <?php if ($driver['raceNumber'] != null): ?>
                <li class="list-group-item">
                    <h6>Number:</h6>
                    <p><?php echo $driver['raceNumber']; ?></p>
                </li>
            <?php endif; ?>
            <li class="list-group-item">
                <h6>Normal races won:</h6>
                <p><?php echo $db->getNormalRacesWonByDriverId($driver['idDriver']) ?></p>
            </li>
            <li class="list-group-item">
                <h6>Sprint races won:</h6>
                <p><?php echo $db->getSprintRacesWonByDriverId($driver['idDriver']) ?></p>
            </li>
        </ul>
    </div>

    <div class="border-top" style="height: 50%;">
        <h4 class="mt-3">Contracts</h4>
        <div class="tableDiv mt-4 mx-4">
            <table class="table">
                <thead class="sticky-top">
                    <tr>
                        <th scope="col">Sign year</th>
                        <th scope="col">Expiration year</th>
                        <th scope="col">Team</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody id="contractTableBody" data-bs-driver="<?php echo $driver['idDriver']; ?>">
                    <?php foreach ($contracts as $contract):
                        ?>
                        <tr>
                            <td><?php echo $contract['startDate']; ?></td>
                            <td><?php echo $contract['endDate']; ?></td>
                            <td><a
                                    href="team.php?page=detail&teamId=<?php echo $contract['idTeam']; ?>"><?php echo $contract['teamName'] ?></a>
                            </td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modifyContractModal"
                                    data-bs-syear="<?php echo $contract['startDate']; ?>"
                                    data-bs-eyear="<?php echo $contract['endDate']; ?>"
                                    data-bs-team="<?php echo $contract['idTeam']; ?>"
                                    data-bs-contractId="<?php echo $contract['idDriverContract']; ?>">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="contract.php?driverId=<?php echo $driver['idDriver']; ?>" class="btn w-100 mb-4">Add Contract</a>

        <h4>Race results</h4>
        <div class="tableDiv my-4 mx-4">
            <table class="table">
                <thead class="sticky-top">
                    <tr>
                        <th scope="col">Race</th>
                        <th scope="col">Type</th>
                        <th scope="col">Season</th>
                        <th scope="col">Round</th>
                        <th scope="col">Position</th>
                        <th scope="col">Fastest Lap</th>
                        <th scope="col">Status</th>
                        <th scope="col">Team</th>
                        <th scope="col">Race info</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($participation as $result):
                        ?>
                        <tr>
                            <td><?php echo $result['trackName']; ?></td>
                            <td><?php echo $result['raceType']; ?></td>
                            <td><?php echo $result['championshipYear']; ?></td>
                            <td><?php echo $result['round']; ?></td>
                            <td><?php echo $result['finishingPosition']; ?></td>
                            <td><?php echo $result['bestLapTime']; ?></td>
                            <td><?php echo $result['endingStatus']; ?></td>
                            <td><?php echo $result['teamName']; ?></td>
                            <td><a href="race.php?page=detail&raceId=<?php echo $result['idRace'] ?>"
                                    class="btn btn-dark">Information</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h4>Qualifying results</h4>
        <div class="tableDiv my-4 mx-4">
            <table class="table">
                <thead class="sticky-top">
                    <tr>
                        <th scope="col">Race</th>
                        <th scope="col">Type</th>
                        <th scope="col">Season</th>
                        <th scope="col">Round</th>
                        <th scope="col">Position</th>
                        <th scope="col">Qualifying Lap</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($participation as $quali):
                        ?>
                        <tr>
                            <td><?php echo $quali['trackName']; ?></td>
                            <td><?php echo $quali['raceType'] ?></td>
                            <td><?php echo $quali['championshipYear'] ?></td>
                            <td><?php echo $quali['round']; ?></td>
                            <td><?php echo $quali['startingPosition'] ?></td>
                            <td><?php echo $quali['qualifyingTime']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="py-4">
            <h6>Select the season:</h6>
            <select class="form-select w-25" name="seasonSelect" id="seasonSelect"
                data-bs-driverId="<?php echo $driver['idDriver'] ?>">
                <option value="" selected>No season Selected</option>
                <?php foreach ($seasons as $s): ?>
                    <option value="<?php echo $s['championshipYear'] ?>"><?php echo $s['championshipYear'] ?></option>
                <?php endforeach; ?>
            </select>
            <p class="w-100 text-center mt-4 bold fs-5">
                <?php echo $driver['driverName'] . ' ' . $driver['driverSurname'] . ' ' . 'placement during season: ' ?><span
                    id="yearTitle"></span></p>
            <div class="w-100 mt-4">
                <!-- TODO -->
                <canvas id="driverChart"></canvas>
            </div>
        </div>
    </div>

</main>

<!-- Modal -->
<div class="modal fade" id="modifyContractModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modify Contract</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="my-1 px-2" for="signYearModal">Signing year:</label>
                <input class="form-control mb-3" type="number" name="signYearModal" id="signYearModal">
                <label class="my-1 px-2" for="expYearModal">Expiration year:</label>
                <input class="form-control mb-3" type="number" name="expYearModal" id="expYearModal">
                <label class="my-1 px-2" for="teamModal">Team:</label>
                <select class="form-select mb-3" name="teamModal" id="teamModal">
                    <?php $teams = $db->getAllTeam();
                    foreach ($teams as $team):
                        ?>
                        <option value="<?php echo $team['idTeam'] ?>"><?php echo $team['teamName'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-contract="" onclick="deleteContract()">Delete
                    Contract</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" data-bs-contract="" id="saveBtn"
                    onclick="saveContract()">Save</button>
            </div>
        </div>
    </div>
</div>
<script src="./script/driver.js"></script>
<script src="./script/driverChart.js"></script>