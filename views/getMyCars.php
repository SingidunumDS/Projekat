<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">My Active Ads</h6>
                        <button class="btn btn-primary btn-sm ms-auto" onclick="window.location='/addCar'">Add New Car</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center">
                            <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Model</th>
                                <th scope="col">Year</th>
                                <th scope="col">Price</th>
                                <th scope="col">Fuel</th>
                                <th scope="col">Color</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($params) && !empty($params)): ?>
                                <?php foreach($params as $car): ?>
                                    <tr>
                                        <td>
                                            <img src="<?= "../assets/img/cars/" . htmlspecialchars($car->image) ?>" alt="<?= htmlspecialchars($car->model) ?>" class="img-fluid" style="width: 100px; height: 60px; object-fit: cover;">
                                        </td>
                                        <td><?= htmlspecialchars($car->brand) ?></td>
                                        <td><?= htmlspecialchars($car->model) ?></td>
                                        <td><?= htmlspecialchars($car->year) ?></td>
                                        <td>$<?= number_format(htmlspecialchars($car->price), 2) ?></td>
                                        <td><?= ucfirst(htmlspecialchars($car->fuel)) ?></td>
                                        <td><?= ucfirst(htmlspecialchars($car->color)) ?></td>
                                        <td>
                                            <button class="btn btn-info btn-sm" onclick="window.location='/editCar/<?= $car->car_id ?>'">Edit</button>
                                            <button class="btn btn-danger btn-sm" onclick="window.location='/deleteCar/<?= $car->car_id ?>'">Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center">No active ads available.</td>
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