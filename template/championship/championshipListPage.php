<main class="float-end d-flex align-items-center flex-column">
    <?php $season = $templateParams['season'] ?>
		<h2 class="my-3">List of all season:</h2>
        <div class="tableDiv col-7 mt-4">
            <table class="table text-center table-striped">
                <thead class="sticky-top">
                    <tr>
                        <th scope="col">Year</th>
                        <th scope="col">Number of races</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($season as $s): ?>
                    <tr>
                        <td><a href="./championship.php?page=detail&championshipYear=<?php echo $s['championshipYear'] ?>"><?php echo $s['championshipYear'] ?></a></td>
                        <td><?php echo $s['roundNumber'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
	</main>