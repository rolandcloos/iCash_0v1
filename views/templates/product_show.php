<div class="container">
    <table class="table table-striped table-hover">
    <thead class="th-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Preis</th>
        <th scope="col">EAN</th>
        </tr>
    </thead>
    <tbody>
<?php
if(@is_array($id)) {
    foreach(@$id as $key => $value) {
?>
    
        <tr>
        <th scope="id"><?=@$id[$key];?></th>
        <td><?=@$name[$key];?></td>
        <td><?=@$price[$key];?></td>
        <td><?=@$ean[$key];?></td>
        </tr>
    
<?php
    }
}
?>
    </tbody>
    </table>
</div>
