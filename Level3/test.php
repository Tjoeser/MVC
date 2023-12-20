<form action="test.php" method="get">
    <label for="name">Name:</label><br>
    <input type="text" id="checkbox[]" name="name" value=""><br><br>
    <label for="phone">Phone:</label><br>
    <input type="text" id="" name="phone" value=""><br><br>
    <label for="email">Email:</label><br>
    <input type="text" id="" name="email" value=""><br><br>
    <label for="address">Address:</label><br>
    <input type="text" id="" name="address" value=""><br><br>
    <label for="start">Start date:</label>
    <input type="date" id="start" name="trip-start" value="2023-10-25" min="2000-01-01" max="2100-12-31" /><br><br>
    <input type="submit" style="cursor:pointer" class="pagebutton" name="submit" value="Submit">
</form>

<?php

if (isset($_GET['submit'])) {
    $date = $_GET['trip-start'];
    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $email = $_GET['email'];
    $address = $_GET['address'];

    $list = array(
        array($name, $email, $phone, $address),
        array($date, "succesvol opgeslagen!")
    );

    $fp = fopen('file.csv', 'w');

    foreach ($list as $fields) {
        fputcsv($fp, $fields);
    }

    fclose($fp);
}
?>