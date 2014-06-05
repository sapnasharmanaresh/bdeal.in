New Menu on welcome Page(Limit 7)

    <?php if($this->count <7){?>
    
  <p>  <input type="text" id="text"placeholder="Enter value"></p>
    <p>Select Position</p>
    <p><input type="radio" name="position" class="pos" value="first">At First Positon
    <input type="radio" name="position" class="pos" value="last">At last Positon
    <input type="radio" name="position" class="pos" value="after"> After
        <select name="position" id="position">
    
        </select>
    </p>
    <button onclick="add()">Add</button>
    <?php }
    else{
    
        echo "Limit has been reached";
    }
    ?>
