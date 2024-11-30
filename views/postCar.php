<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Add a New Car</h6>
                        <button class="btn btn-primary btn-sm ms-auto" onclick="window.history.back()">Back</button>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="/addCar">
                        <p class="text-uppercase text-sm">Car Information</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="brand" class="form-control-label">Brand</label>
                                    <select name="brand" id="brand" class="form-select">
                                        <option value="audi">Audi</option>
                                        <option value="bmw">BMW</option>
                                        <option value="mercedes">Mercedes-Benz</option>
                                        <option value="vw">Volkswagen</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="model" class="form-control-label">Model</label>
                                    <input type="text" id="model" name="model" class="form-control" placeholder="Enter model">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="year" class="form-control-label">Year</label>
                                    <input type="number" id="year" name="year" class="form-control" placeholder="Enter year">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price" class="form-control-label">Price</label>
                                    <input type="number" id="price" name="price" class="form-control" placeholder="Enter price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fuel" class="form-control-label">Fuel</label>
                                    <select name="fuel" id="fuel" class="form-select">
                                        <option value="diesel">Diesel</option>
                                        <option value="gasoline">Gasoline</option>
                                        <option value="electric">Electric</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="color" class="form-control-label">Color</label>
                                    <select name="color" id="color" class="form-select">
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
                            <!-- Input za URL slike -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image" class="form-control-label">Image URL</label>
                                    <input type="text" id="image" name="image" class="form-control" placeholder="Enter image URL">
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Add Car</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>