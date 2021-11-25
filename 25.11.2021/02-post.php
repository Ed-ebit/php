<?php
if (empty($GET)) exit;// nach exit passiert nix mehr, auch kein html
$database= 'blog';
require_once('../includes/db-connect.inc.php');

require_once( '../includes/functions.inc.php' );

// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )

$args = array(

    'Mein Blog',

    NULL,

    true,

    'Willkommen in meinem Blog',

    array(
        'Mein Blog',

        array('PHP'           => '02-post.php?id=1',

              'HTML'          => '02-post.php?id=2',

              'CSS'           => '02-post.php?id=3',

              'JavaScript'    => '02-post.php?id=4'
        )

    )

);

get_header( ...$args );

if(!empty($_GET)){
    $post_id = $_GET['id'];

    $sql = 'SELECT id,
                   post_header, 
                   post_body,
                   post_img,
                   img_alt
            FROM
                    posts
            WHERE
                    id=?';

            if($stmt = mysqli_prepare($db,$sql)){
                mysqli_stmt_bind_param($stmt, 'i', $post_id);
                mysqli_stmt_execute ($stmt);
                mysqli_stmt_bind_result ($stmt, $id, $post_header, $post_body, $post_img,$img_alt);
                mysqli_stmt_fetch($stmt);
                mysqli_stmt_close($stmt);
                mysqli_close($db);
            } else {
                get_db_error($db, $sql);
            
}

?>

<h2><?php $post_header;?></h2>

<figure>
        <img src="<?php echo $post_img; ?>" alt="<?php echo $img_alt; ?>" class="figure-img">
</figure>

<article>
    <?php echo $post_body; ?>
</article>

   

<?php }
get_footer(false, true); ?>