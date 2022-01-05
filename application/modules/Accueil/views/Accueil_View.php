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
                                <div class="panel-heading">Checkout form</div>
                                <div class="panel-body pan">
                                    <form action="#">
                                        <div class="form-body pal">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-icon"><i class="fa fa-user"></i><input id="inputFirstName" type="text" placeholder="First Name" class="form-control" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-icon"><i class="fa fa-user"></i><input id="inputLastName" type="text" placeholder="Last Name" class="form-control" /></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-icon"><i class="fa fa-envelope"></i><input id="inputEmail" type="text" placeholder="E-mail" class="form-control" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-icon"><i class="fa fa-phone"></i><input id="inputPhone" type="text" placeholder="Phone" class="form-control" /></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group"><select class="form-control">
                                                            <option>Country</option>
                                                        </select></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group"><input id="inputCity" type="text" placeholder="City" class="form-control" /></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group"><input id="inputPostCode" type="text" placeholder="Post code" class="form-control" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><input id="inputAddress" type="text" placeholder="Address" class="form-control" /></div>
                                            <div class="form-group"><textarea rows="8" placeholder="Additional info" class="form-control"></textarea></div>
                                            <hr />
                                            <div class="form-group">
                                                <div class="radio"><label class="radio-inline"><input id="optionsVisa" type="radio" name="optionsRadios" value="Visa" checked="checked" />&nbsp;
                                                        Visa</label><label class="radio-inline"><input id="optionsMasterCard" type="radio" name="optionsRadios" value="MasterCard" />&nbsp;
                                                        MasterCard</label><label class="radio-inline"><input id="optionsPayPal" type="radio" name="optionsRadios" value="PayPal" />&nbsp;
                                                        PayPal</label></div>
                                            </div>
                                            <div class="form-group"><input id="inputNameCard" type="text" placeholder="Name on card" class="form-control" /></div>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="form-group"><input id="inputCardNumber" type="text" placeholder="Card number" class="form-control" /></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group"><input id="inputCVV2" type="text" placeholder="CVV2" class="form-control" /></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group mbn"><label class="pts">Expiration date</label></div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group"><select class="form-control">
                                                            <option>Month</option>
                                                        </select></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group mbn"><input id="inputYear" type="text" placeholder="Year" class="form-control" /></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions text-right pal"><button type="submit" class="btn btn-primary">Continue</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- FIN CONTENU -->

            </div>


            <?php $this->load->view('include/footer.php')?>
        </div>
    </div>
    <?php $this->load->view('include/script.php')?>
</body>
</html>