<?php  

function read_dictionary($filename="") {
	$dictionary_file = "$filename";
    return file($dictionary_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

function pick_random($array){
	$i = mt_rand(0, count($array) -1);
	return $array[$i];
}

function pick_random_symbol(){
	$symbols = '$*?!&%';
	$i = mt_rand(0, strlen($symbols) -1);
	return $symbols[$i];
}

function pick_random_number($digits = 1){
	$num = '';

	for ($i = 0; $i < $digits; $i++){
		$num .= strval(mt_rand(0,9));
	}
	
	return $num;
}

function filter_words_by_length($array, $length){
     $select_words = [];
     foreach($array as $word){
     	if (strlen($word) == $length){
     		array_push($select_words, $word);
     	}
     }
     return $select_words;
}

function pick_random_word($words, $length){
	$select_words = filter_words_by_length ($words, $length);
    return pick_random($select_words);
}

$words = read_dictionary("dictionary.txt");

$length = 12;
$word_count = 2;
$digit_count = 2;
$symbol_count = 1;
$avg_word_length = ($length - $digit_count - $symbol_count) / $word_count;

$password = "";

$next_word_length = mt_rand($avg_word_length -1, $avg_word_length +1);
$password .= pick_random_word($words, $next_word_length);

$password .= pick_random_symbol();
$password .= pick_random_number($digit_count);

$next_word_length = $length - strlen($password);
$password .= pick_random_word ($words, $next_word_length);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Password Generator</title>
  </head>
  <body>
<h1> User-Friendly Password Generator </h1>
<p class="instructions">Reload the page to generate a new password.</p>
By default, all passwords are 12 characters long, and use random English words to make the passwords easier to remember.
<p><span class="password-label">User-Friendly Password >> </span> <span class="password"><?php echo $password; ?></span></p>

<p>For a less user-friendly (but more configurable) password generator, see <a href="passgen.php">here</a>.</p>

  </body>
</html>






