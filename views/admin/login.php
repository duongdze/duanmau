<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Đăng nhập hệ thống</h2>

    <form action="?mode=admin&action=loginProcess" method="POST">
        <table>
            <tr>
                <td>Tên đăng nhập</td>
                <td><input type="text" name="email" required></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Đăng nhập"></td>
            </tr>
        </table>
        <?php if ($error): ?>
            <div class="error"><?php echo $error ?></div>
        <?php endif; ?>
    </form>
</body>
</html>