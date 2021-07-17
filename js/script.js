let movieflixContainer = document.getElementById('movieflix-container');
let deleteRecord = document.getElementById('deleteRecord');

// Event Listeners
movieflixContainer.addEventListener('click', editRecord);
movieflixContainer.addEventListener('click', removeRecord);

// editRecord
function editRecord(e) {
    

  e.preventDefault();
}

function removeRecord(e) {
  if(e.target.parentElement.classList.contains('editRecord')){
    console.log(e.target.parentElement.parentElement.parentElement);
  }
  

  e.preventDefault();
}