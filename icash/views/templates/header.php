<!doctype html>
<html lang="de">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title><?=$title;?></title>
  </head>
  <body>
<?php
if (@$GLOBALS['error'] && APP_CONFIG['environment'] == 'DEV') {
   
?>
  <div class="container-fluid btn-dark">
    Classes:
      <div class="row">
<?php
$dec_classes = get_declared_classes();
foreach ($dec_classes as $key => $val) {
  
  if(\substr($val,0,5) == "icash"){
?>
        <div class="col-sm-2">
          <p>
            <?=$val;?>
          </p>
        </div>

<?php
  }
}
?>      
      </div>
  </div>
  
  
        <div class="alert alert-warning alert-dismissible show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h3>Fehler</h3>
        <hr>
<?php
        $rCnt=0;
        if (@$GLOBALS['error']) {
          foreach (@$GLOBALS['error'] as $type => $errors) {
            foreach ($errors as $key => $val) {
              if($rCnt == 0) { echo "<p>Class: Number -> Error</p>"; }
              echo "<p>$type: $key -> $val</p>";
              $rCnt++;
            }
          }
        }
?>
    </div>
<?php     
}     
    
    