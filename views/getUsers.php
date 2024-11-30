<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">All Users</h6>
                        <button class="btn btn-primary btn-sm ms-auto" onclick="window.location='/admin/addUser'">Add New User</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($params) && !empty($params)): ?>
                                <?php foreach($params as $user): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($user->user_id) ?></td>
                                        <td><?= htmlspecialchars($user->firstName) ?> <?= htmlspecialchars($user->lastName) ?></td>
                                        <td><?= htmlspecialchars($user->email) ?></td>
                                        <td>
                                            <a href="/admin/editUser/<?= $user->user_id ?>" class="btn btn-info btn-sm">Edit</a>
                                            <a href="/admin/deleteUser/<?= $user->user_id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">No users found.</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>