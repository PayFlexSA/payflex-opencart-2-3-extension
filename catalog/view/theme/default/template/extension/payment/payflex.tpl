
<div>
  <?php if(isset($redirectUrl)) { ?>
    <div class="buttons">
    <div class="pull-right">
      <a href="<?php echo $redirectUrl; ?>"><input type="button" value="Confirm Order" id="button-confirm" data-loading-text="Loading..." class="btn btn-primary"></a>
     </div>
    <p>(you will be redirected to the PayFlex Checkout site)</p>
  </div>
 <?php } ?>

<?php if(isset($errors)) { ?>
    <div>
      <h2>We're sorry, PayFlex had a hiccup.</h2>
      <p>Please try again, or if the problem persist, you can continue with another payment method</p>
      <pre>
        <?php foreach($errors as $error) {
            echo $error;
        } ?>
      </pre>
    </div>
  <?php } ?>
</div>
<script type="text/javascript">

$('#quick-checkout-button-confirm').click(function (){
  $('#button-confirm').trigger('click');
})
</script>