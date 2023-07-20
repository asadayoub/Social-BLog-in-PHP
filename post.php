<?php
$array = [
    [
        "name" => "asad",
        "message" => "sads sd sd sd",
        "date" => date("y/m/d"),
        "img" => "https://bootdey.com/img/Content/avatar/avatar1.png"
    ],
    [
        "name" => "ahsan",
        "message" => "sads sd sd sd",
        "date" => date("y/m/d"),
        "img" => "https://bootdey.com/img/Content/avatar/avatar1.png"
    ],
    [
        "name" => "hasnain",
        "message" => "sads sd sd sd",
        "date" => date("y/m/d"),
        "img" => "https://bootdey.com/img/Content/avatar/avatar1.png"
    ],
    [
        "name" => "mohsin",
        "message" => "sads sd sd sd",
        "date" => date("y/m/d"),
        "img" => "https://bootdey.com/img/Content/avatar/avatar1.png"
    ]
]
?>
<?php
        foreach ($array as $item) {     
           echo '<div class="col-lg-6">
           <div class="card mb-4 rounded-lg shadow-lg">
               <div class="card-body">
               <div class="media-body ml-3">
                       '.$item["name"].'
                           <div class="text-muted small">'.$item["date"].'</div>
                       </div>
                       <p class="ml-3">
                   '.$item["message"].'
                     </p>
                   <div class="media mb-3">
                       <img src="'.$item["img"].'" class="d-block ui-w-40 width100" alt="">
                       
                   </div>
       
                   
               </div>
           </div>
       </div>' ;        
                }
                ?>
<!-- <div class="col-lg-6">
    <div class="card mb-4 rounded-lg shadow-lg">
        <div class="card-body">
            <div class="media mb-3">
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="d-block ui-w-40 rounded-circle" alt="">
                <div class="media-body ml-3">
                    Kenneth Frazier
                    <div class="text-muted small">3 days ago</div>
                </div>
            </div>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus commodo bibendum. Vivamus laoreet blandit odio, vel finibus quam dictum ut.
            </p>
        </div>
    </div>
</div> -->