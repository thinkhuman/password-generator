# Password-Generator
A no-frills password generator that creates random and user-friendly passwords. Written in PHP.

#How to Use It
Open either `passgen.php` or `readable-password.php` to generate a password:
* `passgen.php` is a user-configurable password generator. You can choose the password length, and what character types to use in the generated password.
* `readable-password.php` has no configuration options, but generates more readable, user-friendly (and possible less secure) passwords.

#A Note About Security
The `passgen.php` password generator creates random passwords that are probably good enough for regular use. The `readable-password.php` password generator is *not secure*, and for demo purposes only--it duses a text file of several hundred random words (<pre>dictionary.txt`), so anybody with that file could discover a password without much effort.

The app uses PHP's `mt_rand()` function to generate random password strings. `rand()` is the least secure way to randomize in PHP, and though `random_int()` is usually considered more 'cryptographically secure' than `rand()` or `mt_rand`, it's available for PHP7+ only. So, I chose `mt_rand` for compatibility with older PHP versions.
