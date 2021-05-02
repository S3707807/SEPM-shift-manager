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

</body>

</html>