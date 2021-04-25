<?php
/*
 * Flicker Leap PHP Engineer Test
 *
 * This is where the magic happens. Run all code in here to show your end result.
 */

require __DIR__ . '/vendor/autoload.php';

use FlickerLeap\Diamond;
use FlickerLeap\Rectangle;
use FlickerLeap\Square;

$sideLength = 10;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Flicker Leap - PHP Engineer Test</title>
    </head>
    <style type="text/css">
        body{line-height: 1em; padding: 3%}
        table {text-align: left;  box-shadow: 1px 1px 1px #ccc6c6; color: #373738}
        table, th, td {border: 0.8px solid #abb3c2; border-collapse: collapse; padding: 10px;}
        .pokemon-blue {background-color: #2656A8; color:white}
        .pokemon-yellow {background-color:#F7C206; color:#363636}
        a:hover {cursor:pointer;color:#F7C206; }
        a{ color:#2656A8;text-decoration:none;}
        .diamond {color:#000}
        .diamond:hover {color:#2656A8}
        .rectangle {color:#000}
        .rectangle:hover {color:#42A656}
        .square {color:#000}
        .square:hover {color:#EF8403}
    </style>
    <body>

        <h1>PHP Engineer Test</h1>

        <h2>Hello World</h2>

        <p>At the end of this test, you should have all the answers on this page.</p>

        <h2>Output a square</h2>
        <a href="https://en.wikipedia.org/wiki/Square" class="square">
            <?php
            $square = new Square($sideLength);
            $square->displayName();
            $square->draw();
            ?>
        </a>
        <h2>Output a diamond</h2>

        <a href="https://en.wikipedia.org/wiki/Rhombus" class="diamond">
            <?php
                $diamond = new Diamond($sideLength);
                $diamond->displayName();
                $diamond->draw();
            ?>
        </a>
        <h2>Output your rectangle</h2>
        <a href="https://en.wikipedia.org/wiki/Rectangle" class="rectangle">
            <?php
                $rectangle = new Rectangle($sideLength);
                $rectangle->displayName();
                $rectangle->draw();
            ?>
        </a>
        <h2>Output the result of the API</h2>

        <?php
            $uri = "https://pokeapi.co/api/v2/pokemon/";
            $response = \Httpful\Request::get($uri)->send();

            $i = 1;
            echo '<h3>Pokemons</h3>';
        ?>
        <table>
            <thead>
                <tr class="pokemon-blue">
                    <th colspan="2">POKEMON</th>
                </tr>
                <tr class="pokemon-yellow">
                    <th colspan="1">NAME</th>
                    <th colspan="1">URL</th>
                </tr>
            </thead>
            <tbody>
            <?php  foreach($response->body->results as $result) { ?>
                <tr>
                    <td><?php echo ucwords($result->name);?> </td>
                    <td><a href="<?php echo $result->url?>"><?php echo $result->url; if ($i++ == 3) break;}?></a></td>
                </tr>
            </tbody>
        </table>
        
        <h2>Recommendations</h2>
        <p>Overall documentation was good, it was a quick and fun test to do.</p>

        <p>I used <a href="https://pokeapi.co/api/v2/pokemon/">https://pokeapi.co/api/v2/pokemon/</a> for my last API problem.
            Either the document should  remove '/ name' from number 7 in the list of requests or 
            The link provided on the GitHub doc <a href="http://pokeapi.co/api/v2/pokemon/mewtwo/">http://pokeapi.co/api/v2/pokemon/mewtwo/</a> 
            should be replaced with <a href="https://pokeapi.co/api/v2/pokemon/">https://pokeapi.co/api/v2/pokemon/</a>
            
            Reason (trying to be proactive): In general the word label immediately made me thought of an object's label where as name made me thought of a pokemons name, this could
            leave room for confusion as there wasn't any objects with a 'name'. This is only an opinion and might differ from person to person.
        </p>

    </body>
</html>
