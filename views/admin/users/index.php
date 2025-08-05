<?php include PATH_VIEW_ADMIN. '/default/header.php'; ?><table class="table">
    <tr>
        <th>ID</th>
        <th>AVATAR</th>
        <th>NAME</th>
        <th>PASSWORD</th>
        <th>EMAIL</th>
        <th>FULL NAME</th>
        <th>PHONE NUMBER</th>
        <th>USER TYPE</th>
        <th>ACTION</th>
    </tr>

    <?php foreach ($data as $user){ ?>
        <tr>
            <td><?= $user['user_id'] ?></td>
            <td>
                <?php if (!empty($user['avatar'])): ?>
                    <img src="<?= BASE_ASSETS_UPLOADS . $user['avatar'] ?>" width="100px">
                <?php endif; ?>
            </td>
            <td><?= $user['username'] ?></td>
            <td><?= $user['password_hash'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['full_name'] ?></td>
            <td><?= $user['phone_number'] ?></td>
            <td><?= $user['user_type'] ?></td>
            <td>
                <a href="<?= BASE_URL_ADMIN . '&action=users-show&id=' . $user['user_id'] ?>"
                    class="btn btn-info">Xem</a>

                <a href="<?= BASE_URL_ADMIN . '&action=users-edit&id=' . $user['user_id'] ?>"
                    class="btn btn-warning ms-3 me-3">Sửa</a>

                <a href="<?= BASE_URL_ADMIN . '&action=users-delete&id=' . $user['user_id'] ?>"
                    onclick="return confirm('Có chắc xóa không?')"
                    class="btn btn-danger">Xóa</a>
            </td>
        </tr>
    <?php } ?>
</table>