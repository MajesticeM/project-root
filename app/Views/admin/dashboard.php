<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .action-links a {
            margin-right: 5px;
        }
    </style>

    <h2>Admin Dashboard</h2>

    <h3>Coaches</h3>
    <table>
        <!-- Display table headers -->
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <!-- Display coaches -->
        <tbody>
            <?php foreach ($coaches as $coach): ?>
                <tr>
                    <td><?= $coach['id'] ?></td>
                    <td><?= $coach['name'] ?></td>
                    <td><?= $coach['email'] ?></td>
                    <td><?= $coach['status'] ?></td>
                    <td class="action-links">
                        <a class="btn btn-success" href="<?= base_url("/admin/approveUser/{$coach['id']}") ?>">Approve</a>
                        <a class="btn btn-danger" href="<?= base_url("/admin/declineUser/{$coach['id']}") ?>">Decline</a>
                        <a class="btn btn-warning" href="<?= base_url("/admin/suspendUser/{$coach['id']}") ?>">Suspend</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3>Athletes</h3>
    <table>
        <!-- Display table headers -->
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Sport</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <!-- Display athletes -->
        <tbody>
            <?php foreach ($athletes as $athlete): ?>
                <tr>
                    <td><?= $athlete['id'] ?></td>
                    <td><?= $athlete['name'] ?></td>
                    <td><?= $athlete['email'] ?></td>
                    <td><?= $athlete['sport'] ?></td>
                    <td><?= $athlete['status'] ?></td>
                    <td class="action-links">
                        <a class="btn btn-success" href="<?= base_url("/admin/approveUser/{$athlete['id']}") ?>">Approve</a>
                        <a class="btn btn-danger" href="<?= base_url("/admin/declineUser/{$athlete['id']}") ?>">Decline</a>
                        <a class="btn btn-warning" href="<?= base_url("/admin/suspendUser/{$athlete['id']}") ?>">Suspend</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?= $this->endSection() ?>
