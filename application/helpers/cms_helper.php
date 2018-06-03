<?php
function btn_edit($uri){
    return anchor($uri,'<i class="glyphicon glyphicon-edit"></i>');
}
function btn_delete($uri){
    return anchor($uri,'<i class="glyphicon glyphicon-remove"', array('onclick'=> "return confirm('you are about to delete a record, it cannot be reversed, are you sure?')"));
}

if (!function_exists('dump')) {

    function dump ($var, $label = 'Dump', $echo = TRUE){

        // Store dump in variable
        ob_start();
        var_dump($var);
        $output = ob_get_clean();

        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);

        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';

        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}





if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }

}



function get_menu ($array, $child = FALSE)
{
	$CI =& get_instance();
	$str = '';

	if (count($array)) {
		$str .= $child == FALSE ? '<ul class="nav navbar-nav navbar-right">' : '<ul class="dropdown-menu">' ;

		foreach ($array as $item) {
      if($item['title'] != 'developer'){
			$active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;
			if (isset($item['children']) && count($item['children'])) {
				$str .= $active ? '<li class="dropdown active">' : '<li class="dropdown">';
				$str .= '<a  class="dropdown-toggle" data-toggle="dropdown" href="' . base_url(e($item['slug'])) . '">' . e($item['title']);
				$str .= '<i class="icon-angle-down"></i></a>';
				$str .= get_menu($item['children'], TRUE);
			}
			else {
				$str .= $active ? '<li class="active">' : '<li>';
				$str .= '<a href="' . base_url($item['slug']) . '">' . e($item['title']) . '</a>';

			}
			$str .= '</li>';
    }
    }

		$str .= '</ul>';
	}

	return $str;
}
function get_except($article,$numwords = 50 ){
  $str = '';
  $url = 'article/'.intval($article->id).'/'.$article->slug;
  $str .= '<h2 class="text-left">'.anchor($url ,e($article->title)).'</h2>';
  $str .= '<p class="pubdate text-right bg-info">'.e($article->pubdate).'</p>';
  $str .= '<p class="text-right">'.e(limit_to_numwords(strip_tags($article->body),$numwords)).'</p>';
  return $str;

}


function get_article($article,$numwords = 50){
  $str = '';
  $url = base_url().'article/'.intval($article->id).'/'.$article->slug;

 $str .= '<div class="blog-item">
     <img class="img-responsive img-blog" src="" width="100%" alt="" />
     <div class="blog-content">';

$str .= '<a href="'.$url.'"><h3>'.strtoupper($article->title).'</h3></a>';
$str .=  '<div class="entry-meta"><!--  <span><i class="icon-user"></i> <a href="#"></a></span>
          <span><i class="icon-folder-close"></i> <a href="#">Bootstrap</a></span>-->
          <span><i class="icon-calendar"></i> '.$article->pubdate.' </span></div>';

$str .= '<p>'.e(limit_to_numwords(strip_tags($article->body),$numwords)).'</p>';
$str .= '<a class="btn btn-default" href="'.$url.'">Read More <i class="icon-angle-right"></i></a></div>';
  return $str;
}


function limit_to_numwords($string, $numwords){
$excerpt = explode(" ", $string, $numwords +1);
if (count($excerpt)>= $numwords) {
  array_pop($excerpt);
}
$excerpt = implode(" ",$excerpt);

return $excerpt;
}


function e($string){
  return htmlentities($string);
}

function article_link($article){

  return base_url().'article/'.(intval($article->id)).'/'.($article->slug);

}

function article_links($articles){
  $string = '<ul style="list-style: none;">';
 foreach ($articles as $article) {
   $url = article_link($article);
    $string .= '<li>';
		$string .= '<h3  class="sidebar-h3">' . anchor($url, e($article->title)) .  '</h3>';
		$string .= '<p style="font-size: 10px; font-style:italic;">' . e($article->pubdate) . '</p>';
		$string .= '</li>';
 }
 $string .= '</ul>';
 return $string;
}

function get_image($image){
  return './uploads/'.$image->filename;
}


function get_footer_menu ($array, $child = FALSE)
{
	$CI =& get_instance();
	$str = '';

	if (count($array)) {
		$str .= $child == FALSE ? '<ul class="pull-right">' : '<ul class="dropdown-menu pull-right">' ;

		foreach ($array as $item) {
      if($item['title'] != 'developer'){
			$active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;
			if (isset($item['children']) && count($item['children'])) {
				$str .= $active ? '<li class="dropdown active">' : '<li class="dropdown">';
				$str .= '<a  class="dropdown-toggle" data-toggle="dropdown" href="' . base_url(e($item['slug'])) . '">' . e($item['title']);
				$str .= '<i class="icon-angle-down"></i></a>';
				$str .= get_menu($item['children'], TRUE);
			}
			else {
				$str .= $active ? '<li class="active">' : '<li>';
				$str .= '<a href="' . base_url($item['slug']) . '">' . e($item['title']) . '</a>';

			}
			$str .= '</li>';
		}
    }
    $str.= '<li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li>';

		$str .= '</ul>';

  }


	return $str;
}

function add_meta_title ($string){
	$CI =& get_instance();
	$CI->data['meta_title'] = e($string) . ' - ' . $CI->data['meta_title'];
}
