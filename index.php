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
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>Movieflix CRUD</h1>
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
          } else {
            echo "Connection successful!<br /><br />";
          }

          $sql = "SELECT * FROM movieflix_table";

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
                <td><a class="editRecord"><i class="fas fa-edit"></i></a></td>
                <td><a class="deleteRecord"><i class="fas fa-trash-alt"></i></a></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/script.js"></script>
</body>
</html>