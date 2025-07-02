<?php
require_once 'db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <th>
            <tr>
                <td>id</td>
                <td>username</td>
                <td>age</td>
                <td>email</td>
                <td>gender</td>
                <td>program</td>
            </tr>
        </th>
        <tbody>
            <?php
            $sql = "SELECT * FROM student";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['program']) . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>