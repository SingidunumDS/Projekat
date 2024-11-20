

<div class="container py-10">
    <form method="post" action="/getCars">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Search Cars</p>
                            <button class="btn btn-primary btn-sm ms-auto" type="submit">Search</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Car Information</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Brand</label>
                                    <select name="brand" class="form-select">
                                        <option value="<?php if(isset($_POST['model'])) {echo $_POST['brand'];} ?>"><?php if(isset($_POST['brand'])) {echo ucfirst($_POST['brand']);} ?></option>
                                        <option value="audi">Audi</option>
                                        <option value="bmw">Bmw</option>
                                        <option value="mercedes">Mercedes-Benz</option>
                                        <option value="vw">Volkswagen</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Model</label>
                                    <input class="form-control" name="model" type="text" onfocus="focused(this)" onfocusout="defocused(this)" value="<?php if(isset($_POST['model'])) {echo $_POST['model'];}?>" placeholder="<?php if(isset($_POST['model'])) {echo $_POST['model'];} ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Year</label>
                                    <input class="form-control" name="year" type="text" onfocus="focused(this)" onfocusout="defocused(this)" value="<?php if(isset($_POST['year'])) {echo $_POST['year'];}?>" placeholder="<?php if(isset($_POST['model'])) {echo $_POST['model'];}?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Price</label>
                                    <input class="form-control" name="price" type="text" onfocus="focused(this)" onfocusout="defocused(this)" value="<?php if(isset($_POST['price'])) {echo $_POST['price'];}?>" placeholder="<?php if(isset($_POST['model'])) {echo $_POST['model'];}?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Fuel</label>
                                    <select name="fuel" class="form-select">
                                        <option value="<?php if(isset($_POST['fuel'])) {echo $_POST['fuel'];}?>"><?php if(isset($_POST['fuel'])) {echo ucfirst($_POST['fuel']);} ?></option>
                                        <option value="diesel">Diesel</option>
                                        <option value="gasoline">Gasoline</option>
                                        <option value="electric">Electric</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Color</label>
                                    <select class="form-select" name="color">
                                        <option value="<?php if(isset($_POST['color'])) {echo $_POST['color'];}?>"><?php if(isset($_POST['color'])) {echo ucfirst($_POST['color']);} ?></option>
                                        <option value="red">Red</option>
                                        <option value="blue">Blue</option>
                                        <option value="silver">Silver</option>
                                        <option value="black">Black</option>
                                        <option value="white">White</option>
                                        <option value="greed">Green</option>
                                        <option value="yellow">Yellow</option>
                                        <option value="purple">Purple</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>

    <div class="row py-5">
        <?php
        if(isset($params)) {
            foreach ($params as $car) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<img src="'. "../assets/img/cars/" . htmlspecialchars($car->image) . '" alt="' . htmlspecialchars($car->model) . '" class="card-img-top img-fluid">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title text-center">' . htmlspecialchars($car->brand) . ' ' . htmlspecialchars($car->model) . '</h5>';
                echo '<p class="card-text"><strong>Year:</strong> ' . htmlspecialchars($car->year) . '</p>';
                echo '<p class="card-text"><strong>Fuel:</strong> ' . htmlspecialchars($car->fuel) . '</p>';
                echo '<p class="card-text"><strong>Color:</strong> ' . htmlspecialchars($car->color) . '</p>';
                echo '<p class="card-text"><strong>Price:</strong> $' . number_format(htmlspecialchars($car->price), 2) . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>
