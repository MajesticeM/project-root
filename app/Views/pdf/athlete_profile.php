<!-- Add this content to athlete_profile.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Athlete Profile</title>
</head>
<body>
    <h2>Athlete Profile</h2>
    <p>Name: <?= $athleteProfile['name']; ?></p>
    <p>Date of Birth: <?= $athleteProfile['dob']; ?></p>
    <p>Height (cm): <?= $athleteProfile['height']; ?></p>
    <p>Weight (kg): <?= $athleteProfile['weight']; ?></p>
    <!-- Add other fields as needed -->
</body>
</html>