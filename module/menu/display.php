<?php
$data = DB('menu')->get_all();

// print_r($data);            
?>

<form method="post">
<table class="table table-stripted border" id="list">
    <thead class="table-dark">
        <tr>
            <th>S.No</th>
            <th>Item</th>
            <th style="text-align: center;">Description</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
      <?php
         $index=0;
         foreach($data as $info)
        { ?>
        <tr>
           <td><?= ++$index; ?></td> 
            <td><?= $info['item_name']; ?></td>
            <td><?= $info['description']; ?></td>
            <td><?= $info['category']; ?></td>
        </tr>
        <?php } ?>             
    </tbody>
</table>
<div id="ditem" style="display: none;">
<button class="btn btn-danger" onclick="return confirm('are you sure you want to delete this item?')">Delete Selected item</button>
</div>
</form>