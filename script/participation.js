// document.getElementById('nextButton').addEventListener('click', function () {
//     // Ottieni il valore dell'input
//     const driverNumber = document.getElementById('driverNumberInput').value;
//     const raceId = document.getElementById('nextButton').dataset.bsRaceid

//     // Verifica che il numero sia valido (tra 5 e 30)
//     if (driverNumber >= 5 && driverNumber <= 30) {
//         // Cambia pagina con il valore di driverNumber
//         window.location.href = `./race.php?page=addParticipation&driverNumber=${driverNumber}&raceId=${raceId}`;
//     } else {
//         // Mostra un messaggio d'errore se il numero non è valido
//         alert('Please enter a number between 5 and 30.');
//     }
// });

function goToParticipation(){
    const driverNumber = document.getElementById('driverNumberInput').value;
    const raceId = document.getElementById('nextButton').dataset.bsRaceid

    // Verifica che il numero sia valido (tra 5 e 30)
    if (driverNumber >= 5 && driverNumber <= 30) {
        // Cambia pagina con il valore di driverNumber
        window.location.href = `./race.php?page=addParticipation&driverNumber=${driverNumber}&raceId=${raceId}`;
    } else {
        // Mostra un messaggio d'errore se il numero non è valido
        alert('Please enter a number between 5 and 30.');
    }
}

//Add Participation

function addParticipation(){
    let driverList = {}
    const idRace = document.getElementById("addParticipationBtn").dataset.bsRace
    const driverNumber = parseInt(new URLSearchParams(window.location.search).get('driverNumber'), 10)

    for(i = 1; i <=driverNumber; i++){
        idDriver = document.getElementById("driverP" + i + "Select").value
        bestLapTime = document.getElementById("d" + i + "Time").value
        finishingPosition = i
        startingPosition = document.getElementById("startPos" + i).value
        qualifyingTime = document.getElementById("d" + i + "qualiTime").value
        idTeam = document.getElementById("teamP" + i + "Select").value
        endingStatus = document.getElementById("endStatusP" + i + "Select").value
        fastLapOfRace = document.getElementById("fastestLapP" + i)
        if(fastLapOfRace.checked){
            fastestLap = "y"
        } else {
            fastestLap = "n"
        }
        driverList[i] = {idDriver: idDriver, bestLapTime: bestLapTime, finishingPosition: finishingPosition,
            startingPosition: startingPosition, qualifyingTime: qualifyingTime, idTeam: idTeam, endingStatus: endingStatus,
            fastLap: fastestLap}
    }

    participationList = JSON.stringify(driverList)

    $.ajax({
        type: "POST",
        url: "functions/race.php",
        data: {
            action: "addParticipation",
            list: participationList,
            idRace: idRace
        },
        success: function (response) {
            console.log(response)
            window.location.href = `./race.php?page=detail&raceId=${idRace}`
        }
    });
}