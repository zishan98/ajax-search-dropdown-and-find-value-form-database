// css------------------------
<style>
  #cityList {
    width: 71.5%;
    position: absolute;
    /* border: 1px solid #4d6e87; */
    display: none;
    z-index: 100;
}
#cityList ul {
    list-style: none;
    background: #fff;
    margin: 0;
    padding: 0;
    text-align: left;
}
#cityList ul li {
    padding: 2px 10px;
    cursor: pointer;
    font-size: 16px;
    border-bottom: 1px solid #ebebeb;
}
</style>
//form -----------------------
<form class="check-form" id="search-form">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-sm-4 p-0">
                        <p>Search Block<span style="color:red;"></span> </p>

                            <div class="check-content d-flex" id="autocomplete">
                                <input type="text" name="area" id="city-box" class="form-control" placeholder="Enter Your block" autocomplete="off">
                                <button class="btn btn-primary" type="submit" id="search-data">
                                    Search
                                </button>                               
                            </div>
                            <div id="cityList"></div>
                        </div>
                       
                           
                               
                           
                    </div>
                </form>
            </div>
            <div id="table-datas"></div>

//js code------------------------------------


<script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
<!-- END FOOTER -->
 <!-- start search script -->
 <script>
    $(document).ready(function() {
        $('#city-box').keyup(function() {
          
            var city = $(this).val();
            if (city != '') {
             
                $.ajax({
                    url: "load-block.php",
                    method: "POST",
                    data: {city: city},
                    success: function(data) {
                        $('#cityList').fadeIn("fast").html(data);
                        //$('#cityList').html(data);
                    }
                });
            } else {
                $('#cityList').fadeOut();
                //$('#cityList').html("");
            }
        });
        $(document).on('click','#cityList li', function(){
            $('#city-box').val($(this).text());
            $('#cityList').fadeOut();
        });

        $("#search-data").on('click', function(e){
            e.preventDefault();

            var city = $('#city-box').val();

            if(city == ""){
                alert("Please enter the block name");
            }else{
                $.ajax({
                    url: "load-table.php",
                    method: "POST",
                    data: {city: city},
                    success: function(data) {
                        $('#table-datas').html(data);
                        
                    }
                });
            }
        })
    });
</script>

