<?php

$data = DB('menu')->get_all();
if(isset($_POST['del']))
{
    $delid=implode(',',$_POST['del']);
    DB('menu')->delete($delid);
    redirect('menu');
}
// print_r($data);            
?>

<div><a href="<?=ROOT;?>menu/menuform" class="btn btn-primary">Add Item</a></div>

<form method="post">
<table class="table table-stripted border" id="list">
    <thead class="table-dark">
        <tr>
            <th>S.No</th>
            <th><input type="checkbox" id="all" onclick="checkdel(this)"><label for="all">All</label></th>
            <th>Item</th>
            <th style="text-align: center;">Description</th>
            <th>Category</th>
            <th>Available</th>
            <th>Created At</th>
            <th>Updated At</th>
            
        </tr>
    </thead>
    <tbody>
      <?php
         $index=0;
         foreach($data as $info)
        { ?>
        <tr>
           <td><?= ++$index; ?></td>
           <td><input type="checkbox" name="del[]" onclick="displaybtn()" class="delc" value="<?= $info['id']; ?>"></td>
           <td><a href="<?=ROOT;?>menu/menuform/<?=$info['id'];?>" title="click for edit"> 
            <?= $info['item_name']; ?></a></td>
            <td><?= $info['description']; ?></td>
            <td><?= $info['category']; ?></td>
            <td><?= $info['available']; ?></td>
            <td><?= date('d-M-Y h:i A', strtotime($info['created_at'])); ?></td>
            <td><?= date('d-M-Y h:i A', strtotime($info['updated_at'])); ?></td>
            
        </tr>
        <?php } ?>             
    </tbody>
</table>
<div id="ditem" style="display: none;">
<button class="btn btn-danger" onclick="return confirm('are you sure you want to delete this item?')">Delete Selected item</button>
</div>
</form>