<main class="float-end d-flex align-items-center flex-column">
    <?php
    $team = $templateParams['team'];
    $contracts = $db->getTeamContract($team['idTeam']);
    $staffList = $db->getStaffOfTeam($team['idTeam']);
    ?>
    <div class="p-4 text-center" style="margin-top:20px">
        <h3 class="p-2 mx-auto"><?php echo $team['teamName']; ?></h3>
        <ul class="list-group list-group-horizontal col-10 mx-3 mb-3">
            <li class="list-group-item">
                <h6>Nationality:</h6>
                <p><?php echo $team['teamNationality']; ?></p>
            </li>
        </ul>
    </div>

    <div class="d-flex border-top text-center" style="height: 50%;">
        <div class="tableDiv my-4 mx-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Driver name</th>
                        <th scope="col">Contract sign year</th>
                        <th scope="col">Contract expiration year</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contracts as $contract): ?>
                        <tr>
                            <td><a
                                    href="driver.php?page=detail&driverId=<?php echo $contract['idDriver'] ?>"><?php echo $contract['driverName'] . ' ' . $contract['driverSurname']; ?></a>
                            </td>
                            <td><?php echo $contract['startDate']; ?></td>
                            <td><?php echo $contract['endDate']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="tableDiv my-4 mx-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Employee name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Nationality</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($staffList as $staff): ?>
                        <tr>
                            <td><a
                                    href="staff.php?page=detail&staffId=<?php echo $staff['idStaff']; ?>"><?php echo $staff['staffName'] . ' ' . $staff['staffSurname'] ?></a>
                            </td>
                            <td><?php echo $staff['staffRole'] ?></td>
                            <td><?php echo $staff['staffNationality'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="./staff.php?page=add&teamId=<?php echo $team['idTeam'] ?>" class="btn btn-dark mx-auto">Add staff
                member</a>
        </div>
    </div>
</main>