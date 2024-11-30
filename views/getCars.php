<div class="container">
    <form method="post" action="/getCars">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Search Cars</h5>
                        <button class="btn btn-primary btn-sm" type="submit">Search</button>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm mb-3">Car Information</p>
                        <div class="row">
                            <!-- Brand -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="brand" class="form-control-label">Brand</label>
                                    <select name="brand" id="brand" class="form-select">
                                        <option value="<?php if(isset($_POST['brand'])) {echo $_POST['brand'];} ?>">
                                            <?php if(isset($_POST['brand'])) {echo ucfirst($_POST['brand']);} else { echo 'Select Brand'; } ?>
                                        </option>
                                        <option value="audi">Audi</option>
                                        <option value="bmw">BMW</option>
                                        <option value="mercedes">Mercedes-Benz</option>
                                        <option value="vw">Volkswagen</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Model -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="model" class="form-control-label">Model</label>
                                    <input class="form-control" name="model" id="model" type="text"
                                           value="<?php if(isset($_POST['model'])) {echo $_POST['model'];}?>"
                                           placeholder="Enter Model">
                                </div>
                            </div>

                            <!-- Year -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="year" class="form-control-label">Year</label>
                                    <input class="form-control" name="year" id="year" type="text"
                                           value="<?php if(isset($_POST['year'])) {echo $_POST['year'];}?>"
                                           placeholder="Enter Year">
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="price" class="form-control-label">Price</label>
                                    <input class="form-control" name="price" id="price" type="text"
                                           value="<?php if(isset($_POST['price'])) {echo $_POST['price'];}?>"
                                           placeholder="Enter Price">
                                </div>
                            </div>

                            <!-- Fuel -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="fuel" class="form-control-label">Fuel</label>
                                    <select name="fuel" id="fuel" class="form-select">
                                        <option value="<?php if(isset($_POST['fuel'])) {echo $_POST['fuel'];} ?>">
                                            <?php if(isset($_POST['fuel'])) {echo ucfirst($_POST['fuel']);} else { echo 'Select Fuel Type'; } ?>
                                        </option>
                                        <option value="diesel">Diesel</option>
                                        <option value="gasoline">Gasoline</option>
                                        <option value="electric">Electric</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Color -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="color" class="form-control-label">Color</label>
                                    <select name="color" id="color" class="form-select">
                                        <option value="<?php if(isset($_POST['color'])) {echo $_POST['color'];} ?>">
                                            <?php if(isset($_POST['color'])) {echo ucfirst($_POST['color']);} else { echo 'Select Color'; } ?>
                                        </option>
                                        <option value="red">Red</option>
                                        <option value="blue">Blue</option>
                                        <option value="silver">Silver</option>
                                        <option value="black">Black</option>
                                        <option value="white">White</option>
                                        <option value="green">Green</option>
                                        <option value="yellow">Yellow</option>
                                        <option value="purple">Purple</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Car Listings -->
    <div class="row py-5">
        <?php
        if(isset($params)) {
            foreach ($params as $car) {
                echo '<div class="col-md-4 mb-4">';
                echo '<a href="/car/' . $car->car_id . '" class="card shadow-sm text-decoration-none text-dark">';
                echo '<div class="card-body">';
                echo '<img src="'. "../assets/img/cars/" . htmlspecialchars($car->image) . '" alt="' . htmlspecialchars($car->model) . '" class="card-img-top img-fluid rounded mb-3">';
                echo '<h5 class="card-title text-center">' . htmlspecialchars($car->brand) . ' ' . htmlspecialchars($car->model) . '</h5>';
                echo '<p class="card-text"><strong>Year:</strong> ' . htmlspecialchars($car->year) . '</p>';
                echo '<p class="card-text"><strong>Fuel:</strong> ' . htmlspecialchars($car->fuel) . '</p>';
                echo '<p class="card-text"><strong>Color:</strong> ' . htmlspecialchars($car->color) . '</p>';
                echo '<p class="card-text"><strong>Price:</strong> $' . number_format(htmlspecialchars($car->price), 2) . '</p>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>