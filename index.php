<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" integrity="sha512-usVBAd66/NpVNfBge19gws2j6JZinnca12rAe2l+d+QkLU9fiG02O1X8Q6hepIpr/EYKZvKx/I9WsnujJuOmBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css" integrity="sha512-jQqzj2vHVxA/yCojT8pVZjKGOe9UmoYvnOuM/2sQ110vxiajBU+4WkyRs1ODMmd4AfntwUEV4J+VfM6DkfjLRg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Movieflix CRUD</title>
</head>
<body>

  <?php require_once('includes/create.php'); ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>Movieflix CRUD</h1>
        <p>
          <strong>Description:</strong><br />
          This is a simple CRUD application (WIP) where the user can create, read, update and delete data.
        </p>
        <p>Technologies used:<br />
          <ul>
            <li>HTML</li>
            <li>CSS</li>
            <li>JavaScript</li>
            <li>PHP</li>
            <li>MySQL</li>
          </ul>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div id="movieflix-container">
        <?php
          // Connect to the database
          $servername = 'localhost';
          $username = 'movieflix';
          $password = 'movieflix123';
          $databasename = 'movieflix_db';

          $connection = mysqli_connect($servername, $username, $password, $databasename);
        
          if(!$connection) {
            die('Connection failed: '.mysqli_connect_error());
          }
          // } else {
          //   echo "Connection successful!<br /><br />";
          // }

          $sql = "SELECT * FROM movieflix_table ORDER BY id ASC";

          // Retrieve the result object
          $result = mysqli_query($connection, $sql);

          // Get the number of rows
          $number_of_rows = mysqli_num_rows($result);

          if($number_of_rows > 0) {
            echo "<table class='table'>
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Genre</th>
                        <th>Director</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
            ";
          }
          ?>

          <tbody>
            <?php while($row = $result->fetch_assoc()) : ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['genre']; ?></td>
                <td><?php echo $row['director']; ?></td>
                <td><a class="editRecord" data-bs-toggle="modal" data-bs-target="#editMovieModal"><i class="fas fa-edit"></i></a></td>
                <td><a class="deleteRecord" data-bs-toggle="modal" data-bs-target="#deleteMovieModal"><i class="fas fa-trash-alt"></i></a></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
          </table>
        </div><!-- End of movieflix-container -->

        <!-- Modal - Edit Movie -->
        <div class="modal fade" id="editMovieModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editMovieLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editMovieLabel">Edit A Movie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- UPDATE -->
                <form action="includes/update.php" method="POST" id="update-form">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="updateId" aria-describedby="updateId" placeholder="Enter movie id" name="update-id" />
                    <label for="floatingInput">Enter Record ID</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="updateTitle" aria-describedby="updateTitle" placeholder="Enter movie title" name="update-title" />
                    <label for="floatingInput">Enter movie title</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="updateGenre" aria-describedby="updateGenre" placeholder="Enter movie genre" name="update-genre" />
                    <label for="floatingInput">Enter movie genre</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="updateDirector" aria-describedby="updateDirector" placeholder="Enter movie director" name="update-director" />
                    <label for="floatingInput">Enter movie director</label>
                  </div>
                  <!-- <button type="submit" class="btn btn-primary" name="update-button">Save</button> -->
                  <input type="submit" class="btn btn-primary" name="edit-button" id="saveEditBtn" data-bs-dismiss="modal" aria-label="Close" value="Save" />
                </form>
              </div>
              <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" name="update-button" id="saveUpdateBtn">Save</button>
              </div> -->
            </div>
          </div>
        </div>

        <!-- Modal - Delete Movie -->
        <div class="modal fade" id="deleteMovieModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteMovieLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteMovieLabel">Delete A Movie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="includes/delete.php" method="POST" id="delete-form">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="deleteId" aria-describedby="deleteId" placeholder="Enter movie id" name="delete-id" />
                    <label for="floatingInput">Enter Record ID</label>
                  </div>
                  
                  <!-- <button type="submit" class="btn btn-primary" name="update-button">Save</button> -->
                  <input type="submit" class="btn btn-primary" name="delete-button" id="saveDeleteBtn" data-bs-dismiss="modal" aria-label="Close" value="Save" />
                </form>
              </div>
              <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" name="update-button" id="saveUpdateBtn">Save</button>
              </div> -->
            </div>
          </div>
        </div>

        <div id="addMovie-container">
          <button class="btn btn-primary" id="addMovie" data-bs-toggle="modal" data-bs-target="#addMovieModal">Add a movie</button>
          <!-- Modal - Add Movie -->
          <div class="modal fade" id="addMovieModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addMovieLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addMovieLabel">Add A Movie</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <!-- CREATE -->
                  <form action="includes/create.php" method="POST" id="create-form">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="createTitle" aria-describedby="createTitle" placeholder="Enter movie title" name="create-title" />
                      <label for="floatingInput">Enter movie title</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="createGenre" aria-describedby="createGenre" placeholder="Enter movie genre" name="create-genre" />
                      <label for="floatingInput">Enter movie genre</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="createDirector" aria-describedby="createDirector" placeholder="Enter movie director" name="create-director" />
                      <label for="floatingInput">Enter movie director</label>
                    </div>
                    <input type="submit" class="btn btn-primary" name="create-button" id="saveCreateBtn" data-bs-dismiss="modal" aria-label="Close" value="Save" />
                  </form>
                </div>
                <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" name="create-button" id="saveCreateBtn" data-bs-dismiss="modal">Save</button>
                </div> -->
              </div>
            </div>
          </div>
        </div><!-- End of addMovie-container -->

      </div><!-- End of col -->
    </div><!-- End of row -->
  </div><!-- End of container -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/script.js"></script>
</body>
</html>