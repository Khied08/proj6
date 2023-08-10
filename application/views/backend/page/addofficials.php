<!-- Main Content -->
<div id="content">
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow">
                    <div class="card-header">
                        <center>
                            <h2 class="h3 mb-2 text-gray-800"> Barangay Officials</h2>
                        </center>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                        
                            <div class="form-group">
                                <label for="position"  class="input-label">Position:</label>
                                <input type="text" name="position" id="position" class="form-control" onfocus="setFocus(true)" onblur="setFocus(false)" required>
                                <span class="text-danger"><?= form_error('position') ?></span>
                            </div>

                            <div class="form-group">
                                <label for="name" class="input-label">Name:</label>
                                <input type="text" name="name" id="name" class="form-control"  onfocus="setFocus(true)" onblur="setFocus(false)" required>
                                <span class="text-danger"><?= form_error('name') ?></span>
                            </div>

                            <div class="form-group">
                                <label for="contact" class="input-label">Contact#:</label>
                                <input type="text" name="contact" id="contact" class="form-control"  onfocus="setFocus(true)" onblur="setFocus(false)" required>
                                <span class="text-danger"><?= form_error('contact') ?></span>
                            </div>
                            <div id="address" class="form-group">
                                <label for="address" class="input-label">Address:</label>
                                <input type="text" name="address" id="address" class="form-control"  onfocus="setFocus(true)" onblur="setFocus(false)" required>
                                <span class="text-danger"><?= form_error('address') ?></span>
                            </div>
                            
                            <div class="form-row">
                                <div id="startterm" class="form-group col">
                                    <label for="start_term" class="input-label">Start Term:</label>
                                    <input type="date" name="start_term" id="start_term" class="form-control"  onfocus="setFocus(true)" onblur="setFocus(false)" required>
                                    <span class="text-danger"><?= form_error('start_term') ?></span>
                                </div>
                                <div  id="endterm" class="form-group col">
                                    <label for="end_term" class="input-label">End Term:</label>
                                    <input type="date" name="end_term" id="end_term" class="form-control"  onfocus="setFocus(true)" onblur="setFocus(false)" required>
                                    <span class="text-danger"><?= form_error('end_term') ?></span>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary">Add Officials</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br> 
<br>

<style>
@import url("https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700");
$color: #80868b;
$active-color: #1a73e8;
$error-color: #f44336;
$input-value-color: #202124;
$border-color: 1px solid #dadce0;
$border-color-active: 2px solid $active-color;
$default-background: #fff;

  .input-label {
    color:#fff;
    top: -8px;
    background: #fff;
    font-size: 11px;
    transition: 250ms;
    svg {
      position: relative;
      width: 11px;
      height: 11px;
      top: 2px;
      transition: 250ms;
    }
  }

  #address{
     margin-bottom: 0px;
  }

#startterm{
    padding-top:-100px ;
    margin-bottom: 0px;
}

    #endterm{
    padding-top:-100px ;

  }

.form-group {
  position: relative;
  margin: 25px ;
  .input-label {
    position: absolute;
    color: #1a73e8;
    font-size: 16px;
    font-weight: 400;
    max-width: calc(100% - (2 * 8px));
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    left: 8px;
    top: 13px;
    padding: 0 8px;
    transition: 250ms;
    user-select: none;
    pointer-events: none;
    background:  #fff;
    svg {
      position: relative;
      width: 15px;
      height: 15px;
      top: 2px;
      transition: 250ms;
    }
  }
  .form-control {
    box-sizing: border-box;
    height: 60px;
    width: 100%;
    border-radius: 4px;
    color: black;
    border: $border-color;
    padding: 20px;
    font-size: 19px; 
    transition: 250ms;
    &:focus {
      outline: none;
      border: 2px solid #1a73e8;
      transition: 250ms;
    }
  }
}

.form-group.error {
  .input-label {
    color:   #f44336;
    top: 8px;
    background: 2px solid $active-color;
    transition: 250ms;
  } 
}
.form-group.focus,
.form-group.active {
  .input-label {
    color: $active-color;
    top: -8px;
    background:2px solid $active-color;
    font-size: 18px;
    transition: 250ms;
   svg {
      position: relative;
      width: 11px;
      height: 11px;
      top: 2px;
      transition: 250ms;
    }
  }
}
.form-group.active {
  .form-control {
    border:2px solid #f44336;
  }
}

</style>




<script>

 function setFocus(on) {
  var element = document.activeElement;
  if (on) {
    setTimeout(function () {
      element.parentNode.classList.add("focus");
    });
  } else {
    let box = document.querySelector(".form-group");
    box.classList.remove("focus");
    $("input").each(function () {
      var $input = $(this);
      var $parent = $input.closest(".form-group");
      if ($input.val()) $parent.addClass("focus");
      else $parent.removeClass("focus");
    });
  }
}


    function showPopup() {
        var modal = document.getElementById("popupModal");
        modal.style.display = "block";
    }

    function closePopup() {
        var modal = document.getElementById("popupModal");
        modal.style.display = "none";
    }

    function addOfficials() {
        // Code to add officials to your system/database
        closePopup(); // Close the popup after adding officials
    }
</script>