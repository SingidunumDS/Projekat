<div class="card">
    <form action="/processCreateUser" method="post">
        <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <button class="btn btn-primary btn-sm ms-auto" type="submit">Save</button>
            </div>
        </div>
        <div class="card-body">
            <p class="text-uppercase text-sm">User Information</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Email address</label>
                        <input class="form-control" name="email" type="email" onfocus="focused(this)" onfocusout="defocused(this)">
                        <?php if($params != null && $params->errors != null) {
                            foreach ($params->errors as $attribute => $error) {
                                if($attribute == 'email') {
                                    echo "<div class='text-danger'>$error[0]</div>";
                                }
                            }
                        }?>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">First name</label>
                        <input class="form-control" name="firstName" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
                        <?php if($params != null && $params->errors != null) {
                            foreach ($params->errors as $attribute => $error) {
                                if($attribute == 'firstName') {
                                    echo "<div class='text-danger'>$error[0]</div>";
                                }
                            }
                        }?>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Last name</label>
                        <input class="form-control" type="text" name="lastName" onfocus="focused(this)" onfocusout="defocused(this)">
                        <?php if($params != null && $params->errors != null) {
                            foreach ($params->errors as $attribute => $error) {
                                if($attribute == 'lastName') {
                                    echo "<div class='text-danger'>$error[0]</div>";
                                }
                            }
                        }?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Password</label>
                        <input class="form-control" name="password" type="password" onfocus="focused(this)" onfocusout="defocused(this)">
                        <?php if($params != null && $params->errors != null) {
                            foreach ($params->errors as $attribute => $error) {
                                if($attribute == 'password') {
                                    echo "<div class='text-danger'>$error[0]</div>";
                                }
                            }
                        }?>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Role</label>
                        <select name="role">
                            <option value="1">Administrator</option>
                            <option value="2">Korisnik</option>
                        </select>
                        <?php if($params != null && $params->errors != null) {
                            foreach ($params->errors as $attribute => $error) {
                                if($attribute == 'role') {
                                    echo "<div class='text-danger'>$error[0]</div>";
                                }
                            }
                        }?>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
