// Kaizen Batang - 11/3/2025

document.addEventListener('DOMContentLoaded', function () {
  var teamSelect = document.getElementById('team_select');
  var newFields = document.getElementById('new_team_fields');
  var newName = document.getElementById('new_team_name');
  var newDesc = document.getElementById('new_team_description');

  function toggleNewTeamFields() {
    if (!teamSelect) return;
    if (teamSelect.value === '__new') {
      newFields.classList.remove('d-none');
      newName.setAttribute('required', 'required');
      newDesc.setAttribute('required', 'required');
    } else {
      newFields.classList.add('d-none');
      newName.removeAttribute('required');
      newDesc.removeAttribute('required');
      newName.value = '';
      newDesc.value = '';
    }
  }

  if (teamSelect) {
    teamSelect.addEventListener('change', toggleNewTeamFields);
    toggleNewTeamFields();
  }
});