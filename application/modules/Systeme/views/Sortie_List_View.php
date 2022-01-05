<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $this->router->class ?> | MKBY</title>
    <?php $this->load->view('include/head.php')?>
</head>
<body>
    <div>
        <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
        <?php $this->load->view('include/header_top.php')?>
        <div class="wrapper">
            <?php $this->load->view('include/side_bar.php')?>



            <div id="page-wrapper">
            <!-- insertion du contenu -->

            <!-- DEBUT HEADER -->
                <?php $this->load->view('include/head_title') ?>
            <!-- FIN HEADER -->

            <!-- DEBUT CONTENU -->
                <div class="page-content">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-grey">
                            <?=$this->load->view('panel_head')?>
                        <!-- +++++++++++++++++++++++ -->
                         
                            <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="tabid"  class="table-responsive table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Noms</th>
                                                    <th>Pays</th>
                                                    <th>Matricule</th>
                                                    <th>Téléphone</th>
                                                    <th>Montant Sortie</th>
                                                    <th>Date Sortie</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?=$tableau?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        <!-- ++++++++++++++++++++ -->
                        </div>
                    </div>
                </div>
            <!-- FIN CONTENU -->

            </div>


            <?php $this->load->view('include/footer.php')?>
        </div>
    </div>

    <script type="text/javascript">

        let deleted = (th) => {

        const id = $(th).attr("id");
        
        $.ajax({

                method : "POST",
                url: "<?=base_url('Systeme/deleteInd') ?>",
                data: {id:id},
                success: function(dt){
                    //alert(dt);
                        const data = dt.split("#");
                        displaySuccess(data[0], data[1], data[2]);
                        //reload();
                        $("#mydelete"+id).modal('hide');
                        $("#tabid").load(" #tabid");

        }
    
    });
        
    }
    </script>
    <?php $this->load->view('include/script.php')?>
</body>
</html>