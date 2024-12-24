<main class="float-end d-flex align-items-center flex-column px-4">
    <?php
    $staffList = $db->getAllStaff();
    ?>
        <div class="col-3 text-center mt-4">
			<h2>List of all team:</h2>
        </div>
        <div class="tableDiv col-7 mt-4">
            <table class="table text-center table-striped">
                <thead class="sticky-top">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Nationality</th>
                    </tr>
                </thead>

                <tbody id="teamTableBody">
                    <?php foreach ($staffList as $staff):?>
                    <tr>
                        <td><a href="./staff.php?page=detail&staffId=<?php echo $staff['idStaff']; ?>"><?php 
                        echo $staff['staffName'] . ' ' . $staff['staffSurname']; ?></a></td>
                        <td><?php echo $staff['staffNationality']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>