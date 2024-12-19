<main class="float-end d-flex align-items-center flex-column overflow-auto">
    <?php $driverList = $db->getAllDriver();
    $teamList = $db->getAllTeam(); ?>
    <h2>Race Result</h2>
    <?php for ($i = 1; $i <= $templateParams['driverNumber']; $i++): ?>
        <?php if (($i - 1) % 3 === 0): // Inizia una nuova riga ogni 3 elementi ?>
            <div class="row d-flex justify-content-evenly w-100">
            <?php endif; ?>

            <div class="col-md-4 px-4">
                <div class="border rounded p-2 input-group-sm my-3">
                    <p class="fs-5 bold">Final position: <?php echo $i ?></p>
                    <!-- Driver Select -->
                    <label for="driverP<?php echo $i; ?>Select">Driver: </label>
                    <select class="form-control border border-dark" name="driverP<?php echo $i; ?>"
                        id="driverP<?php echo $i; ?>Select">
                        <?php foreach ($driverList as $driver): ?>
                            <option value="<?php echo $driver['idDriver'] ?>">
                                <?php echo $driver['driverName'] . ' ' . $driver['driverSurname']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <!-- Starting position Select -->
                    <label for="startPos<?php echo $i; ?>">Starting Position</label>
                    <select class="form-control border border-dark" name="startPos<?php echo $i; ?>"
                        id="startPos<?php echo $i; ?>">
                        <?php for ($s = 1; $s <= $templateParams['driverNumber']; $s += 1): ?>
                            <option value="<?php echo $s ?>">
                                <?php echo $s; ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                    <!-- Qualifying Time Input -->
                    <label class="my-2" for="d<?php echo $i; ?>qualiTime">Qualifying Time:</label>
                    <input class="form-control border border-dark" type="text" name="d<?php echo $i; ?>qualiTime"
                        id="d<?php echo $i; ?>qualiTime">
                    <!-- Best Lap Time Input -->
                    <label class="my-2" for="d<?php echo $i; ?>Time">Best Lap Time:</label>
                    <input class="form-control border border-dark" type="text" name="d<?php echo $i; ?>Time"
                        id="d<?php echo $i; ?>Time">
                    <!-- Team Select -->
                    <label class="my-2" for="teamP<?php echo $i; ?>Select">Team:</label>
                    <select class="form-control border border-dark" name="teamP<?php echo $i; ?>"
                        id="teamP<?php echo $i; ?>Select">
                        <?php foreach ($teamList as $team): ?>
                            <option value="<?php echo $team['idTeam'] ?>"><?php echo $team['teamName'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <!-- Ending Status Select -->
                    <label class="my-2" for="endStatusP<?php echo $i; ?>Select">Ending Status:</label>
                    <select class="form-control border border-dark" name="endStatusP<?php echo $i; ?>"
                        id="endStatusP<?php echo $i; ?>Select">
                        <option value="Finished">Finished</option>
                        <option value="Retired">Retired</option>
                        <option value="Withdrawn">Withdrawn</option>
                        <option value="Not qualified">Not qualified</option>
                        <option value="Disqualified">Disqualified</option>
                        <option value="Excluded">Excluded</option>
                    </select>
                    <!-- Fastest lap of race checkbox -->
                    <div class="my-2">
                        <input class="form-check-input" type="checkbox" value="fastestLap"
                            id="fastestLapP<?php echo $i; ?>">
                        <label class="form-check-label" for="fastestLapP<?php echo $i; ?>">
                            Fastest Lap of the race
                        </label>
                    </div>

                </div>
            </div>

            <?php if ($i % 3 === 0 || $i === $templateParams['driverNumber']): // Chiudi la riga alla fine del terzo elemento o alla fine dell'ultima iterazione ?>
            </div>
        <?php endif; ?>
    <?php endfor; ?>

    <div class="row d-flex justify-content-center">
        <button class="btn btn-dark w-50 my-3 col-4" onclick="addParticipation()"
            data-bs-race="<?php echo $templateParams['raceId'] ?>" id="addParticipationBtn"><i
                class="fa-solid fa-arrow-right"></i></button>
    </div>
</main>
<script src="./script/participation.js"></script>