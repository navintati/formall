
<div class="container-fluid search-table">
    <div class="search-box">
        <div class="row">
            <div class="col-md-3">
                <h5>Search All Fields</h5>
            </div>
            <div class="col-md-9">
                <!-- <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Search all fields e.g. HTML"> -->
                <input type="text" id="myInput" class="form-control" placeholder="Search all fields e.g. HTML">
                <script>
                    $(document).ready(function () {
                        $("#myInput").on("keyup", function () {
                            var value = $(this).val().toLowerCase();
                            // alert(value); return false;
                            $("#myTable tr").filter(function () {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
                </script>
            </div> 
        </div>
    </div>
    <div class="search-list">
        <h3>303 Records Found</h3>
        <table class="table" id="myTable">
            <thead>
                <tr>
                  <th>Sr.no</th>
                  <th>CustomerName</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>PostalCode</th>
                  <th>Country</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($films as $film): ?>
            
              <tr>
                  <td><?php echo $film->CustomerID; ?></td>
                  <td><?php echo $film->CustomerName;?></td>
                  <td><?php echo $film->Address;?></td>
                  <td><?php echo $film->City;?></td>
                  <td><?php echo $film->PostalCode;?></td>
                  <td><?php echo $film->Country;?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>

  <?php if (strlen($pagination)): ?>
    <div>
      Pages : <?php echo $pagination . '&nbsp;' ; ?>
    </div>
  <?php endif; ?>

</div>
