<?php 

// Alternative: instead of implode(), just use a string for each character set.
// $lower = 'abcdefghijklmnopqrstuvwxyz';
// $upper = 'ABCDEFGHIJKLMNOPQRSTUVQXYZ';
// $numbers = '0123456789';


// Given a string, return a random character from it.
// random_int is 'more cryptographically secure' than rand or mt_rand, but PHP7+ only.
// So, using mt_rand for max compatibility.
function random_character($string){
    $i = mt_rand(0, strlen($string)-1);
    return $string[$i];
}


function random_string($length, $char_set){
    $output = '';
	for ($i = 0; $i < $length; $i++) {
		$output .= random_character($char_set);
	}
	return $output;
}


function generate_password($options){
	
	$lower = implode(range('a', 'z'));
	$upper = implode(range('A', 'Z'));
	$numbers = implode(range(0,9));
	$symbols = '$*?!&%';
    
    // Store user-selected character set options
	$use_lower   = isset($options['lower'])   ?   $options['lower']   : '0' ;
	$use_upper   = isset($options['upper'])   ?   $options['upper']   : '0' ;
	$use_numbers = isset($options['numbers']) ?   $options['numbers'] : '0' ;
	$use_symbols = isset($options['symbols']) ?   $options['symbols'] : '0' ;
    
    // Create the set of available password characters.
	$chars = '';
	if ($use_lower   == '1'){ $chars .= $lower; }
	if ($use_upper   == '1'){ $chars .= $upper; }
	if ($use_numbers == '1'){ $chars .= $numbers; }
	if ($use_symbols == '1'){ $chars .= $symbols; }
	
	$length = isset($options['length']) ? $options['length'] : 8;

	return random_string($length, $chars);
}

$options = [

    'length'  =>   $_GET['length'],
    'lower'   =>   $_GET['lower'],
    'upper'   =>   $_GET['upper'],
    'numbers'  =>   $_GET['numbers'],
    'symbols' =>   $_GET['symbols']
];

$password = generate_password($options);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Password Generator</title>
  </head>
  <body>
     <h1>Password Generator</h1>
     <p>This random password generator uses letters, numbers, and symbols ($,*,?,!,&, %) to generate a random password of any length you choose. <br />For a more user-friendly (but less configurable) password generator, see <a href="readable-password.php">here</a>.

    <p><span class="password-label">Generated Password >> </span> <span class="password"><?php echo $password; ?></span></p>
    
    <p>To generate a new password, enter a length and select the characters sets you'd like to select from, then click Generate Password.</p>

    <form action="" method="get">
      <h2>Password Length</h2>
      <input type="text" name="length" value="<?php if (isset($_GET['length'])){echo $_GET['length'];} ?>" /><br />
      <h2>Options</h2>
      <input type="checkbox" name="lower" value="1" <?php if ($_GET['lower'] == 1) { echo 'checked';} ?> /> Use lowercase letters<br />
      <input type="checkbox" name="upper" value="1" <?php if ($_GET['upper'] == 1) { echo 'checked';} ?> /> Use uppercase letters<br />
      <input type="checkbox" name="numbers" value="1" <?php if ($_GET['numbers'] == 1) { echo 'checked';} ?>/> Use numbers (0 to 9)<br />
      <input type="checkbox" name="symbols" value="1" <?php if ($_GET['symbols'] == 1) { echo 'checked';} ?>/> Use symbols ($*?!&%)<br />
      <input type="submit" value="Generate Password" />
    </form>

  </body>
</html>