
<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once("dbConnect.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

connect();

function populateDatabase()
{

    global $conn;

    // Sample data
    $sampleData = array(
        array('Lily', 'Lilies are herbaceous flowering plants growing from bulbs, with large prominent flowers.', 'Plant bulbs in well-drained soil and provide ample sunlight. Water regularly during the growing season.', 'Garden beds, borders, or containers.', 'White, Pink, Yellow, Orange, Red, Purple', 'Mulch around the base of the plants to protect from frost. Cut back stems after flowering.', 'Lilies are popular in floral arrangements, bouquets, and as garden accents.', 'Propagate through bulb scales or offsets. Divide clumps every few years.', 'Lilies symbolize purity, virtue, and renewal in various cultures.', 'https://example.com/lily.jpg'),
        array('Daisy', 'Daisies are perennial flowering plants with simple, open-faced flowers and a bright yellow center.', 'Plant in well-drained soil and provide regular watering. Deadhead spent blooms to promote continuous flowering.', 'Garden beds, meadows, or containers.', 'White, Pink, Yellow', 'Daisies are hardy and require minimal winter care. Provide protection from extreme cold or frost.', 'Daisies are versatile and can be used in borders, rock gardens, or as ground cover.', 'Propagate through seeds or division of clumps.', 'Daisies symbolize innocence, purity, and simplicity.', 'https://example.com/daisy.jpg'),
        array('Orchid', 'Orchids are diverse and widespread flowering plants known for their beautiful and intricate blooms.', 'Provide bright, indirect light and keep humidity levels high. Water sparingly and avoid overwatering.', 'Indoor environments, in pots or hanging baskets.', 'Various colors including White, Pink, Purple, Yellow', 'Orchids may need additional humidity in winter months. Protect from cold drafts.', 'Orchids are prized for their exotic beauty and are often used as decorative houseplants or gifts.', 'Propagate through division of pseudobulbs or by tissue culture.', 'Orchids symbolize love, luxury, and beauty in many cultures.', 'https://example.com/orchid.jpg'),
        array('Hydrangea', 'Hydrangeas are deciduous shrubs with showy clusters of flowers in various colors.', 'Plant in well-drained soil and provide partial shade. Keep soil consistently moist but not waterlogged.', 'Garden beds, borders, or as specimen plants.', 'Blue, Pink, Purple, White', 'Apply mulch around the base of the plants to protect roots from freezing. Prune dead wood in spring.', 'Hydrangeas are popular in floral arrangements and as ornamental shrubs in gardens.', 'Propagate through stem cuttings or layering.', 'Hydrangeas are associated with gratitude, abundance, and heartfelt emotions.', 'https://example.com/hydrangea.jpg'),
        array('Carnation', 'Carnations are herbaceous perennial flowering plants with ruffled, fragrant flowers.', 'Plant in well-drained soil and provide full sun to partial shade. Water regularly, especially during dry spells.', 'Garden beds, borders, or containers.', 'White, Pink, Red, Yellow, Purple', 'Protect from frost in winter. Mulch around the base of plants to retain moisture.', 'Carnations are widely used in bouquets, corsages, and floral arrangements.', 'Propagate through stem cuttings or division of clumps.', 'Carnations symbolize love, fascination, and distinction.', 'https://example.com/carnation.jpg'),
        array('Gerbera Daisy', 'Gerbera daisies are brightly colored, daisy-like flowers with a central disc surrounded by colorful petals.', 'Plant in well-drained soil and provide full sun. Water deeply and allow soil to dry between watering.', 'Garden beds, borders, or containers.', 'Various colors including White, Pink, Yellow, Orange, Red', 'Protect from frost and cold temperatures. Mulch around the base of plants.', 'Gerbera daisies are popular as cut flowers and in floral arrangements.', 'Propagate through division of rhizomes or by seeds.', 'Gerbera daisies symbolize innocence, purity, and cheerfulness.', 'https://example.com/gerbera_daisy.jpg'),
        array('Peony', 'Peonies are herbaceous perennial plants known for their large, fragrant flowers in a range of colors.', 'Plant in fertile, well-drained soil and provide full sun to partial shade. Water deeply during dry spells.', 'Garden beds or borders with good air circulation.', 'White, Pink, Red, Yellow', 'Apply mulch around the base of plants to protect roots from freezing. Prune dead stems in fall.', 'Peonies are prized as cut flowers and for their ornamental value in gardens.', 'Propagate through division of root clumps in fall or early spring.', 'Peonies symbolize prosperity, romance, and good fortune.', 'https://example.com/peony.jpg'),
        array('Cherry Blossom', 'Cherry blossoms are the flowers of several trees of genus Prunus, particularly the Japanese cherry, known for their delicate, pale pink petals.', 'Plant in well-drained soil and provide full sun. Water regularly, especially during dry spells.', 'Garden beds, borders, or as ornamental trees.', 'Pink, White', 'Protect young trees from frost and cold temperatures. Prune dead branches in late winter.', 'Cherry blossoms are celebrated for their beauty and are a symbol of renewal and the transient nature of life.', 'Propagate through grafting or budding onto rootstock.', 'Cherry blossoms hold special significance in Japanese culture, symbolizing the fleeting nature of life and beauty.', 'https://example.com/cherry_blossom.jpg'),
        array('Daffodil', 'Daffodils are spring-flowering bulbs with trumpet-shaped flowers and long, narrow leaves.', 'Plant bulbs in well-drained soil and provide full sun to partial shade. Water moderately during the growing season.', 'Garden beds, borders, or naturalized in grassy areas.', 'Yellow, White, Orange', 'Allow foliage to die back naturally after flowering. Mulch around bulbs for winter protection.', 'Daffodils are commonly used in mass plantings, borders, or as cut flowers.', 'Propagate through division of bulbs or by seed.', 'Daffodils symbolize rebirth, new beginnings, and hope.', 'https://example.com/daffodil.jpg'),
        array('Iris', 'Irises are perennial flowering plants with showy flowers in a variety of colors and patterns.', 'Plant in well-drained soil and provide full sun to partial shade. Water regularly during the growing season.', 'Garden beds, borders, or as pond plants.', 'Various colors including Blue, Purple, Yellow, White', 'Iris plants are hardy but may benefit from mulching in colder climates. Divide clumps every few years.', 'Irises are versatile and can be used in borders, rock gardens, or as cut flowers.', 'Propagate through division of rhizomes.', 'Irises symbolize faith, wisdom, and courage.', 'https://example.com/iris.jpg')
    );

    $sql = "INSERT INTO flowers (Name, Description, Maintenance, Location, Color, Winter_Care_Tips, How_to_use, Propagation, Worth_Knowing, Picture)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $statement = $conn->prepare($sql);

    if (!$statement) {
        die("Error: " . $conn->error);
    }

    foreach ($sampleData as $flowerData) {
        list($name, $description, $maintenance, $location, $color, $winterCareTips, $howToUse, $propagation, $worthKnowing, $picture) = $flowerData;

        // Bind parameters
        $statement->bind_param(
            "ssssssssss",
            $name,
            $description,
            $maintenance,
            $location,
            $color,
            $winterCareTips,
            $howToUse,
            $propagation,
            $worthKnowing,
            $picture
        );
    }

    $statement->close();
}






?>
