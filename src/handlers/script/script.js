const applyButton = document.getElementById("apply-btn");
const optionDisabled = document.querySelectorAll("#tables option")[0].value;
const select = document.getElementById("tables");

select.addEventListener("change", () => {
  const selectedTable = select.options[select.selectedIndex].value;
  if (selectedTable === optionDisabled) {
    applyButton.disabled = true;
  } else {
    applyButton.disabled = false;
  }
});
