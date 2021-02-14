<p>Najdite chybu v query:</p>
<pre>
SELECT
  id_company, COUNT(id_shop)
FROM shop s
  INNER JOIN company c ON c.id_company = s.id_company
WHERE id_company > 1
GROUP BY id_company;
</pre>

<p><strong>Riešenie:</strong></p>
<p>Je potrebné bližšie špecifikovať stĺpec <strong>id_company</strong>, pretože sa nachádza v oboch tabuľkách <strong>shop, company</strong></p>
<pre class="new">
SELECT
  <strong>s.</strong>id_company, COUNT(id_shop)
FROM shop s
  INNER JOIN company c ON c.id_company = s.id_company
WHERE <strong>s.</strong>id_company > 1
GROUP BY <strong>s.</strong>id_company;
</pre>
