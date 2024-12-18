function updateTable(racesList) {
  tableBody = document.getElementById("racesTableBody");
  while (tableBody.firstChild) {
    tableBody.removeChild(tableBody.firstChild);
  }
  console.log(racesList);
  for (const index in racesList) {
    tr = document.createElement("tr");
    race = raceList[index];
    tr.innerHTML = `
        <td>${race["championshipYear"]}</td>
        <td>${race["round"]}</td>
        <td><a href="track.php?page=detail&trackId=${race["idTrack"]}">${
      race["trackName"]
    }</a></td>
        <td>${race["city"] + ", " + race["country"]}</td>
        <td>${race["raceType"]}</td>
		<td>
			<a href="race.php?page=detail&raceId=${
        race["idRace"]
      }" class="btn btn-dark">Information</a>
		</td>`;
    tableBody.appendChild(tr);
  }
}

function filterRace() {
  selector = document.getElementById("seasonSelect");
  $(selector).on("change", function () {
    season = selector.options[selector.selectedIndex].value;
    $.ajax({
      method: "POST",
      url: "./functions/race.php",
      data: {
        filter: season,
        action: "filter",
      },
      success: function (response) {
        raceList = JSON.parse(response);
        updateTable(raceList);
      },
    });
  });
}

$(document).ready(filterRace);
