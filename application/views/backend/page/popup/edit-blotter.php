<div class="card-header  ">

<form method="POST" action="<?=base_url ('index.php/dashboard/update-blotter/'.$blotter_data->blotter_id);?>">
         <div class="form-row">
            <div class="form-group col-md-3">
               <label for="complainant">Name of Complainant</label>
               <input type="text" name="complainant" value="<?php echo $blotter_data->complainant; ?>" id="complainant" class="form-control" required />
               <span class="text-danger"><?= form_error('complainant') ?></span>
            </div>
            <div class="form-group col-md-3">
               <label for="age1">Age</label>
               <input type="text" name="age1" value="<?php echo $blotter_data->age1;?>" id="age1" class="form-control" required />
               <span class="text-danger"><?= form_error('age1') ?></span>
            </div>
            <div class="form-group col-md-3">
               <label for="address">Address</label>
               <input type="text" name="address" value="<?php echo $blotter_data->address;?>" id="address" class="form-control" required />
               <span class="text-danger"><?= form_error('address') ?></span>
            </div>
            <div class="form-group col-md-3">
               <label for="number">Contact Number</label>
               <input type="text" name="number" value="<?php echo $blotter_data->number;?>" id="number" class="form-control" />
               <span class="text-danger"><?= form_error('number') ?></span>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-3">
               <label for="complainee">Name of Complainee</label>
               <input type="text" name="complainee" value="<?php echo $blotter_data->complainee;?>" id="complainee" class="form-control" required />
               <span class="text-danger"><?= form_error('complainee') ?></span>
            </div>
            <div class="form-group col-md-3">
               <label for="age2">Age</label>
               <input type="text" name="age2" value="<?php echo $blotter_data->age2?>"  id="age2" id="age2" class="form-control" required />
               <span class="text-danger"><?= form_error('age2') ?></span>
            </div>
            <div class="form-group col-md-3">
               <label for="address_complainee">Address</label>
               <input type="text" name="add_complainee" value="<?php echo $blotter_data->add_complainee;?>" id="add_complainee" class="form-control" required />
               <span class="text-danger"><?= form_error('add_complainee') ?></span>
            </div>
            <div class="form-group col-md-3">
               <label for="num_complainee">Contact Number</label>
               <input type="text" name="num_complainee" value="<?php echo $blotter_data->num_complainee;?>" id="num_complainee" class="form-control" />
               <span class="text-danger"><?= form_error('num_complainee') ?></span>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-4">
               <label for="complaint">Complaint</label>
               <input type="text" name="complaint" value="<?php echo $blotter_data->complaint;?>" id="complaint" class="form-control" required />
               <span class="text-danger"><?= form_error('complaint') ?></span>
            </div>
            <div class="form-group col-md-4">
               <label for="action">Action</label>
               <select name="action" value="<?php echo $blotter_data->action;?>" id="action" class="form-control" required>
                  <option value="first">1st Option</option>
                  <option value="second">2nd Option</option>
               </select>
               <span class="text-danger"><?= form_error('action') ?></span>
            </div>
            <div class="form-group col-md-4">
               <label for="status">Status</label>
               <select name="status" value="<?php echo $blotter_data->status;?>" id="status" class="form-control" required>
                  <option value="solved">Solved</option>
                  <option value="unsolved">Unsolved</option>
               </select>
               <span class="text-danger"><?= form_error('status') ?></span>
            </div>
            <div class="form-group col-md-4">
               <label for="incidence">Incidence</label>
               <input type="text" name="incidence" value="<?php echo $blotter_data->incidence;?>" id="incidence" class="form-control" required />
               <span class="text-danger"><?= form_error('incidence') ?></span>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-6">
               <button class="btn btn-primary">Save Changes</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
         </div>
      </form>

      <style>
   /* Add your custom CSS styles here */

   .card-header {
         
         margin: 1px auto;
         background-color: #f0f0f0;
         border-radius: 6px;
         padding: 20px;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
     }

   .form-container {
            width: 80%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 10px 0;
        }

        .form-group {
            flex: 1;
            margin-right: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-container {
            text-align: center;
            margin-top: 15px;
        }

        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }

        /* Customize error message style */
        .text-danger {
            color: #dc3545;
        }



</style>
