<?php

include_once('../config.php');
if (isset($_POST['city'])) {
    $city = $_POST['city'];
    $sql = "SELECT * FROM `application` WHERE block ='$city'";
    $result = mysqli_query($con, $sql);
    $output = "";

    if (mysqli_num_rows($result) > 0) {

        $output .= ' <div class="main-content">
        <div class="main-container container-fluid">
          <div class="inner-body">
        <div class="row row-sm">

            <div class="col-lg-12">
        <div class="container">
    <div class="table-responsive">
     <table class="table table-bordered border-bottom" id="example1">
    <thead class="bg-primary">
      <tr>
        <th class="text-white">Form No.</th>
        <th class="text-white">Name</th>
        <th class="text-white">Father`s Name</th>
        <th class="text-white">Phone</th>
        <th class="text-white">District</th>
        <th class="text-white">Block</th>
      </tr>
    </thead>
    <tbody>'; ?>
        <?php

        while ($row = mysqli_fetch_assoc($result)) {
        ?>


            <?php
            $output .= "<tr>
                                        <td>{$row['form_no']}</td>
                                        <td>{$row['name']}</td>
                                        <td> {$row['father_name']} </td>
                                        <td>{$row['phone']}</td>
                                        <td>{$row['district']}</td>
                                        <td>{$row['block']}</td>	
									</tr>";
            ?>
        <?php
        } ?>
        </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>

<?php
        $output .= '<div class="text-right mb-3 mt-3">
                        <a href="download.php?city=' . urlencode($city) . '" class="btn btn-success">Download Data</a>
                    </div>';

        echo $output;
    } else {

        echo "not found";
    }
} else {
    echo "field is empty";
}

?>
