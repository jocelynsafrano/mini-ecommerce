  
  $(document).ready(function(){
    $('#categorie').change(function() {
        var id = $(this).val();
        $.ajax({
          url:"index.php?controller=produit&action=filter&categorie_id=" + id,
          type:"GET",          
          success:function(data){
            data = JSON.parse(data);
            var content = "";       
            for(i=0; i<data.length; i++){
              
              content += '<tr> <td>' + data[i].id +'</td> <td>' + data[i].nom + '</td> <td>' + data[i].description + '</td> <td>' + data[i].nom_categorie + '</td> <td>' + data[i].prix_ht + '</td> <td>' + data[i].date_creation + '</td> <td>' + data[i].date_modification + '</td> <td>  <a href="index.php?controller=panier_produit&amp;action=store&amp;produit_id=' + data[i].id+ '>Ajouter au panier</a> </td> </tr>';
            }
            
            $('#display_products').html(content);
          }
        });
      });

      $('#categorie').change(function() {
        var id = $(this).val();
        $.ajax({
          url:"index.php?controller=produit&action=filter&categorie_id=" + id,
          type:"GET",          
          success:function(data){
            data = JSON.parse(data);
            var content = "";   
            var dataLength = data.length;
            if(dataLength > 0){

              for(i=0; i<data.length; i++){
                content += `
                <div class="col-sm-4 mt-4">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">` + data[i].nom + `</h5>`
                      + `<p class="card-text">` + data[i].description + `</p>`
                      + `<a class="btn btn-primary" href="index.php?controller=panier_produit&amp;action=store&amp;produit_id=` + data[i].id + `">Ajouter au panier</a>
                  
                    </div>
                  </div>
                </div>`
                  ;

              }
            }else{
              content = `<h3 style="color: black;" class="mt-4">Pas de produit sur cette catégorie, désolé !<h3>`;
            }
              
            
            $('#product-boxes').html(content);
          }
        });
      });

      $('#search').on("keyup", function() {
        var query = $(this).val();
        $.ajax({
          
          url: "index.php?controller=produit&action=search",
          
          type: "POST",          
          
          data: {
            query : query
          },

          success:function(data){
            
            var content = "";       
            for(i=0; i<data.length; i++){
              
              content += '<tr> <td>' + data[i].id +'</td> <td>' + data[i].nom + '</td> <td>' + data[i].description + '</td> <td>' + data[i].nom_categorie + '</td> <td>' + data[i].prix_ht + '</td> <td>' + data[i].date_creation + '</td> <td>' + data[i].date_modification + '</td> <td>  <a href="index.php?controller=panier_produit&amp;action=store&amp;produit_id=' + data[i].id+ '>Ajouter au panier</a> </td> </tr>';
            }
            
            $('#display_products').html(content);
          }
        });
      });




    });