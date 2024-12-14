const modal = document.getElementById('staticBackdrop');
const modalStartYear = document.getElementById('modalStartYear');
const modalEndYear = document.getElementById('modalEndYear');
const modalDriverId = document.getElementById('modalDriverId');

modal.addEventListener('show.bs.modal', function (event) {
  // Get the button that triggered the modal
  const button = event.relatedTarget;

  // Extract data attributes from the button
  const startYear = button.dataset.bsSyear;
  const endYear = button.dataset.bsEyear;
  const driverId = button.dataset.bsDriver;

  // Set the values in the modal body
  modalStartYear.textContent = startYear;
  modalEndYear.textContent = endYear;
  modalDriverId.textContent = driverId;
});