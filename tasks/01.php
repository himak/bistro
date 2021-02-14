<p>Upravte triedu <strong>Foo</strong> tak, aby <strong>$bar</strong> nikdy nebola prazdna a obsahovala iba male pismena:</p>

<pre>
<?php
highlight_string("<?php 
    
    Class Foo
    {
        public \$bar;
    }
    
    \$foo = new Foo;
    \$foo->bar='Hello';
    
?>");
?>
</pre>

<pre class="new">
Riešenie:

<?php
highlight_string("<?php 
    
    class Foo
    {
        /* Initial variable with default value */
        public ?string \$bar = '';
    
        /* Add constructor with one parameter, which have default value for convert input string to only allow small characters */
        public function __construct(?string \$bar = '')
        {
            /* Calling global function for convert big characters to small */
            \$this->bar = mb_strtolower(\$bar);
        }
    }

    /* Initializing object Foo with one parameter */
    \$foo = new Foo('Hello');

    echo(\$foo->bar);
    
    \$two = new Foo();
    var_dump(\$two->bar);
    
?>");

?>

Result:

<?php

    class Foo
    {
        /* Initial variable with default value */
        public ?string $bar = '';

        /* Add constructor with one parameter, which have default value for convert input string to only allow small characters */
        public function __construct(?string $bar = '')
        {
            /* Calling global function for convert big characters to small */
            $this->bar = mb_strtolower($bar);
        }
    }

    /* Initializing object Foo with one parameter */
    $foo = new Foo('Hello');
    echo($foo->bar);

    echo('<br><br>');

    $two = new Foo();
    var_dump($two->bar);
?>
</pre>
