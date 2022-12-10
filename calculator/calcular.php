<!DOCTYPE html>
<html lang="en">
<?php header('Access-Control-Allow-Origin: *'); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>
<!-- //  CSS  -->
<style>
    .cal1 {
        margin-top: 31px;
        border: 2px solid red;
        border-radius: 5px;
        padding: 20px;
        border-color: #68ddba;

    }

    .col2 {
        width: 418px;
        margin: auto;
    }
</style>

<body>
    <form method="post">
        <!-- Calculator -->
        <br>
        <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>ROI Charging Calculator</h4>
                                        </div>                 
                                    </div>
                                </div>
        <div class="cal1 active" id="ui">
            <div class="cal2">
    
                <div class="col2">
                    <label for="">My Property has parking spots </label>
                    <input type="number" name="prk" id="prk" value="0" min="0" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Annual CO2 Impact: </label>
                    <!-- <input type="text" class="form-control" id="tlbs" name="tlbs" disabled> -->
                    <h5 class="single" id="tlbs" name="tlbs"></h5>
                </div> 
                <div class="col">
                    <label for=""> Annual Charging Revenue: </label>
                    <h5 class="totl" id="total" name="total"></h5>

                    <!-- <input type="text" class="form-control" id="total" name="total" disabled> -->
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">EV chargers: </label>
                    <input type="number" class="form-control" id="cal1" name="cal1" value="1" disabled oninput="calc();">
                </div>
                <div class="col">
                    <label for="">Rate / hour: </label>
                    <input type="number" class="form-control" id="quantity" value="2" name="quantity" disabled oninput="calc();">
                </div>
                <div class="col">
                    <label for="">Hours / week </label>
                    <input type="number" class="form-control" id="hr" value="20" name="hr" disabled oninput="calc();">
                </div>
            </div>

        </div>
    </form>
</body>
<script>
    //   $('#prk').toggleClass('active');



    $('#prk').change(function(event, prk) {
        if ($("#prk").val() != '0', $("#prk").val() != '') {
            $("#cal1").prop("disabled", false);
            // $("#hr").val(20);
            $("#quantity").prop("disabled", false);
            $("#hr").prop("disabled", false);
            console.log("yeah.....0 = Disable fields");
            if ($("#prk").val() != '0') {
                $("#cal1").prop("disabled", false);
                $("#quantity").prop("disabled", false);
                $("#hr").prop("disabled", false);
            } else {
                $("#cal1").prop("disabled", true);
                $("#quantity").prop("disabled", true);
                $("#hr").prop("disabled", true);
            }
        } else {
            $("#cal1").prop("disabled", true);
            $("#quantity").prop("disabled", true);
            $("#hr").prop("disabled", true);
            console.log("yeah.....1 = Enable fields ");
        }
       
    });
    //  Calculation 
    function calc() {
        var amount2 = 52;
        var lbs = 732;
        var prk = document.getElementById("prk").value;
        var quantity = document.getElementById("quantity").value;
        var cal1 = document.getElementById("cal1").value;
        var hr = document.getElementById("hr").value;
        var total = amount2 * quantity * cal1 * hr;
        var tlbs = lbs * hr * cal1;
        document.getElementById("total").value = '$' + total.toLocaleString();
        document.getElementById("tlbs").value = tlbs.toLocaleString() + 'lbs';
        
        var z= $('#tlbs').text(tlbs);
        
        var x=    $('#total').text(total);
        
        jQuery({ Counter: z }).animate({ Counter: $('#tlbs').text() }, {
            duration: 1000,
            easing: 'swing',
            step: function () {
                $('.single').text(Math.ceil(this.Counter));
            }
        });
        
    jQuery({ Counter: x }).animate({ Counter: $('#total').text() }, {
      duration: 1000,
      easing: 'swing',
      step: function () {
        $('.totl').text(Math.ceil(this.Counter));
      }
    });
    } 


    $('#prk').change(function() {
        var ac = $("#prk").val();
        if (ac > 0) {
            $('.cal1').removeClass('active');
        } else if (ac == 0) {
            $('.cal1').addClass('active');
            // $("#cal1").val(2);ff 
        }
        if (ac > 0) {
            $("#cal1").val(1);
            calc();

        } else {
            $("#cal1").val();

        }
        if (ac > 5) {
            $("#cal1").val(2);

            calc();
        } else {
            $("#cal1").val();
        }
        if (ac > 10) {
            $("#cal1").val(3);

            calc();
        } else {
            $("#cal1").val();
        }
        if (ac > 15) {
            $("#cal1").val(4);

            calc();
        } else {
            $("#cal1").val();
        }
        if (ac > 20) {
            $("#cal1").val(5);

            calc();
        } else {
            $("#cal1").val();
        }
        if (ac > 25) {
            $("#cal1").val(6);

            calc();
        } else {
            $("#cal1").val();
        }
        if (ac > 30) {
            $("#cal1").val(7);

            calc();
        } else {
            $("#cal1").val();
        }
        if (ac > 35) {
            $("#cal1").val(8);

            calc();
        } else {
            $("#cal1").val();
        }
        if (ac > 40) {
            $("#cal1").val(9);

            calc();
        } else {
            $("#cal1").val();
        }
        if (ac > 45) {
            $("#cal1").val(10);
            calc();
        } else {
            $("#cal1").val();
        }
        if (ac > 50) {
            $("#cal1").val(11);
            calc();
        } else {
            $("#cal1").val();
        }
        if (ac > 55) {
            $("#cal1").val(12);
            calc();
        } else {
            $("#cal1").val();
        }
        if (ac > 60) {
            $("#cal1").val(13);
            calc();
        } else {
            $("#cal1").val();
        }
        if (ac > 65) {
            $("#cal1").val(14);
            calc();
        } else {
            $("#cal1").val();
        }
        if (ac > 70) {
            $("#cal1").val(15);
            calc();
        } else {
            $("#cal1").val();
        }
        if (ac > 75) {
            $("#cal1").val(16);
            calc();
        } else {
            $("#cal1").val();
        }
        if (ac > 80) {
            $("#cal1").val(17);
            calc();
        } else {
            $("#cal1").val();
        }
        if (ac > 85) {
            $("#cal1").val(18);
            calc();
        } else {
            $("#cal1").val();
        }
        if (ac > 90) {
            $("#cal1").val(19);
            calc();
        } else {
            $("#cal1").val();
        }
        if (ac > 95) {
            $("#cal1").val(20);
            calc();
        } else {
            $("#cal1").val();
        }
        if ($("#prk").val() != '0') {} else {
            document.getElementById("total").value = "0";
            document.getElementById("tlbs").value = "0";

        }
    });
</script>

</html>