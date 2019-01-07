<h1>Hello Main index php</h1>
<p>
    <b>Name: </b> <i><?= $name; ?></i>
</p>
<p>
    <b>Age: </b> <i><?= $age; ?></i>
</p>
<?php foreach($names as $first_name): ?>
    <p>
        <b>Name: </b> <i><?= $first_name; ?></i>
    </p>
<?php endforeach; ?>
