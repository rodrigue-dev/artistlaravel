<h1>Requêtes Eloquent QueryBuilder</h1>
<ul>
    <li><a href="{{ route('request.resolver', 1) }}">Les spectacles réservables.</a></li>
    <li><a href="">Les spectacles réservables dont le prix est inférieur à 9 €.</a></li>
    <li><a href="">Les spectacles réservables dont le prix est compris entre 5 et 9 €.</a></li>
    <li><a href="">Les spectacles créés dans à La Madeleine (location).</a></li>
    <li><a href="">Les spectacles créés à Bruxelles.</a></li>
    <li><a href="">Les spectacles mis en scène par Daniel Marcelin.</a></li>
</ul>

<h2>Résultat</h2>

{{ var_dump($shows) }}
<table>
    <tr>
        <td></td>
    </tr>
</table>