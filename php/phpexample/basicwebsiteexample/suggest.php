<?php 
//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer; 
require 'vendor/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/src/Exception.php';
require 'vendor/phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
        $email =trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
        $category = trim(filter_input(INPUT_POST, "category", FILTER_SANITIZE_STRING));
        $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING));
        $format = trim(filter_input(INPUT_POST, "format", FILTER_SANITIZE_STRING));
        $year = trim(filter_input(INPUT_POST, "year", FILTER_SANITIZE_NUMBER_INT));
        $genre = trim(filter_input(INPUT_POST, "genre", FILTER_SANITIZE_STRING));
        $details = trim(filter_input(INPUT_POST, "details", FILTER_SANITIZE_SPECIAL_CHARS));
    if ( $name == "" || $email == "" || $category == "" || $title=""){
        $error_message = "Please fill in the required fields: Name, Email and Category and Title";
    }
    if(!isset($error_message) && $_POST["address"] != "") {
        $error_message = "Bad form input";
    }
    if(!isset($error_message) && !PHPMailer::validateAddress($email)){
      $error_message = "Invalid Email Address";
    }

    if (!isset($error_message)){

        $email_body = "";
        $email_body .= "Name " . $name . "\n";
        $email_body .= "Email " . $email . "\n";
        $email_body .= "\n\n Suggested Item \n\n";
        $email_body .= "Category " . $category . "\n";
        $email_body .= "Title " . $title . "\n";
        $email_body .= "Format " . $format . "\n";
        $email_body .= "Genre " . $format . "\n";
        $email_body .= "Year " . $year . "\n";
        $email_body .= "Details " . $details . "\n";

        $mail = new PHPMailer;
        $mail->isSMTP();

        //Enable SMTP debugging
        // SMTP::DEBUG_OFF = off (for production use)
        // SMTP::DEBUG_CLIENT = client messages
        // SMTP::DEBUG_SERVER = client and server messages
        $mail->SMTPDebug = 2;

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

        //Set the encryption mechanism to use - STARTTLS or SMTPS
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = 'lwinmoe260lm@gmail.com';

        //Password to use for SMTP authentication
        $mail->Password = 'dwwprxuoeplkqkyq';
        //It's important not to use the submitter's address as the from address as it's forgery,
        //which will cause your messages to fail SPF checks.
        //Use an address in your own domain as the from address, put the submitter's address in a reply-to
        $mail->setFrom('lwinmoe260lm@gmail.com', $name);
        $mail->addReplyTo($email, $name);
        $mail->addAddress('lwinmoe260lm@gmail.com', 'Lwinmoe');
        $mail->Subject = 'Library suggestion from' . $name;
        $mail->Body = $email_body;
        if ($mail->send()) {
            header("location:suggest.php?status=thanks");
            exit;
        }
       $error_message = 'Mailer Error: ' . $mail->ErrorInfo; 
    }
}
$pageTitle = "Suggest a Media Item";
$section = "suggest";
include("Inc/header.php");?>
<div class="section page">
    <h1>Suggest a Media Items</h1>
    <?php if (isset($_GET["status"]) && $_GET["status"] == "thanks"){
        echo " <p>Thanks for the email! I&rsquo;ll check out your suggestion shortly!</p>";
    } else{ 
          if (isset($error_message)){
            echo '<p class="message">' .$error_message . '</p>';
        } else {
            echo " <p>If you think there is something I&rsquo;m missing, let me know! Complete the form to send me an email.</p>";
        }
        ?>
    <form method="post" action="suggest.php">
        <table>
            <tr>
                <th>
                    <lable for="name">Name (require)</lable>
                </th>
                <td><input type="text" id="name" name="name" value="<?php
                if(isset($name)) echo $name; ?>" /></td>
            </tr>
            <tr>
                <th>
                    <lable for="email">Email (require)</lable>
                </th>
                <td><input type="text" id="email" name="email" value="<?php
                if(isset($email)) echo $email; ?>" /></td>
            </tr>
             <tr>
                <th>
                    <lable for="category">Category (require)</lable>
                </th>
                <td><select id="category" name="category">
                    <option value="">Select one</option>
                    <option value="Books" <?php
                    if(isset($category) && $category == "Books")
                     ?>> Books</option>
                    <option value="Movies"<?php
                    if(isset($category) && $category == "Movies")
                     ?>> Movies</option>
                    <option value="Music" <?php
                    if(isset($category) && $category == "Music")
                     ?>> Music </option>
                </select></td>
            </tr>
             <tr>
                <th>
                    <lable for="title">Title (require)</lable>
                </th>
                <td><input type="text" id="title" name="title" value="<?php
                if(isset($title)) echo $title; ?>" /></td>
            </tr>
            <tr>
                <th>
                    <lable for="format">Format</lable>
                </th>
                <td><select id="format" name="format">
                    <option value="">Select one</option>
                    <optgroup label="Books">
                        <option value="Audio">Audio</option>
                        <option value="Ebook">Ebook</option>
                        <option value="Hardback">Harback</option>
                        <option value="Paperback">Paperback</option>
                    </optgroup>
                    <optgroup label="Movies">
                        <option value="Blu-ray">Blu-ray</option>
                        <option value="DVD">DVD</option>
                        <option value="Streaming">Streaming</option>
                        <option value="VHS">VHS</option>
                    </optgroup>
                    <optgroup label="Music"> 
                        <option value="Cassette">Cassette</option>
                        <option value="CD">CD</option>
                        <option value="MP3">MP3</option>
                        <option value="Vinly">Vinly</option>
                    </optgroup>
                </select></td>
            </tr>
            <tr>
                <th>
                    <label for=genre> Genre</label>
                </th>
                <td>
                    <select name="genre" id="genre">
                        <option value="">Select one</option>
                        <optgroup label="Books">
                            <option value="Action">Action</option>
                            <option value="Adventure">Adventure</option>
                            <option value="Comedy">Comedy</option>
                            <option value="Fanstasy">Fanstasy</option>
                            <option value="Historical">Historical</option>
                            <option value="Historical Fiction">Historical Fiction</option>
                            <option value="Horror">Horror</option>
                            <option value="Magical Realism">Magical Realism</option>
                            <option value="Mystery">Mystery</option>
                            <option value="Paranoid">Paranoid</option>
                            <option value="Philosophical">Philosophical</option>
                            <option value="Political">Political</option>
                            <option value="Romance">Romance</option>
                            <option value="Saga">Saga</option>
                            <option value="Satire">Satire</option>
                            <option value="Sci-Fi">Sci-Fi</option>
                            <option value="Tech">Tech</option>
                            <option value="Thriller">Thriller</option>
                            <option value="Urban">Urban</option>
                        </optgroup>
                        <optgroup label="Movies">
                            <option value="Action">Action</option>
                            <option value="Adventure">Adventure</option>
                            <option value="Animation">Animation</option>
                            <option value="Biograpghy">Biograpghy</option>
                            <option value="Comed">Comed</option>
                            <option value="Crime">Crime</option>
                            <option value="Documentary">Documentary</option>
                            <option value="Drama">Drama</option>
                            <option value="Family">Family</option>
                            <option value="Fantasy">Fantasy</option>
                            <option value="History">History</option>
                            <option value="Horror">Horror</option>
                            <option value="Musical">Musical</option>
                            <option value="Mystery">Mystery</option>
                            <option value="Romance">Romance</option>
                            <option value="Sci-Fi">Sci-Fi</option>
                            <option value="Sport">Sport</option>
                            <option value="Thriller">Thriller</option>
                            <option value="War">War</option>
                            <option value="Western">Biograpghy</option>
                        </optgroup>
                        <optgroup label="Music">
                            <option value="Blues">Blues</option>
                            <option value="Classical">Classical</option>
                            <option value="Country">Country</option>
                            <option value="Dance">Dance</option>
                            <option value="Easy Listening">Easy Listening</option>
                            <option value="Electronic">Electronic</option>
                            <option value="Folk">Folk</option>
                            <option value="Hip Hop/Rap">Hip Hop/Rap</option>
                            <option value="Insirational/Gospel">Insirational/Gospel</option>
                            <option value="Jazz">Jazz</option>
                            <option value="Latin">Latin</option>
                            <option value="New Age">New Age</option>
                            <option value="Opera">Opera</option>
                            <option value="Pop">Pop</option>
                            <option value="R&B/Soul">R&B/Soul</option>
                            <option value="Reggae">Reggae</option>
                            <option value="Rock">Rock</option>
                        </optgroup>
                    </select> 
                </td>
            </tr>

            <tr>
                <th>
                    <lable for="year">Year</lable>
                </th>
                <td><input type="text" id="year" name="year" value="<?php
                if(isset($year)) echo $year; ?>" /></td>
            </tr>
            <tr>
                <th>
                    <lable for="name">Suggest Item Details</lable>
                </th>
                <td><textarea name="details" id="deatils"><?php
                if(isset($details)) echo htmlspecialchars($POST['details']); ?></textarea></td>
            </tr>
            <tr style="display: none;">
                <th>
                    <lable for="email">Address</lable>
                </th>
                <td><input type="text" id="address" name="address" />
            <p>Please leave this field blank</p></td>
            </tr>
     </table>
     <input type="submit" id="send" value="Send">
    </form>
  <?php } ?>
</div>
<?php include("Inc/footer.php"); ?>