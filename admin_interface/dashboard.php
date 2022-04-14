<?php

$dataPoints = array(
    array("y" => 3, "label" => "Apple" ),
    array("y" => 24, "label" => "Samsung" ),
    array("y" => 10, "label" => "Oppo" ),
    array("y" => 18, "label" => "Xiaomi" )
);

?>

<?php
require_once '../session.php';
$title = 'Dashboard';
require_once 'includes/header.php';
?>
<?php
require_once 'includes/navbar.php';
?>



<section class="home">

    <div id="dashboard" class="flex flex-col justify-around items-center min-h-screen ">

        <div class="flex flex-wrap justify-evenly  items-center ">
            <div class=" bg-gray-100 justify-content border border-white border-solid rounded-xl shadow-xl w-max p-3">
                <canvas id="pie-chart" width="450" height="280"></canvas>

            </div>

            <div class="m-5  bg-gray-100 justify-content border border-white border-solid rounded-xl shadow-xl w-max p-3">
                <canvas id="doughnut-chart" width="450" height="280"></canvas>

            </div>
        </div>
        <div class="flex flex-col  justify-center m-5 bg-gray-100
        items-center border border-white border-solid rounded-xl shadow-xl w-4/5 h-96" ><canvas id="bar-chart-horizontal" width="800" height="300"></canvas>

    </div>
    </div>
  </div>

</section>
<?php
require_once 'includes/footer.php';
?>
