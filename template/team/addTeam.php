<main class="float-end d-flex align-items-center flex-column">
    <?php $nationalities = $db->getTeamNationalities();
    ?>
        <div class="driverForm m-4 col-5 text-center">
            <h2>Add a Team:</h2>
                <div class="py-2">
                    <label for="nameInput">Name: </label>
                    <input class="form-control border border-dark" type="text" name="nameInput" id="nameInput" required>
                </div>
    
                <div class="py-2">
                    <label for="nationalityInput">Nationality: </label>
                    <input class="form-control border border-dark" list="nationalityList" type="text" name="nationalityInput" id="nationalityInput" required>
                    <datalist id="nationalityList">
                        <?php foreach($nationalities as $nationality): ?>
                        <option value="<?php echo $nationality['teamNationality'] ?>"><?php echo $nationality['teamNationality'] ?></option>
                        <?php endforeach; ?>
                    </datalist>
                </div>
            
                <div class="py-2">
                    <label for="headquarterInput">Headquarter: </label>
                    <input class="form-control border border-dark" type="text" name="headquarterInput" id="headquarterInput" placeholder="City, country" required>
                </div>

                <button class="btn btn-dark form-control mt-3" onclick="addTeam()" id="addTeamBtn">Add team</button>
        </div>
    </main>
    <script src="./script/addScript.js"></script>