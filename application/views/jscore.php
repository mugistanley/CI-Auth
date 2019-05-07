<script type="text/javascript" src="<?php echo(JS.'moment.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo(JS.'jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo(BOOTSTRAP.'js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo(BOOTSTRAP.'js/bootstrap-datetimepicker.min.js'); ?>"></script>
<script type="text/javascript">
 $(document).ready(function () {
jQuery(function($) {
  setInterval(function() {
    var date = new Date(),
        time = date.toLocaleTimeString();
    $("#clock").html(time);
  }, 1000);
});	
 });	
</script>
