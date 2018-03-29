
<?php $username = ''; ?>
<?php foreach ($chat as $sentencia): ?>
    <?php if ($sentencia["username"] != $username): ?>
        <b><?php echo $sentencia["username"]; ?></b><br/>                      
        <?php $username = $sentencia["username"]; ?>
    <?php endif; ?>
    &nbsp;&nbsp;<?php echo $sentencia["sentencia"]; ?>
     - <?php echo $sentencia["fecha_hora"]; ?>  
    <br/><br/>
<?php endforeach; ?>