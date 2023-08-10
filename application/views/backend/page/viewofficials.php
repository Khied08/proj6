<style>
    /* Add border to the table */
    .table-bordered {
        border: 30px solid #dee2e6;
    }

    #border th {
      border-collapse: collapse;
   text-align: center;
   padding: 15px;
   font-family: 'Open Sans', serif;
   font-size: 15px;
   color: black;
      }
      #border td {
    border-collapse: collapse;
    text-align: center;
    padding: 15px;
    font-family: 'Open Sans', serif;
    font-size: 15px;
    color: black; }

#border {
   border-collapse: collapse;
   padding: 15px;
}
    /* Add outline to the card */
    .card {
        border: 1px solid #ccc;
        
    }
    
</style>


<div class="container-fluid">
    <!-- Page Heading -->
   <br>
    <center>
        <h1 class="h3 mb-2" style="color: black; font-size: 24px; font-family: Verdana, sans-serif;">Barangay Officials</h1>
    </center>
    <p class="mb-4">
        <a class="btn btn-primary" href="<?= base_url('index.php/dashboard/add-officials') ?>">
            <i class="fas fa-user-plus"></i> Add Officials
        </a>
    </p>
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="m-0 font-weight-bold text-primary">List</h6>
                </div>
                <div class="col-md-6">
             <form class="form-inline float-right"  id="search-form">
               <div class="input-group">
                   <input type="text" id="search-input" class="form-control" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                     <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="border">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th scope="col" >Position</th>
                            <th scope="col" >Name</th>
                            <th scope="col" >Contact</th>
                            <th scope="col" >Address</th>
                            <th scope="col" >Start of Term</th>
                            <th scope="col" >End of Term</th>
                            <th scope="col" >ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $c = 1; 
                        foreach($officials_list as $officials_data): ?>
                          <tr class="search-item">
                            <td><?= $c++ ?></td>
                            <td><?= $officials_data->position ?></td>
                            <td><?= $officials_data->name ?></td>
                            <td><?= $officials_data->contact ?></td>
                            <td><?= $officials_data->address ?></td>
                            <td><?= $officials_data->start_term ?></td>
                            <td><?= $officials_data->end_term ?></td>
                            <td>
                                <div class= "btn-group">
                                <button type="button" class="btn btn-primary edit-official-btn" data-official="<?= $officials_data->id ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-success">
                                    <i class="fas fa-eye"></i>
                                </button> 
                                <button class="btn btn-danger delete-official-btn" data-official="<?= $officials_data->id ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                                </div>
                            </td>
                        </tr>    
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>

   /* AJAX  */

    $(document).on('click','.edit-official-btn',function(){

      var officialId = this.dataset.official;

      $.ajax({
          url:'<?= base_url('index.php/dashboard/ajax-update-official-form') ?>',
          method:'POST',
          data:{
            official_id: officialId
          },
          success:function(response){
         
                bootbox.dialog({
                  title: 'Edit Official',
                  message:' ',
                  size: 'extra-large'
                }).find('.bootbox-body').html(response);
          }

        });

    });

    $(document).on('click','.delete-official-btn',function(e){

      var officialId = this.dataset.official;

      bootbox.confirm('Are you sure you want to delete this official',function(answer){

            if(answer==true){

               window.location = '<?= base_url('index.php/dashboard/delete-officials/') ?>'+officialId;
               
            }

      });


   });

   $(document).ready(function() {
      // Search functionality (unchanged)
      $('#search-input').keyup(function() {
         var searchValue = $(this).val().toLowerCase();
         $('.search-item').each(function() {
            var residentName = $(this).find('td:nth-child(3)').text().toLowerCase();
            if (residentName.includes(searchValue)) {
               $(this).show();
            } else {
               $(this).hide();
            }
         });
      });
   });
   

    

</script>
