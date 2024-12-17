<main class="float-end d-flex align-items-center flex-column">

        <div class="fs-5 m-4 col-5 text-center">
            <h2>Add a championship:</h2>
    
                <div class="py-2">
                    <label for="seasonInput">Cahmpionship year: </label>
                    <input class="form-control border border-dark" type="number" name="seasonInput" id="seasonInput" required>
                </div>
    
                <div class="py-2">
                    <label for="roundInput">Number of round</label>
                    <input class="form-control border border-dark" type="number" name="roundInput" id="roundInput" required>
                </div>

                <button class="btn btn-dark form-control mt-3" id="addChampionshipBtn" onclick="addChampionship()">Add Championship</button>
        </div>
    </main>
    <script src="./script/addScript.js"></script>