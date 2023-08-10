<div class="card-header  ">

<?php
            if(isset($_SESSION['error'])):?>
	        <div style="color:red;"><?= $_SESSION['error'] ?></div>
            <?php endif;?>

        <form action="<?php echo base_url('index.php/dashboard/edit-resident/'.$resident_data->resident_id); ?>" method="POST" enctype="multipart/form-data">
        <div class="form-row">
                <div style="width: 230px; max-height: 330px; align-items: center; border-radius: 6px;" class="form-group" id="image-preview">
                <center>  
                    <img height="200px" width="200px" style="margin-top: 10px; height:180px; width: 180px; object-fit: cover; border-radius: 50%; overflow: hidden;   object-position: center;" src="<?php echo base_url($resident_data->image); ?>" alt="Uploaded Image" class="img-thumbnail">
                    <hr style="margin-left: 10px; border: 1px solid #ccc; max-width: 200px; margin-bottom: 30px;">
                </center>   

                <center>  <strong><span style="color: black;">Upload Photo</span></strong> </center>

                
                <center> 
                    <div  id="image-upload-form" style="width: 110px; margin-top: 5px; margin-left: 100px;"  class="custom-file">
                        <label id="fileLabel" style="margin-left: -100px; text-align: left; " class="custom-file-label" for="image"></label>
                        <input style="padding-bottom: 0px;" type="file" name="image" id="image" class="custom-file-input" accept="image/*" required />
                        <span><?= form_error('image') ?></span>
                    </div>
                </center>  
            </div>
                    
                <?php
                    if(isset($_SESSION['error'])):?>
	                <div style="color:red;"><?= $_SESSION['error'] ?></div>
                    <?php endif;?>

                <?php
                    if(isset($_SESSION['success'])):?>
	                <div style="color:green;"><?= $_SESSION['success'] ?></div>
                <?php endif;?>
    
                <br>
                           
                </div>

        
        <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" value="<?php echo $resident_data->first_name; ?>" id="firstname" class="form-control" required />
                    <span><?= form_error('firstname') ?></span>
                </div>
                <br>
                <div class="form-group col-md-3">
                    <label for="middlename">Middle Name</label>
                    <input type="text" name="middlename" value="<?php echo $resident_data->middlename; ?>" id="middlename" class="form-control" required />
                    <span><?= form_error('middlename') ?></span>
                </div>
                <br>
                <div class="form-group col-md-3">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" value="<?php echo $resident_data->last_name; ?>" id="lastname" class="form-control" required />
                    <span><?= form_error('lastname') ?></span>
                </div>
                <div class="form-group col-md-3">
               <label for="extension">Name Extension</label>
               <input type="text" name="extension" value="<?php echo $resident_data->extension; ?>" id="extension" class="form-control"  />
               <span class="text-danger"><?= form_error('extension') ?></span>
            </div>
                </div>
         
            <div class="form-row">
            <div class="form-group col-md-2">
               <label for="sex">Sex</label>
               <select name="sex"  value="<?php echo $resident_data->sex; ?>" id="sex" class="form-control" required>
                  <option value="Female">Female</option>
                  <option value="Male">Male</option>
               </select>
               <span class="text-danger"><?= form_error('sex') ?></span>
            </div>
            <div class="form-group col-md-2">
               <label for="height">Height (cm)</label>
               <input type="text" name="height" value="<?php echo $resident_data->height; ?>" id="height"   class="form-control" required />
               <span class="text-danger"><?= form_error('height') ?></span>
            </div>
            <div class="form-group col-md-2">
               <label for="weight">Weight (kg)</label>
               <input type="text" name="weight" value="<?php echo $resident_data->weight; ?>" id="weight" class="form-control" required />
               <span class="text-danger"><?= form_error('weight') ?></span>
            </div>
            <div class="form-group col-md-2">
               <label for="bloodType">Blood Type</label>
               <input type="text" name="bloodType" value="<?php echo $resident_data->bloodType; ?>" id="bloodType" class="form-control" required />
               <span class="text-danger"><?= form_error('bloodType') ?></span>
            </div>

            <div class="form-group col-md-3">
               <label for="birth_date">Birth Date</label>
               <input type="date" name="birth_date" value="<?php echo $resident_data->birth_date; ?>" id="birth_date" class="form-control" required />
               <span class="text-danger"><?= form_error('birth_date') ?></span>
            </div>
            <div class="form-group col-md-4">
               <label for="birthplace">Birth Place</label>
               <input type="text" name="birthplace" value="<?php echo $resident_data->birthplace; ?>" id="birthplace" class="form-control" required />
               <span class="text-danger"><?= form_error('birthplace') ?></span>
            </div>
           
         </div>
         <div class="form-row">
         <div class="form-group col-md-3">
               <label for="nationality">Nationality</label>
               <input type="text" name="nationality" value="<?php echo $resident_data->nationality; ?>" id="nationality" class="form-control" required />
               <span class="text-danger"><?= form_error('nationality') ?></span>
            </div>
            <div class="form-group col-md-2">
               <label for="purok">Purok</label>
               <select name="purok" value="<?php echo $resident_data->purok; ?>" id="purok" class="form-control" required>
               <option value="Purok 1">Purok 1</option>
                  <option value="Purok 2">Purok 2</option>
                  <option value="Purok 3">Purok 3</option>
                  <option value="Purok 4">Purok 4</option>
                  <option value="Purok 5">Purok 5</option>
                  <option value="Purok 6">Purok 6</option>
                  <option value="Purok 7">Purok 7</option>
               </select>
               <span class="text-danger"><?= form_error('purok') ?></span>
            </div>
            <div class="form-group col-md-3">
               <label for="barangay">Barangay</label>
               <input type="text" name="barangay" value="<?php echo $resident_data->barangay; ?>" id="barangay" class="form-control" required />
               <span class="text-danger"><?= form_error('barangay') ?></span>
            </div>
            <div class="form-group col-md-3">
               <label for="municipality">Municipality</label>
               <input type="text" name="municipality" value="<?php echo $resident_data->municipality; ?>" id="municipality" class="form-control" required />
               <span class="text-danger"><?= form_error('municipality') ?></span>
            </div>
            <div class="form-group col-md-3">
               <label for="province">Province</label>
               <input type="text" name="province" value="<?php echo $resident_data->province; ?>" id="province" class="form-control" required />
               <span class="text-danger"><?= form_error('province') ?></span>
            </div>     
         </div>
         <div class="form-row">
            <div class="form-group col-md-4">
               <label for="contact">Contact</label>
               <input type="text" name="contact" value="<?php echo $resident_data->contact; ?>" id="contact" class="form-control" required />
               <span class="text-danger"><?= form_error('contact') ?></span>
            </div>
            <div class="form-group col-md-4">
               <label for="email">Email</label>
               <input type="email" name="email" value="<?php echo $resident_data->email; ?>" id="email" class="form-control" required />
               <span class="text-danger"><?= form_error('email') ?></span>
            </div>
            <div class="form-group col-md-4">
               <label for="civil">Civil Status</label>
               <select name="civil" value="<?php echo $resident_data->civil; ?>" id="civil" class="form-control" required>
                  <option value="single">Single</option>
                  <option value="married">Married</option>
                  <option value="widowed">Widowed</option>
                  <option value="separated">Separated</option>
               </select>
               <span class="text-danger"><?= form_error('civil') ?></span>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-3">
               <label for="religion">Religion</label>
               <input type="text" name="religion"  value="<?php echo $resident_data->religion; ?>" id="religion" class="form-control" required />
               <span class="text-danger"><?= form_error('religion') ?></span>
            </div>
            
            <div class="form-group col-md-4">
               <label for="educational">Educational Attainment</label>
               <select name="educational" value="<?php echo $resident_data->educational; ?>" id="educational" class="form-control" required>
               <option value="">--Select Attainment--</option>
               <option value="No Schooling Completed">No schooling completed</option>
               <option value="Elementary Graduate">Elementary Graduate</option>
               <option value="Elementary Undergraduate">Elementary Undergraduate</option>
               <option value="High School Graduate">High School Graduate</option>
               <option value="HighSchool Undergraduate">HighSchool Undergraduate</option>
               <option value="College UnderGraduate">College UnderGraduate</option>
               <option value="Vocational">Vocational</option>
               <option value="Bachelor's Degree">Bachelor's Degree</option>
               <option value=">Master Degree">Master Degree</option>
               <option value="Doctorate Degree">Doctorate Degree</option>
            </select>
               <span class="text-danger"><?= form_error('educational') ?></span>
            </div>
            <div class="form-group col-md-3">
               <label for="occupation">Occupation</label>
               <input type="text" name="occupation" value="<?php echo $resident_data->occupation; ?>" id="occupation" class="form-control" required />
               <span class="text-danger"><?= form_error('occupation') ?></span>
            </div>
            <div class="form-group col-md-2">
               <label for="monthlyIncome">Monthly Income</label>
               <input type="text" name="monthlyIncome"  value="<?php echo $resident_data->monthlyIncome; ?>" id="monthlyIncome" class="form-control" required />
               <span class="text-danger"><?= form_error('monthlyIncome') ?></span>
            </div>
            </div>

            <div class="form-row">
            <div class="form-group col-md-3">
               <label for="householdmember">Total Household Member</label>
               <input type="text" name="householdmember" value="<?php echo $resident_data->householdmember; ?>" id="householdmember" class="form-control" required />
               <span class="text-danger"><?= form_error('householdmember') ?></span>
            </div>
           
            <div class="form-group col-md-5">
               <label for="landown">Land Ownership Status</label>
               <select name="landown"  value="<?php echo $resident_data->landown; ?>" id="landown" class="form-control" required>
               <option value="">--Select Ownership--</option>
                  <option value="owned">Owned</option>
                  <option value="landless">Landless</option>
                  <option value="tenant">Tenant</option>
                  <option value="caretaker">Caretaker</option>
               </select>
               <span class="text-danger"><?= form_error('landown') ?></span>
            </div>
            <div class="form-group col-md-5">
               <label for="houseownership">House Ownership</label>
               <select name="houseownership" value="<?php echo $resident_data->houseownership; ?>" id="houseownership"class="form-control" required>
               <option value="">--Select Ownership--</option>
                  <option value="own house">Own House</option>
                  <option value="renting">Renting</option>
                  <option value="living with Parents">Living with Parents</option>
               </select>
               <span class="text-danger"><?= form_error('houseownership') ?></span>
            </div>
         </div>
<br>
        
         <div class="form-group  text-center">
            <button  type="submit" class="btn btn-primary">Update Resident</button>
         </div>
      </form>
   </div>
   </div>

  </div>
   <script>
$(document).ready(function() {
    // Listen for the 'change' event on the file input
    $('#image').change(function() {
        var input = $(this)[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                // Update the image preview with the selected image
                $('#image-preview img').attr('src', e.target.result);
            };

            // Read the image as a data URL
            reader.readAsDataURL(input.files[0]);
        }
    });

    $('#image-upload-form').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: '<?= base_url('index.php/dashboard/add_resident') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var data = JSON.parse(response);
                if (data.image_path) {
                    $('#image-preview img').attr('src', '<?= base_url() ?>' + data.image_path);
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
                $('#image-error').text('Error occurred during image upload.');
            }
        });
    });
});
</script>


<script>
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = e.target.files[0]?.name || 'Choose file';
        document.getElementById('fileLabel').innerText = fileName;
    });
</script>

<style>
      body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .card-header {
         
            margin: 1px auto;
            background-color: #f0f0f0;
            border-radius: 6px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            font-size: 15px;
    color: black;

        }

      

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .form-row .form-group {
            flex: 1;
        }


        .form-control {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
           ;
        }

        .form-control:focus {
            outline: none;
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .img-thumbnail {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        

        .custom-file {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .custom-file-label {
            display: block;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            cursor: pointer;
            padding: 0.375rem 0.75rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
        }

        .custom-file-input {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
        }

        .text-danger {
            color: red;
        }

        .text-success {
            color: green;
        }

        .text-center {
            text-align: center;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

</style>