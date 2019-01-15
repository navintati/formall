
<div class="container-fluid search-table">
    <div class="search-box">
        <div class="row">
            <div class="col-md-3">
                <h5>Search Customer</h5>
            </div>
            <div class="col-md-9">
                <input type="text" id="myInput" class="form-control" placeholder="Search Customer Details">
                <script>
                    $(document).ready(function () {
                        $("#myInput").on("keyup", function () {
                            var value = $(this).val().toLowerCase();
                            // alert(value); return false;
                            $("#myTable tr").filter(function () {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                            $.ajax({
                              url: '<?php echo base_url(); ?>formall/display',
                              type: 'POST',
                              dataType: 'json',
                              data: { value : value },
                              success : function(data) {
                                console.log(data.msg);
                              }
                            })
                            
                            
                        });
                    });
                </script>
            </div> 
        </div>
    </div>
    <div class="search-list">
        <table class="table" id="myTable">
            <thead>
                <tr>
                  <!-- <th>Sr.no</th>
                  <th>CustomerName</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>PostalCode</th>
                  <th>Country</th> -->
                  <?php foreach ($fields as $field_name => $field_display): 
                    // echo "<pre>"; print_r($field_name); echo "</pre>"; 
                    // echo "<pre>"; print_r($field_display); echo "</pre>"; 
                    ?>
                    <th> <?php echo anchor("formall/display/".$field_name."/" .
                      (($sort_order == 'asc') ? 'desc' : 'asc') ,
                      $field_display); ?> </th> 

                  <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
            <?php if($searchall->num_rows() > 0) { ?>
            <?php $i = 1; foreach ($searchall->result() as $film) { ?> 
            
              <tr>
                  <?php foreach ($fields as $field_name => $field_display): ?>
                    <td> <?php echo $film->$field_name; ?> </td>
                  <?php endforeach; ?>
                  <!-- <td><?php //echo $film->CustomerID; ?></td> -->
                  <!-- <td> <?php //echo $this->uri->segment(3)+$i; ?> </td>
                  <td> <?php //echo $film->CustomerName;?> </td>
                  <td> <?php //echo $film->Address;?> </td>
                  <td> <?php //echo $film->City;?> </td>
                  <td> <?php //echo $film->PostalCode;?> </td>
                  <td> <?php //echo $film->Country;?> </td> -->
              </tr>

            <?php $i++; } } else { ?>
              
              <tr>
                <td> Records Not Found!!! </td>
                <!-- <td> <?php //echo ($searchall->num_rows() == 0 ? 'No Records Found !!!' : $searchall); ?> </td> -->
              </tr>

            <?php } ?>
            </tbody>
        </table>

    </div>

  <?php if (strlen($pagination)): ?>
    <div>
      Pages :- <?php echo $pagination; ?>
    </div>
  <?php endif; ?>

</div>
