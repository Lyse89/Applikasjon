function sjekkFelt() {
  if (document.getElementById("til").value == "") {
    return false;
  }
  if (document.getElementById("fra").value == "") {
    return false;
  }
  if (document.getElementById("subj").value == "") {
    return false;
  }
  document.getElementById("send").style.backgroundColor = "#aaffaa";
}
function sjekkSubmit() {
  if (!document.getElementById("subj").value) {
    alert("Du bør angi hva meldingen gjelder.");
    document.getElementById("subj").focus();
    return false;
  }
  return true;
}
