<html>
<link rel="stylesheet" type="text/css" href="writer.css" />
<body>
	<div style="word-wrap:normal">
<?php
include 'config.inc.php';
//$dbh = new PDO('mysql:host=localhost;port=8889;dbname=dingus', 'writey', 'Iw2wad4m');
$dbh = new PDO("mysql:host=".$dbHost.";port=".$dbPort.";dbname=".$dbName, $dbUser, $dbPass);
//foreach($db->query('SELECT * FROM blog1') as $row)
try {

    // Find out how many items are in the table
    $total = $dbh->query('
        SELECT
            COUNT(*)
        FROM
            blog1
    ')->fetchColumn();

    // How many items to list per page
    $limit = 4;

    // How many pages will there be
    $pages = ceil($total / $limit);

    // What page are we currently on?
    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default'   => 1,
            'min_range' => 1,
        ),
    )));

    // Calculate the offset for the query
    $offset = ($page - 1)  * $limit;

    // Some information to display to the user
    $start = $offset + 1;
    $end = min(($offset + $limit), $total);

    
    // Prepare the paged query
    $stmt = $dbh->prepare('
        SELECT
            *
        FROM
            blog1
        ORDER BY
        	postNum
        LIMIT
            :limit
        OFFSET
            :offset
    ');

    // Bind the query params
    $stmt->bindParam(':limit', $limit, PDO:: PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO:: PARAM_INT);
    $stmt->execute();

    // Do we have any results?
    if ($stmt->rowCount() > 0) {
        // Define how we want to fetch the results
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $iterator = new IteratorIterator($stmt);

        // Display the results
        foreach ($iterator as $row) {
            echo '<p>', $row['postTitle'] . '<br />' . $row['postStory'] . '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['postDateTime'], '</p>';
        }

    } else {
        echo '<p>No results could be displayed.</p>';
    }
// The "back" link
    $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

    // The "forward" link
    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

    // Display the paging information
    echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';

} catch (Exception $e) {
    echo '<p>', $e->getMessage(), '</p>';
}

 //{
//    echo $row['postTitle'].'<br />'.$row['postStory'] . '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['postDateTime']. "<p />";
// }
//exit;
?>
	</div>
</body>
</html>