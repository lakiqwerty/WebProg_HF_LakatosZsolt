<?php
$errors = [];
$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['name'])) {
        $errors[] = "The name field is required.";
    } else {
        $data['name'] = htmlspecialchars($_POST['name']);
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    } else {
        $data['email'] = htmlspecialchars($_POST['email']);
    }

    if (empty($_POST['password'])) {
        $errors[] = "Password is required.";
    } else {
        $password = $_POST['password'];
        if (strlen($password) < 8 ||
            !preg_match('/[A-Z]/', $password) ||
            !preg_match('/\d/', $password) ||
            !preg_match('/\W/', $password)) {
            $errors[] = "Password must be at least 8 characters long, and contain at least one uppercase letter, one number, and one special character.";
        }
    }

    if (empty($_POST['confirm_password']) || $_POST['confirm_password'] !== $_POST['password']) {
        $errors[] = "Password confirmation does not match.";
    }

    if (empty($_POST['birthdate']) || !strtotime($_POST['birthdate'])) {
        $errors[] = "A valid birthdate is required.";
    } else {
        $data['birthdate'] = htmlspecialchars($_POST['birthdate']);
    }

    if (!empty($_POST['gender'])) {
        $data['gender'] = $_POST['gender'];
    }

    if (!empty($_POST['interests'])) {
        $data['interests'] = $_POST['interests'];
    }

    if (!empty($_POST['country'])) {
        $data['country'] = $_POST['country'];
    }

    if (empty($errors)) {
        echo "<h3>Submitted Data:</h3>";
        foreach ($data as $key => $value) {
            if ($key == 'interests') {
                echo "<p>Interests: " . implode(', ', $value) . "</p>";
            } else {
                echo "<p>$key: $value</p>";
            }
        }
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
</head>
<body>

<h3>Registration Form</h3>

<?php if (!empty($errors)): ?>
    <h3>Errors:</h3>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" action="">
    <label for="name">Name:
        <input type="text" name="name" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>">
    </label>
    <br><br>
    <label for="email">Email:
        <input type="text" name="email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
    </label>
    <br><br>
    <label for="password">Password:
        <input type="password" name="password">
    </label>
    <br><br>
    <label for="confirm_password">Confirm Password:
        <input type="password" name="confirm_password">
    </label>
    <br><br>
    <label for="birthdate">Birthdate:
        <input type="date" name="birthdate" value="<?php echo isset($data['birthdate']) ? $data['birthdate'] : ''; ?>">
    </label>
    <br><br>
    <label for="gender">Gender:<br>
        <input type="radio" name="gender" value="Male" <?php echo (isset($data['gender']) && $data['gender'] == 'Male') ? 'checked' : ''; ?>> Male<br>
        <input type="radio" name="gender" value="Female" <?php echo (isset($data['gender']) && $data['gender'] == 'Female') ? 'checked' : ''; ?>> Female<br>
        <input type="radio" name="gender" value="Other" <?php echo (isset($data['gender']) && $data['gender'] == 'Other') ? 'checked' : ''; ?>> Other<br>
    </label>
    <br><br>
    <label for="interests">Interests:<br>
        <input type="checkbox" name="interests[]" value="Sports" <?php echo (isset($data['interests']) && in_array('Sports', $data['interests'])) ? 'checked' : ''; ?>> Sports<br>
        <input type="checkbox" name="interests[]" value="Arts" <?php echo (isset($data['interests']) && in_array('Arts', $data['interests'])) ? 'checked' : ''; ?>> Arts<br>
        <input type="checkbox" name="interests[]" value="Science" <?php echo (isset($data['interests']) && in_array('Science', $data['interests'])) ? 'checked' : ''; ?>> Science<br>
    </label>
    <br><br>
    <label for="country">Country:<br>
        <select name="country">
            <option value="">Please select</option>
            <option value="Hungary" <?php echo (isset($data['country']) && $data['country'] == 'Hungary') ? 'selected' : ''; ?>>Hungary</option>
            <option value="USA" <?php echo (isset($data['country']) && $data['country'] == 'USA') ? 'selected' : ''; ?>>USA</option>
            <option value="Germany" <?php echo (isset($data['country']) && $data['country'] == 'Germany') ? 'selected' : ''; ?>>Germany</option>
            <option value="Romania" <?php echo (isset($data['country']) && $data['country'] == 'Romania') ? 'selected' : ''; ?>>Romania</option>
            <option value="Philippines" <?php echo (isset($data['country']) && $data['country'] == 'Philippines') ? 'selected' : ''; ?>>Philippines</option>
            <option value="Kenya" <?php echo (isset($data['country']) && $data['country'] == 'Kenya') ? 'selected' : ''; ?>>Kenya</option>
            <option value="Saudi Arabia" <?php echo (isset($data['country']) && $data['country'] == 'Saudi Arabia') ? 'selected' : ''; ?>>Saudi Arabia</option>
            <option value="Mongolia" <?php echo (isset($data['country']) && $data['country'] == 'Mongolia') ? 'selected' : ''; ?>>Mongolia</option>

        </select>
    </label>
    <br><br>
    <input type="submit" value="Register">
</form>

</body>
</html>
