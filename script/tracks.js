function updateTable(trackList) {
  tableBody = document.getElementById("trackTableBody");
  while (tableBody.firstChild) {
    tableBody.removeChild(tableBody.firstChild);
  }

  for (const index in trackList) {
    tr = document.createElement("tr");
    track = trackList[index];
    tr.innerHTML = `
        <td><a href="./track.php?page=detail&trackId=${track.idTrack}">${track.trackName}</a></td>
        <td>${track.country}</td>
        <td>${track.city}</td>`;
    tableBody.appendChild(tr);
  }
}

function updateTrackPage(name, country, city, length) {
  trackName = document.getElementById("trackNameTitle");
  trackLocation = document.getElementById("locationPar");
  trackLength = document.getElementById("lengthPar");

  trackName.innerHTML = name;
  trackLocation.textContent = city + ", " + country;
  trackLength.textContent = length;
}

function filterTracks() {
  select = document.getElementById("countrySelect");
  $(select).on("change", function () {
    $.ajax({
      type: "POST",
      url: "functions/track.php",
      data: {
        action: "filter",
        filter: select.value,
      },
      success: function (response) {
        trackList = JSON.parse(response);
        updateTable(trackList);
      },
    });
  });
}

function addConfiguration() {
  const newLength = document.getElementById("lengthInput").value;
  const trackId = document.getElementById("newLengthBtn").dataset.bsTrackid;
  $.ajax({
    type: "POST",
    url: "functions/track.php",
    data: {
      action: "update",
      length: newLength,
      trackId: trackId,
    },
    success: function (response) {
      console.log(response);
      window.location.href = `./track.php?page=detail&trackId=${trackId}`;
    },
  });
}

$(document).ready(filterTracks);
