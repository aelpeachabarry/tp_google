<script type="text/javascript">
$(function(){

	$('.loader').hide();

	//on ecoute ce que l'utilisateur tape dans le champ de recherche
	$('#search').keyup(function(){
		
		var field = $(this);// a pour valeur $(#search)
		console.log(field);
		$('#result').html(''); //on initialise le contenu de la div

		if(field.val().length >1)//si on a tapé plus de 1 caractere
		{
			$.ajax({

				url: 'controller/controldata.php',
				type: 'post',
				data: 'search='+$('#search').val(),

				//avant lenvoi
				beforeSend: function(){
					//on fait apparaitre le loader mais on empeche quil sactive a chaque frappe avec stop
					$('.loader').stop().fadeIn();
				},

				success: function(data){
					$('.loader').fadeOut();  //on cache le loader
					$('#result').html(data);

				}

			});
		}

	});


	
});

</script>