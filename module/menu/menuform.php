<?php
islogin();
$obj=DB('menu');
if($uid)
{
    $info = $obj->find($uid);
}
if(isset($_POST['item_name']))
{
    $info=[
          'item_name'=>$_POST['item_name'],             //user cant create col for own..they have to follow those col which i will pass to the database through these steps.
          'description'=>$_POST['description'],
          'category'=>($_POST['category']) ? implode(',', $_POST['category']) : '',
          'available'=>$_POST['available']
    ];

// $_POST['category']=implode(',',$_POST['category']);
   if($obj->save($info,$uid))
   {           //$key $value---------------------------------------->
    Session::set('get_data',"data ".($uid?"updated":"saved")." succesfully");
    redirect("menu");
   }
   else
   {
    echo "something went wrong!";
 
}
}  

?>
<div class="alert alert-primary h4 text-center">
   Item <?= $uid?"Edit":'Add'?> Form
</div>
<form action="" method="post">
    <div class="mb-3">
    <label for="item_name">Item name</label>
        <input type="text" name="item_name" id="item_name" placeholder="enter a name" required class="form-control" value="<?=$info['item_name']??'';?>">
    </div>

    <div class="mb-3">
    <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" placeholder="enter details" required ><?=$info['description']??'';?></textarea>
    </div>

    <div class="mb-3">
    <label for="category">Category<small>(hold ctrl button for multiple selection)</small></label>
      <?php $new = explode(',',$info['category']??''); ?>
      <!-- $new = isset($info['category']) ? explode(',', $info['category']) : [];   -->
        <select name="category[]" class="form-select" multiple>
        <option value="starters" <?=(in_array('starters',$new))?'selected':'';?>>Starters</option>
        <option value="main course" <?=(in_array('main course',$new))?'selected':'';?>>Main Course</option>
        <option value="high tea" <?=(in_array('high tea',$new))?'selected':'';?>>High Tea</option>
        <option value="beverage" <?=(in_array('beverage',$new))?'selected':'';?>>Beverage</option>
        <option value="dessert" <?=(in_array('dessert',$new))?'selected':'';?>>Dessert</option>
        </select>
       </div>

       <div class="mb-3">
    <label for="available" >Available</label>
        <select name="available" class="form-select">
            <option value="yes">Yes</option>
            <option value="no" <?= ($info['available'] ?? '') =='no' ? 'selected' : ''; ?>>No</option>

        </select>
    </div>

    <div class="mb-3" >
        <button class="btn btn-success" value="submit" style="margin-left: 650px;"><?= $uid?"Update":'Save'?></button>
    </div>

</form>