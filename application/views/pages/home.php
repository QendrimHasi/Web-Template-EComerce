<div class="container mt-5">
  <div class="row" id="cars">
    <?php foreach ($tempaltes as $tempalte) : ?>
      <div class="col col-lg-4 col-md-5 col-sm-6 col-xs-12">
      <div class="card shadow-lg mx-3 mt-3 mb-3 " >
        <img class="card-img-top " src="<?php echo site_url();?>assets/images/<?php echo $tempalte['img']; ?>" alt="Card image cap">
          <div class="card-body">
             <h5 class="card-title"><?php echo $tempalte['title']; ?></h5>
             <p class="card-text"><?php echo $tempalte['description']; ?></p>
             <?php if ($this->session->userdata('loggedin')) : ?>
               <?php echo form_open('Templates/payment'); ?>
                  <input type="hidden" name="tempalte[]" value="<?php echo $tempalte['templeId'] ?>">
                  <input type="hidden" name="tempalte[]" value="<?php echo $tempalte['price'] ?>">
                      <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                          data-key="pk_test_0BDqMZBh4SLmMsdJqov20EKS00ZYiBVIhX"
                          data-amount="<?php echo $tempalte['price'] ?>00"
                          data-name="<?php echo $tempalte['title'] ?>"
                          data-description="<?php echo $tempalte['description']; ?>"
                          data-locale="auto"
                          data-currency="EUR"
                      ></script>
              <?php echo form_close(); ?>
            <?php endif; ?>
           </div>
       </div>
    </div>
     <?php endforeach; ?>
  </div>