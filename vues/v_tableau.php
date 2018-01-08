<div id="containerUser" class="container">
	<h3>Liste des utilisateurs par groupe</h3>
	
	<!-- Ligne comprenant la recherche et les différents boutons au-dessus du tableau -->
	<div id="headRow" class="row">
		<div class="col-md-3">
		    <input id="rechercheInput" class="form-control" type="text" placeholder="Rechercher">
		</div>
		<div class="col-md-3">
		    <button type="reset" id="reset" class="btn btn-secondary btn-block">Reset</button>
		</div>
		<div class="col-md-3">
		    <button type="button" id="new" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalForm">Nouvel Utilisateur</button>
		</div>
		<div class="col-md-3">
		    <button type="button" id="deleteMultiple" class="btn btn-danger btn-block">Supprimer</button>
		</div>
	</div>
	
	
	<!-- Modal d'inscription nouvel utilisateur -->
    <div id="modalForm" class="modal fade" role="dialog">
    	<div class="modal-dialog">
        	<div class="modal-content">
        		<div class="modal-header">
            		<h4 class="modal-title">Ajout d'un nouvel utilisateur</h4>
            		<button type="button" class="close" data-dismiss="modal">&times;</button>
          		</div>
          		<form id="formNewUser">
              		<div class="modal-body">
    		  				<div class="form-group">
    		  					<label for="user-nom" class="form-control-label">Nom :</label>
    		  					<input type="text" class="form-control has-success has-feedback" id="user-nom" required>
    		  				</div>
    		  				<div class="form-group">
    		  					<label for="user-prenom" class="form-control-label">Prenom :</label>
    		  					<input type="text" class="form-control" id="user-prenom" required>
    		  				</div>
    		  				<div class="form-group">
    		  					<label for="user-mail" class="form-control-label">Mail :</label>
    		  					<input type="email" class="form-control" id="user-mail" required>
    		  				</div>
    		  				<div class="form-group">
    		  					<label for="user-date" class="form-control-label">Date de naissance :</label>
    		  					<input type="date" class="form-control" id="user-date" required>
    		  				</div>
    		  				<div class="form-group">
    		  					<label for="user-groupe" class="form-control-label">Groupe :</label>
    		  					<select class="form-control" id="user-groupe" required>
    		  						<?php foreach($grpListe as $unGroupe){?>
    									<option><?php echo $unGroupe->getNomGroupe() ?></option>
    		  						<?php }?>
                            	</select>
    		  				</div>
             		</div>
              		<div class="modal-footer">
              		    <button id="validationNew" type="submit" class="btn btn-primary">Valider</button>
                		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              		</div>        		
          		</form>	
       		</div>
     	 </div>
    </div>
    
    <!-- Tableau d'utilisateurs -->
	<div class="row">
		<div class="col-md-12">
    	<table id="tab-user" class="table table-bordered table-striped table-condensed">
            <thead>
                <tr>
                	<th></th>
                    <th>Groupe</th>
                    <th>Nom complet</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
        	</thead>
            <tbody>
            <?php
                foreach($grpUsr as $unUser)
                {   
                    $idUser = $unUser->getIdUtilisateur();
                    $nomGroupe = $unUser->getGroupeUtilisateur();
                    $nomUser = $unUser->getNomUtilisateur().' '.$unUser->getPrenomUtilisateur();
                    $mailUser = $unUser->getMailUtilisateur();
                    $age = $unUser->getAge();
              ?>
              		<div class="modal fade" id="<?= $idUser ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"><?php echo $nomUser; ?></h4>
                        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         	
                          </div>
                          <div class="modal-body">
                            <?php echo $age;?> ans.
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  <tr>   
                  	<td>
                      	<div class="checkbox">
                          <label><input type="checkbox" class="selecVal" value=""></label>
                        </div>
                  	</td>
                    <td><?php echo $nomGroupe ?></td>
                    <td><?php echo $nomUser ?></td>
                    <td><?php echo $mailUser ?></td>
                    <td><button type="button" id="info<?php echo $idUser?>" class="btn btn-info" data-toggle="modal" data-target="#<?php echo $idUser; ?>">Detail</button></td>
        			
        			<td><button type="submit" id="<?php echo $idUser?>" class="btn btn-danger deleteUser">Delete</button></td>
                   
                    <?php
                }
                    ?>
                  </tr> 
            </tbody>
          </table>
		</div>
	</div>	
	
</div>