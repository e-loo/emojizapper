# EmojiZapper

This small PHP script uses the unicode.org emoji list to build an all 
encompassing PCRE regular expression to match all emoji in a given 
string.

You can rerun this script whenever a new version of the emoji list is 
released with new items in it.

## Getting Started

To start using this script run `composer install` and you're all set.

## Example usage

```
$ php zap.php
```

You can redirect the output to a file of your choice or copy the output
into your own pattern matching script.

The script caches the retrieved HTML to a file named 
"full-emoji-list.html" in the root of the project to make subsequent 
runs of the script a little bit faster and to limit the amount of 
requests made to unicode.org.
