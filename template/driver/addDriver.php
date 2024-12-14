<main class="float-end d-flex align-items-center flex-column">
    <div class="driverForm m-4 col-5 text-center">
        <h2>Add a driver:</h2>
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
            <input class="form-control border border-dark" list="nationalityList" type="text" name="nationalityInput" id="nationalityInput" required>
            <datalist id="nationalityList">
                <?php $nationalities = $db->getDriverNationalities();
                foreach($nationalities as $nationality):?>
                <option value="<?php echo $nationality['nationality'] ?>"><?php echo $nationality['nationality'] ?></option>
                <?php endforeach; ?>
            </datalist>
        </div>

        <div class="py-2">
            <label for="numberInput">Number: </label>
            <input class="form-control border border-dark" type="number" name="numberInput" id="numberInput">
        </div>

        <div class="py-2">
            <label for="birthInput">Date of birth: </label>
            <input class="form-control border border-dark" type="date" name="birthInput" id="birthInput" required>
        </div>

        <button class="btn btn-dark form-control mt-3" id="addDriverBtn" onclick="addDriver()">Add driver</button>
    </div>
</main>
<script src="./script/addScript.js"></script>