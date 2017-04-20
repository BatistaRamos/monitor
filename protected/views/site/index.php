<style>
.unloaded {border: 3px solid red;}

.loaded {border: 3px solid transparent;}
</style>

<?php foreach($model as $video) { ?>
<div class="list_videos loaded" id="<?php echo $video->nome;?>_v">
<embed src="<?php echo $video->url;?>" 
	pluginspage="http://www.videolan.org" width="320" height="250"
	controller="true" loop="true" autoplay="true"
	name="<?php echo $video->nome;?>">
<div id="totalUsers"></div>
<p>Descrição : <?php echo $video->descricao;?></p>
<p>Contato : <?php echo $video->nome_contato;?></p>
<p>Email : <?php echo $video->email_contato;?></p>
<p>Telefone : <?php echo $video->telefone_contato;?></p>
</div>	
<?php } ?>


<script>

function verifyStatus() {
	$.getJSON( "/monitor/index.php?r=video/status", function( data ) {
	  	$(".list_videos").each(function(i,obj) {
			var video = eval("data."+$(this).attr('id'));
			if(video.status=="publish" || video.status=="play") {
				$(this).removeClass("unloaded");
				$(this).addClass("loaded");
			} else {
                $(this).removeClass("loaded");
				$(this).addClass("unloaded");
			}
		});
	});
}
function verifyUsers() {
	$.getJSON( "/monitor/index.php?r=video/totalUsers", function( data ) {
	  	$('#totalUsers').html(data);
	});
}
window.setInterval("verifyStatus()", 3000);
window.setInterval("verifyUsers()", 3000);
</script>

