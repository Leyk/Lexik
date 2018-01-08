/**
 * 
 */

$(document).ready(function() {
	
	// Effectue une recherche dans le tableau (colonnes groupe et nom d'utilisateur)
	$("#rechercheInput").on("keyup", function() {
		var regval = new RegExp( '^'+ $(this).val(),"i" );
 
		$("table tr:gt(0)").hide()
		$("table tr:gt(0)").filter( function(){ 
			var contenuGrp=$(this).find( 'td:eq(1)' ).html();
			var contenuNom=$(this).find( 'td:eq(2)' ).html();
			if(contenuGrp.match(regval) || (contenuNom.match(regval))){
				return true;
			}
			else{
				return false;
			}
		}).show();
    })
    
    // Reset la recherche
    $('#reset').on('click', function(){
    	$("#rechercheInput").val('').trigger('keyup');
    })
    
    // Reset le formulaire d'inscription
	 $('#modalForm').on('hidden.bs.modal', function(){
	    $(this).find('form')[0].reset();
	});
	    
	// Soumission du formulaire d'inscription d'un nouvel utilisateur
    $('#validationNew').on('click', function(e){
    	var valMail = validateEmail($('#user-mail'));
    	var nomEmpty = checkEmpty($('#user-nom'));
    	var prenomEmpty = checkEmpty($('#user-prenom'));
    	var mailEmpty = checkEmpty($('#user-mail'));
    	var dateEmpty = checkEmpty($('#user-date'));
    	var groupeEmpty = checkEmpty($('#user-groupe'));
    	    	
    	if(valMail && !nomEmpty && !prenomEmpty && !mailEmpty && !dateEmpty && !groupeEmpty){
    		$('#modalForm').modal('hide');
    		e.preventDefault(); 
    		$.post(
    			'controleurs/c_afficheTab.php',
    			{
    			  	nom : $('#user-nom').val(),
    			  	prenom : $('#user-prenom').val(),
    			  	mail : $('#user-mail').val(),
    			  	date : $('#user-date').val(),
    			  	groupe : $('#user-groupe').val()
    			},
    			function(data){ 
    			    location.reload();
    	    		$('#modalForm').find('form')[0].reset();
    			},
    			'html' 
    		);     
    	}
		
    })
    
    // Clique du bouton delete pour suppression utilisateur
    $('.deleteUser').on('click', function(e){
		var mydata = 'toDelete='+this.id;
		var parent = $(this).parent().parent();
		$.ajax({
			type: "POST",
			url: "controleurs/c_afficheTab.php",
			data: mydata,
			dataType : 'text',
			success: function(data){
				parent.fadeOut('slow', function(){$(this).remove();});
			}
		});
    })
    
    // Clique du bouton delete pour suppression de multiples utilisateurs sélectionnés par checkbox
    $('#deleteMultiple').on('click', function(e){
    	var nbdel = 0;
    	$('#tab-user tbody > tr').each(function() {
            if($(this).find('td div.checkbox input.selecVal').is(':checked')){
                $(this).find('td button.deleteUser').click();
                nbdel++;
            }
        })
        if (nbdel <= 0){
        	alert("Veuillez sélectionner un ou des éléments à supprimer.");
        }
    })
    
    // Fonction qui vérifie si tous les champs obligatoires ont été remplis. Affiche un message d'erreur si ce n'est pas le cas
    function checkEmpty(champ){  
    	return champ.val() == "";
    }
    
	 // Fonction qui vérifie si une adresse email est valide. Si elle ne l'est pas, affiche un message d'erreur
	 function validateEmail(email) {
		 var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		 return reg.test(email.val());
	 }
    	
})