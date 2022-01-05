    <script src="<?= base_url('outils_client') ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('outils_client') ?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/extra-libs/sparkline/sparkline.js"></script>
    


   
    <script src="<?= base_url('outils_client') ?>/assets/libs/quill/dist/quill.min.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url('outils_client') ?>/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url('outils_client') ?>/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('outils_client') ?>/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="<?= base_url('outils_client') ?>/dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="<?= base_url('outils_client') ?>/assets/libs/flot/excanvas.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/libs/flot/jquery.flot.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?= base_url('outils_client') ?>/dist/js/pages/chart/chart-page-init.js"></script>


  <!--   <script src="<?= base_url('outils_client') ?>/dist/js/custom.min.js"></script> -->
    <!-- this page js -->
    <script src="<?= base_url('outils_client') ?>/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="<?=base_url() ?>assets/admin/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?= base_url() ?>js/sweet.min.js"></script>
    <script src="<?= base_url() ?>js/MyLibrairieJs.js"></script>




<script>
    $(document).ready(function(){
    
   
           
        $('input').click(function(){
           
        })
    })

    function addProfil(){

        $.ajax({
            url:"<?=base_url('Profil/')?>",
            dataType:"json",
            method:"post",
            success:function(dt){
                $('#profil').html(dt.profil);
                $('#showProf').modal('show');
            },
            beforeSend:()=>{
                let img = '<img src="<?= base_url() ?>/loader/waiting.gif">';
                $('#loader').modal('show');
                $('#loadloader').html(img);
            },
            complete:()=>{
                $('#loader').modal('hide');

                $('#loaderloader').html();

            }
        });
    }
    function addForm(){

        $.ajax({
            beforeSend:()=>{
                let img = '<img src="<?= base_url() ?>/loader/waiting.gif">';
                $('#loader').modal('show');
                $('#loadloader').html(img);
            },
            url:"<?=base_url('Profil/')?>",
            dataType:"json",
            method:"post",
            success:function(dt){
                $('#profil').html(dt.profil);
                $('#update1').modal('show');
            },
            complete:()=>{
                $('#loader').modal('hide');

                $('#loaderloader').html();

            }
        });
    }

    function update(){
        $.ajax({
            url:"<?=base_url('Profil/Update')?>",
            dataType:"json",
            method:"post",
            data:$('#formProf').serializeArray(),
            success:function(dt){
                $('#modal').modal('show');
                $('#profil').html(dt.modal);
            }
            ,beforeSend:()=>{
                let img = '<img src="<?= base_url() ?>/loader/waiting.gif">';
                $('#loader').modal('show');
                $('#loadloader').html(img);
            },
            complete:()=>{
                $('#loader').modal('hide');

                $('#loaderloader').html();

            }
        });
    }

    function modifier1(){
       loading() 
      $.ajax({
        url:"<?= base_url('Profil/update') ?>",
        type:"post",
        data:$('#modif_form').serializeArray(),
        success:function(dt){
          donnees = dt.split('#');
            if(donnees[2]=='success'){
                $('#update1').modal('hide')
                $('#modif_form').trigger('reset');
                displaySuccess(donnees[0],donnees[1],donnees[2]);
            }
            else{
                displaySuccess(donnees[0],donnees[1],donnees[2]);
            }
        
        }
      });



        
   }
</script>