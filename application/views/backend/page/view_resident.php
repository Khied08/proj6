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

    <!-- Add this CSS style in the <head> section of your HTML file -->
<style>
    .bootbox-header {
        color: white; /* Font color */
        background-color: lightblue; /* Background color */
        border-bottom: none; /* Remove the border if any */
    }

</style>

<div class="container-fluid">
   <!-- Page Heading --> 
   <br>
 <center>
   <h1 class="h3 mb-2" style="color: black; font-size: 24px; font-family: Verdana, sans-serif;">Residents Information List</h1>
</center>
   <p class="mb-4">
      <a class="btn btn-primary" href="<?= base_url('index.php/dashboard/add-resident') ?>">  <i class="fas fa-user-plus"></i> Add Resident </a>
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
                  <th scope="col" >#</th>
                  <th scope="col">Resident Image</th>
                  <th scope="col">Fullname</th>
                  <th scope="col">Sex</th>
                  <th scope="col">Birth Date</th>
                  <th scope="col">Contact</th>
                  <th scope="col">Email</th>
                  <th scope="col">Civil Status</th>
                  <th scope="col" >Address</th>
                  <th scope="col">ACTIONS</th>
               </tr>
            </thead>
            <tbody>
                <!-- Your table body content here -->
         
               <?php $counter =1; ?>
                  <?php foreach ($resident_list as $resident) : ?>
                     <tr class="search-item">
                     <td><?= $counter ?></td>
                     <td style=" auto; text-align: center;"><img src="<?php echo base_url($resident->image); ?>" height="50 px" width="50px" alt="Resident Image"></td>
                        <td><?= $resident->first_name ?> <?= $resident->middlename ?> <?= $resident->last_name ?>  <?= $resident->extension ?>  </td>
                        <td><?= $resident->sex ?></td>
                        <td><?= date('Y-m-d', strtotime($resident->birth_date)) ?></td>
                        <td><?= $resident->contact ?></td>
                        <td><?= $resident->email ?></td>
                        <td><?= $resident->civil ?></td>
                        <td><?= $resident->purok ?> <?= $resident->barangay ?> <?= $resident->municipality ?>  <?= $resident->province ?>    </td>
                        <td>
                        <div class= "btn-group">
                    <button type="button" class="btn btn-primary edit-resident-btn" data-resident="<?= $resident->resident_id; ?>"><i class="fas fa-edit"></i></button>
                <!--  <a class="btn btn-primary" href="<?= base_url('index.php/dashboard/edit-resident/'.$resident->resident_id); ?>"><i class="fas fa-edit"></i></a> -->
                        <button type="button" class="btn btn-success"> <i class="fas fa-eye"></i></button>
                        <button type="button" class="btn btn-danger delete-resident-btn" data-resident="<?= $resident->resident_id; ?>"><i class="fas fa-trash"></i></button>
                        </div>
                     </td>
                     </tr>
                     <?php $counter++; ?>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>

<script>
   /* AJAX  */
    $(document).on('click','.edit-resident-btn',function(){

      var residentId = this.dataset.resident;

      $.ajax({
          url:'<?= base_url('index.php/dashboard/ajax-update-resident-form') ?>',
          method:'POST',
          data:{
            resident_id: residentId
          },
          success:function(response){
         
                bootbox.dialog({
                  title: 'Edit Resident',
                  message:' ',
                  size: 'extra-large'
                }).find('.bootbox-body').html(response);
          }

        });

    });

    $(document).on('click','.delete-resident-btn',function(e){

      var residentId = this.dataset.resident;

      bootbox.confirm('Are you sure you want to delete this resident',function(answer){

            if(answer==true){

               window.location = '<?= base_url('index.php/dashboard/delete-resident/') ?>'+residentId;
               
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



