$Id: README.txt,v 1.3 2008/12/29 22:47:45 boombatower Exp $

AUTHOR
------
Jimmy Berry ("boombatower", http://drupal.org/user/214218)

PROJECT PAGE
------------
If you need more information, have an issue, or feature request please
visit the project page at: http://drupal.org/project/image_cycle.

DESCRIPTION
-----------

Create an image slideshow from images in a gallery using the jQuery Cycle
plugin. Once the module is installed, see INSTALL.txt, you can edit a
gallieries cycle settings by visiting the gallery edit page created by
the image_gallery module. Galleries can be viewed at admin/content/image.

On the gallery edit page you should also see a link to view the slideshow.
The slideshow can then be embeded in panels and such using the URL. If you
would like to embed the slideshow using PHP code you can use the following
sniplet.

<?php
image_cycle_show($tid);
?>

Where $tid is the term ID of the gallery you want to embed. If you are unsure
you can simply look at the last number displayed on the link generated in the
gallery settings page. For example: image_cycle/1, the $tid would be 1.
