<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-md-8 offset-2">
                    <table class="table" id="mytable">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prix jour</th>
                                <th>Prix kilometre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($tab as $ta): ?>
                            <tr>
                                <td scope="row"><?=$ta['nom_categorie']?></td>
                                <td><?=$ta['prix_location_jour']?></td>
                                <td><?=$ta['prix_location_km']?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
              </div>
          </div>
      </div>
      <script>
          $(document).ready(function(){
                $('#mytable').DataTable();
          })
      </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
  </body>
</html>