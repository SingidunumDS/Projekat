<?php
use app\core\Application;
?>

<div class="container py-5">
    <div class="row <?php if(!Application::$app->session->get('user')) {echo "my-8";} ?>">
        <div class="col-md-6">
            <div class="card">
                <img src="../assets/img/cars/<?php echo htmlspecialchars($params->image); ?>" alt="<?php echo htmlspecialchars($params->model); ?>" class="card-img-top img-fluid">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title"><?php echo htmlspecialchars($params->brand . ' ' . $params->model); ?></h2>
                    <p class="card-text"><strong>Year:</strong> <?php echo htmlspecialchars($params->year); ?></p>
                    <p class="card-text"><strong>Price:</strong> $<?php echo number_format(htmlspecialchars($params->price), 2); ?></p>
                    <p class="card-text"><strong>Fuel Type:</strong> <?php echo htmlspecialchars($params->fuel); ?></p>
                    <p class="card-text"><strong>Color:</strong> <?php echo htmlspecialchars($params->color); ?></p>

                    <a href="mailto:<?php echo htmlspecialchars($params->email); ?>" class="btn btn-primary">Contact Seller</a>

                    <form method="post" action="/sendInquiry" class="mt-3">
                        <input type="hidden" name="car_id" value="<?php echo $params->car_id; ?>">
                        <div class="mb-3">
                            <label for="userMessage" class="form-label">Your Message</label>
                            <textarea class="form-control" id="userMessage" name="message" rows="3" placeholder="Write your message here..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Send Inquiry</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>