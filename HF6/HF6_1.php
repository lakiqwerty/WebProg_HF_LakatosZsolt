<?php

$errors = [];
$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['firstName'])) {
        $errors[] = "First name is required.";
    } else {
        $data['firstName'] = htmlspecialchars($_POST['firstName']);
    }

    if (empty($_POST['lastName'])) {
        $errors[] = "Last name is required.";
    } else {
        $data['lastName'] = htmlspecialchars($_POST['lastName']);
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    } else {
        $data['email'] = htmlspecialchars($_POST['email']);
    }


    if (empty($_POST['attend'])) {
        $errors[] = "You must select at least one event to attend.";
    } else {
        $data['attend'] = $_POST['attend'];
    }


    if (isset($_FILES['abstract']) && $_FILES['abstract']['error'] === UPLOAD_ERR_OK) {
        $fileType = mime_content_type($_FILES['abstract']['tmp_name']);
        $fileSize = $_FILES['abstract']['size'];
        if ($fileType !== 'application/pdf') {
            $errors[] = "Only PDF files are allowed for the abstract.";
        }
        if ($fileSize > 3 * 1024 * 1024) {
            $errors[] = "The abstract file must be less than 3MB.";
        }
    } else {
        $errors[] = "Abstract file is required.";
    }


    if (empty($_POST['terms'])) {
        $errors[] = "You must agree to the terms and conditions.";
    }


    if (empty($errors)) {
        echo "<h3>Submitted Data:</h3>";
        foreach ($data as $key => $value) {
            if ($key == 'attend') {
                echo "<p>Events: " . implode(', ', $value) . "</p>";
            } else {
                echo "<p>$key: $value</p>";
            }
        }
        echo "<p>Abstract uploaded successfully.</p>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Conference Registration</title>
</head>
<body>

<h3>Online conference registration</h3>


<?php if (!empty($errors)): ?>
    <h3>Errors:</h3>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


<form method="post" action="" enctype="multipart/form-data">
    <label for="fname"> First name:
        <input type="text" name="firstName" value="<?php echo isset($data['firstName']) ? $data['firstName'] : ''; ?>">
    </label>
    <br><br>
    <label for="lname"> Last name:
        <input type="text" name="lastName" value="<?php echo isset($data['lastName']) ? $data['lastName'] : ''; ?>">
    </label>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
    </label>
    <br><br>
    <label for="attend"> I will attend:<br>
        <input type="checkbox" name="attend[]" value="Event1" <?php echo (isset($data['attend']) && in_array('Event1', $data['attend'])) ? 'checked' : ''; ?>>Event 1<br>
        <input type="checkbox" name="attend[]" value="Event2" <?php echo (isset($data['attend']) && in_array('Event2', $data['attend'])) ? 'checked' : ''; ?>>Event 2<br>
        <input type="checkbox" name="attend[]" value="Event3" <?php echo (isset($data['attend']) && in_array('Event3', $data['attend'])) ? 'checked' : ''; ?>>Event 3<br>
        <input type="checkbox" name="attend[]" value="Event4" <?php echo (isset($data['attend']) && in_array('Event4', $data['attend'])) ? 'checked' : ''; ?>>Event 4<br>
    </label>
    <br><br>
    <label for="tshirt"> What's your T-Shirt size?<br>
        <select name="tshirt">
            <option value="P" <?php echo (isset($_POST['tshirt']) && $_POST['tshirt'] == 'P') ? 'selected' : ''; ?>>Please select</option>
            <option value="S" <?php echo (isset($_POST['tshirt']) && $_POST['tshirt'] == 'S') ? 'selected' : ''; ?>>S</option>
            <option value="M" <?php echo (isset($_POST['tshirt']) && $_POST['tshirt'] == 'M') ? 'selected' : ''; ?>>M</option>
            <option value="L" <?php echo (isset($_POST['tshirt']) && $_POST['tshirt'] == 'L') ? 'selected' : ''; ?>>L</option>
            <option value="XL" <?php echo (isset($_POST['tshirt']) && $_POST['tshirt'] == 'XL') ? 'selected' : ''; ?>>XL</option>
        </select>
    </label>
    <br><br>
    <label for="abstract"> Upload your abstract<br>
        <input type="file" name="abstract"/>
    </label>
    <br><br>
    <input type="checkbox" name="terms" value="1" <?php echo isset($_POST['terms']) ? 'checked' : ''; ?>> I agree to terms & conditions.<br>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>

</body>
</html>
