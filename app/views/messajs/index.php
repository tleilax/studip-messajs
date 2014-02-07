<form action="<?= $controller->url_for('messajs/spawn') ?>" id="spawn" method="post">
    <fieldset>
        <legend>Spawn new message</legend>
        
        <div>
            <label for="js">Via:</label>
            <label>
                <input type="radio" name="via" id="js" value="js" checked>
                JS
            </label>
            <label>
                <input type="radio" name="via" value="ajax">
                AJAX
            </label>
            <label>
                <input type="radio" name="via" value="php">
                PHP
            </label>
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

<div id="ajax_output" style="display: none;">
    <h2>AJAX</h2>
    <blockquote id="ajax"></blockquote>
</div>