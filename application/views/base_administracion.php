<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mountain<!--?=$title?--></title>
	<!-- Bootstrap Styles-->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="<?php echo base_url(); ?>assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
      <?php $this->load->view($encabezado); ?>
      <?php $this->load->view($menu); ?>
      <?php if (isset($datos)) {
        $this->load->view($contenido, $datos);
      }else{
        $this->load->view($contenido);
      }
       ?>
      
    </div>
   <!-- /. WRAPPER  -->
  <!-- JS Scripts-->
  <!-- jQuery Js -->
  <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <!-- Metis Menu Js -->
  <script src="<?php echo base_url(); ?>assets/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
  <script src="<?php echo base_url(); ?>assets/js/custom-scripts.js"></script>

  <!-- Morris Chart Js -->
  <script src="<?php echo base_url(); ?>assets/js/morris/raphael-2.1.0.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/morris/morris.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/modal.js"></script>
  <script src="<?php echo base_url(); ?>assets/default.js"></script>
</body>
</html>