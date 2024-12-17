<main class="float-end d-flex align-items-center flex-column">
    <?php
    $season = $templateParams['season'];
    $tracks = $templateParams['tracks'];
    ?>
        <div class="driverForm mx-4 mt-3 col-5 text-center">
            <h2>Add a race:</h2>

                <div class="py-1">
                    <label for="seasonSelect">Championship: </label>
                    <select class="form-select border-dark" name="seasonSelect" id="seasonSelect">
                        <?php foreach($season as $s): ?>
                        <option value="<?php echo $s['championshipYear']; ?>"><?php echo $s['championshipYear']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="py-1">
                    <label for="trackSelect">Track: </label>
                    <select class="form-select border-dark addRaceSelect" name="trackSelect" id="trackSelect">
                        <?php foreach($tracks as $track): ?>
                        <option value="<?php echo $track['idTrack']; ?>"><?php echo $track['trackName'] . ' - ' . $track['trackLength'] . 'm'; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="py-1">
                    <label for="raceNameInput">Race name: </label>
                        <input class="form-control border-dark" type="text" name="raceNameInput" id="raceNameInput">
                </div>

                <div class="py-1">
                    <label for="roundInput">Round: </label>
                    <input class="form-control border border-dark" type="number" name="roundInput" id="roundInput">
                </div>

                <div class="py-1">
                    <label for="dateInput">Date: </label>
                    <input class="form-control border-dark" type="date" name="dateInput" id="dateInput">
                </div>
    
                <div class="py-1 d-flex">
                    <p>Race type:</p>
                    <div class="form-check mx-5">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="normalRadio" value="Normal" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Normal
                        </label>
                    </div>
                    <div class="form-check mx-5">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="sprintRadio" value="Sprint">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Sprint
                        </label>
                    </div>
                </div>

                <div class="py-1">
                    <label for="lapsInput">Laps: </label>
                    <input class="form-control border border-dark" type="number" name="lapsInput" id="lapsInput">
                </div>

                <button class="btn btn-dark mt-2 w-50" href="race.php?page=addQualification" onclick="addRace()"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </main>
    <script src="./script/addScript.js"></script>