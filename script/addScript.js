function validateTeamForm(teamName, nationality, headquarter) {
  if ((teamName != "") & (nationality != "") & (headquarter != "")) {
    return true;
  }
  return false;
}

function validateTrackForm(trackName, country, city, length) {
  if ((trackName != "") & (country != "") & (city != "") & (length > 0)) {
    return true;
  }
  return false;
}

function validateDriverForm(numb, birth) {
  splitBirth = birth.split("-");
  year = parseInt(splitBirth[0]);

  if ((numb >= 1) & (numb <= 99) & (year <= 2024) & (year >= 1900)) {
    return true;
  }
  return false;
}

function validateContractForm(signYear, expYear) {
  if ((signYear != "") & (expYear != "") & (signYear <= expYear)) {
    return true;
  }
  return false;
}

function validateChampionshipForm(season, round) {
  if ((season > 1949) & (season < 2150) & (round != 0)) {
    return true;
  }
  return false;
}

function addTeam() {
  const name = document.getElementById("nameInput").value;
  const nationality = document.getElementById("nationalityInput").value;
  if (name !== "" && nationality !== "") {
    $.ajax({
      type: "POST",
      url: "functions/team.php",
      data: {
        action: "add",
        name: name,
        nationality: nationality,
      },
      success: function (response) {
        data = JSON.parse(response);
        console.log(data);
        window.location.href = `./team.php?page=detail&teamId=${data}`;
      },
    });
  }
}

function addTrack() {
  trackName = document.getElementById("nameInput").value;
  country = document.getElementById("countryInput").value;
  city = document.getElementById("cityInput").value;
  if (trackName !== "" && country !== "" && city !== "") {
    $.ajax({
      type: "POST",
      url: "functions/track.php",
      data: {
        action: "add",
        trackName: trackName,
        country: country,
        city: city,
      },
      success: function (response) {
        data = JSON.parse(response);
        window.location.href = `./track.php?page=detail&trackId=${data}`;
      },
    });
  } else {
    alert("Fill the form before continue");
  }
}

function addDriver() {
  const name = document.getElementById("nameInput").value;
  const surname = document.getElementById("surnameInput").value;
  const nationality = document.getElementById("nationalityInput").value;
  const number = document.getElementById("numberInput").value;
  const birth = document.getElementById("birthInput").value;

  if (name !== "" && surname !== "" && nationality !== "" && birth !== "") {
    $.ajax({
      type: "POST",
      url: "functions/driver.php",
      data: {
        action: "add",
        name: name,
        surname: surname,
        nationality: nationality,
        birth: birth,
        number: number,
      },
      success: function (response) {
        data = JSON.parse(response);
        window.location.href = `./driver.php?page=detail&driverId=${data}`;
      },
    });
  } else {
    alert("Error, fill the form");
  }
}

function addContract() {
  addBtn = document.getElementById("addContractBtn");
  driverSelect = document.getElementById("driverSelect");
  teamSelect = document.getElementById("teamSelect");
  driverId = driverSelect.options[driverSelect.selectedIndex].value;
  teamId = teamSelect.options[teamSelect.selectedIndex].value;
  signYear = document.getElementById("signInput");
  expYear = document.getElementById("expirationInput");

  if (validateContractForm(signYear.value, expYear.value)) {
    $.ajax({
      method: "POST",
      url: "./functions/contract.php",
      data: {
        driverId: driverId,
        teamId: teamId,
        signYear: signYear.value,
        expYear: expYear.value,
        action: "add",
      },
      success: function (response) {
        console.log(response);
        window.location.href = `./driver.php?page=detail&driverId=${driverId}`;
      },
    });
  } else {
    alert("Error");
  }
}

function addChampionship() {
  seasonYear = document.getElementById("seasonInput").value;
  round = document.getElementById("roundInput").value;
  if (validateChampionshipForm(seasonYear, round)) {
    $.ajax({
      type: "POST",
      url: "functions/championship.php",
      data: {
        action: "add",
        season: seasonYear,
        round: round,
      },
      success: function (response) {
        window.location.href = `./championship.php?page=detail&championshipYear=${seasonYear}`;
      },
    });
  }
}

function addStaff() {
  const staffName = document.getElementById("nameInput").value;
  const staffSurname = document.getElementById("surnameInput").value;
  const staffNationality = document.getElementById("nationalityInput").value;

  $.ajax({
    type: "POST",
    url: "functions/staff.php",
    data: {
      action: "add",
      name: staffName,
      surname: staffSurname,
      nationality: staffNationality,
    },
    success: function (response) {
      data = JSON.parse(response)
      window.location.href = `./staff.php?page=detail&staffId=${data}`;
    },
  });
}

function addRace() {
  season = document.getElementById("seasonSelect").value;
  track = document.getElementById("trackSelect").value;
  round = document.getElementById("roundInput").value;
  raceType = document.querySelector(
    'input[type="radio"][name="flexRadioDefault"]:checked'
  );
  laps = document.getElementById("lapsInput").value;
  date = document.getElementById("dateInput").value;
  raceName = document.getElementById("raceNameInput").value;
  console.log(raceType);
  $.ajax({
    type: "POST",
    url: "functions/race.php",
    data: {
      action: "addRace",
      season: season,
      track: track,
      round: round,
      raceType: raceType.value,
      laps: laps,
      date: date,
      raceName: raceName,
    },
    success: function (response) {
      datas = JSON.parse(response);
      window.location.href = `./race.php?page=detail&raceId=${datas}`;
    },
  });
}

function addStaffContract(){
  const staffId = document.getElementById("staffSelect").value
  const teamId = document.getElementById("teamSelect").value
  const sDate = document.getElementById("signInput").value
  const eDate = document.getElementById("expirationInput").value
  const role = document.getElementById("roleInput").value
  console.log(sDate, eDate)
  if(role !== ''){
    $.ajax({
      type: "POST",
      url: "functions/staff.php",
      data: {
        action: 'addContract',
        staffId: staffId,
        teamId: teamId,
        sDate: sDate,
        eDate: eDate,
        role: role
      },
      success: function (response) {
        console.log(response)
        window.location.href = `./staff.php?page=detail&staffId=${staffId}`;
      }
    });
  }
}