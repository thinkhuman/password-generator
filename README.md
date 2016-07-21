# Password-Generator
A no-frills password generator that creates random and user-friendly passwords. Written in PHP.

#How to Use It
Open either <pre>passgen.php</pre> or <pre>readable-password.php</pre> to generate a password:
* <pre>passgen.php</pre> is a user-configurable password generator. You can choose the password length, and what character types to use in the generated password.
* <pre>readable-password.php</pre> has no configuration options, but generates more readable, user-friendly (and possible less secure) passwords.

#A Note About Security
The <pre>passgen.php</pre> password generator creates random passwords that are probably good enough for regular use. The <pre>readable-password.php</pre> password generator is *not secure*, and for demo purposes only--it duses a text file of several hundred random words (<pre>dictionary.txt</pre>), so anybody with that file could discover a password without much effort.

The app uses PHP's <pre>mt_rand()</pre> function to generate random password strings. <pre>rand()<pre> is the least secure way to randomize in PHP, and thoughrandom_int()</pre> is usually considered more 'cryptographically secure' than <pre>rand()</pre> or <pre>mt_rand</pre>, it's available for PHP7+ only. So, I chose <pre>mt_rand</pre> for compatibility with older PHP versions.
