<main class="float-end d-flex align-items-center flex-column overflow-y-auto">
    <?php
    $teams = $db->getAllTeam();
    $staffList = $db->getAllStaff();
    ?>
    <div class="driverForm m-4 col-5 text-center">
        <h2>Add a contract:</h2>
        <div class="py-2">
            <label for="teamSelect">Staff: </label>
            <select class="form-select border-dark" name="staffSelect" id="staffSelect" required>
                <?php foreach ($staffList as $staff): ?>
                    <option value="<?php echo $staff['idStaff']; ?>">
                        <?php echo $staff['staffName'] . ' ' . $staff['staffSurname']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="py-2">
            <label for="teamSelect">Team: </label>
            <select class="form-select border-dark" name="teamSelect" id="teamSelect" required>
                <?php foreach ($teams as $team): ?>
                    <option value="<?php echo $team['idTeam'] ?>"><?php echo $team['teamName']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="py-2">
            <label for="signInput">Sign year: </label>
            <input class="form-control border border-dark" type="date" name="signInput" id="signInput" required>
        </div>

        <div class="py-2">
            <label for="numberInput">Expiration year: </label>
            <input class="form-control border border-dark" type="date" name="expirationInput" id="expirationInput"
                required>
        </div>

        <div class="py-2">
            <label for="roleInput">Role: </label>
            <input class="form-control border border-dark" list="roleList" type="text" name="roleInput" id="roleInput"
                required>
            <datalist id="roleList">
                <?php $roles = $db->getRoles();
                foreach ($roles as $role): ?>
                    <option value="<?php echo $role['staffRole'] ?>">
                        <?php echo $role['staffRole'] ?>
                    </option>
                <?php endforeach; ?>
            </datalist>
        </div>

        <button class="btn btn-dark form-control mt-3" id="addContractBtn" onclick="addStaffContract()">Add Contract</button>
    </div>
</main>
<script src="./script/addScript.js"></script>