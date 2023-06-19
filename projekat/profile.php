<?php
require_once "menu.php";
// session_start();
if (!isset($_SESSION["id"])) {
  header("Location: index.php");
}

require_once "connection.php";
require_once "validation.php";
$id = $_SESSION["id"];

$firstName = $lastName = $dob = $gender = $imageName = "";
$firstNameError = $lastNameError = $dobError = $genderError = $imageError = "";
$profileRow = profileExists($id, $conn);
// if profile doesn't exist; profile == false;
// if it does; profile == assoc array;
if ($profileRow !== false) {
  $firstName = $profileRow["first_name"];
  $lastName = $profileRow["last_name"];
  $gender = $profileRow["gender"];
  $dob = $profileRow["dob"];
}

$successMessage = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstName = $conn->real_escape_string($_POST["first_name"]);
  $lastName = $conn->real_escape_string($_POST["last_name"]);
  $dob = $conn->real_escape_string($_POST["dob"]);
  $gender = $conn->real_escape_string($_POST["gender"]);
  // ATTACH IMAGE NAME TO THE VARIABLE
  $image = $_FILES["profileImage"];
  $image_name = $image["name"];

  // validate form
  $firstNameError = nameValidation($firstName);
  $lastNameError = nameValidation($lastName);
  $genderError = genderValidation($gender);
  $dobError = dobValidation($dob);
  // VALIDATE IMAGE
  $imageError = imageValidation($image_name);


  if ($firstNameError == "" && $lastNameError == "" && $genderError == "" && $dobError == "" && $imageError == "") {
    // this logic provides either a create or update profile functionality
    //check validation.php to see profileExists

    $q = "";
    if ($profileRow === false) {

      $q = "INSERT INTO `profiles`(`first_name`,`last_name`,`gender`,`dob`, `user_id`, `profile_image`) 
      VALUE ('$firstName', '$lastName', '$gender', '$dob', $id, '$image_name');
      ";
    } else {
      $q = "UPDATE `profiles` 
       SET 
       `first_name` = '$firstName',
       `last_name` = '$lastName',
       `gender` = '$gender',
       `dob` = '$dob',
       `profile_image` = '$image_name'
       WHERE `user_id` = $id;
       ";

    }


    if ($conn->query($q)) {
      if ($profileRow !== false) {
        $successMessage = " You have edited your profile";
      } else {
        $successMessage = "You have created your profile";
      }

    } else {
      $errorMessage = "Error creating profile: " . $conn->error;
    }
  }
}

// extract profile details
$readProfileDetails = "SELECT concat(`first_name`, ' ', `last_name`) AS `name`, `gender`, `dob`, `profile_image` FROM `profiles` WHERE `user_id` = $id";
$executeRPD = $conn->query($readProfileDetails);
$row = $executeRPD->fetch_assoc();




?>


<!DOCTYPE html>
<html lang="en" style="overflow-Y: scroll;">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="style.css">
</head>

<body style="overflow: ;">
  <div class="profile-details">
    <p>User profile details:</p>
    <div class="profile-details--container">
      <?php
      if (strlen($row['profile_image']) != 0) {
        echo "<img src='profile_images/" . $row['profile_image'] . "' alt='profile image'  class='profile-image'>";
      } elseif ($row['gender'] == "m") {
        $src = "man-outline";
        echo "<ion-icon name= '" . $src . "'></ion-icon>";
      } elseif ($row['gender'] == "f") {
        $src = "woman-outline";
        echo "<ion-icon name= '" . $src . "'></ion-icon>";
      } else {
        $src = "person-outline";
        echo "<ion-icon name= '" . $src . "'></ion-icon>";
      }
      ?>
      <span style="vertical-align:middle;">
        <?php echo $row['name'] ?>
      </span>
    </div>
    <p>Gender:
      <?php echo $row['gender'] ?>
    </p>
    <p>Birthday:
      <?php echo $row['dob'] ?>
    </p>
  </div>
  <button onclick="following()" class="edit-profile--image">People you follow</button>
  <button onclick="editProfile()" class="edit-profile--image">Edit Profile</button>

  <p id="connections-following">Following:</p>
  <?php
  // extract followed users
  $follows = "SELECT `users`.`username`, `profiles`.`profile_image`, `followers`.`id_sender`, `followers`.`id_receiver` FROM `users`
LEFT JOIN `profiles` ON `users`.`id` = `profiles`.`user_id`
LEFT JOIN `followers` ON `users`.`id` = `followers`.`id_sender`
WHERE `followers`.`id_sender` = $id;
";
  $executeFollows = $conn->query($follows);

  while ($followsRow = $executeFollows->fetch_assoc()) {
    $tempRow = $followsRow['id_receiver'];
    $extractFollowedUser = "SELECT `users`.`username`, `profiles`.`profile_image`, `profiles`.`gender` FROM `users`
              LEFT JOIN `profiles` ON `users`.`id` = `profiles`.`user_id`
              WHERE `users`.`id` = $tempRow;";
    $executeExtractFollowedUser = $conn->query($extractFollowedUser);
    $rowEFU = $executeExtractFollowedUser->fetch_assoc();

    $imageSource = "";
    if ($rowEFU['profile_image'] != NULL) {
      $imageSource = "<img src='profile_images/" . $rowEFU['profile_image'] . "' alt='profile image' class='profile-image'>";
    } elseif ($rowEFU['gender'] == "m") {
      $src = "man-outline";
      $imageSource = "<ion-icon name='" . $src . "'></ion-icon>";
    } elseif ($rowEFU['gender'] == "f") {
      $src = "woman-outline";
      $imageSource = "<ion-icon name='" . $src . "'></ion-icon>";
    } elseif ($rowEFU['profile_image'] == NULL) {
      $src = "person-outline";
      $imageSource = "<ion-icon name='" . $src . "'></ion-icon>";
    }

    echo "<div class='myfollowerslist'>" . "<span>" . $rowEFU['username'] . "</span>" . " " . $imageSource . "</div></br>";
  }

  ?>


  <div class="profile-container">
    <div class="success">
      <?php echo $successMessage; ?>
    </div>
    <div class="error">
      <?php echo $errorMessage; ?>
    </div>
    <h1>Fill in the profile details</h1>
    <form action="#" method="POST" enctype="multipart/form-data">
      <p>
        <label for="first_name">First name:</label>
        <input nput type="text" name="first_name" id="first_name" value="<?php echo $firstName ?>">
        <span class="error">
          *
          <?php echo $firstNameError; ?>
        </span>
      </p>
      <p>
        <label for="last_name">Last name:</label>
        <input type="last_name" name="last_name" id="last_name" value="<?php echo $lastName ?>">
        <span class="error">
          *
          <?php echo $lastNameError ?>
        </span>
      </p>
      <p>
        <label for="gender">Gender:</label>
        <input type="radio" name="gender" id="m" value="m" <?php if ($gender == "m") {
          echo "checked";
        } ?>> Male
        <input type="radio" name="gender" id="f" value="f" <?php if ($gender == "f") {
          echo "checked";
        } ?>> Female
        <input type="radio" name="gender" id="o" value="o" <?php if ($gender == "o" || $gender == "") {
          echo "checked";
        } ?>> Other
        <span class="error">
          <?php echo $genderError; ?>
        </span>
      </p>
      <p>
        <label for="dob">Date of birth:</label>
        <input type="date" name="dob" id="dob" value="<?php echo $dob ?>">
        <span class="error">
          <?php echo $dobError ?>
        </span>
      </p>
      <p>
        <label for="image">Profile image:</label>
        <input type="file" name="profileImage" id="profileImage">
        <?php echo $imageError; ?>
      </p>
      <p>
        <?php
        $poruka;
        if ($profileRow === false) {
          $poruka = "Create profile";
        } else {
          $poruka = "Edit profile";
        }
        ?>
        <input type="submit" value="<?php echo ($profileRow === false) ? 'Create profile' : 'Edit profile'; ?>">
      </p>
    </form>
    <p>
      Go gack to <a href="index.php">home page</a>.
    </p>
  </div>
  <script>
    let connections = document.querySelector('#connections-following');
    function editProfile() {
      if (document.querySelector('.profile-container').style.display == "flex") {
        document.querySelector('.profile-container').style.display = "none";
      } else {
        document.querySelector('.profile-container').style.display = "flex";
      }

      let oneFollow = document.querySelector('.myfollowerslist');
      let following = document.querySelectorAll('.myfollowerslist');
      if (oneFollow.style.display == "flex") {
        following.forEach((person) => person.style.display = "none");
        connections.style.display = "none";
      }
    }

    function following() {

      let oneFollow = document.querySelector('.myfollowerslist');
      let following = document.querySelectorAll('.myfollowerslist');
      if (oneFollow.style.display == "flex") {
        following.forEach((person) => person.style.display = "none");
        connections.style.display = "none";
      } else {
        following.forEach((person) => person.style.display = "flex");
        connections.style.display = "block";
      }
      if (document.querySelector('.profile-container').style.display == "flex") {
        document.querySelector('.profile-container').style.display = "none";
      }
    }
  </script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>