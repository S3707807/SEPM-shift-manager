<!DOCTYPE html>
<html>

<body>
    <h2>Create account</h2>
    <form method="post" action="process_register.php">
        <table>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>First name</td>
                <td><input type="text" name="firstname"></td>
            </tr>
            <tr>
                <td>Last name</td>
                <td><input type="text" name="lastname"></td>
            </tr>
            <tr>
                <td>Work limit</td>
                <td><input type="number" name="worklimit" min="0" max="168" placeholder="(hours)"></td>
            </tr>
            <tr>
                <td>Account type</td>
                <td>
                    <select name="role">
                        <option value="none">None</option>
                        <option value="manager">Manager</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="tel" name="phone" placeholder="0123 456 789"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Create" /></td>
            </tr>
        </table>
    </form>
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
            echo ("<p>Account has been created</p>");
        } else {
            echo ("<p>The query returned an error.</p>");
        }
    }
    ?>
    <h2>Staff accounts</h2>
    <table>
        <?php
        //connect to the db
        $db = mysqli_connect("localhost", "root", "", "work");

        //query
        $q = "SELECT * FROM staff";
        $result = mysqli_query($db, $q);
        // If empty returned
        if (mysqli_num_rows($result) == 0) {
            echo ("0 accounts found");
        } else {
            echo ("<tr>
                <th>ID</th>
                <th>Name</th>
                <th>Role</th>
                </tr>");
            while ($row = mysqli_fetch_assoc($result)) {
                echo ("<tr>
                    <td>$row[staff_id]</td>
                    <td><a href='profile.php?staff_id=$row[staff_id]'>$row[firstname] $row[lastname]</a></td>
                    <td>$row[role]</td>
                    </tr>");
            }
        }
        ?>
    </table>
</body>

</html>