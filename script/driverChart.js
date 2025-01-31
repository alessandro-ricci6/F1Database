const chart = document.getElementById("driverChart");
let raceList;
let labels = [];
let data = [];

posChart = new Chart(chart, {
  type: "line",
  data: {
    labels: labels,
    datasets: [
      {
        label: "Position",
        data: data,
        borderWidth: 1,
      },
    ],
  },
  options: {
    plugins: {
      legend: {
        display: false,
      },
    },
    scales: {
      y: {
        reverse: true,
        min: 1,
        max: 25,
        beginAtZero: false,
      },
      x: {
        display: false,
      },
    },
  },
});

function removeData() {
  posChart.data.labels.pop();
  posChart.data.datasets.forEach((dataset) => {
    dataset.data.pop();
  });
  posChart.update();
}

function addData(label, newData) {
  posChart.data.labels.push(label);
  posChart.data.datasets.forEach((dataset) => {
    dataset.data.push(newData);
  });
  posChart.update();
}

function setTitle(year) {
  title = document.getElementById("yearTitle");
  title.innerHTML = year;
}

function setLabels() {
  for (i in raceList) {
    labels.push(
      raceList[i]["trackName"] +
        "\nRound: " +
        raceList[i]["round"] +
        " - " +
        raceList[i]["raceType"] +
        " race\nEnd Status: " +
        raceList[i]["endingStatus"]
    );
  }
}

function setData() {
  for (i in raceList) {
    data.push(raceList[i]["finishingPosition"]);
  }
  console.log(data);
}

function getList() {
  select = document.getElementById("seasonSelect");
  $(select).on("change", function () {
    driver = $(select).attr("data-bs-driverId");
    $.ajax({
      type: "POST",
      url: "functions/driver.php",
      data: {
        action: "result",
        driver: driver,
        season: select.options[select.selectedIndex].value,
      },
      success: function (response) {
        console.log(response)
        raceList = JSON.parse(response);
        removeData();
        setLabels();
        setData();
        addData(labels, data);
        setTitle(select.options[select.selectedIndex].text);
      },
    });
  });
}

$(document).ready(getList);
