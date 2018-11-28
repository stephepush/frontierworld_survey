<?php
  try {
    require_once 'includes/pdo_connect.php';
    $sql = "INSERT INTO prelim_guest_Info 
            (first_name, last_name, email, phone_number)
            VALUES (:first_name, :last_name, :email, :phone_number)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':first_name',$_POST["first_name"]);
    $stmt->bindParam(':last_name',$_POST["last_name"]);
    $stmt->bindParam(':email',$_POST["email"]);
    $stmt->bindParam(':phone_number',$_POST["phone_number"]);
    $stmt->execute();
    $errorInfo = $stmt->errorInfo();
    if (isset($errorInfo[2])) {
      $error = $errorInfo[2];
    }
  } catch (Exception $e) {
      $error = $e->getMessage();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FrontierWorld Guest Survey</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- import the webpage's stylesheet -->
    <link rel="stylesheet" href="/style.css">
    
    <!-- import the webpage's javascript file -->
    <script src="/script.js" defer></script>
    <script src="https://cdn.freecodecamp.org/testable-projects-fcc/v1/bundle.js"></script>
  </head>  
  <body>
    <header>
      <h1 id="title">
        FrontierWorld Survey Form
        
      </h1>

    </header>
    <main>
      <p id="description">
        Let us know how we can improve FrontierWorld!<br/>
        
      </p>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>"  id="survey-form">
        <label id="name-label">*First Name <input autocomplete="on" placeholder="Enter your first name here" name="first_name" id="first_name" type="text" required></label>
        <br>
        <label id="name-label">*Last Name <input autocomplete="on" placeholder="Enter your last name here" name="last_name" id="last_name" type="text" required></label>
        <br>
        <label id="email-label">*Email <input autocomplete="on" placeholder="Enter your email address here" name="email" id="email" type="email" min="6" max="128" required></label>
        <br>
        <label id="number-label">*Phone Number <input autocomplete="on" placeholder="Enter a phone number here. Must be in former US format" id="number" type="tel" name="phone_number" required pattern="[^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$"></label>
        <br>
        <label>
          How long was your recent stay at FrontierWorld?
          <label for="days-spent">Number of days spent 3-42</label>
          <input type="text" id="day-spent" name="days-spent" min="3" max="42">
        </label>
        <br>
        <p>How would you rate your recent stay at FrontierWorld?</p>
        <div>
          <input type="radio" id="excellentRating" name="rating" value="5">
          <label for="excellentRating">Excellent</label>
          &nbsp;
          <input type="radio" id="greatRating" name="rating" value="4">
          <label for="greatRating">Great</label>
          &nbsp;
          <input type="radio" id="goodRating" name="rating" value="3">
          <label for="goodRating">Good</label>
          &nbsp;
          <input type="radio" id="somewhat-goodRating" name="rating" value="2">
          <label for="some-whatgoodRating">Somewhat Good</label>
          &nbsp;
          <input type="radio" id="fairRating" name="rating" value="1">
          <label for="fairRating">Fair</label>
        </div>
        <p>Stay up to date on the newest stories being unveiled in FrontierWorld's sister attractions (check all that interest you)!</p>
        <div>
          <input type="checkbox" id="shanghaiWorld" name="subscribeShanghai" value="shanghaiNewsletter">
          <label for="shanghaiWorld">ShanghaiWorld</label>
          &nbsp;
          <input type="checkbox" id="baltimoreWorld" name="subscribeBaltimore" value="baltimoreNewsletter">
          <label for="baltimoreWorld">BaltimoreWorld</label>
          &nbsp;
          <input type="checkbox" id="caesarWorld" name="subscribeCaesar" value="caesarNewsletter">
          <label for="caesarWorld">CaesarWorld</label>
          <br>
          <input type="checkbox" id="kiplingWorld" name="subscribeKipling" value="kiplingNewsletter">
          <label for="kiplingWorld">KiplingWorld</label>
          &nbsp;
          <input type="checkbox" id="postWorld" name="subscribePost" value="postNewsletter">
          <label for="postWorld">PostWorld</label>
          &nbsp;
          <input type="checkbox" id="medievalWorld" name="subscribeMedieval" value="medievalNewsletter">
          <label for="medievalWorld">MedievalWorld</label>
        </div>
        <p>Do you have any questions, comments, or concerns regarding your recent stay at Frontier World? Feel free to add them in the space below!</p>
        <textarea name="Extra-comments" rows="10" cols="150">Enter your comment here! Please keep any negative comments to 125 characters, please!</textarea>
        <div>
          <input type="submit" id="submit" value="Send">
        </div>
      </form>
    </main>
    <footer>
      <p>We hope you enjoyed your stay at FrontierWorld, a Dellos Destinations Attraction</p>
    </footer>
  </body>
</html>
