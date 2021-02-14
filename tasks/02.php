<p>Vytvorte script, ktory vypiste pismena v opacnom poradi (so zachovanim /)</p>

<pre>$path = "/a/b/c/d/e/f/g/h/i";</pre>

<pre class="new">
Script:
<?php

    highlight_string("<?php 

    /* Declarative a new function for convert string */
    function reverse_path(?string  \$path): string {
    
        /* Reverse string */
        \$path = strrev(\$path);
    
        /* Remove '/' from the end of string */
        \$path = rtrim(\$path, '/');
    
        /* Add '/' to start of string */
        \$path = substr_replace(\$path, '/', 0, \$path);
    
        return \$path;
    }
    
    
    \$path = '/a/b/c/d/e/f/g/h/i';

    /* Calling a new function */
    echo(reverse_path(\$path));
    
?>"); ?>

Result:

<?php

    /* Declarative a new function for convert string */
    function reverse_path(?string $path): string {

        $path = strrev($path);

        // Remove '/' from the end of string
        $path = rtrim($path, '/');

        // Add '/' to start of string
        $path = substr_replace($path, '/', 0, $path);

        return $path;
    }


    $path = '/a/b/c/d/e/f/g/h/i';

    /* Calling a new function */
    echo(reverse_path($path))
?>

</pre>
