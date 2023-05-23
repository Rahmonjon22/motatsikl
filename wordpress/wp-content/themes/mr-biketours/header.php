<?php
global $post, $bars, $body_class;
$post_slug = $post->post_name;

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> >


<head>

	<title><?=$post ? get_the_title($post): 'Lorem Ipsum'?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
  integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
  crossorigin="anonymous" referrerpolicy="no-referrer" /> <!-- Css & Js -->
	<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/layout/favicon.png"/>

	<?php wp_head(); ?>

</head>


<body class="<?php echo $body_class;?>" lang="de" data-spy="scroll" data-target=".navspy" data-offset="130">
