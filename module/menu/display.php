<?php
$dedata = DB('menu')->filter(['available'=>'yes']);
$finaldata = [];
$size = 0;
$categories =[];
foreach ($dedata as $info){
    $cats = explode(',',$info['category']);
    if($categories){
        foreach($cats as $v){
            if(!in_array($v,$categories)){
                $categories[]=$v;
            }
        }
    }
    else{
        $categories=$cats;
    }
}
foreach( $dedata as $info){
    $cats = explode(',',$info['category']);
    foreach($cats as $val){
        if(in_array($val,$categories)){
            $finaldata[$val][]=$info;
        }
    }
}
?>
<style>
     .card{
      border:solid #ddd;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      transition: transform 0.3s, box-shadow 0.3s;
  }
  .card:hover{
      transform:translateY(-5px);
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
  }
  
  .image{
      height: 20px;
      object-fit:cover;
      border-bottom:1px solid #ddd;
  }
  .title{
      font-size:1.2rem;
      font-weight:bold;
      
  }
  .card-price{
    color:#28a745;
    font-size: 1.1rem;
    font-weight: bold;
}
  
</style>
<div class="container my-10">
    <h1 class="text-center text-danger mb-4">Menu</h1>

    <?php foreach ($finaldata as $category => $items) { ?>
        <h3 class="text-success" style="margin-top: 50px; text-transform: uppercase;"><?= $category; ?></h3>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php foreach ($items as $item) { ?>
                <div class="col" style="margin-top:40px;">
                    <div class="card h-100">
                        <img src="<?= ROOT . "public/images/" . ($item['picture'] ? $item['picture'] : "not found.jpg"); ?>" 
                             class="card-img-top" alt="<?= htmlspecialchars($item['item_name']); ?>" 
                             style="width: 100%; height: 170px; object-fit:cover;">
                             
                        <div class="card-body">
                             <h5 class="card-title"><?= htmlspecialchars($item['item_name']); ?></h5>
                            <p class ="card-price">₹<?=$info['price'];?></p>
                            <p class="card-text"><?= htmlspecialchars($item['description']); ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>


