<form action="<?= $link ?>" id="spawn" method="post">
    <fieldset>
        <legend>Spawn new message</legend>
        
        <div>
            <label for="js">Via JS:</label>
            <input type="checkbox" name="js" id="js" value="1" checked>
        </div>
        
        <div>
            <label for="type">Type:</label>
            <select name="type" id="type">
                <option>success</option>
                <option>info</option>
                <option>warning</option>
                <option>error</option>
                <option>exception</option>
            </select>
        </div>
        
        <div>
            <label for="text">Text:</label>
            <input type="text" name="text" id="text" value="The quick brown fox jumps over the lazy dog">
        </div>
        
        <div>
            <label for="details">Details:</label>
            <input type="checkbox" name="details" id="details" value="1">
        </div>
        
        <div>
            <?= Studip\Button::create('Spawn') ?>
        </div>
    </fieldset>
</form>