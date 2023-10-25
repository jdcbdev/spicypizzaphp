<?php
require_once '../classes/staff.class.php';
require_once '../tools/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $staff = new Staff();

    // Fetch staff data (you should modify this to retrieve data from your database)
    $staffArray = $staff->show();
    $counter = 1;
?>
<?php
    if ($staffArray) {
        foreach ($staffArray as $item) {
?>
            <tr>
                <td><?= $counter ?></td>
                <td><?= $item['firstname'] . ' ' . $item['lastname'] ?></td>
                <td><?= $item['role'] ?></td>
                <td><?= $item['email'] ?></td>
                <td><?= $item['status'] ?></td>
                <td class="text-center"><a href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            </tr>
<?php
            $counter++;
        }
    }
}
?>

