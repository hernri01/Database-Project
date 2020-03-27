function validateForm()
{
    var x = document.forms["app"].["eid"].value;
    if (x === "" ) {
      alert("Name must be filled out");
      return false;
    }
}