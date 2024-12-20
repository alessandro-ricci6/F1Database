<main class="float-end d-flex align-items-center flex-column overflow-auto">
    <?php $staff = $templateParams['staff'];
    $contracts = $db->getStaffContract($staff["idStaff"]); ?>
    <div class="p-4 text-center my-1">
        <h3 class="p-2"><?php echo $staff['staffName'] . ' ' . $staff['staffSurname']; ?></h3>
        <ul class="list-group list-group-horizontal col-10 mx-3">
            <li class="list-group-item">
                <h6>Nationality:</h6>
                <p><?php echo $staff['staffNationality']; ?></p>
            </li>
        </ul>
    </div>

    <div class="border-top" style="height: 50%;">
        <h4 class="mt-3">Contracts</h4>
        <div class="tableDiv mt-4 mx-4">
            <table class="table">
                <thead class="sticky-top">
                    <tr>
                        <th scope="col">Sign date</th>
                        <th scope="col">Expiration date</th>
                        <th scope="col">Role</th>
                        <th scope="col">Team</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody id="contractTableBody" data-bs-sstaff="<?php echo $staff['idStaff']; ?>">
                    <?php foreach ($contracts as $contract):
                        ?>
                        <tr>
                            <td><?php echo $contract['startDate']; ?></td>
                            <td><?php echo $contract['endDate']; ?></td>
                            <td><?php echo $contract['staffRole'] ?></td>
                            <td><a
                                    href="team.php?page=detail&teamId=<?php echo $contract['idTeam']; ?>"><?php echo $contract['teamName'] ?></a>
                            </td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modifyContractModal"
                                    data-bs-syear="<?php echo $contract['startDate']; ?>"
                                    data-bs-eyear="<?php echo $contract['endDate']; ?>"
                                    data-bs-team="<?php echo $contract['idTeam']; ?>"
                                    data-bs-contractId="<?php echo $contract['idStaffContract']; ?>">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="contract.php?staffId=<?php echo $staff['idStaff']; ?>" class="btn w-100 mb-4">Add Contract</a>
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