<footer class="footer text-center">
  <h1 class="text-blue"><a href="https://web.facebook.com/Mbongo-KBY-Community-109235727580598" target="_blank"><i class="mdi mdi-facebook-box"></i></a> </h1>
                                    

</footer>
<footer class="footer text-center">
    Designed and Developed by <a href="https://wrappixel.com">Kubuya Ir</a>. <?= date('Y-F') ?>
</footer>


<div class="modal fade" id="profileSee">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<h1>Hello world</h1>
			</div>
		</div>
	</div>
</div>

<script>
    function groupe(){
    
    $.ajax({
        url:"<?= base_url('Clients/Clients/Groupe') ?>",
        dataType:"json",
        method:"post",
        success:function(dt){
            if(dt.status==true){
                $('#groupeNotific').modal('show');
                $('#zero_config').html(dt.html)
            }
            else{
                displaySuccess('Desolé','Vous n\'êtes pas affecté dans aucun groupe','error');
            }
        }
    })
   }
</script>