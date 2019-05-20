
<?php
///////////////////GENERATE DYNAMIC HTML///////////////////////////////////////////////////////
  // generate the HTML based off of extraction query:


    echo <<<HTMLINPUT
    <form action="write_review.php" method="post">

        User ID: <input type="text" name="user_id"><br>
        Restaurant ID:
        <select name="restaurant_id">
    HTMLINPUT;

     //QUERY THEN ECHO RESULTS HERE
    $pdo = new PDO($dsn, $user, $pass, $opt);
    $res = $pdo->prepare("SELECT id FROM restaurant");
    foreach($res as $row){      
          echo <<<HTMLINPUT
            <option value="{$row["id"]}"> restaurant {$row['id']} </option>
          HTMLINPUT;
    }

    echo "</select><br>"

    echo <<<HTMLINPUT
    Review: <input type="textarea" name="content"><br>
    
    Rating: <input type="number" name="rating"><br>

    Price (1-3):
    <input type="number" name="price"><br>
    <input type="submit" name="write_review_submit" value="Submit">
  </form>
    HTMLINPUT;


/////////////////////END HTML GENERATION///////////////////////////////////////////////////////
?>