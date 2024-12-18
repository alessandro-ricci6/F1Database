const modal = document.getElementById('modifyContractModal');
const modalStartYear = document.getElementById('signYearModal');
const modalEndYear = document.getElementById('expYearModal');
const teamSelect = document.getElementById('teamModal');
const saveBtn = document.getElementById('saveBtn')

modal.addEventListener('show.bs.modal', function (event) {
  // Get the button that triggered the modal
  const button = event.relatedTarget;

  // Extract data attributes from the button
  const startYear = parseInt(button.dataset.bsSyear);
  const endYear = parseInt(button.dataset.bsEyear);
  const teamId = button.dataset.bsTeam;
  const contractId = button.dataset.bsContractid;

  console.log(contractId)
  // Set the values in the modal body
  modalStartYear.value = startYear;
  modalEndYear.value = endYear;
  teamSelect.value = teamId;
  saveBtn.dataset.bsContract = `${contractId}`;
});

function updateContractTable(){
  const tableBody = document.getElementById("contractTableBody");
  while (tableBody.firstChild) {
      tableBody.removeChild(tableBody.firstChild);
  }
  const driver = tableBody.dataset.bsDriver;
  console.log(driver)
  $.ajax({
    type: "POST",
    url: "./functions/contract.php",
    data: {
      action: 'get',
      driver: driver,
    },
    success: function (response) {
      contractList = JSON.parse(response)
      for(index in contractList){
        let contract = contractList[index]
        let tr = document.createElement("tr");
        tr.innerHTML = `
        <td>${contract.signingYear}</td>
        <td>${contract.expirationYear}</td>
        <td><a href="team.php?page=detail&teamId=${contract.idTeam}">${contract.teamName}</a></td>
        <td><button type="button" class="btn btn-primary"
        data-bs-toggle="modal" data-bs-target="#modifyContractModal"
        data-bs-syear="${contract.signingYear}"
        data-bs-eyear="${contract.expirationYear}"
        data-bs-team="${contract.idTeam}"
        data-bs-contractId="${contract.idContract}">
                Edit
            </button>
        </td>`;
        tableBody.appendChild(tr);
      }
    }
  });
}

function saveContract(){
    id = saveBtn.dataset.bsContract;
    const team = document.getElementById("teamModal").value
    const eYear = document.getElementById("expYearModal").value
    const sYear = document.getElementById("signYearModal").value

    console.log(team + eYear + sYear)

    $.ajax({
        type: "POST",
        url: "./functions/contract.php",
        data: {
          action: "edit",
          contract: id,
          team: team,
          eYear: eYear,
          sYear: sYear
        },
        success: function (response) {
            console.log(response)
            updateContractTable()
        }
    });
}

function deleteContract(){
  id = saveBtn.dataset.bsContract;
  if(id != null){
    $.ajax({
      type: "POST",
      url: "./functions/contract.php",
      data: {
        action: 'delete',
        contract: id,
      },
      success: function (response) {
        console.log(response)
        updateContractTable();
      }
    });
  }
}