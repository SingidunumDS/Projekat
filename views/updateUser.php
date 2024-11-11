<div class="card">
    <form action="/processUpdateUser" method="post">
        <input type="hidden" name="user_id" value="<?php echo $params->user_id; ?>">
        <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <p class="mb-0">Edit Profile</p>
                <button class="btn btn-primary btn-sm ms-auto" type="submit">Save</button>
            </div>
        </div>
        <div class="card-body">
            <p class="text-uppercase text-sm">User Information</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Email address</label>
                        <input class="form-control" name="email" type="email" value="<?php echo $params->email; ?>" onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">First name</label>
                        <input class="form-control" name="firstName" type="text" value="<?php echo $params->firstName; ?>" onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Last name</label>
                        <input class="form-control" type="text" name="lastName" value="<?php echo $params->lastName; ?>" onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>