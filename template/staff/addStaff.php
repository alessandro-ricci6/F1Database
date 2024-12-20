<main class="float-end d-flex align-items-center flex-column">
    <?php
    $roles = $db->getRoles();
    $nationalities = $db->getDriverNationalities();
    ?>
    <div class="driverForm m-4 col-5 text-center">
        <h2>Add a staff member:</h2>

        <div class="py-2">
            <label for="nameInput">Name: </label>
            <input class="form-control border border-dark" type="text" name="nameInput" id="nameInput" required>
        </div>

        <div class="py-2">
            <label for="surnameInput">Surname: </label>
            <input class="form-control border border-dark" type="text" name="surnameInput" id="surnameInput" required>
        </div>

        <div class="py-2">
            <label for="nationalityInput">Nationality: </label>
            <input class="form-control border border-dark" list="nationalityList" type="text" name="nationalityInput"
                id="nationalityInput" required>
            <datalist id="nationalityList">
                <?php $nationalities = $db->getDriverNationalities();
                foreach ($nationalities as $nationality): ?>
                    <option value="<?php echo $nationality['driverNationality'] ?>">
                        <?php echo $nationality['driverNationality'] ?>
                    </option>
                <?php endforeach; ?>
            </datalist>
        </div>

        <button class="btn btn-dark form-control mt-3" id="addEmployeeBtn" onclick="addStaff()">Add Staff</button>
    </div>
</main>
<script src="./script/addScript.js"></script>