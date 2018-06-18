  
  $(document).ready(function(){
    $('#categorie').change(function() {
        var id = $(this).val();
        $.ajax({
          url:"index.php?controller=produit&action=filter&categorie_id=" + id,
          method:"GET",          
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
    });