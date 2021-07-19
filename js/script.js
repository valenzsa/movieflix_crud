const movieflixContainer = document.getElementById('movieflix-container');
// const addMovieContainer = document.getElementById('addMovie-container');
const deleteForm = document.getElementById('delete-form');
const inputDeleteID = document.getElementById('deleteId');
const updateForm = document.getElementById('update-form');
const inputUpdateID = document.getElementById('updateId');
const inputUpdateTitle = document.getElementById('updateTitle');
const inputUpdateGenre = document.getElementById('updateGenre');
const inputUpdateDirector = document.getElementById('updateDirector');
let id = 0;
let title = '';
let genre = '';
let director = '';

// // Event Listeners
// addMovieContainer.addEventListener('click', addMovie);
movieflixContainer.addEventListener('click', editRecord);
movieflixContainer.addEventListener('click', removeRecord);

// addMovie

// function addMovie(e) {
//   console.log(e.target);
//   e.preventDefault();
// }


function editRecord(e) {
  //console.log(e);
  if(e.target.parentElement.classList.contains('editRecord')){

    // Grab id
    id = e.target.parentElement.parentElement.parentElement.getElementsByTagName("td")[0].innerText;
    inputUpdateID.value = id;

    // Grab title
    title = e.target.parentElement.parentElement.parentElement.getElementsByTagName("td")[1].innerText;
    inputUpdateTitle.value = title;

    // Grab genre
    genre = e.target.parentElement.parentElement.parentElement.getElementsByTagName("td")[2].innerText;
    inputUpdateGenre.value = genre;

    // Grab director
    director = e.target.parentElement.parentElement.parentElement.getElementsByTagName("td")[3].innerText;
    inputUpdateDirector.value = director;

  }
}

function removeRecord(e) {
  //console.log(e);
  if(e.target.parentElement.classList.contains('deleteRecord')){
    // console.log(e.target.parentElement.parentElement);
    // console.log(e.target.parentElement.parentElement.parentElement);
    id = e.target.parentElement.parentElement.parentElement.getElementsByTagName("td")[0].innerText;
    //console.log(id);
    inputDeleteID.value = id;

  }
  

//   e.preventDefault();
}