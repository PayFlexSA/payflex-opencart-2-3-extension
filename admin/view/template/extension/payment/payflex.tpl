<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-payflex" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>
      </div>
      <h1><?php echo $heading_title;?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
   <?php if ($error_warning) { ?>
      <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
     <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?> </h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-payflex" class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
            <div class="col-sm-10">
              <select name="payflex_status" id="input-status" class="form-control">
                <?php if ($payflex_status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                 <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-test"><span data-toggle="tooltip" title="<?php echo $help_testmode; ?>"><?php echo $entry_test; ?></span></label>
            <div class="col-sm-10">
              <select name="payflex_test" id="input-test" class="form-control">
                <?php if ($payflex_test) { ?>
                  <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                  <option value="0"><?php echo $text_no; ?></option>
                <?php } else { ?>
                  <option value="1"><?php echo $text_yes; ?></option>
                  <option value="0" selected="selected"><?php echo $text_no; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-username"><span data-toggle="tooltip" title="<?php echo $help_username; ?>"><?php echo $entry_username; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="payflex_username" value="<?php echo $payflex_username; ?>" placeholder="<?php echo $entry_username; ?>" id="input-username" class="form-control"/>
              <?php if ($error_username) { ?>
              <div class="text-danger"><?php echo $error_username; ?></div>
             <?php } ?>
            </div>
          </div>

          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-password"><span data-toggle="tooltip" title="<?php echo $help_password; ?>"><?php echo $entry_password; ?></span></label>
            <div class="col-sm-10">
              <input type="password" name="payflex_password" value="<?php echo $payflex_password; ?>" placeholder="<?php echo $entry_password; ?>" id="input-password" class="form-control"/>
               <?php if ($error_password) { ?>
                   <div class="text-danger"><?php echo $error_password; ?></div>
               <?php } ?>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-order-status-success"><?php  echo $entry_order_status_success ;?></span></label>
            <div class="col-sm-10">
              <select class="form-control" id="input-order-status-success" name="payflex_order_status_success">
              	<?php foreach($order_statuses as $order_status) { ?>
              	<option value="<?php echo $order_status['order_status_id'] ?>" <?php echo ($order_status['order_status_id'] == $payflex_order_status_success ? 'selected="selected"' : '') ?>><?php echo $order_status['name'] ?></option>
              	<?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-order-status-pending"><?php  echo $entry_order_status_pending; ?></span></label>
            <div class="col-sm-10">
              <select class="form-control" id="input-order-status-pending" name="payflex_order_status_pending">
                <?php foreach($order_statuses as $order_status) { ?>
              	<option value="<?php echo $order_status['order_status_id'] ?>" <?php echo ($order_status['order_status_id'] == $payflex_order_status_pending ? 'selected="selected"' : '') ?>><?php echo $order_status['name'] ?></option>
              	<?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-order-status-expired"><?php  echo $entry_order_status_expired;?> </span></label>
            <div class="col-sm-10">
              <select class="form-control" id="input-order-status-expired" name="payflex_order_status_expired">
                <?php foreach($order_statuses as $order_status) { ?>
              	<option value="<?php echo $order_status['order_status_id'] ?>" <?php echo ($order_status['order_status_id'] == $payflex_order_status_expired ? 'selected="selected"' : '') ?>><?php echo $order_status['name'] ?></option>
              	<?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-order-status-cancelled"><?php  echo $entry_order_status_cancelled; ?></span></label>
            <div class="col-sm-10">
              <select class="form-control" id="input-order-status-cancelled" name="payflex_order_status_cancelled">
               <?php foreach($order_statuses as $order_status) { ?>
              	<option value="<?php echo $order_status['order_status_id'] ?>" <?php echo ($order_status['order_status_id'] == $payflex_order_status_cancelled ? 'selected="selected"' : '') ?>><?php echo $order_status['name'] ?></option>
              	<?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-order-status-failed"><?php  echo $entry_order_status_failed; ?></span></label>
            <div class="col-sm-10">
              <select class="form-control" id="input-order-status-failed" name="payflex_order_status_failed">
                <?php foreach($order_statuses as $order_status) { ?>
              	<option value="<?php echo $order_status['order_status_id'] ?>" <?php echo ($order_status['order_status_id'] == $payflex_order_status_failed ? 'selected="selected"' : '') ?>><?php echo $order_status['name'] ?></option>
              	<?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="cron-job-token"><span data-toggle="tooltip" title="<?php  echo $help_cron_job_token; ?>"><?php  echo $entry_cron_job_token; ?></span></label>
            <div class="col-sm-10">
              <div class="input-group">
                <input type="text" name="payflex_cron_job_token" value="<?php  echo $payflex_cron_job_token; ?>" placeholder="<?php  echo $entry_cron_job_token; ?>" id="cron-job-token" class="form-control" />
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="cron-job-url"><span data-toggle="tooltip" title="<?php echo $help_cron_job_url;?>"><?php echo $entry_cron_job_url; ?></span></label>
            <div class="col-sm-10">
              <input type="text" readonly="readonly" name="payflex_cron_job_url" value="<?php  echo $payflex_cron_job_url;?>" placeholder="<?php  echo $entry_cron_job_url; ?>" id="cron-job-url" class="form-control" />
            </div>
          </div>

          <?php if($payflex_cron_job_last_run AND isset($entry_cron_job_last_run)) { ?>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?php  echo $entry_cron_job_last_run;?> </label>
            <div class="col-sm-10">
              <input type="text"  readonly="readonly" name="payflex_cron_job_last_run" value="<?php  echo $payflex_cron_job_last_run; ?>" placeholder="<?php  echo $payflex_cron_job_last_run; ?>" id="cron-job-lst-run" class="form-control" />
            </div>
          </div>
           <?php } ?>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-sort"><?php  echo $entry_sort; ?></label>
            <div class="col-sm-10">
              <input type="text" name="payflex_sort_order"  value="<?php  echo $payflex_sort_order; ?>" placeholder="<?php  echo $entry_sort; ?>" id="input-sort" class="form-control"/>   
            </div>
          </div>

          <div lass="form-group">
            <div class="col-sm-10">
              <small>Extension Version: <?php echo $text_plugin_version; ?></small>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript"><!--
$('input[name=\'payflex_cron_job_token\']').on('keyup', function() {
    $('#cron-job-url').val('<?php echo $pf_store_url; ?>index.php?route=extension/payment/payflex/cron&token=' + $(this).val());
});
//--></script>

</div>
<?php echo $footer; ?>
