<?php 
ob_start();
session_start();
include ("../_init.php");

// Redirect, If user is not logged in
if (!$user->isLogged()) {
  redirect(root_url() . '/index.php?redirect_to=' . url());
}

// Redirect, If User has not Read Permission
if ($user->getGroupId() != 1 && !$user->hasPermission('access', 'read_tax_overview_report')) {
  redirect(root_url() . '/'.ADMINDIRNAME.'/dashboard.php');
}

//  Load Language File
$language->load('report');

// Set Document Title
$document->setTitle($language->get('title_tax_overview_report'));

// Add Script
$document->addScript('../assets/itsolution24/angular/controllers/ReportTaxOverviewController.js');

// Include Header and Footer
include("header.php"); 
include ("left_sidebar.php") ;
?>

<!-- Content Wrapper Start -->
<div class="content-wrapper" ng-controller="ReportTaxOverviewController">

  <!-- Content Header Start -->
  <section class="content-header">
    <h1>
      <?php echo $language->get('text_tax_overview_report_title'); ?>
      <small>
        <?php echo store('name'); ?>
      </small>
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="dashboard.php">
          <i class="fa fa-dashboard"></i> 
          <?php echo $language->get('text_dashboard'); ?>
        </a>
      </li>
      <li class="active">
        <?php echo $language->get('text_tax_overview_report_title'); ?>
      </li>
    </ol>
  </section>
  <!-- Content Header End -->

  <!-- Content Start -->
  <section class="content">

    <?php if(DEMO) : ?>
    <div class="box">
      <div class="box-body">
        <div class="alert alert-info mb-0">
          <p><span class="fa fa-fw fa-info-circle"></span> <?php echo $language->get('text_demo'); ?></p>
        </div>
      </div>
    </div>
    <?php endif; ?>


    <div class="row">
      <!-- BankAccount List Start -->
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-header">
            <h3 class="box-title">
              <?php echo $language->get('text_tax_overview_report_list_title'); ?>
            </h3>
          </div>
          <div class="box-body">
            <div class="table-responsive">  
              <?php
                  $hide_colums = "";
                ?>  
              <table id="tax-tax-list" class="table table-bordered table-striped table-hover" data-hide-colums="<?php echo $hide_colums; ?>">
                <thead>
                  <tr class="bg-gray">
                    <th class="w-20" >
                      <?php echo $language->get('label_tax_percent'); ?>
                    </th>
                    <th class="w-20" >
                      <?php echo $language->get('label_count'); ?>
                    </th>
                    <th class="w-20">
                      <?php echo $language->get('label_subtotal'); ?>
                    </th>
                    <th class="w-20">
                      <?php echo $language->get('label_tax_amount'); ?>
                    </th>
                    <th class="w-20">
                      <?php echo $language->get('label_total'); ?>
                    </th>
                  </tr>
                </thead>
                <tfoot>
                  <tr class="bg-gray">
                    <th class="w-20" >
                      <?php echo $language->get('label_tax_percent'); ?>
                    </th>
                    <th class="w-20" >
                      <?php echo $language->get('label_count'); ?>
                    </th>
                    <th class="w-20">
                      <?php echo $language->get('label_subtotal'); ?>
                    </th>
                    <th class="w-20">
                      <?php echo $language->get('label_tax_amount'); ?>
                    </th>
                    <th class="w-20">
                      <?php echo $language->get('label_total'); ?>
                    </th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- BankAccount List End -->
    </div>
  </section>
  <!-- Content End -->
  
</div>
<!-- Content Wrapper End -->

<?php include ("footer.php"); ?>