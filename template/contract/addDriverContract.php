<main class="float-end d-flex align-items-center flex-column">
    <?php
    $teams = $db->getAllTeam();
    $drivers = $db->getAllDriver();
    ?>
        <div class="driverForm m-4 col-5 text-center">
            <h2>Add a contract:</h2>
                <div class="py-2">
                    <label for="teamSelect">Driver: </label>
                    <select class="form-select border-dark" name="driverSelect" id="driverSelect" required>
                        <?php foreach($drivers as $driver): ?>
                            <option value="<?php echo $driver['idDriver'];?>" <?php echo isSelected($templateParams['driverId'], $driver['idDriver']); ?>><?php echo $driver['driverName'] . ' ' . $driver['driverSurname']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="py-2">
                    <label for="teamSelect">Team: </label>
                    <select class="form-select border-dark" name="teamSelect" id="teamSelect" required>
                        <?php foreach($teams as $team): ?>
                            <option value="<?php echo $team['idTeam'] ?>"><?php echo $team['teamName']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
    
                <div class="py-2">
                    <label for="signInput">Sign year: </label>
                    <input class="form-control border border-dark" type="number" name="signInput" id="signInput" required>
                </div>
    
                <div class="py-2">
                    <label for="numberInput">Expiration year: </label>
                    <input class="form-control border border-dark" type="number" name="expirationInput" id="expirationInput" required>
                </div>

                <button class="btn btn-dark form-control mt-3" id="addContractBtn" onclick="addContract()">Add Contract</button>
        </div>
    </main>
    <script src="./script/addScript.js"></script>