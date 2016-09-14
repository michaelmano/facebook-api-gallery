<?php

if( !isset( $_GET['cronjob'] ) || isset( $_GET['cronjob'] ) && $_GET['cronjob'] != '2s3213wsavgc123wqsdcx12wdc' ) {
  echo 'You do not have Permission to do this.';
  exit;
}

function get_facebook($data) {
  $json_request = 'https://graph.facebook.com/'. $data['account_name'] .'?access_token='. $data['access_token'] .'&fields='. $data['fields'] .'';
  $json_parsed = file_get_contents($json_request);
  return ($json_parsed);
}
$data = [
  'account_name'  =>      'ACCOUNT-NAME-OR-ID-HERE',
  'access_token'  =>      'ACCESS-TOKEN',
  'fields'        =>      'albums.fields(photos.fields(source))',
];

$json = json_decode(get_facebook($data));
$facebook = $json->albums->data;
$item_count = 400;
$output = '';

ob_start(); ?>
<div class="facebook-gallery">
<?php
$count = 0;
foreach ( $facebook as $photo ) {
  foreach ( $photo->photos->data as $image ) {
    $count++;
    if ( $count <= $item_count ) {
      echo "\t" . '<img class="facebook-gallery" src="'. $image->source .'" alt="Facebook Gallery">' . "\n";
    } else {
      break;
    }
  }
} ?>
</div><!--END facebook-gallery-->
<?php
$output = ob_get_contents();
ob_end_clean();
if($output) {
  file_put_contents(''.realpath(dirname(__FILE__)).'/facebook-gallery.php', $output);
  echo 'Completed';
} else {
  echo 'There was no output.';
}

exit;
