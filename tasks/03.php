<p>Vytvorte funkciu, ktora bude mat dva vstupne parametre.</p>
<p>Prvy parameter bude reprezentovat URL adresu a druhy bude zoznam povolenych GET parametrov.</p>
<p>Ulohou funkcie bude odstranit z URL vsetky GET parametre, ktore nie su definovane v druhom parametri.</p>

<pre class="new">
Script:

<?php

    highlight_string("<?php 
    
    function removeQueriesFromURL(?string \$url, ?array \$parameters)
    {
        /* Convert PATH to URL blocks */
        \$url = parse_url(\$url);
    
        /* Convert query string from URL to array and set same key */
        parse_str(\$url['query'], \$queries);
    
        /* Remove not allow parameters from query string */
        foreach (\$queries as \$key => \$query)
        {
            if (!in_array(\$key, \$parameters)){
                unset(\$queries[\$key]);
            }
        }
    
        /* Convert edited queries array back to string and encoding specials chars */
        \$queries = http_build_query(\$queries);
    
        /* Save updated queries string back to in URL */
        \$url['query'] = \$queries;
    
        /* Return correct URL as string */
        return \$url['scheme'] . '://' . \$url['host'] . \$url['path'] . '?' . \$url['query'];
    }


    \$path = 'https://bistro.test/restaurant/pizza?product=polievka&user=admin&location=Banská+Bystrica%21';
    
    /* Calling a new function */
    echo(removeQueriesFromURL(\$path, ['product','location']));


?>"); ?>

Result:

<?php

    function removeQueriesFromURL(?string $url, ?array $parameters)
    {
        /* Convert PATH to URL blocks */
        $url = parse_url($url);

        /* Convert query string from URL to array and set same key */
        parse_str($url['query'], $queries);

        /* Remove not allow parameters from query string */
        foreach ($queries as $key => $query)
        {
            if (!in_array($key, $parameters)){
                unset($queries[$key]);
            }
        }

        /* Convert edited queries array back to string */
        $queries = http_build_query($queries);

        /* Save updated queries string back to in URL */
        $url['query'] = $queries;

        /* Return correct URL as string */
        return $url['scheme'] . '://' . $url['host'] . $url['path'] . '?' . $url['query'];
    }


    $path = "https://bistro.test/restaurant/pizza?product=polievka&user=admin&location=Banská+Bystrica%21";
    /* Calling a new function */
    echo(removeQueriesFromURL($path, ['product','location']));

?>
</pre>
