function updateStaffContract() {
  const staffId = document.getElementById("editContractBtn").dataset.bsStaffid;
  const contractId =
    document.getElementById("editContractBtn").dataset.bsContractid;
  const sDate = document.getElementById("signDateModal").value;
  const eDate = document.getElementById("expDateModal").value;

  if (sDate != "") {
    $.ajax({
      type: "POST",
      url: "functions/contract.php",
      data: {
        action: "updateStaffContract",
        contractId: contractId,
        sDate: sDate,
        eDate: eDate,
      },
      success: function () {
        window.location.href = `./staff.php?page=detail&staffId=${staffId}`;
      },
    });
  }
}

function deleteStaffContract() {
  const staffId = document.getElementById("editContractBtn").dataset.bsStaffid;
  const contractId =
    document.getElementById("editContractBtn").dataset.bsContractid;
  console.log(staffId);
  $.ajax({
    type: "POST",
    url: "functions/contract.php",
    data: {
      action: "deleteStaffContract",
      contractId: contractId,
    },
    success: function () {
      window.location.href = `./staff.php?page=detail&staffId=${staffId}`;
    },
  });
}

function updateDriverContract() {
  const driverId =
    document.getElementById("editContractBtn").dataset.bsDriverid;
  const contractId =
    document.getElementById("editContractBtn").dataset.bsContractid;
  const sDate = document.getElementById("signDateModal").value;
  const eDate = document.getElementById("expDateModal").value;
  console.log(driverId, contractId, sDate, eDate);

  if (sDate != "") {
    $.ajax({
      type: "POST",
      url: "functions/contract.php",
      data: {
        action: "updateDriverContract",
        contractId: contractId,
        sDate: sDate,
        eDate: eDate,
      },
      success: function () {
        window.location.href = `./driver.php?page=detail&driverId=${driverId}`;
      },
    });
  }
}

function deleteDriverContract() {
  const driverId =
    document.getElementById("editContractBtn").dataset.bsDriverid;
  const contractId =
    document.getElementById("editContractBtn").dataset.bsContractid;
  $.ajax({
    type: "POST",
    url: "functions/contract.php",
    data: {
      action: "deleteDriverContract",
      contractId: contractId,
    },
    success: function () {
      window.location.href = `./driver.php?page=detail&driverId=${driverId}`;
    },
  });
}
