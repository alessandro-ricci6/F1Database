function getDriverNumber(numb) {
  if (numb == null) {
    return "";
  } else {
    return numb;
  }
}

function updateTable(driverList) {
  tableBody = document.getElementById("driverTableBody");
  while (tableBody.firstChild) {
    tableBody.removeChild(tableBody.firstChild);
  }

  for (const index in driverList) {
    tr = document.createElement("tr");
    driver = driverList[index];
    tr.innerHTML = `
        <td><a href="driver.php?page=detail&driverId=${driver.idDriver}">${
      driver.driverName + " " + driver.driverSurname
    }</a></td>
        <td>${driver.driverBirth}</td>
        <td>${driver.driverNationality}</td>
        <td>${getDriverNumber(driver.raceNumber)}</td>`;
    tableBody.appendChild(tr);
  }
}

function filterNationality() {
  selector = document.getElementById("nationalitySelect");
  $(selector).on("change", function () {
    nationality = selector.options[selector.selectedIndex].value;
    $.ajax({
      method: "POST",
      url: "./functions/driver.php",
      data: {
        filter: nationality,
        action: "filter",
      },
      success: function (response) {
        driverList = JSON.parse(response);
        updateTable(driverList);
      },
    });
  });
}

function updatePointTable(pointsList) {
  tableBody = document.getElementById("pointsTableBody");
  while (tableBody.firstChild) {
    tableBody.removeChild(tableBody.firstChild);
  }

  for (const index in pointsList) {
    tr = document.createElement("tr");
    driver = pointsList[index];
    tr.innerHTML = `
        <td><a href="driver.php?page=detail&driverId=${driver.idDriver}">${
      driver.driverName + " " + driver.driverSurname
    }</a></td>
        <td>${driver.pointsSum}</td>`;
    tableBody.appendChild(tr);
  }
}

function searchPoints() {
  pointInput = document.getElementById("pointInput");
  pointBtn = document.getElementById("pointBtn");
  pointBtn.addEventListener("click", function () {
    $.ajax({
      method: "POST",
      url: "./functions/driver.php",
      data: {
        points: pointInput.value,
        action: "totPoints",
      },
      success: function (response) {
        data = JSON.parse(response);
        updatePointTable(data);
      },
    });
  });
}

function searchDriver() {
  $("#searchDriver").on("keyup", function () {
    let query = $(this).val();
    if (query != "") {
      $.ajax({
        url: "functions/driver.php",
        method: "POST",
        data: {
          query: query,
          action: "search",
        },
        success: function (data) {
          $("#searchPopup").html(data);
        },
      });
    } else {
      $("#searchPopup").html("");
    }
  });
}

$(document).ready(filterNationality);
$(document).ready(searchPoints);
$(document).ready(searchDriver);
