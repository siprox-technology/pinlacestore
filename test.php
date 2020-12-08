<!-- empty php file for testing functions and objects -->
<?php 

$p = "I bought these about a year ago and when 
I got them I was very happy with them, 
they're really light and probably the most
 comfortable trainers i've owned. After a while,
  however, the front of the shoe began to rip and 
  sole wore out a lot. I can no longer wear them when 
  it is wet outside as there is virtually no grip left. 
  They were nice whilst they lasted and are a decent price 
  but I wouldn't recommend them in the long run.";

$x =  filter_var($p, FILTER_SANITIZE_STRING);

$k =0;